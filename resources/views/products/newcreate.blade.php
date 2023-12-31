@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Create Product</h4>
                <form class="forms-sample" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" name="product_name" value="{{old('product_name')}}" placeholder="Product Name">
                                @error('product_name')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="js-example-basic-single w-100" name="brand_id">
                                    <option disabled selected>Select Category</option>
                                                                        @foreach($brand as $item)
                                                                            <option value="{{$item->id}}">{{$item->brand_name}}</option>
                                                                        @endforeach
                                </select>
                                @error('role_id')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Isert Quantity</label>
                                <input type="number" class="form-control" name="product_qty" value="{{old('product_qty')}}" placeholder="Product Quantity">
                                @error('product_qty')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Isert SKU</label>
                                <input type="number" class="form-control" name="product_sku" value="{{old('product_sky')}}" placeholder="Product SKU">
                                @error('product_sku')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Isert Price</label>
                                <input type="number" class="form-control" name="product_price" value="{{old('product_price')}}" placeholder="Product Price">
                                @error('product_price')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea type="text" class="form-control" name="short_description" rows="2" placeholder="Description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea type="text" class="form-control" name="long_description" rows="5" placeholder="Description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="file">User Image</label>
                        <input type="file" class="form-control" name="file[]" multiple>
                        <img id="previewImg" alt="product image" style="max-width:130px;margin-top:20px;"/>
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
