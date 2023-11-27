@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Role</h4>
                {{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('roles.update', $data->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="role_type">Role Name</label>
                        <input type="text" class="form-control" name="role_type" value="{{$data->role_type}}" id="role_type" placeholder="Name">
                    </div>

                    @error('role')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
