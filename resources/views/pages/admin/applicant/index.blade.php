@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">app</div>
                <div class="card-body">
                <br><br>
                   <table class="table table-striped table-hovered">
                    <thead>
                        <th>No</th>
                        <th>Applicant Name</th>
                        <th>Jobs Name</th>
                        <th>CV </th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($app as $app)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$app->Applicant->name}}</td>
                            <td>{{$app->Job->name}}</td>
                            <td>{{$app->cv}}</td>
                            <td>
                                @if($app->status == 'approved')
                                    <span class="badge badge-success">Approved</span>
                                @elseif($app->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($app->status == 'rejected')
                                    <span class="badge badge-warning">Rejected</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" data-toggle="modal" data-target="#edit-modal" class="btn btn-info"> <i class="fas fa-eye"></i> </a>
                                    <form action="{{route('adminapplicant.destroy',$app)}}" method="POST">
                                        @csrf @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{route('adminapplicant.update',$app)}}" method="POST">
                                        @csrf @method('patch')
                                        <button class="btn btn-success" onclick="return confirm('Are you approved?')">
                                            <i class="fas fa-check"></i>
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
