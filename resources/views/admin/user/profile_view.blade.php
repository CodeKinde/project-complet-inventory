@extends('admin.admin_master')
@section('content')
@section('title')
admin | profile
@endsection
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-4">
<div class="card">
    <center>
    <img class="rounded-circle avatar-xl" alt="200x200" src="{{ (!empty($user->profile_photo)) ? url('upload/user_photo/'.$user->profile_photo) : url('upload/no_image.jpg') }}" data-holder-rendered="true">
    </center>
    <div class="card-body">
        <h4 class="card-title"><b>Nom & Prénom: </b> {{ $user->name }}</h4>
        <hr>

        <h4 class="card-title"><b>Email: </b> {{ $user->email }}</h4>
        <hr>
        <h4 class="card-title"><b>Phone: </b> {{ $user->phone }}</h4>
        <hr>
        <h4 class="card-title"><b>Addresse: </b> {{ $user->address }}</h4>

        <a href="{{ route('profile.edit') }}" class="btn btn-info btn-sm btn-rounded waves-effect waves-light">Modifier Profile</a>


    </div>
        </div>
    </div>

</div>
</div>
@endsection
