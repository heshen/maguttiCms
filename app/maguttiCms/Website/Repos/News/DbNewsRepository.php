<?php
namespace App\MaguttiCms\Website\Repos\News;

/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 10:58
 */
use App\MaguttiCms\Website\Repos\News\NewsRepositoryInterface;
use App\News;
use App\MaguttiCms\Website\Repos\DbRepository;

/**
 * Class DbPostRepository
 * @package App\MaguttiCms\Website\Repos\Post
 */
class DbNewsRepository extends DbRepository implements NewsRepositoryInterface
{

    /**
     * @var News
     */
    protected $model;

    /**
     * DbNewsRepository constructor.
     * @param News $model
     */
    function  __construct(News $model)
    {
        $this->model = $model;
    }

   function  getLatest($limit){
       $this->model->latest($limit)->get();
  }


}