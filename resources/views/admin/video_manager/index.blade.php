@extends('layouts.mainlayout_admin2')

@section('content')

<div class="container">
    @if(Session::has('message'))
    <div class="alertv alert-info">{{Session::get('message')}}</div>
    @endif()
    <div class="card-header  mt-5">
        <h6 class="text-uppercase mb-0">Video Manager :</h6>

        <div class="row mb-0">
      <div class="col-9 align-self-center">
        <a href="/videos/create" name="add_articles" id="add_articles" class="btn btn-primary"><i class="fa fa-plus"></i>Add
            Video</span></a>
    </div>

    <div class="col-3 align-self-center">
        <form action="/searchvideo" method="GET">
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
                <th scope="col">Title</th>
                <th scope="col">Video</th>
                <th scope="col">Description</th>
                <th scope="col">Story</th>
                {{--  <th scope="col">Creator</th>  --}}
                <th scope="col">Createtime</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($videos as $video)
            {{-- {{dd($video->namesvideo)}} --}}
            <tr>
                <td class="font-weight-bold">{{$video->id}}</td>
                <td><a href="/videos/{{$video->id}}">{{$video->title_video}}</a></td>
                <td><p><video controls="controls" width="300" height="150">
                <source src="{{$video->namesvideo}}" type="video/mp4" /></video></p></td>
                {{-- <td <video width="320" height="240" controls>
                <source src="{{$video->namesvideo}}" type="video/mp4">
                    Your browser does not support the video tag.
                  </video></td> --}}
                <td class="text-wrap text-break">{!!Str::limit($video->description_video, 150)!!}</td>
                <td class="text-wrap text-break">{!!Str::limit($video->story_video, 150)!!}</td>
                {{--  <td>{{ $video->users['name'] }}</td>  --}}
                <td>{{$video->created_at->toFormattedDateString()}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('videos/' . $video->id . '/edit')}}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{url('videos', [$video->id])}} " method="POST">
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
    {{ $videos->links() }}
</div>

@endsection
