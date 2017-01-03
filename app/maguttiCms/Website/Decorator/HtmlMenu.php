<?php
namespace App\MaguttiCms\Website\Decorator;
Use App;
use Carbon\Carbon;
class HtmlMenu  extends  maguttiCmsDecorator{

	public function get($model)
	{

		$this->initHtml ( $model );
		echo $this->render();
	}
	protected   function  initHtml ($model)
	{
		$this->html  = "";
		$this->model = $model;
	}
	
}