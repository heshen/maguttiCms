<?php namespace App\MaguttiCms\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Input;

class AdminFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized
     * to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that
     * apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $model= ( $this::segment(2)=='create')? $this::segment( count( $this::segments() )) : $this::segment( count( $this::segments() )-1) ;
        $rules =  config('maguttiCms.admin.form_validation.'.$model);
        return $rules;
    }
}
