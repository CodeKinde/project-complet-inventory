@extends('admin.admin_master')
@section('title')
 all customer
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Liste des Clients</h4>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <a href="{{ route('customer.add') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm">Nouveau Client</a><br/>
            <h4 class="card-title">Données Clients
                <span class="badge rounded-pill bg-danger">{{ count($customers) }} Clts</span>
            </h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Addresse</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->prenom }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td width="15%">
 <a href="{{ route('customer.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
<a href="{{ route('customer.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

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
