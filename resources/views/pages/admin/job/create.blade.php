@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category </div>
                <div class="card-body">
                    <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Job Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Job Category</label>
                        <select name="id_category" id="" class="form-control">
                            @foreach($category as $c)
                                <option value="{{$c->id}}"> {{$c->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Job Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Job Position</label>
                        <input type="text" class="form-control" name="position">
                    </div>

                    <div class="form-group">
                        <label for="">Job Salary</label>
                        <input type="number" class="form-control" name="salary">
                    </div>

                    <div class="form-group">
                        <label for="">Job Place</label>
                        <input type="text" class="form-control" name="place">
                    </div>

                    <div class="form-group">
                        <label for="">Close Date</label>
                        <input type="date" class="form-control" name="close_at">
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
