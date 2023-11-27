@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                    <h4 class="card-title mb-4">Create Product Category</h4>
{{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('category.store')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name">
                    </div>

                    @error('role')
                    <div class="error">{{ $message }}</div>
                    @enderror

{{--                    <div class="col-md-6">--}}
                        <div class="form-group">
                            <label>Select Parent Category</label>
                            <select class="js-example-basic-single w-100" name="parent_category_id">
                                <option disabled selected>Select Parent Category</option>
                                @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
{{--                    <div class="col-md-12">--}}
                        <div class="form-group">
                            <input type="file" name="product_category_image" class="file-upload w-100">
                        </div>
{{--                    </div>--}}
{{--                    </div>--}}
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
