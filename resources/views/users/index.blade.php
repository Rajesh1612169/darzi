@extends('layouts.app')
@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{--                <a href="" class="">+Create</a>--}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="{{route('users.index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" required placeholder="Search Role" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-facebook" type="submit">
                                            <i class="mdi mdi-search-web" style="font-size: 25px"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <a href="{{route('user.create')}}" type="button" class="btn btn-primary btn-fw float-right mb-3 pt-2 pb-2">Create User</a>
                    </div>
                </div>
                <div class="table-responsive table-bordered">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Profile Pic</th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$item)
                            <tr>
                                <td> {{++$key}} </td>
                                <td> <img class="profile-pic" src="data:image/jpg;base64,{{ chunk_split(base64_encode(isset($item->profile) ? $item->profile : '')) }}" alt=""></td>
                                <td> {{$item->name}} </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role}}</td>
                                <td>
                                    <a href="{{route('user.edit',$item->id )}}" class="btn btn-dribbble btn-sm mr-2" title="edit">
                                        <span class="mdi mdi-pencil"></span>
                                    </a>
                                    <a href="{{ route('user.show', ['id' => $item->id]) }}" class="btn btn-info btn-sm mr-2" title="view">
                                        <span class="mdi mdi-eye"></span>
                                    </a>
                                    <a href="{{ route('user.destroy', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" title="delete">
                                        <span class="mdi mdi-trash-can"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {!! $data->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
