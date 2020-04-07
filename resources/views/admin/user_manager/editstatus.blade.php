@can('isSuperAdmin')
@extends('layouts.mainlayout_admin2')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ url('type', $user->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="form-group row">
                    <label for="gender" class="col-sm-4 mt-2 col-md-4 control-label text-right">Status</label>
                    <div class="col-md-6">
                        <select class="browser-default custom-select" name="type" value="{{$user->type}}" id="type">
                            <option selected>Open this select menu</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                            <option value="2">Super Admin</option>
                        </select>
                        <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

    @endsection
    @endcan

