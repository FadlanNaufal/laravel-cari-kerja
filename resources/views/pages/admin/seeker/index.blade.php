@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">seeker </div>
                <div class="card-body">
                <a href="{{route('adminseeker.create')}}" class="btn btn-primary">Add</a>
                <br><br>
                   <table class="table table-striped table-hovered">
                    <thead>
                        <th>No</th>
                        <th>seeker Name</th>
                        <th>seeker Email</th>
                        <th>seeker Phone</th>
                        <th>seeker Address</th>
                        <th>seeker Picture</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($seek as $seek)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$seek->name}}</td>
                            <td>{{$seek->email}}</td>
                            <td>{{$seek->phone}}</td>
                            <td>{{$seek->address}}</td>
                            <td>
                            <img src="{{url('upload/seeker/'.$seek->profile_picture)}}" alt="Foto" class="rounded-circle" style="width : 60px; height : 60px">
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('adminseeker.edit',$seek)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{route('adminseeker.destroy',$seek)}}" method="POST">
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
