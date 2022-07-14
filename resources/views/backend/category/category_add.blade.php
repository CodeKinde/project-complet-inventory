@extends('admin.admin_master')
@section('content')
@section('title')
add |category
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

    <h3 class="card-title">Page D'Ajout Categories </h3>
<form  action="{{ route('category.store') }}" method="POST" id="myForm">
    @csrf
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Nom Category</label>
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

            },
            messages:{
                name:{
                required:"Sûr vous plait Entrer le nom Category",
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
