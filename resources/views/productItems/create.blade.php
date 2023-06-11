@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Create Product Item</h4>
                {{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('product.items.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Product</label>
                                <select class="js-example-basic-single w-100" name="product_id">
                                    <option disabled selected>Select Product</option>
                                    @foreach($data as $item)
                                        <option value="{{$item->id}}">{{$item->product_name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" value="{{old('sku')}}" placeholder="SKU">
                                @error('sku')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty_in_stock">Qty in Stock</label>
                                <input type="text" class="form-control" id="qty_in_stock" name="qty_in_stock" value="{{old('qty_in_stock')}}" placeholder="Qty in Stock">
                                @error('qty_in_stock')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="Qty in Stock">
                                @error('price')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="product_image" class="file-upload">
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
