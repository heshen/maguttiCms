<?php

namespace App\MaguttiCms\Website\Controllers;
use App\Botany;
use App\FaqCategory;
use App\MaguttiCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\MaguttiCms\Website\Repos\News\NewsRepositoryInterface;
use App\MaguttiCms\Website\Repos\Botanies\BotaniesRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;
use App\PlantProvenience;
use App\LeafType;
use App\Environment;
use App\Taxonomy;
use Domain;


class PagesController extends Controller

{
	use \App\MaguttiCms\SeoTools\MaguttiCmsSeoTrait;
    /**
     * @var
     */
    protected  $template;
    /**
     * @var ArticleRepositoryInterface
     */
    protected  $articleRepo;
    /**
     * @var NewsRepositoryInterface
     */
    protected  $newsRepo;

    protected  $botaniesRepo;
    /**
     * @var NewsRepositoryInterface
     *
     *
     */
    private $news;

    /**
     * @param ArticleRepositoryInterface $article
     * @param PostRepositoryInterface $news
     */

    public function __construct(ArticleRepositoryInterface $article,NewsRepositoryInterface $news ,BotaniesRepositoryInterface $botanies)
    {
        $this->articleRepo = $article;
        $this->newsRepo    = $news;
        $this->botaniesRepo = $botanies;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $article =$this->articleRepo->getBySlug('home');
        $this->setSeo($article);
        return view('website.home',compact('article'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages($slug) {
        $article = $this->articleRepo->getBySlug($slug);
        if($article){
            $this->setSeo($article);
            $this->template = ( $article->template_id ) ?  $article->template->value  : $slug;
            if (view()->exists('website.'. $this->template)) {
                return view('website.'.$this->template,compact('article'));
            }
            return view('website.normal',compact('article'));
        }
        else {
            return Redirect::to('/');
        }
    }

    public function test() {
        phpinfo();
        die();
    }

    /**
     * @param int $parameter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts($parameter=0) {
        $article = $this->articleRepo->getBySlug('contacts');
		if( $parameter ) {
			return view('website.contacts', ['request_product_id' => $parameter, 'article' => $article]);
		}else{
			return view('website.contacts', ['request_product_id' => 0, 'article' => $article]);
		}
	}

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news($slug='') {
        $article = $this->articleRepo->getBySlug('news');

        if($slug=='') {
        	$this->setSeo($article);
            $news = $this->newsRepo->getPublished();
            return view('website.news.home',compact('article','news'));
        }
        else {
            $news = $this->newsRepo->getBySlug($slug);;
            if($news){
                $this->setSeo($news);
                return view('website.news.single',compact('article','news'));
            }
            return Redirect::to('/');
        }
    }//

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function botanies($id= '') {
        $article = $this->articleRepo->getBySlug('botanies');

        if($id == '') {
            $this->setSeo($article);
            $botanies = Botany::all();
            return view('website.botanies.home',compact('article','botanies'));
        }
        else {
            $botanies = Botany::where("id", $id)-> first();
            $taxonomy = Taxonomy::where("id",$botanies ->taxon) -> first();

            if($botanies){
                //$this->setSeo($botanies);
                return view('website.botanies.single',compact('article','botanies','taxonomy'));
            }
            return Redirect::to('/');
        }
    }

}