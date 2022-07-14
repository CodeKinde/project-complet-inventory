@extends('admin.admin_master')
@section('content')
@section('title')
add |customer
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

    <h3 class="card-title">Page D'Ajout Client </h3>
<form  action="{{ route('customer.store') }}" method="POST" id="myForm">
    @csrf
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Nom</label>
        <div class="form-group col-sm-10">
    <input class="form-control" type="text"  id="example-text-input" name="nom" value="">
        </div>
    </div> <!-- end row -->


    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Prénom</label>
        <div class="form-group col-sm-10">
   <input class="form-control" type="text"  id="example-search-input" name="prenom" value="">
        </div>
    </div><!-- end row -->


    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
        <div class="form-group col-sm-10">
     <input class="form-control" type="email" id="example-search-input" name="email" value="">
        </div>
    </div> <!-- end row -->

    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Modile</label>
        <div class="form-group col-sm-10">
     <input class="form-control" type="number"  id="example-search-input" name="phone" value="">
        </div>
    </div> <!-- end row -->


    <div class="row mb-3">
        <label for="example-search-input" class="col-sm-2 col-form-label">Addresse</label>
        <div class="form-group col-sm-10">
    <input class="form-control" type="text"  id="example-search-input" name="address" value="">
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
               nom:{
                required:true,
               },
               prenom:{
                required:true,
               },
               email:{
                required:true,
               },
               phone:{
                required:true,
               },
               address:{
                required:true,
               },
            },
            messages:{
                nom:{
                required:"Sûr vous plait Entrer votre Nom",
               },
               prenom:{
                required:"Sûr vous plait Entrer votre Prénom",
               },
               email:{
                required:"Sûr vous plait Entrer votre Email",
               },
               phone:{
                required:"Sûr vous plait Entrer votre Numero mobile",
               },
               address:{
                required:"Sûr vous plait Entrer votre Adresse",
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
