@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category)}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-info">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
