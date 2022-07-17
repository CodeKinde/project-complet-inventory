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
                <select class="form-select select2" aria-label="Default select example" name="supplier_id" id="supplier_id">
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
                <select class="form-select select2" aria-label="Default select example" name="category_id" id="category_id">
                <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Nom Produit</label>
                <select class="form-select select2" aria-label="Default select example" name="product_id" id="product_id">
                <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label" style="margin-top: 43px"></label>
            <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">Ajouter plus</i>
            </div>
        </div>

     </div><!-- end row -->
 </div><!-- end Card-body -->
   <!--  ---------------------------------- -->

 <div class="card-body">
    <form action="{{ route('purchase.store') }}" method="POST">
        @csrf
        <table class="table table-sm table-bordered" width="100%" style="border-color:#ddd">
            <thead>
              <tr>
                <th>Categorie</th>
                <th>Nom Produit</th>
                <th>KSG/KG</th>
                <th>Prix Unité</th>
                <th>Description</th>
                <th>Prix Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="addRow" class="addRow">

            </tbody>
            <tbody>
                <tr>
                    <td colspan="5"></td>
                  <td>
                    <input type="text" name="estimated_amount" id="estimated_amount" value="0" class="form-control estimated_amount" readonly style="background-color:#ddd;">
                  </td>
                  <td></td>
                </tr>
            </tbody>
        </table><br>

        <div class="form-group">
        <button type="submit" class="btn btn-info" id="StoreButton">Stoke Achat</button>
       </div>
    </form>
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
<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">

    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>
     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>
     <td>
        <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
    </td>
    <td>
        <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
    </td>
 <td>
        <input type="text" class="form-control" name="description[]">
    </td>
     <td>
        <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
    </td>
     <td>
        <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
    </td>
    </tr>
</script>



<script type="text/javascript">

 $(document).ready(function(){
    $(document).on('click','.addeventmore',function(){
        var date = $('#date').val();
        var purchase_no = $('#purchase_no').val();
        var supplier_id = $('#supplier_id').val();
        var category_id = $('#category_id').val();
        var category_name = $('#category_id').find('option:selected').text();
        var product_id = $('#product_id').val();
        var product_name = $('#product_id').find('option:selected').text();

if (date == '') {
    $.notify("Date est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }
    if (purchase_no == '') {
    $.notify("Numero d'achat est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }

    if (category_id == '') {
    $.notify("Categorie est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }

    if (supplier_id	 == '') {
    $.notify("champ de fournisseur est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }
    if (product_id == '') {
    $.notify("champ de produit est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }

    var source = $('#document-template').html();
    var template = Handlebars.compile(source);
    var data = {
        date:date,
        purchase_no:purchase_no,
        supplier_id:supplier_id,
        category_id:category_id,
        category_name:category_name,
        product_id:product_id,
        product_name:product_name,
    };
    var html = template(data);
    $("#addRow").append(html);

    });
    $(document).on('click','.removeeventmore',function(event){
        $(this).closest('.delete_add_more_item').remove();
        totalAmountPrice();
    });
    $(document).on('keyup click','.unit_price','.buying_qty',function(){
        var uni_price = $(this).closest("tr").find("input.unit_price").val();
        var qty = $(this).closest("tr").find("input.buying_qty").val();
        var total = uni_price * qty;
        $(this).closest("tr").find("input.buying_price").val(total);
        totalAmountPrice();
    });
    //calculate sum of amount in invoice
    function totalAmountPrice(){
        var sum = 0;
        $('.buying_price').each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length != 0){
                sum += parseFloat(value);
            }
        });
        $('.estimated_amount').val(sum);
    }
 })

</script>
@endsection
