@extends('admin.admin_master')
@section('title')
 all stock
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Rapport de Stock</h4>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <a href="{{ route('stock.report.pdf') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm"><i class=" fas fa-print
                "></i> Imprimé Rapport de stock</a><br/>
            <h4 class="card-title">Données Stocké
                <span class="badge rounded-pill bg-danger">{{ count($allData) }} Prds</span>
            </h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Fournisseur</th>
                    <th>Unité</th>
                    <th>Categories</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allData as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item['supplier']['prenom'] }} {{ $item['supplier']['nom'] }}</td>
                    <td>{{ $item['unit']['name'] }}</td>
                    <td>{{ $item['category']['name'] }}</td>
                    <td width="35%">{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
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
