
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist" style="border: 1px solid #c89419;padding: 10px;border-radius: 10px;">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user/profile')) ? 'active show' : '' }}" href="{{ route('user.profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user/address')) ? 'active show' : '' }}" href="{{ route('user.view.address') }}">My Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('my/size')) ? 'active show' : '' }}" href="{{ route('mySize') }}">My Sizes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user/whishlist')) ? 'active show' : '' }} " href="{{ route('user.whishlist') }}">Wishlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('my/orders')) ? 'active show' : '' }} " href="{{ route('my.orders') }}">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Log Out</a>
                </li>
            </ul>
        <!-- /.col-md-4 -->

