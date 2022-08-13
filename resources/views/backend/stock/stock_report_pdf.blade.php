@extends('admin.admin_master')
@section('title')
 daily|invoice
@endsection
@section('content')
  <div class="container-fluid">
    <!--Start Page title -->
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Rapport Facture Quotidien</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                        <li class="breadcrumb-item active">Rapport Facture Quotidien</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!--End Page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="invoice-title">
                     <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo" height="24"/>Hamallah Shopping Mall
                        </h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6 mt-4">
                            <address>
                            <strong>Hamallah Shopping:</strong><br>
                                Bamako/Mali/300logement<br>
                                hamallah@gmail.com
                            </address>
                        </div>
                        <div class="col-6 mt-4 text-end">
                            <address>

                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="p-2">
                            <h3 class="font-size-16"><strong>Rapport Facture  de Stock
                        </div>

                    </div>

                </div>
            </div> <!-- end row -->



<div class="row">
    <div class="col-12">
        <div>
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="text-center"><strong>SL</strong></td>
                            <td class="text-center"><strong>Fournisseur</strong></td>
                            <td class="text-center"><strong>Unit</strong>
                            </td>
                            <td class="text-center"><strong>Categories</strong>
                            </td>
                            <td class="text-center"><strong>Nom product</strong>
                            </td>
                            <td class="text-center"><strong>Stock</strong>
                            </td>

                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                        @foreach ($allData as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key +1 }}</td>
                            <td class="text-center">{{ $item['supplier']['nom'] }} {{ $item['supplier']['prenom'] }}</td>
                            <td class="text-center">#{{ $item['unit']['name'] }}</td>
                            <td class="text-center">{{ $item['category']['name'] }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                @php
                    $date = new DateTime();
                @endphp
                <i>Heure d'impression: {{ $date->format('F j, Y, g:i a') }}</i>
                <div class="d-print-none">
                    <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Télécharger</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> <!-- end row -->



                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
