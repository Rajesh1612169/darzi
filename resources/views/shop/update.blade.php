@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Update Order</h4>
                {{--                    <a href="{{url()->previous()}}" class="btn btn-dribbble float-right">Back</a>--}}
                <form class="forms-sample" action="{{route('shop.update', $order->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type"> Name</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->name}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">Email</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->email}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">Phone</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->phone}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">Country</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->country}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">City</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->city}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">Postal Code</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->postal_code}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">Total Price</label>
                                <input type="text" class="form-control" name="role_type" value="{{$order->total_price}}" id="role_type" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_type">Update Order</label>
                                <select name="order_status" id="" class="form-control">
                                    <option value="ordered" {{ $order->order_status === 'ordered' ? 'selected' : '' }}>Ordered</option>
                                    {{-- <option value="OnProcessing">On Processing</option> --}}
                                    <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="canceled" {{ $order->order_status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                                    <option value="completed" {{ $order->order_status === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h4>Products</h4>
                    <div class="table-responsive table-bordered">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Product Name </th>
                                <th> Price </th>
                                <th> Qty </th>
                                <th> Customized </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderProducts as $key=>$item)
                            <tr>
                                <td> {{++$key}} </td>
                                <td> {{$item->product_name}} </td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>
                                    @php
                                    $data = \Illuminate\Support\Facades\DB::table('shop_order_details')
                                    ->where('order_id', '=',$item->order_id)->where('order_product_id', '=', $item->product_id)
                                    ->first();
                                    ($data != null) ? $isCustomizred = 'Yes' : $isCustomizred = 'No';
                                    //dd($isCustomizred);
                                        //$isCustomizred
                                    @endphp
                                    {{$isCustomizred}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                    @error('role')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="form-group float-right mt-3">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-dark">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
