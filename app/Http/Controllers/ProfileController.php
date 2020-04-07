<?php

namespace App\Http\Controllers;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $categorys = Category::get();
        return view ('user.showprofile', compact('user','categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $categorys = Category::get();
        return view ('user.editprofile', compact('user','categorys'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13'],
            'gender' => ['required', 'string', 'max:13'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png' ,'max:5000']
            ]);

            $profile = time().'.'.$request->avatar->getClientOriginalExtension();

            $request->avatar->move(public_path('img/'), $profile);

            $path_users =  'img/'.$profile; //img/news_img/imgname



            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email= $request->email;
            $user->gender= $request->gender;
            $user->avatar =  $path_users;
            $user->updated_at = $request->updated_at;
            $user->save();
            $request->session()->flash('message', 'Successfully modified the User!');
            return redirect('users');
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
}
