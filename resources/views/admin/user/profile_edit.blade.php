@extends('admin.admin_master')
@section('content')
@section('title')
admin | profile edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
    <h3 class="card-title">Editer profile utilisateur</h3>
<form  action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nom & prénom" id="example-text-input" name="name" value="{{ $user->name }}">
        </div>
    </div> <!-- end row -->


    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control" type="email" placeholder="Email" id="example-search-input" name="email" value="{{ $user->email }}">
        </div>
    </div> <!-- end row -->

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Téléphone</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Numero phone" id="example-text-input" name="phone" value="{{ $user->phone }}">
        </div>
    </div> <!-- end row -->


    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Addresse</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Addresse" id="example-text-input" name="address" value="{{ $user->address }}">
        </div>
    </div> <!-- end row -->


    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Profile Image</label>
        <div class="col-sm-10">
            <input class="form-control" type="file"  id="example-search-input" name="profile_photo" id="image">
        </div>
    </div> <!-- end row -->



    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <img  id="showImage" src="{{ (!empty($user->profile_photo)) ? url('upload/admin_images/'.$user->profile_photo) : url('upload/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg">
        </div>
    </div> <!-- end row -->


    <div>
     <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
    </div>
</form>
</div>
    </div>
</div> <!-- end col -->
</div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
         var reader = new FileReader();
         reader.onload = function(e){
            $('#showImage').attr('src',e.target.result)
         }
         reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endsection
