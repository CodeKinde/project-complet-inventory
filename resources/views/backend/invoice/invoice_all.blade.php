@extends('admin.admin_master')
@section('title')
 all invoice approve
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tout les Factures Approuvés</h4>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <a href="{{ route('invoice.add') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm"><i class=" fas fa-plus-circle
                "></i> Ajouter Facture</a><br/>
            <h4 class="card-title">Données Factures
                <span class="badge rounded-pill bg-danger">{{ count($allData) }} F</span>
            </h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Nom Client</th>
                    <th>Facture N°</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item['payment']['customer']['nom']}} {{ $item['payment']['customer']['prenom']}}</td>
                    <td>#{{ $item->invoice_no}}</td>
                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                    <td>{{ $item->description}}</td>

                    <td>
                    $ {{ $item['payment']['total_amount'] }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
