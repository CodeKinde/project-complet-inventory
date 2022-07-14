@extends('admin.admin_master')
@section('content')
@section('title')
add |client
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

    <h3 class="card-title">Page Editer Client </h3>
<form  action="{{ route('customer.update',$customer->id) }}" method="POST">
    @csrf
    <div class="form-group row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
    <input class="form-control" type="text"  id="example-text-input" name="nom" value="{{ $customer->nom }}">
        </div>
    </div> <!-- end row -->


    <div class="form-group row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Prénom</label>
        <div class="col-sm-10">
   <input class="form-control" type="text"  id="example-search-input" name="prenom" value="{{ $customer->prenom }}">
        </div>
    </div><!-- end row -->


    <div class="form-group row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
     <input class="form-control" type="email" id="example-search-input" name="email" value="{{ $customer->email }}">
        </div>
    </div> <!-- end row -->

    <div class="form-group row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Modile</label>
        <div class="col-sm-10">
     <input class="form-control" type="number"  id="example-search-input" name="phone" value="{{ $customer->phone }}">
        </div>
    </div> <!-- end row -->


    <div class="form-group row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Addresse</label>
        <div class="col-sm-10">
    <input class="form-control" type="text"  id="example-search-input" name="address" value="{{ $customer->address }}">
        </div>
    </div> <!-- end row -->


    <div>
     <button type="submit" class="btn btn-info waves-effect waves-light">Mise à jour</button>
    </div>
</form>
</div>
    </div>
</div> <!-- end col -->
</div>
    </div>
@endsection
