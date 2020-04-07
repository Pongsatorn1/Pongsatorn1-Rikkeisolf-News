<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::paginate(8);
        return view('admin.category_manager.category', compact('categorys'));
        // $categorys = Category::all();
        // return view('admin.category_manager.category', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchcategorys(Request $request)
    {
        $search = $request->get('search');
        $categorys = Category::where('name','like','%'.$search.'%')->paginate(8);
        return view('admin.category_manager.category',compact('categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
         
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect('categorys');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Category $category)
    {
        return view('admin.category_manager.edit',compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('message', 'Successfully Edited the Category!');
        return redirect('categorys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Category $category)
        {
            $category->delete();
            $request->session()->flash('message', 'Successfully deleted the Category!');
            return redirect('categorys');
        }
    
}
