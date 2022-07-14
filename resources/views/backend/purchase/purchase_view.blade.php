@extends('admin.admin_master')
@section('title')
 all products
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Liste des Achats</h4>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <a href="{{ route('purchase.add') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm">Nouveau Achat</a><br/>
            <h4 class="card-title">Données Achats
                <span class="badge rounded-pill bg-danger">{{ count($purchases) }} Cmd</span>
            </h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Commande N°</th>
                    <th>Date</th>
                    <th>Fournisseur</th>
                    <th>Categories</th>
                    <th>Qté</th>
                    <th>Nom Produit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($purchases as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->purchase_no}}</td>
                    <td>{{ $item->date}}</td>
                    <td>{{ $item->supplier_id}}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->buying_qty}}</td>
                    <td>{{ $item->product_id}}</td>
                    <td>
                        @if($item->status == 0)
                        <span class="btn btn-warning">Pending</span>
                        @else
                        @endif
                    </td>


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
