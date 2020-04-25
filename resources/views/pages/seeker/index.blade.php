@extends('layouts.app-seeker')

    @section('content')
    <div class="container">
    <div class="row">
            @foreach($jobs->chunk(2) as $jobs)
              @foreach($jobs as $j)
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-5">
                        @if($j->id_admin == null)
                        <img style="width : 100px ; height : 100px" src="{{url('upload/employeer/'.$j->Employeer->profile_picture)}}" alt="">
                        @elseif($j->id_employeer == null)
                        <img style="width : 100px ; height : 100px" src="https://www.pngfind.com/pngs/m/528-5286002_forum-admin-icon-png-nitzer-ebb-that-total.png" alt="">
                        @endif
                      </div>
                      <div class="col-md-7">
                          <table>
                          
                          <tr>
                            <td><h4><b>{{$j->name}} </b></h4></td>
                          </tr>
                          <tr><td><i>{{$j->created_at->diffForHumans()}}</i>, <i>{{$j->place}}</i> </td></tr>
                          <tr>
                          <td> <i class="fas fa-user"></i> {{$j->position}}</td>
                          </tr>
                          <tr>
                            <td> <i class="fas fa-dollar-sign"></i> Rp.{{number_format($j->salary)}}</td>
                          </tr>
                          <tr>
                          @if($j->id_admin == null)
                          <td> <i class="fas fa-phone"></i> {{$j->Employeer['phone']}}</td>
                          @elseif($j->id_employeer == null)
                          <td> <i>No Contact</i> </td>
                          @endif
                          </tr>
                          <tr>
                            <td>{{$j->desc}}</td>
                          </tr>
                          <tr>
                            <td style="padding-top : 20px !important">  
                              <a href="{{route('seeker.show',$j)}}" class="btn btn-primary">Detail</a>
                            </td>
                          </tr>
                          </table>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @endforeach
            </div>
    </div>
    @endsection