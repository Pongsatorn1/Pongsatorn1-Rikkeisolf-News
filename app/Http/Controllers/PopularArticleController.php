<?php

namespace App\Http\Controllers;

use App\PopularArticle;
use App\Article;
use App\Rating;
use Illuminate\Http\Request;

class PopularArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $populararticle = PopularArticle::get();

        if(count($populararticle) >  6){

        }
        return view('admin.popular_article_manager.index', compact('populararticle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchpopulararticle (Request $request)
    {
        $search = $request->get('search');
        $articles = Article::where('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('story','like','%'.$search.'%')
        ->orWhere('category_id','like','%'.$search.'%')
        ->paginate(5);
        return view('admin.popular_article_manager.edit', compact('articles'));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PopularArticle  $popularArticle
     * @return \Illuminate\Http\Response
     */
    public function show(PopularArticle $populararticle)
    {
        // $u_id = auth()->user()->id;
        // $article = article::find($id);
        // $show_rating = Rating::where("user_id",$u_id)->where("article_id",$id)->get();
        // $count_show = count($show_rating);
        // return view ('user.detailnes', compact('article','count_show'));
        return view ('admin.popular_article_manager.show', compact('populararticle',$populararticle));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PopularArticle  $popularArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(PopularArticle $popularArticle)
    {

    }

    public function edit_show($id){
        $articles = Article::latest()->paginate(5);
        $popularArticle = PopularArticle::paginate(6);
        return view('admin.popular_article_manager.edit', compact('articles','popularArticle','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PopularArticle  $popularArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PopularArticle $popularArticle)
    {


    }

    public function update_popular(Request $request,$id){
        $id_update = explode('_',$id);

        $select = PopularArticle::where('id',$id_update[0])
        ->update(['article_id'=>$id_update[1]]);

        $request->session()->flash('message', 'Successfully modified the PopularArticle!');
        return redirect('populararticle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PopularArticle  $popularArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,PopularArticle $article)
    {

            $article->delete();
            $request->session()->flash('message', 'Successfully deleted the Popular article!');
            return redirect('populararticle');


    }
}
