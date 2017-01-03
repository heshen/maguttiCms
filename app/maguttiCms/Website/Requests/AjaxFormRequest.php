<?php
namespace App\MaguttiCms\Website\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Input;
use Validator;

class AjaxFormRequest extends FormRequest
{
    protected $model; /*************  cur model to validate **************/
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $segments = $this::segments();
        $this->model= end( $segments  ) ;
        $rules =  config('maguttiCms.website.form_validation.'.$this->model);
        return $rules;
    }


    public function validate()
    {



    }
}
