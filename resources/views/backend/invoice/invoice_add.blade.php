@extends('admin.admin_master')
@section('content')
@section('title')
add |invoice
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
  <div class="card-body">

     <h3 class="card-title">Form D'Ajout Produit </h3><br><br>
     <div class="row">

        <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">N°Facture</label>
                 <input class="form-control example-date-input" type="text" name="invoice_no" id="invoice_no" style="background-color: #ddd" value="{{ $invoice_no }}">
            </div>
        </div>


        <div class="col-md-2">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Date</label>
                 <input class="form-control example-date-input" type="date" name="date" id="date" value="{{ $date }}">
            </div>
        </div>



        <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Categories</label>
                <select class="form-select select2" aria-label="Default select example" name="category_id" id="category_id">
                    <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Nom Produit</label>
                <select class="form-select select2" aria-label="Default select example" name="product_id" id="product_id">
                <option selected="" disabled>Ouvrir ce menu Sélectionner</option>
                </select>
            </div>
        </div>

        <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Stock(Pic/Kg)</label>
                 <input class="form-control example-date-input" type="text" name="current_stock_qty" id="current_stock_qty" style="background-color: #ddd">
            </div>
        </div>

        <div class="col-md-2">
            <div class="md-3">
                <label for="example-text-input" class="form-label" style="margin-top: 43px"></label>
            <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">Ajouter plus</i>
            </div>
        </div>

     </div><!-- end row -->
 </div><!-- end Card-body -->
   <!--  ---------------------------------- -->

 <div class="card-body">
    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf
        <table class="table table-sm table-bordered" width="100%" style="border-color:#ddd">
            <thead>
              <tr>
                <th>Categorie</th>
                <th>Nom Produit</th>
                <th width="7%">PCS/KG</th>
                <th width="10%">Prix Unité</th>
                <th width="15%">Prix Total</th>
                <th width="7%">Action</th>
              </tr>
            </thead>
            <tbody id="addRow" class="addRow">

            </tbody>
            <tbody>
                <tr>
                <td colspan="4">Remise</td>
                <td>
                 <input type="text" name="discount_amount" id="discount_amount" placeholder="Total remise" class="form-control estimated_amount">
                 </td>
                </tr>
                <tr>
                    <td colspan="4">Total Generale</td>
                  <td>
             <input type="text" name="estimated_amount" id="estimated_amount" value="0" class="form-control estimated_amount" readonly style="background-color:#ddd;">
                  </td>
                  <td></td>
                </tr>
            </tbody>
        </table>

      <div class="row">
        <div class="form-group col-md-3">
            <label for="">Status de Paiement</label>
            <select name="paid_status" id="paid_status" class="form-select">
                <option value="" disabled selected>Select Status de payé</option>
                <option value="full_paid">Tout Payé</option>
                <option value="full_due">Payé due</option>
                <option value="partial_paid">Partial Payé</option>
            </select>
            <input type="text" name="paid_amount" id="paid_amount" class="form-control paid_amount" placeholder="Entrer Le Monttant a payé" style="display: none">
         </div>

         <div class="form-group col-md-9">
            <label for="">Nom Client</label>
            <select name="customer_id" id="customer_id" class="form-select">
                <option value="" disabled selected>Select client</option>
                @foreach ($customer as $item)
                <option value="{{ $item->id }}">{{ $item->nom }}-{{ $item->phone }}</option>
                @endforeach
                <option value="0">Nouveau Client</option>
            </select>
         </div>
      </div> <!--end row --> <br>

      <!--hide add customer form -->
      <div class="row new_customer"  style="display: none">
        <div class="form-group col-md-2">
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrer Nom client">
         </div>

         <div class="form-group col-md-2">
            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrer prenom client">
         </div>

         <div class="form-group col-md-2">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Entrer mobile client">
         </div>

         <div class="form-group col-md-3">
            <input type="text" name="email" id="email" class="form-control" placeholder="Entrer Email client">
         </div>

         <div class="form-group col-md-3">
            <input type="text" name="address" id="address" class="form-control" placeholder="Entrer Adresse client">
         </div>
      </div> <!--end row --><br>
    <!--hide add customer form -->


        <div class="form-group col-md-12">
            <textarea name="description" id="description" cols="30" rows="3" class="form-control">Ecrire description ici</textarea>
         </div><br>

        <div class="form-group">
        <button type="submit" class="btn btn-info" id="StoreButton">Stocké Facture</button>
       </div>
    </form>
 </div>
    </div>
</div> <!-- end col -->

</div>
    </div>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{ route('check-stock-product') }}",
                data:{product_id:product_id},
                success:function(data){
                 $('#current_stock_qty').val(data);
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
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">

    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>
     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>
     <td>
        <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value="">
    </td>
    <td>
        <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
    </td>

     <td>
        <input type="number" class="form-control selling_price	 text-right" name="selling_price[]" value="0" readonly>
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
        var invoice_no = $('#invoice_no').val();
        var category_id = $('#category_id').val();
        var category_name = $('#category_id').find('option:selected').text();
        var product_id = $('#product_id').val();
        var product_name = $('#product_id').find('option:selected').text();

if (date == '') {
    $.notify("Date est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }
    if (invoice_no == '') {
    $.notify("Numero facture est obligatoire", {globalPosition: 'top right', className:'error'});
    return false;
    }

    if (category_id == '') {
    $.notify("Categorie est obligatoire", {globalPosition: 'top right', className:'error'});
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
        invoice_no:invoice_no,
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
    $(document).on('keyup click','.unit_price','.selling_qty',function(){
        var uni_price = $(this).closest("tr").find("input.unit_price").val();
        var qty = $(this).closest("tr").find("input.selling_qty").val();
        var total = uni_price * qty;
        $(this).closest("tr").find("input.selling_price").val(total);
        $('#discount_amount').trigger('keyup');
    });
    $(document).on('keyup','#discount_amount',function(){
        totalAmountPrice();
    });
    //calculate sum of amount in invoice
    function totalAmountPrice(){
        var sum = 0;
        $('.selling_price').each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length != 0){
                sum += parseFloat(value);
            }
        });
        var discount_amount = parseFloat($('#discount_amount').val());
        if(!isNaN(discount_amount) && discount_amount.length != 0){
            sum -= parseFloat(discount_amount);
        }
        $('#estimated_amount').val(sum);
    }
 })
</script>
<script type="text/javascript">
$(document).on('change','#paid_status',function(){
  var paid_status = $(this).val();
  if (paid_status == "partial_paid") {
    $('.paid_amount').show();
  }else{
    $('.paid_amount').hide();
  }
});
$(document).on('change','#customer_id',function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
        $('.new_customer').show();
    }else{
        $('.new_customer').hide();
    }
});

</script>
@endsection
