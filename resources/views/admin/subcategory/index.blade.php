@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Sub-Category
                    <a href="{{url('admin/subcategory/create')}}" class="btn btn-primary btn-sm text-white float-end ">
                        Add Subcategory
                    </a>
                </h3>
            </div>
        </div>


        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subcategories as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->create_at}}</td>
                        <td>
                            <a href="{{url('admin/subcategory/edit/' . $item->id)}}" class="btn btn-success btn-sm">
                                EDIT
                            </a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
