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
<form  action="{{ route('product.store') }}" method="POST" id="myForm">
    @csrf

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Select Fournisseur</label>
        <div class="form-group col-sm-10">
        <select class="form-select" aria-label="Default select example" name="supplier_id">
            <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
            @foreach ($suppliers as $item)
            <option value="{{ $item->id }}">{{ $item->nom }} {{ $item->prenom }}</option>
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
            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
       </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Nom Produit</label>
        <div class="form-group col-sm-10">
    <input class="form-control" type="text"  id="example-text-input" name="name" value="">
        </div>
    </div> <!-- end row -->

    <div>
     <button type="submit" class="btn btn-info waves-effect waves-light">Enrégistrer</button>
    </div>
</form>
</div>
    </div>
</div> <!-- end col -->
</div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules:{
               name:{
                required:true,
               },
               supplier_id:{
                required:true,
               },
               unit_id:{
                required:true,
               },
               category_id:{
                required:true,
               },
            },

            messages:{
                name:{
                required:"Sûr vous plait Entrer Nom prodiut",
               },

                supplier_id:{
                required:"Sûr vous plait Sélectionnez un fournisseur",
               },
                unit_id:{
                required:"Sûr vous plait Sélectionnez une Unité",
               },
                category_id:{
                required:"Sûr vous plait Sélectionnez une Category",
               },
            },
            errorElement: 'span',
            errorPlacement:function(error, element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error)
            },
            highlight:function(element,errorClass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            }
        })
    })

</script>
@endsection
