<?php

namespace App\Http\Controllers;

use App\Botany;
use Illuminate\Http\Request;

class BotanyController extends Controller
{


    public function botanies($slug){
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Botany::paginate(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Botany  $botany
     * @return \Illuminate\Http\Response
     */
    public function show(Botany $botany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Botany  $botany
     * @return \Illuminate\Http\Response
     */
    public function edit(Botany $botany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Botany  $botany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Botany $botany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Botany  $botany
     * @return \Illuminate\Http\Response
     */
    public function destroy(Botany $botany)
    {
        //
    }
}
