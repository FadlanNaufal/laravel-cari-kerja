@extends('layouts.app-employeer')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                <div class="card-header">
                                    <h4>My Jobs</h4>
                                </div>
                                <div class="card-body">
                                    {{$job_total}}
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection