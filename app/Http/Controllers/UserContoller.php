<?php
namespace App\Http\Controllers;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user_manager.index', compact('users'));
        // $users = User::all();
        // return view('admin.user_manager.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchuser(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name','like','%'.$search.'%')->paginate(5);
        return view('admin.user_manager.index',compact('users'));
    }

    public function store(Request $request,User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:13'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png' ,'max:5000']
            ]);


            $profile = time().'.'.$request->avatar->getClientOriginalExtension();

            $request->avatar->move(public_path('img/'), $profile);

            $path_users =  'img/'.$profile; //img/imgname

            $user = new user;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->email= $request->email;
            $user->imagenews =  $path_users;
            $request->session()->flash('message', 'Successfully modified the User!');
            return redirect('users');
            $user->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view ('admin.user_manager.show', compact('user',$user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $user = User::find($id);
           return view ('admin.user_manager.edit', compact('user','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
    public function destroy(Request $request,User $user)
    {
        $user->delete();
        $request->session()->flash('message', 'Successfully deleted the User!');
        return redirect('users');
    }

    public function myFavorites()
{
    $myFavorites = Auth::user()->favorites;
    $categorys = Category::get();
    return view('user.my_favorites', compact('myFavorites','categorys'));
}
public function __construct()
{
    $this->middleware('auth');
}

public function edit1(User $user)
{
    $user = Auth::user();
    dd($user);
    return view('user.editprofile', compact('user'));
}

public function update1(Request $request,User $user)
{
    $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'phone' => ['required', 'string', 'max:13'],
        'gender' => ['required', 'string', 'max:13'],
        'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png' ,'max:5000']
    ]);

    $profile = time().'.'.$request->avatar->getClientOriginalExtension();

    $request->avatar->move(public_path('img/'), $profile);

    $path_users =  'img/'.$profile; //img/news_img/imgname

    $user->name =$request->name;
    $user->email =$request->email;
    $user->password =$request->password;
    $user->phone = $request->phone;
    $user->gender= $request->gender;
    $user->avatar =  $path_users;
    $user->updated_at = $request->updated_at;
    $user->update();
    $request->session()->flash('message', 'Successfully modified the User!');
    return back();
}
}
