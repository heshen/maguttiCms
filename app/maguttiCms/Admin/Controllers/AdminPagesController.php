<?php namespace App\MaguttiCms\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Input;

use App\MaguttiCms\Admin\Requests\AdminFormRequest;
use App\MaguttiCms\Searchable\SearchableTrait;
use App\MaguttiCms\Sluggable\SluggableTrait;
use App\MaguttiCms\Tools\UploadManager;



/**
 * Class AdminPagesController
 * @package App\MaguttiCms\Admin\Controllers
 */
class AdminPagesController extends Controller
{
    use SluggableTrait;
    use SearchableTrait;

    protected $model;
    protected $models;
    protected $modelClass;
    protected $curObject;
    protected $request;
    protected $config;
    protected $id;

    /**
     * @param $model
     */
    public function init($model)
    {
        $this->model = $model;
        $this->config = config('laraCms.admin.list.section.' . $this->model);
        $this->models = strtolower(str_plural($this->config['model']));
        $this->modelClass = 'App\\' . $this->config['model'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('admin.home');
    }

    /**
     * Show the index list of a model.
     * @return Response
     */
    public function lista(Request $request, $model, $sub = '')
    {
        $this->request = $request;
        $this->init($model);
        $models = new $this->modelClass;
        $this->setCurModel($models)->setOrderBy();

        if( $this->isTranslatableField($this->sort)) {
            $translationTable = $this->getTranslatableTable();
            $table            = $this->getMainTable();
            $objBuilder = $models::join($translationTable.'_translations as t', 't.'.$translationTable.'_id', '=', $table.'.id')
                ->where('locale','it')
                ->groupBy($table.'.id')
                ->orderBy('t.'.$this->sort, $this->sortType)
                ->with('translations');
            $objBuilder->select($table.'.*');
        }
        else {
            $objBuilder  = $models::orderby($this->sort, $this->sortType);
        }
        $this->searchFilter( $objBuilder );
        $articles = $objBuilder->paginate(config('laraCms.admin.list.item_per_pages'));
        return view('admin.list', ['articles' => $articles, 'pageConfig' => $this->config]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $model
     *
     * @return Response
     */
    public function create($model)
    {
        $this->init($model);
        $article = new $this->modelClass;
        return view('admin.edit', ['article' => $article, 'pageConfig' => $this->config]);
    }

    /**
     * Show the form for editing
     * the specified resource.
     *
     * @param $model
     * @param  int $id
     *
     * @return Response
     */
    public function edit($model, $id)
    {
        $this->id = $id;
        $this->init($model);
        $model = new  $this->modelClass;
        $article = $model::whereId($this->id)->firstOrFail();
        /** @var  gestione pageTemplate */
        $this->pageTemplate = (isset($this->config['editTemplate'])) ? $this->config['editTemplate'] : 'admin.edit';
        return view( $this->pageTemplate, ['article' => $article, 'pageConfig' => $this->config]);
    }

    /**
     *
     * GF_ma view controller
     * @param $model
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function view($model, $id)
    {
        $this->id = $id;
        $this->init($model);
        $model = new  $this->modelClass;
        $article = $model::whereId($this->id)->firstOrFail();
        $this->pageTemplate = (isset($this->config['viewTemplate'])) ? $this->config['viewTemplate'] : 'admin.view';
        return view( $this->pageTemplate, ['article' => $article, 'pageConfig' => $this->config]);
    }

    /**
     * @param $model
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editmodal($model, $id)
    {
        $this->id = $id;
        $this->init($model);
        $model = new  $this->modelClass;
        $article = $model::whereId($this->id)->firstOrFail();
        return view('admin.editmodal', ['article' => $article, 'pageConfig' => $this->config]);
    }

    /**
     * Store a newly created
     * resource in storage.
     *
     * @param $model
     * @param AdminFormRequest $request
     *
     * @return Response
     */
    public function store($model, AdminFormRequest $request)
    {
        $this->init($model);
        $this->request = $request;
        $config = config('laraCms.admin.list.section.' . $model);
        $model  = new  $this->modelClass;
        $article = new $model;
        // input data Handler
        $this->requestFieldHandler($article);

        flash()->success('The item <strong>' . $article->title . '</strong> has been created!');
        return redirect(action('\App\MaguttiCms\Admin\Controllers\AdminPagesController@edit', $this->models . '/' . $article->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $model
     * @param  int $id
     * @param AdminFormRequest $request
     *
     * @return Response
     */
    public function update($model, $id, AdminFormRequest $request)
    {
        $this->init($model);
        $this->request = $request;
        $model   = new  $this->modelClass;
        $article = $model::whereId($id)->firstOrFail();
        // input data Handler
        $this->requestFieldHandler($article);
        return redirect(action('\App\MaguttiCms\Admin\Controllers\AdminPagesController@edit', $this->models . '/' . $article->id));

    }

    /**
     * Update the specified resource
     * in storage.
     *
     * @param $model
     * @param  int $id
     * @param AdminFormRequest $request
     *
     * @return Response
     */
    public function updatemodal($model, $id, AdminFormRequest $request)
    {
        $this->init($model);
        $this->request = $request;
        $model = new  $this->modelClass;
        $article = $model::whereId($id)->firstOrFail();
        // input data Handler
        $this->requestFieldHandler($article);
        echo json_encode(array('status' => $this->config['model'] . ' Has been update'));
    }

    /**
     * Remove the specified resource
     * from storage.
     *
     * @param $model
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($model, $id)
    {
        $this->init($model);
        $this->id = $id;
        $model = new  $this->modelClass;
        $article = $model::whereId($this->id)->firstOrFail();
        $article->delete();
        flash()->error('The items ' . $article->title . ' has been deleted!')->important();
        return redirect(action('\App\MaguttiCms\Admin\Controllers\AdminPagesController@lista', $this->models));
    }

    /**
     * @param $article
     */
    public function requestFieldHandler($article)
    {
        foreach ($article->getFillable() as $a) {
            $article->$a = $this->request->get($a);
        }
        if (isset($article->sluggable)) {
            foreach ($article->sluggable as $a) {
                $article->$a = $this->sluggy($article, $this->request->get($a));
            }
        }
        $this->processMedia($article);
        $article->save();
        // many to many relation
        /* TODO -> create  dimanic  check roles */
        if (method_exists($article, 'saveRoles'))       $article->saveRoles($this->request->get('role'));
        if (method_exists($article, 'saveTags'))        $article->saveTags($this->request->get('tag'));
        if (method_exists($article, 'saveCountries'))   $article->saveCountries($this->request->get('country'));
        // translatable
        if (isset($article->translatedAttributes) && count($article->translatedAttributes) > 0) {
            foreach (config('app.locales') as $locale => $value) {
                foreach ($article->translatedAttributes as $attribute) {
                    if (config('app.locale') != $locale) $article->translateOrNew($locale)->$attribute = $this->request->get($attribute . '_' . $locale);
                    else $article->translateOrNew($locale)->$attribute = $this->request->get($attribute);
                }
                $article->save();
            }
        }
    }

    /**
     * Perform the media upload
     * @param $model
     * @param $media
     */
    private function mediaHandler($model,$media)
    {
        $UM = new UploadManager;
        $model->$media = $UM->init($media,$model)->store()->getFileFullName();
    }

    /**
     * PROCESS ALL THE
     * MEDIA FILES
     * @param $model
     */
    private function processMedia($model)
    {
        foreach ($model->getFieldSpec() as $key => $field) {
            if ($field['type'] == 'media') {
                $this->mediaHandler($model, $key);
            }
        }
    }
}
