<?php

namespace App\Http\Controllers;

use App\Video;
use App\Category;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(4);
        return view('admin.video_manager.index', compact('videos'));
        // $videos = Video::all();
        // return view('admin.video_manager.index', compact('videos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Login(){
        return view('auth.login');
    }
    public function create()
    {
        return view('admin.video_manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchvideo(Request $request)
    {
        $search = $request->get('search');
        $videos = Video::where('title_video','like','%'.$search.'%')->paginate(4);
        return view('admin.video_manager.index',compact('videos'));
    }

    public function store(Request $request,Video $video)
    {
        // dd($request);
        $request->validate([
            'title_video' => 'required|min:3',
            'namesvideo' => 'required',
            'story_video' => 'required',
            'description_video' => 'required',
        ]);
        $videoName = time().'.'.$request->namesvideo->getClientOriginalExtension();

        $request->namesvideo->move(public_path('video/'), $videoName);

        $path =  'video/'.$videoName;

        $video = new Video;
        $users = auth()->user();
        $user       =   $users->id;
        $video->title_video = $request->title_video;
        $video->namesvideo =  $path;
        $video->story_video = $request->story_video;
        $video->description_video = $request->description_video;
        $video->user_id = $user;
        $video->save();

        return redirect('videos');
    }

    public function ShowVideo($id){
        $video = Video::find($id);
        $categorys = Category::get();
        return view ('user.detailnesvideo', compact('video','categorys'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view ('admin.video_manager.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Video $video)
    {
        return view('admin.video_manager.edit',compact('video', $video));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Video $video)
    {
           // dd($request);
           $request->validate([
            'title_video' => 'required|min:3',
            'namesvideo' => 'required',
            'story_video' => 'required',
            'description_video' => 'required',
        ]);
        $videoName = time().'.'.$request->namesvideo->getClientOriginalExtension();

        $request->namesvideo->move(public_path('video/'), $videoName);

        $path =  'video/'.$videoName;



        $video->title_video = $request->title_video;
        $video->namesvideo =  $path;
        $video->story_video = $request->story_video;
        $video->description_video = $request->description_video;
        $video->save();
        $request->session()->flash('message', 'Successfully modified the Video!');
        return redirect('videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Video $video)
    {
        $video->delete();
        $request->session()->flash('message', 'Successfully deleted the Video!');
        return redirect('videos');
    }
}
