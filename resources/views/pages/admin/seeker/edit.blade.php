@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Seeker </div>
                <div class="card-body">
                    <form action="{{route('adminseeker.update',$seek)}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Seeker Name</label>
                        <input type="text" class="form-control" name="name" value="{{$seek->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Seeker Email</label>
                        <input type="email" class="form-control" name="email" value="{{$seek->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Seeker Gender</label>
                        <select name="gender" id="" class="form-control">
                            @if($seek->gender == "Male")
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            @elseif($seek->gender == "Female")
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Seeker Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control">
                            {{$seek->address}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Seeker Phone</label>
                        <input type="number" class="form-control" name="phone" value="{{$seek->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="">Seeker Biodata</label>
                        <textarea name="bio" id="" cols="30" rows="10" class="form-control">
                        {{$seek->bio}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Seeker Picture</label>
                        <input type="file" class="form-control" name="profile_picture">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
