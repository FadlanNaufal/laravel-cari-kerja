@extends('layouts.app-seeker')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                            @if($jobs->id_admin == null)
                            <img class="img-thumbnail" style="width : 200px ; height : 200px" src="{{url('upload/employeer/'.$jobs->Employeer['profile_picture'])}}" alt="">
                            @elseif($jobs->id_employeer == null)
                            <img class="img-thumbnail" style="width : 200px ; height : 200px" src="https://www.pngfind.com/pngs/m/528-5286002_forum-admin-icon-png-nitzer-ebb-that-total.png" alt="">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{$jobs->name}}</h4>
                            <p> <i>Working at {{$jobs->place}} as {{$jobs->position}}</i> </p>
                            <p> <i class="fas fa-dollar-sign"> {{number_format($jobs->salary)}} </i> </p>
                            <p>{{$jobs->desc}}</p>
                        </div>
                   </div>
                </div>
            </div>
            <div>
                <a href="{{route('seeker.index')}}" class="btn btn-warning">Back</a>
                <a href="{{route('applicant.show',$jobs)}}" class="btn btn-primary">Apply</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Employeer Detail</div>
                <div class="card-body">
                   <table class="table table-hovered">
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
    </div>
</div>
@endsection
