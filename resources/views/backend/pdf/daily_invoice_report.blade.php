@extends('admin.admin_master')
@section('content')
@section('title')
daily |invoice report
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
  <div class="card-body">

     <h3 class="card-title">Rapport de facturation quotidien </h3><br><br>
     <form action="{{ route('daily.invoice.pdf') }}" method="GET" id="myForm">
     @csrf
     <div class="row">

        <div class="col-md-4">
            <div class="md-3 form-group">
                <label for="example-text-input" class="form-label">Date Debut</label>
                 <input class="form-control example-date-input" type="date" id="start_date" name="start_date" value="" placeholder="YY-MM-DD">
            </div>
       </div>


        <div class="col-md-4">
            <div class="md-3 form-group">
                <label for="example-text-input" class="form-label">Date Fin</label>
                 <input class="form-control example-date-input" type="date" name="end_date" id="end_date" value="" placeholder="YY-MM-DD">
            </div>
        </div>


        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label" style="margin-top: 43px"></label>
                <button type="submit" class="btn btn-info">Chercher</button>
            </div>
        </div>

     </div><!-- end row -->
    </form>
 </div><!-- end Card-body -->
   <!--  ---------------------------------- -->

    </div>
</div> <!-- end col -->

</div>
    </div>

<script type="text/javascript">
$(document).ready(function(){
    $('#myForm').validate({
        rules: {
            start_date: {
                required:true
            },

            end_date: {
                required:true
            },
        },
        messages: {
            start_date:{
                required:"Please Select Start Date"
            },

            end_date:{
                required:"Please Select End Date"
            },
        },
        errorElement : 'span',
        errorPlacement: function(error, element){

            error.addClass('invalid-feedback');

            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass){

            $(element).addClass('is-invalid');
        },
        unhighlight: function(element,errorClass, validClass){

            $(element).removeClass('is-invalid')
        }

    })
})


</script>



@endsection
