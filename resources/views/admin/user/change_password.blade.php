@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

    <h3 class="card-title">Page de Changé le  mot de passe</h3>
    @if (count($errors))
    @foreach ($errors->all() as $error)
     <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}</p>
    @endforeach

    @endif
<form  action="{{ route('update.password') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Mot de passe Actuel</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" placeholder="Entrer encien mot de passe" id="example-text-input" name="oldpassword" value="">
        </div>
    </div> <!-- end row -->
    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Nouveau mot de passe</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" placeholder=" Entrer nouveau mot de passe" id="example-search-input" name="newpassword" value="">
        </div>
    </div><!-- end row -->


    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Mot de passe Confirmation</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" placeholder="Confirme nouveau mot de passe " id="example-search-input" name="confirm_password" value="">
        </div>
    </div> <!-- end row -->


    <div>
     <button type="submit" class="btn btn-info waves-effect waves-light">Changé mot de passe</button>
    </div>
</form>
</div>
    </div>
</div> <!-- end col -->
</div>
    </div>

@endsection
