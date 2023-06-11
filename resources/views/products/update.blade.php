@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit User</h4>
                {{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('user.update', $data->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">User Name</label>
                                <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="User Name">
                                @error('name')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="Email Address">
                                @error('email')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Role</label>
                                <select class="js-example-basic-single w-100" name="role_id">
                                    <option disabled>Select Role</option>
                                    @foreach($role as $item)
                                        <option {{$item->id === $data->role_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->role}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label>Change Password</label>
                            <br>
                            <a href="{{route('user.password.edit', $data->id)}}">Change Password</a>
                        </div>

                    </div>

                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-dark">Cancel</a>
                    </div>
                </form>
                <div class="col-md-6">
                    <label class="mb-3">Profile Image</label>
                    <br>
                    <div style="position: relative; display: inline-block">
                        <label for="img" class="ïmg-div">
                            <img class="profile-pic" src="data:image/jpg;base64,{{ chunk_split(base64_encode(isset($data->profile) ? $data->profile : '')) }}" alt="">
                        </label>
                        <i class="mdi mdi-delete-forever" style="color: #ff2121;position: absolute;top: -24px;right: 83px;font-size: 30px;"></i>
                    </div>
                    <input type="file" id="img" onchange="changeImg()" name="profile">
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeImg() {

            // e.preventDefault();
            var formData = new FormData();

            // let name = $("input[name=name]").val();
            var photo = $('#img').prop('files')[0];
            console.log(photo);
            //
            formData.append('photo', photo);
            // formData.append('name', name);
            //
            $.ajax({
                url: '{{route('user.img.update')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: (response) => {
                    // success
                    console.log(response);
                },
                error: (response) => {
                    console.log(response);
                }
            });
        }
    </script>

@endsection
