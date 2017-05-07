<?php
/**
 * Created by PhpStorm.
 * User: heshen
 * Date: 2017/5/1
 * Time: 01:31
 */

namespace App\MaguttiCms\Website\Repos\Botanies;


use App\MaguttiCms\Website\Repos\Botanies\BotaniesRepositoryInterface;
use App\Botany;
use App\MaguttiCms\Website\Repos\DbRepository;

/**
 * Class DbPostRepository
 * @package App\MaguttiCms\Website\Repos\Post
 */
class DbBotaniesRepository extends DbRepository implements BotaniesRepositoryInterface
{

    /**
     * @var Botany
     */
    protected $model;

    /**
     * DbNewsRepository constructor.
     * @param News $model
     */
    function  __construct(Botany $model)
    {
        $this->model = $model;
    }

    function  getLatest($limit){
        $this->model->latest($limit)->get();
    }


}