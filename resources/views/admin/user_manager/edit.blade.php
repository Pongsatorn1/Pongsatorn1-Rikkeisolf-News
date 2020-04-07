@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form method="post" action="{{ action('UserContoller@update',$id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Please uplode your profile
                                <br>
                                <span class="text-small text-info">*Not required</span>
                            </label>

                            <div class="col-md-6">
                                <input type="file" value="{{$user->avatar}}" name="avatar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-md-4 control-label text-right">Gender</label>
                            <div class="col-md-6">
                                <select class="browser-default custom-select" name="gender" value="gender" id="gender">
                                    <option selected>Open this select menu</option>
                                    <option value="male">Male</option>
                                    <option value="Famale">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone"
                                    value="{{$user->phone}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group row pt-2">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @endsection
