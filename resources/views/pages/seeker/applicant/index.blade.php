@extends('layouts.app-seeker')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Job Applicant List</div>
                <div class="card-body">
                    <br><br>
                    <table class="table table-striped table-hovered">
                        <thead>
                            <th>No</th>
                            <th>Employeer Name</th>
                            <th>Employeer Contact</th>
                            <th>Job Name</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach($app as $app)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>
                                    @if($app->Job->id_admin == null)
                                        {{$app->Job->Employee->name}}
                                    @elseif(($app->Job->id_employee == null))
                                        {{$app->Job->Admin->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($app->Job->id_admin == null)
                                        {{$app->Job->Employee->phone}}
                                    @elseif(($app->Job->id_employee == null))
                                        {{$app->Job->Admin->email}}
                                    @endif
                                </td>
                                <td>
                                    {{$app->Job->name}}
                                </td>
                                <td>
                                @if($app->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif($app->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($app->status == 'rejected')
                                        <span class="badge badge-warning">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Please Call/Email to Employeer Contact if you have approved applicant
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
