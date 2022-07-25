@extends('admin.admin_master')
@section('title')
 all Category
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Liste des Categories</h4>

            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body">
            <a href="{{ route('category.add') }}" style="float: right" class="btn btn-rounded btn-dark waves-effect waves-light btn-sm"><i class=" fas fa-plus-circle
                "></i> Ajouter Category</a><br/>
            <h4 class="card-title">Données Category
                <span class="badge rounded-pill bg-danger">{{ count($category) }} catgrs</span>
            </h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Categories</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td width="15%">
 <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
<a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

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
