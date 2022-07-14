@extends('admin.admin_master')
@section('title')
 all products
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Liste des Produits</h4>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <a href="{{ route('product.add') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm">Nouveau Produit</a>
            <h4 class="card-title">Données Produits
                <span class="badge rounded-pill bg-danger">{{ count($products) }} Prds</span>
            </h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Fournisseur</th>
                    <th>Unité</th>
                    <th>Categories</th>
                    <th>Produit</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item['supplier']['prenom'] }} {{ $item['supplier']['nom'] }}</td>
                    <td>{{ $item['unit']['name'] }}</td>
                    <td>{{ $item['category']['name'] }}</td>
                    <td width="40%">{{ $item->name }}</td>
                    <td width="15%">
 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
<a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

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
