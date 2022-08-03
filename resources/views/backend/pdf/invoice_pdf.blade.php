@extends('admin.admin_master')
@section('title')
 invoice
@endsection
@section('content')
  <div class="container-fluid">
    <!--Start Page title -->
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Facture</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                        <li class="breadcrumb-item active">Facture</li>
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
                        <h4 class="float-end font-size-16"><strong>Facture N° #{{ $invoice->invoice_no }}</strong></h4>
                        <h3>
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
                                <strong>Date Facture:</strong><br>
                                {{ date('d-m-Y',strtotime($invoice->date)) }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
@php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
@endphp

<div class="row">
    <div class="col-12">
        <div>
            <div class="p-2">
                <h3 class="font-size-16"><strong>Facture Client</strong></h3>
            </div>
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>Nom Client</strong></td>
                            <td class="text-center"><strong>Mobile Client</strong></td>
                            <td class="text-center"><strong>Addresse</strong>
                            </td>
                            <td class="text-end"><strong>Description</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <tr>
                            <td>{{ $payment['customer']['nom'] }} {{ $payment['customer']['prenom'] }}</td>
                            <td class="text-center">{{ $payment['customer']['phone'] }}</td>
                            <td class="text-center">{{ $payment['customer']['address'] }}</td>
                            <td class="text-end">{{ $invoice->description }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

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
                            <td class="text-center"><strong>Categorie</strong></td>
                            <td class="text-center"><strong>Nom Produit</strong>
                            </td>
                            <td class="text-center"><strong>Stock Actuel</strong>
                            </td>
                            <td class="text-center"><strong>Quantité</strong>
                            </td>
                            <td class="text-center"><strong>Prix Unit</strong>
                            </td>
                            <td class="text-center"><strong>Prix Total</strong>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        @php
                            $total_sum = "0";
                        @endphp
                        @foreach ($invoice['invoice_details'] as $key => $details)
                        <tr>
                            <td class="text-center">{{ $key +1 }}</td>
                            <td class="text-center">{{ $details['category']['name'] }}</td>
                            <td class="text-center">{{ $details['product']['name'] }}</td>
                            <td class="text-center">{{ $details['product']['quantity'] }}</td>
                            <td class="text-center">{{ $details->selling_qty }}</td>
                            <td class="text-center">${{ $details->unit_price }}</td>
                            <td class="text-center">${{ $details->selling_price }}</td>

                        </tr>
                        @php
                        $total_sum += $details->selling_price
                       @endphp
                        @endforeach

                        <tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line text-center">
                                <strong>Sous-Total: </strong>
                            </td>
                            <td class="thick-line text-end">${{ $total_sum }}</td>

                        </tr>

                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center">
                                <strong>Rémise: </strong>
                            </td>
                            <td class="no-line text-end">
                            @if( $payment->discount_amount == null)
                            <span>$0</span>
                            @endif
                            <span>${{ $payment->discount_amount }}</span>
                           </td>
                        </tr>

                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center">
                                <strong>Payé: </strong>
                            </td>
                            <td class="no-line text-end">${{ $payment->paid_amount }}</td>
                        </tr>

                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center">
                                <strong>Due: </strong>
                            </td>
                            <td class="no-line text-end">${{ $payment->due_amount }}</td>
                        </tr>

                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center">
                                <strong>Total: </strong>
                            </td>
                            <td class="no-line text-end">${{ $payment->total_amount }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

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
