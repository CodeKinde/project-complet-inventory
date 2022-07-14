@extends('admin.admin_master')
@section('content')
@section('title')
add |produit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

    <h3 class="card-title">Page D'Ajout Produit </h3>
<form  action="{{ route('product.update',$product->id) }}" method="POST" id="myForm">
    @csrf

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Select Fournisseur</label>
        <div class="form-group col-sm-10">
        <select class="form-select" aria-label="Default select example" name="supplier_id">
            <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
            @foreach ($suppliers as $item)
            <option value="{{ $item->id }}" {{ $product->supplier_id == $item->id ? 'selected' : '' }}>{{ $item->nom }} {{ $item->prenom }}</option>
            @endforeach
       </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Select Unité</label>
        <div class="form-group col-sm-10">
        <select class="form-select" aria-label="Default select example" name="unit_id">
            <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
            @foreach ($units as $item)
            <option value="{{ $item->id }}" {{ $product->unit_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
       </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Select Catgeorie</label>
        <div class="form-group col-sm-10">
        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
            @foreach ($categories as $item)
            <option value="{{ $item->id }}"{{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
       </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Nom Produit</label>
        <div class="form-group col-sm-10">
    <input class="form-control" type="text"  id="example-text-input" name="name" value="{{ $product->name }}">
        </div>
    </div> <!-- end row -->

    <div>
     <button type="submit" class="btn btn-info waves-effect waves-light">Mie à jour</button>
    </div>
</form>
</div>
    </div>
</div> <!-- end col -->
</div>
    </div>

@endsection
