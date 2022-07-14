@extends('admin.admin_master')
@section('content')
@section('title')
add |achat
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
  <div class="card-body">

     <h3 class="card-title">Form D'Ajout Produit </h3><br><br>
     <div class="row">
        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Date</label>
                 <input class="form-control example-date-input" type="date" name="date" id="date">
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">N° Commande</label>
                 <input class="form-control example-date-input" type="text" name="purchase_no" id="purchase_no">
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Fournisseur</label>
                <select class="form-select" aria-label="Default select example" name="supplier_id" id="supplier_id">
                <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                @foreach ($supplier as $item)
                <option value="{{ $item->id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Categories</label>
                <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Nom Produit</label>
                <select class="form-select" aria-label="Default select example" name="product_id" id="product_id">
                <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label" style="margin-top: 43px"></label>
               <input  type="submit" class="btn btn-secondary btn-rounded waves-effect waves-light" value="Ajouter Plus">
            </div>
        </div>

     </div><!-- end row -->

 </div>
    </div>
</div> <!-- end col -->
</div>
    </div>
<script type="text/javascript">
$(function(){
 $(document).on('change',"#supplier_id",function(){
    var supplier_id = $(this).val();
    $.ajax({
        type:"GET",
        url:"{{ route('get-category') }}",
        data:{supplier_id:supplier_id},
        success:function(data){
         var html = '<option value="">Select Categories</option>';
         $.each(data, function(key,v){
            html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
         });
         $('#category_id').html(html);
        }
    })
 });
});

</script>

<script type="text/javascript">
$(function(){
    $(document).on('change','#category_id',function(){
        var category_id = $(this).val();
        $.ajax({
            type:"GET",
            url:"{{ route('get-product') }}",
            data:{category_id:category_id},
            success:function(data){
             var html = '<option value="">Select Category</option>';
             $.each(data,function(key,v){
                html +='<option value="'+v.id+'">'+v.name+'</option>';
             })
             $('#product_id').html(html);
            }
        })
    });
});

</script>
@endsection
