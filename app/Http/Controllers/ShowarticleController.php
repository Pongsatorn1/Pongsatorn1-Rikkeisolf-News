<?php

namespace App\Http\Controllers;
use App\article;
//use App\Http\Resources\Rating;
use App\Category;
use App\PopularArticle;
use App\Video;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowarticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $populararticle1 = PopularArticle::where('slot_id', '=', '1')->first();
        $populararticle2 = PopularArticle::where('slot_id', '=', '2')->first();
        $populararticle3 = PopularArticle::where('slot_id', '=', '3')->first();
        $populararticle4 = PopularArticle::where('slot_id', '=', '4')->first();
        $populararticle5 = PopularArticle::where('slot_id', '=', '5')->first();
        $populararticle6 = PopularArticle::where('slot_id', '=', '6')->first();

        // $populararticles = PopularArticle::where('id', '=', '2')->paginate(6);
        $articles = Article::latest()->paginate(5);
        $videos = Video::latest()->paginate(4);
        $user = auth()->user();;
        $categorys = Category::get();
        // dd($populararticles);
        return view('user.index', compact('articles','videos','categorys', 'user','populararticle1', 'populararticle2', 'populararticle3', 'populararticle4', 'populararticle5', 'populararticle6'));
    }


    public function Login(){
        return view('auth.login');
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

    public function showarticle_category(Request $request,$id)
    {
        $categorys = Category::get();
        $articles = Article::latest()->where('category_id','like','%'.$id.'%')
        ->paginate(20);
        $user = auth()->user();;
        return view('user.category', compact('categorys','articles', 'user'));
    }

    public function showvideo_all()
    {

        $videos = Video::latest()->paginate(20);
        $categorys = Category::get();
        // dd($populararticles);
        $user = auth()->user();;
        return view('user.video', compact('categorys','videos', 'user'));
    }


    public function showarticle()
    {
        $articles = Article::latest()->paginate(20);
        $categorys = Category::get();
        $user = auth()->user();;
        // dd($populararticles);
        return view('user.News', compact('articles','categorys', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function searchshowvideo (Request $request)
    {
        $categorys = Category::get();
        $search = $request->get('search');
        $videos = Video::where('title_video','like','%'.$search.'%')
        ->orWhere('namesvideo','like','%'.$search.'%')
        ->orWhere('description_video','like','%'.$search.'%')
        ->paginate(20);
        $user = auth()->user();;
        return view('user.searchvideo',compact('videos','categorys', 'user'));
    }

    public function searchshowararticle (Request $request)
    {
        $categorys = Category::get();
        $search = $request->get('search');
        $articles = Article::where('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('story','like','%'.$search.'%')
        ->orWhere('category_id','like','%'.$search.'%')
        ->paginate(20);
        $user = auth()->user();;
        return view('user.search',compact('articles','categorys', 'user'));
    }
    public function show( $id)
    {
        // dd($article->getstarRating());
        // $u_id = auth()->user()->id;
        $article = article::find($id);
        $show_rating = Rating::where('article_id', $id)->groupBy(['rating'])->orderBy('rating')->get([
            \DB::raw('count("user_id") as count_user_rate'),
            'rating'
        ]);
        $count_show = count($show_rating->toArray());
        $categorys = Category::get();
        $user = auth()->user();;
        return view ('user.detailnes', compact('article','count_show', 'show_rating','categorys', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showvideo($id)
    {
        // dd($article->getstarRating());
        $video = Video::find($id);
        $categorys = Category::get();
        $user = auth()->user();;
        return view ('user.detailnesvideo', compact('video','categorys', 'user'));
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function favoriteArticle(Article $article)
    {
        Auth::user()->favorites()->attach($article->id);

        return back();
    }
    public function unFavoriteArticle(Article $article)
    {
        Auth::user()->favorites()->detach($article->id);

        return back();
    }

    public function favoritePost(Post $post)
    {
        Auth::user()->favorites()->attach($post->id);

        return back();
    }

    public function showcontact()
    {
        // dd($article->getstarRating());
        $user = auth()->user();;
        $categorys = Category::get();
        // dd($populararticles);
        return view('user.contact', compact('categorys', 'user'));
    }


}
