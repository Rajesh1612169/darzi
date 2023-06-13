@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                    <h4 class="card-title mb-4">Create Product Variation</h4>
{{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('variation.store')}}" method="Post">
                    @csrf
                    <div class="form-group">
                        <label for="variation_name">Variation Name</label>
                        <input type="text" class="form-control" name="variation_name" id="variation_name" placeholder="Variation Name">
                    </div>

                    @error('variation_name')
                    <div class="error">{{ $message }}</div>
                    @enderror

{{--                    <div class="col-md-6">--}}
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="js-example-basic-single w-100" name="category_id">
                                <option disabled selected>Select Category</option>
                                @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
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
