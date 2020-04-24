@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employeer </div>
                <div class="card-body">
                    <form action="{{route('adminemployeer.update',$emp)}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label for="">Employeer Name</label>
                        <input type="text" class="form-control" name="name" value="{{$emp->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Employeer Email</label>
                        <input type="email" class="form-control" name="email" value="{{$emp->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Employeer Gender</label>
                        <select name="gender" id="" class="form-control">
                            @if($emp->gender == "Male")
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            @elseif($emp->gender == "Female")
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Employeer Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control">
                            {{$emp->address}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Employeer Phone</label>
                        <input type="number" class="form-control" name="phone" value="{{$emp->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="">Employeer Biodata</label>
                        <textarea name="bio" id="" cols="30" rows="10" class="form-control">
                        {{$emp->bio}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Employeer Picture</label>
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
