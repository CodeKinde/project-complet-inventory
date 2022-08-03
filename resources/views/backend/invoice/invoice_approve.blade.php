@php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
@endphp
@extends('admin.admin_master')
@section('title')
 invoice approve
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Factures approuvé</h4>

            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <h4>Facture N°{{ $invoice->invoice_no }} - {{ date("d-m-Y",strtotime($invoice->date)) }}</h4>
            <a href="{{ route('invoice.pending.list') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm"><i class=" fas fa-list
                "></i> Liste Facture en Attente</a><br/> <br>

        <table class="table table-dark" width="100%">
            <tbody>
                <tr>
                    <td><p>Info Client</strong></p></td>
                    <td><p>Nom: <strong>{{ $payment['customer']['nom'] }}<strong></p></td>
                    <td><p>Prénom: <strong>{{ $payment['customer']['prenom'] }}<strong></p></td>
                    <td><p>Numero mobile: <strong>{{ $payment['customer']['phone'] }}  <strong></p></td>
                    <td><p>Email: <strong>{{ $payment['customer']['email'] }}<strong></p></td>
                    <td><p>Addresse: <strong>{{ $payment['customer']['address'] }}<strong></p></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="5"><p>Description: <strong> {{ $invoice->description }}</strong></p></td>
                </tr>
            </tbody>

        </table>

        <form action="{{ route('approval.store',$invoice->id) }}" method="POST">
            @csrf
            <table border="1" class="table table-dark" width="100%">
                <thead>
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Categorie</th>
                      <th class="text-center">Nom produit</th>
                      <th class="text-center" style="background-color: #8B008B">Stocke actuel</th>
                      <th class="text-center">Quantité</th>
                      <th class="text-center">Prix Unité</th>
                      <th class="text-center">Prix Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_sum = "0";
                    @endphp
                    @foreach ($invoice['invoice_details'] as $key => $details)
                    <tr>
                        <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
                        <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
                        <input type="hidden" name="selling_qty[{{ $details->id }}]" value="{{ $details->selling_qty }}">


                        <td class="text-center">{{ $key +1 }}</td>
                        <td class="text-center">{{$details['category']['name']}}</td>
                        <td class="text-center">{{$details['product']['name']}}</td>
                        <td class="text-center" style="background-color: #8B008B">{{$details['product']['quantity']}}</td>
                        <td class="text-center">{{ $details->selling_qty }}</td>
                        <td class="text-center">${{ $details->unit_price }}</td>
                        <td class="text-center">${{ $details->selling_price }}</td>
                    </tr>
                    @php
                    $total_sum += $details->selling_price;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="6">Sous-Total</td>
                        <td>${{ $total_sum}}</td>
                    </tr>

                    <tr>
                        <td colspan="6">Rémise</td>
                        <td>
                        @if($payment->discount_amount == null)
                            <span>$0</span>
                        @else
                            <span>${{ $payment->discount_amount}}</span>
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">Payé</td>
                        <td>${{ $payment->paid_amount}}</td>
                    </tr>

                    <tr>
                        <td colspan="6">Due</td>
                        <td>${{ $payment->due_amount}}</td>
                    </tr>

                    <tr>
                        <td colspan="6">Total</td>
                        <td>${{ $payment->total_amount}}</td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-info">Approuvé Facture</button>
        </form>
         </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
