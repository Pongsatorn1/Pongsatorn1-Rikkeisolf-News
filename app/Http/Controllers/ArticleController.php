<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\PopularArticle;
use Illuminate\Http\Request;
use App\Mail\NewarticleMail;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::all();
        $articles =  Article::latest()->paginate(5);
        return view('admin.articles_manager.index', compact('articles'));

        // $articles = DB::table('articles')->paginate(15);
        // return view('admin.articles_manager.index', ['articles' => $articles]);
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
        $categorylist = Category::select('id','name')->get();
        $articles =  new Article();

        // return $categorylist;
        return view('admin.articles_manager.create', compact('categorylist','articles'));

    }

    public function searcharticle (Request $request)
    {
        $search = $request->get('search');
        $articles = Article::latest()->where('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('story','like','%'.$search.'%')
        ->orWhere('category_id','like','%'.$search.'%')
        ->paginate(5);
        return view('admin.articles_manager.index',compact('articles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        \Mail::to($request->user())->send(new NewarticleMail());
        $request->validate([
            'title' => 'required|min:3',
            'story' => 'required',
            'description' => 'required',
            'imagenews' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $imageName = time().'.'.$request->imagenews->getClientOriginalExtension();

        $request->imagenews->move(public_path('img/news_img'), $imageName);

        $path =  'img/news_img/'.$imageName; //img/news_img/imgname


        $article = new Article;
        $users = auth()->user();
        $user  = $users->id;
        $article->title = $request->title;
        $article->story = $request->story;
        $article->description = $request->description;
        $article->imagenews =  $path;
        $article->category_id =  $request->category_id;
        $article->user_id =  $user;
        $article->save();

     /*   $article = article::create([
            'title' => $request->title,
            'story' => $request->story,
            'description' => $request->description,
            'imagenames' => $path
        ]);*/

        return redirect('articles');

        //return view("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view ('admin.articles_manager.show', compact('article',$article));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categorylist = Category::select('id','name')->get();
        // redirect ('articles.index');
        return view ('admin.articles_manager.edit', compact('categorylist','article',$article));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'title' => 'required|min:3',
            'story' => 'required',
            'description' => 'required',
            'imagenews' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->imagenews->getClientOriginalExtension();

        $request->imagenews->move(public_path('img/news_img'), $imageName);

        $path =  'img/news_img/'.$imageName; //img/news_img/imgname



        $article->title = $request->title;
        $article->story = $request->story;
        $article->description = $request->description;
        $article->category_id =  $request->category_id;
        $article->imagenews =  $path;
        $article->save();
        $request->session()->flash('message', 'Successfully modified the article!');
        return redirect('articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,Article $article)
    {
        $article->delete();
        $request->session()->flash('message', 'Successfully deleted the article!');
        return redirect('articles');
    }

    public function VotePopular(Request $request){
        $id = $request->input("id");

        $populararticle = PopularArticle::get();

        if(count($populararticle) >  6){

            //return message alert dialog "ข้อมูลเกิด 6";

        }
        else{

         $popularArticle = new PopularArticle;

         $popularArticle->article_id = $id;

         $popularArticle->save();

        }


        return redirect('articles');

    }



}

