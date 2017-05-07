<?php
/**
 * Created by PhpStorm.
 * User: heshen
 * Date: 2017/5/1
 * Time: 01:30
 */

namespace App\MaguttiCms\Website\Repos\Botanies;

interface BotaniesRepositoryInterface
{
    public function getBySlug($slug);
    public function getPublished();
}