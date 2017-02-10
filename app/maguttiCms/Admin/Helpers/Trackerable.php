<?php namespace App\LaraCms\Admin\Helpers;
use Illuminate\Database\Eloquent\Model;
use App\ActionTracker;

trait TrackerableTrait
{

    protected $value;
    protected $model;
    protected $original; // original value

    /**
     *
     */
    public static function bootTrackerableTrait()
    {
        static::created(function($item){
            // Index the item
        });
    }

    public function modelTracker(Model $model)
    {
        $this->model    = $model;
        $this->original = $this->model->getOriginal();

        if(!isset($this->model ->trackerable )) return;
        foreach ($this->model ->trackerable  as $attribute) {
            if($this->isChanged($attribute))  $this->saveChange($attribute);

        }
    }


    protected function isChanged($attribute) {
         return  ($this->model->$attribute != $this->original[$attribute] ) ? true: false;
    }

    protected function  saveChange($attribute){

        $action = new ActionTracker();
        $action->title      = $attribute;
        $action->action     = "update";
        $action->oldvalue   = $this->original[$attribute];
        $action->newvalue   = $this->model->$attribute;
        $action->created_by = auth('admin')->user()->id;
        $this->model->actiontracker()->save($action);

    }
}
