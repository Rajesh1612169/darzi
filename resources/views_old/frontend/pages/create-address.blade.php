@extends('frontend.layouts.app')
@section('content')
<div class="row m-3 mt-5">


<div class="col-md-3">
    @include('frontend.components.sidebar')
</div>
    <div class="col-md-9">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show">
                <h4>Create New Address</h4>
                <div class="row">
                    <div class="col-md-10">
                        <form method="post" action="{{route('user.post.address')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="address_line">Full Address</label>
                                        <input type="text" id="address_line" name="address_line" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="postal_code">Postal Code</label>
                                        <input type="text" id="postal_code" name="postal_code" class="form-control" />
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
