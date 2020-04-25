@extends('layouts.app-seeker')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
                @foreach($jobs as $jobs)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('applicant.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Applicant Name</label>
                                    <input type="text" class="form-control" name="id_applicant" value="{{Auth::guard('seeker')->user()->name}}" disabled>
                                </div>
                                <input type="hidden" name="id_job" value="{{$jobs->id}}">
                                <div class="form-group">
                                    <label for="">Applicant CV</label>
                                    <input type="file" class="form-control" name="cv">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info">Send Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <table class="table table-hovered">
                        <tr>
                           <td> <b>Job Name</b> </td>
                           <td>
                              {{$jobs->name}}
                           </td>
                       </tr>
                       <tr>
                           <td> <b>Job Position</b> </td>
                           <td>
                              {{$jobs->position}}
                           </td>
                       </tr>
                       <tr>
                           <td> <b>Job salary</b> </td>
                           <td>
                              {{number_format($jobs->salary)}}
                           </td>
                       </tr>
                       <tr>
                           <td> <b>Employeer Name</b> </td>
                           <td>
                               @if($jobs->id_admin == null)
                               {{$jobs->Employeer['name']}}
                               @elseif($jobs->id_employeer == null)
                               {{$jobs->Admin['name']}}
                               @endif
                           </td>
                       </tr>
                       <tr>
                           <td> <b>Employeer Email</b> </td>
                           <td>
                               @if($jobs->id_admin == null)
                               {{$jobs->Employeer['email']}}
                               @elseif($jobs->id_employeer == null)
                               {{$jobs->Admin['email']}}
                               @endif
                           </td>
                       </tr>
                       <tr>
                           <td> <b>Employeer Phone</b> </td>
                           <td>
                               @if($jobs->id_admin == null)
                               {{$jobs->Employeer['phone']}}
                               @elseif($jobs->id_employeer == null)
                               <i>No Contact</i>
                               @endif
                           </td>
                       </tr>

                       <tr>
                           <td> <b>Employeer Address</b> </td>
                           <td>
                               @if($jobs->id_admin == null)
                               {{$jobs->Employeer['address']}}
                               @elseif($jobs->id_employeer == null)
                               <i>No Address</i>
                               @endif
                           </td>
                       </tr>
                   </table>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    @endsection