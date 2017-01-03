<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 11:21
 */
namespace App\MaguttiCms\Website\Repos\Article;
/**
 * Interface ArticleRepositoryInterface
 * @package App\MaguttiCms\Website\Repos\Article
 */
interface ArticleRepositoryInterface
{
    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}