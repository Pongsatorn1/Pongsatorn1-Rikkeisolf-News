<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user_manager.status', compact('users'));
        // $users = User::all();
        // return view('admin.user_manager.status', compact('users'));
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

    public function searchtype (Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name','like','%'.$search.'%')
        ->orWhere('type','like','%'.$search.'%')
        ->paginate(5);
      
        return view('admin.user_manager.status',compact('users'));
    }

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        // return view ('admin.user_manager.editstatus', compact('user'));
        $user = User::find($id);
        return view ('admin.user_manager.editstatus', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,User $user)
    {
        // dd($request);
        $this->validate($request, [
            'type' => 'required',]);
            $input = $request->all();
            $user = User::find($id);
            $user->update($input);
            // return redirect()->route('type')->session()->flash('message', 'Successfully modified the User!');     
            $request->session()->flash('message', 'Successfully modified the User!');
            return redirect('type');
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
