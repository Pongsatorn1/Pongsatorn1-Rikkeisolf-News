@extends('layouts.mainlayout_admin2')

@section('content')

<div class="container">
    @if(Session::has('message'))
    <div class="alertv alert-info">{{Session::get('message')}}</div>
    @endif()
<div class="card-header  mt-5">
    <h6 class="text-uppercase mb-0">Category Manager :</h6>
 
    <div class="row mb-0">
  <div class="col-9 align-self-center">
    <a href="categorys/create" name="add_category" id="add_category" class="btn btn-primary"><i class="fa fa-plus"></i>Add
        Category</span></a>
</div>

<div class="col-3 align-self-center">
    <form action="/searchcategorys" method="GET">
        <div class="input-group">
            <div id="" class="float-right">Search:<label>
                <span class="input-group-prepend ml-3">
                    <input type="search" name="search" class="form-control">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
                </label>
            </div>
        </div>
    </form>
</div>
</div>
</div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name Category</th>
                <th scope="col">Tool</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categorys as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('categorys/' . $category->id . '/edit')}}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{url('categorys', [$category->id])}} " method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{ $categorys->links() }}
@endsection
