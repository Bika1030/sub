@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add Subcategory
                    <a href="{{url('admin/subcategory')}}" class="btn btn-primary btn-sm text-white float-end">
                      Back
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/subcategory')}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category_id" id="category" required>
                                    @foreach ($categories as  $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                        {{$category->name}}
                                        </option>

                                    @endforeach
                                    @error('category_id') <small class="text_danger">{{$message}}</small> @enderror
                               </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name">
                            @error('name') <small class="text_danger">{{$message}}</small>  @enderror
                        </div>

                        <div class="col-md-12 bd-3">
                            <button type="submit" class="btn btn-primary float-end">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
