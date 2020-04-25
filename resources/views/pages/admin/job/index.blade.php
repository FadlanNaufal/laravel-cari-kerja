@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Job </div>
                <div class="card-body">
                <a href="{{route('job.create')}}" class="btn btn-primary">Add</a>
                <br><br>
                   <table class="table table-striped table-hovered">
                    <thead>
                        <th>No</th>
                        <th>Job Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($job as $job)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$job->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('job.edit',$job)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{route('job.destroy',$job)}}" method="POST">
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
