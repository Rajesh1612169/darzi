@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit User</h4>
                {{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">User Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="User Name">
                                @error('name')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email Address">
                                @error('email')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Role</label>
                                <select class="js-example-basic-single" name="role_id">
                                    <option disabled selected>Select Role</option>
                                    @foreach($roles as $item)
                                        <option value="{{$item->id}}">{{$item->role}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Email Address">
                                @error('password')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="profile" class="file-upload">
                            </div>
                        </div>

                    </div>


                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
