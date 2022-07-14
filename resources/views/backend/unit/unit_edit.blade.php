@extends('admin.admin_master')
@section('content')
@section('title')
edit |unit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

    <h3 class="card-title">Page Editer Unité </h3>
<form  action="{{ route('unit.update',$unit->id) }}" method="POST" id="myForm">
    @csrf
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Nom Unité</label>
        <div class="form-group col-sm-10">
    <input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $unit->name }}">
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
