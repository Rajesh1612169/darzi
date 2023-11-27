@extends('layouts.app')
@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
{{--                <a href="" class="">+Create</a>--}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="{{route('roles.index')}}" method="GET">
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
                        <a href="{{route('roles.create')}}" type="button" class="btn btn-primary btn-fw float-right mb-3 pt-2 pb-2">Create Role</a>
                    </div>
                </div>
                <div class="table-responsive table-bordered">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Role ID </th>
                            <th> Role Name </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$item)
                        <tr>
                            <td> {{++$key}} </td>
                            <td> {{$item->id}} </td>
                            <td>{{$item->role_type}}</td>
                            <td>
                                <a href="{{route('roles.edit',$item->id )}}" class="btn btn-dribbble btn-sm mr-2" title="edit">
                                    <span class="mdi mdi-pencil"></span>
                                </a>
{{--                                <a href="{{ route('roles.show', ['id' => $item->id]) }}" class="btn btn-info btn-sm mr-2" title="view">--}}
{{--                                    <span class="mdi mdi-eye"></span>--}}
{{--                                </a>--}}
                                <a href="{{ route('roles.destroy', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" title="delete">
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
