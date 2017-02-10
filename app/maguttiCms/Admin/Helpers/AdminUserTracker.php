<?php namespace App\LaraCms\Admin\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class AdminUserHelperTrait
 * @package App\LaraCms\Admin\Helpers
 */

trait AdminUserTrackerTrait
{
    /*
    |--------------------------------------------------------------------------
    | Trake
    |--------------------------------------------------------------------------
    */
    protected $value;
    protected $model;
    protected $guard = 'admin';


    public static function bootAdminUserHelperTrait()
    {
        static::created(function ($item) {
            // Index the itemcompo
        });
    }

    protected function setCreatedByAttribute()
    {
        if($this->fieldIsFillable('created_by'))$this->model->created_by = auth($this->getGuard())->user()->id;
    }

    protected function setUpdatedByAttribute()
    {
        if($this->fieldIsFillable('updated_by'))$this->model->updated_by = auth($this->getGuard())->user()->id;
    }

    public function hackedBy(Model $model)

    {
        $this->model = $model;
        if ($this->model->id == '') $this->setCreatedByAttribute();
        $this->setUpdatedByAttribute();
    }

    /**
     * @return string
     */
    public function getGuard()
    {
        return $this->guard;
    }

    /**
     * @param string $guard
     * @return AdminUserHelperTrait
     */
    public function setGuard($guard)
    {
        $this->guard = $guard;
        return $this;
    }

    /**
     * @param $field
     * @return bool
     */
    protected function fieldIsFillable($field)
    {
        return  (in_array($field,$this->model->getFillable())) ?true:false;
    }
}



