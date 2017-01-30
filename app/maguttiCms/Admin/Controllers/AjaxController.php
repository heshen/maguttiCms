<?php namespace App\MaguttiCms\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Input;
use Image;

use App\MaguttiCms\Tools\UploadManager;
use App\Media;

class AjaxController extends Controller
{
    private $responseContainer = ['status' => 'ko', 'message' => '', 'error' => '', 'data' => ''];
    protected $request;

    public function update($action, $model, $id = '', Request $request)
    {
        $this->request = $request;
        switch ($action) {
            case "updateItemField":

                if ($this->request->input('field')) {
                    $field = $this->request->input('field');
                    $value = $this->request->input('value');
                    $modelClass = 'App\\' . $model;
                    $object = $modelClass::whereId($id)->firstOrFail();
                    $object->$field = $value;
                    $object->save();
                    $this->responseContainer['status'] = 'ok';
                    $this->responseContainer['message'] = 'Data has been updated';
                    $this->responseContainer['data'] = $object;
                }
                break;
        }
        return $this->responseHandler();
    }

    public function delete($model, $id = '')
    {

        $modelClass = 'App\\' . ucFirst($model);
        $object = $modelClass::whereId($id)->first();
        if (is_object($object)) {
            $object->delete();
            $this->responseContainer['status'] = 'ok';
            $this->responseContainer['message'] = 'Data has been deleted';
        } else $this->responseContainer['error'] = 'Data not found';
        return $this->responseHandler();
    }


    /*
    |--------------------------------------------------------------------------
    |  Upload File using Ajax Method
    |--------------------------------------------------------------------------
    |  Filesystem Disk = > media
    |
    |
     */
    public function uploadifive(Request $request)
    {
        $media = 'Filedata';
        if (Input::hasFile($media) && Input::file($media)->isValid()) {

            $UM              = new UploadManager;
            $fileData        = $UM->init($media,$request)->store()->getFileDetails();
            $disk            = "media";
            $destinationPath = $disk.'/' .$fileData['mediaType']; // upload path folder

            if (is_image($fileData['mediaType']) == 'image') {
                //$img = Image::make($newMedia->getRealPath());
                $img = Image::make(public_path( $destinationPath . '/' . $fileData['fullName'] ))->widen(1600);
                // save file as png with medium quality
                $img->save(public_path($destinationPath . '/' . $fileData['fullName'], 60));
            }

            /**
             * SAVE THE DATA TO
             * THE MEDIA MODEL
             */

            $modelClass = 'App\\' . $request->model;
            $list       = $modelClass::find($request->Id);

            $c = new Media;
            $c->title               = $fileData['fullName'];
            $c->file_name           = $fileData['fullName'];
            $c->size                = $fileData['size'];
            $c->collection_name     = $fileData['mediaType'];
            $c->disk                = $disk;
            $c->media_category_id   = 1;
            $c->file_ext            = $fileData['extension'];
            $list->media()->save($c);

            $this->responseContainer['status'] = 'ok';
            $this->responseContainer['data']   = $fileData['mediaType'];
            return $this->responseHandler();
        }
    }

    public function updateMediaList($mediaType, $model, $id = '')
    {
        $modelClass = 'App\\' . ucfirst($model);
        $object = $modelClass::whereId($id)->firstOrFail();
        if ($mediaType == 'images') return view('admin.helper.images_list_gallery', ['article' => $object]);
        else return view('admin.helper.docs_list', ['article' => $object]);
    }


    public function updateMediaSortList(Request $request)
    {
        $i = 1;

        $input = Input::all();
        foreach ($input as $key => $items) {
            $dataObject = explode('_', $key);
            foreach ($items as $id) {
                $modelClass = 'App\\' . $dataObject[1];
                $object = $modelClass::whereId($id)->firstOrFail();
                $object->sort = $i * 10;
                $object->save();
                $i++;
            };
        };
    }

    public function responseHandler()
    {
        return response()->json($this->responseContainer);
    }

    /**
     * This method is used to perform a search for select 2 suggestion fields.
     *
     * @param Request $request: The current select 2 request.
     *
     * @return \Illuminate\Http\JsonResponse: The JSON representation of the result.
     */
    public function suggest(Request $request)
    {
        // Validate the request.
        $this->validate($request, [
            'q' => 'required',
            'model' => 'required',
            'value' => 'required',
            'caption' => 'required',
            'accessor' => 'required'
        ]);

        // Set convenience variables.
        $term = $request->q;
        $model = getModelFromString($request->model);
        $value = $request->value;
        $caption = $request->caption;

        /*
         * Make sure that the user can access this data (meaning he has sufficient role permissions).
         * Permissions should be set on the relevant model, for example User model could have:
         *
         *     public $ajaxAccessibilityRoles = ['su', 'admin']; // Super user and admin can perform a search.
         *
         * If roles are not set the accessibility is considered 'public'.
         */
        if (property_exists(get_class($model), 'ajaxAccessibilityRoles')) {

            $accessAllowed = false;
            foreach ($model->ajaxAccessibilityRoles as $role) {

                if (Auth::guard('admin')->user()->hasRole($role))
                    $accessAllowed = true;
            }

            // The user is not allowed to perform this query, just return without any error message.
            if (!$accessAllowed)
                return response()->json([]);
        }

        // Check if we are dealing with an accessor property.
        if ($request->accessor == '1') {

            // Make sure that we have the necessary data to perform the query.
            if (property_exists(get_class($model), 'accessors') && isset($model->accessors[$caption])) {

                // Build the query by adding each field to the where clause.
                $step = 0;
                foreach ($model->accessors[$caption] as $field) {

                    $step++;
                    if ($step == 1)
                        $records = $model->where($field, 'LIKE', "%{$term}%");
                    else
                        $records = $records->orWhere($field, 'LIKE', "%{$term}%");
                }

                // Build the response and return.
                $items = $this->buildSuggestResponse($records->get(), $value, $caption);

                return response()->json($items);
            }

            // Cannot search on an accessor without knowing the relevant fields.
            return response()->json([]);
        }
        else {

            // Check if the field is translatable.
            if ($this->isTranslatableField($model, $caption)) {

                $records = $model::whereTranslationLike($caption, "%{$term}%");
            }
            else {

                // This is the simplest case where we know exactly what's the field to search.
                $records = $model::select($value, $caption)->where($caption, 'LIKE', "%{$term}%");
            }

            if ($request->has('where') && $request->where != '')
                $records = $records->whereRaw($request->where);

            $records = $records->get();
        }

        // Build the response and return.
        $items = $this->buildSuggestResponse($records, $value, $caption);

        return response()->json($items);
    }

    /**
     * This method is used to build an array response suitable for select 2.
     * Note: the result must be converted to JSON before sending it over.
     *
     * @param $records: The records to iterate.
     * @param $value: The 'key' of key => value array.
     * @param $caption: The 'value' of key => value array.
     *
     * @return array: The array of items.
     */
    public function buildSuggestResponse($records, $value, $caption)
    {
        $items = [];
        foreach ($records as $record) {

            $items[] = [
                'id'    => $record->$value,
                'value' => $record->$caption
            ];
        }

        return $items;
    }

    /**
     * Edited: GF_ma check if the field is translatable.
     *
     * @param $model: The model.
     * @param $key: The field to look for.
     *
     * @return bool: True if translatable, false otherwise.
     */
    protected function isTranslatableField($model, $key)
    {
        return (property_exists($model, 'translatedAttributes') && in_array($key, $model->translatedAttributes));
    }
}