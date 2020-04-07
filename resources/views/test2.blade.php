@extends('layouts.mainlayout_user')

@section('content')
<div class="container-fuild mx-5">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col-md-8">
            {{-- <div class="container"> --}}
                <img src="{{ url('img\1580877904.jpg')}}" alt="">
            {{-- </div> --}}
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="container mb-3">
                    <img src="{{ url('img\1580877904.jpg')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="container mt-2 mb-3">
                    <img src="{{ url('img\1580877904.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mt-2">
        <div class="col-md-4">
            {{-- <div class="container"> --}}
                <img src="{{ url('img\1580877904.jpg')}}" alt="">
            {{-- </div> --}}
        </div>
        <div class="col-md-4">
            {{-- <div class="container"> --}}
                <img src="{{ url('img\1580877904.jpg')}}" alt="">
            {{-- </div> --}}
        </div>
        <div class="col-md-4">
            {{-- <div class="container"> --}}
                <img src="{{ url('img\1580877904.jpg')}}" alt="">
            {{-- </div> --}}
        </div>
    </div>

</div>

@endsection