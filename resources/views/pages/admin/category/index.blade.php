@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                <a href="{{route('category.create')}}" class="btn btn-primary">Add</a>
                <br><br>
                   <table class="table table-striped table-hovered">
                    <thead>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($category as $category)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('category.edit',$category)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{route('category.destroy',$category)}}" method="POST">
                                        @csrf @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
