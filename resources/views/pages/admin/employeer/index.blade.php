@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employeer </div>
                <div class="card-body">
                <a href="{{route('adminemployeer.create')}}" class="btn btn-primary">Add</a>
                <br><br>
                   <table class="table table-striped table-hovered">
                    <thead>
                        <th>No</th>
                        <th>Employeer Name</th>
                        <th>Employeer Email</th>
                        <th>Employeer Phone</th>
                        <th>Employeer Address</th>
                        <th>Employeer Picture</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($emp as $emp)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$emp->name}}</td>
                            <td>{{$emp->email}}</td>
                            <td>{{$emp->phone}}</td>
                            <td>{{$emp->address}}</td>
                            <td>
                            <img src="{{url('upload/employeer/'.$emp->profile_picture)}}" alt="Foto" class="rounded-circle" style="width : 60px; height : 60px">
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('adminemployeer.edit',$emp)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{route('adminemployeer.destroy',$emp)}}" method="POST">
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
