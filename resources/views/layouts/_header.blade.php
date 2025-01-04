<header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">

                        <div class="header-dropdown">
                            <a href="#">Eng</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:;">English</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="tel:#"><i class="icon-phone"></i>Call: {{ $getSystemSettingApp->phone }}</a></li>
                                    @if(!empty(Auth::check()))
                                        <li><a href="{{ url('my-wishlist') }}"><i class="icon-heart-o"></i>My Wishlist <span>*</span></a></li>
                                    @else
                                        <li><a href="#signin-modal" data-toggle="modal"><i class="icon-heart-o"></i>My Wishlist</a></li>
                                    @endif
                                    <li><a href="{{ url('about') }}">About Us</a></li>
                                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                    @if(!empty(Auth::check()))
                                        <li><a href="{{ url('user/dashboard') }}"><i class="fas fa-user"></i>{{ Auth::user()->name }}</a></li> 
                                    @else
                                        <li><a href="#signin-modal" data-toggle="modal"><i class="fas fa-user"></i>Login</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ url('') }}" class="logo">
                            <img src="{{ $getSystemSettingApp->getLogo() }}" alt="" width="185" height="100">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="{{ Request::is('/') ? 'active' : '' }}">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                @php
                                    $currentPath = request()->path();
                                    $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                @endphp
                                @foreach($getCategoryHeader as $value_c_h)
                                    @php
                                        $categoryUrl = url($value_c_h->slug);
                                    @endphp
                                    <li class="{{ Request::is($value_c_h->slug . '*') ? 'active' : '' }}">
                                        <a href="{{ $categoryUrl }}">{{ $value_c_h->name }}</a>
                                        @if($value_c_h->getSubCategory->count() > 0)
                                            <ul class="dropdown">
                                                @foreach($value_c_h->getSubCategory as $value_h_sub)
                                                    @php
                                                        $subcategoryUrl = url($value_c_h->slug.'/'.$value_h_sub->slug);
                                                    @endphp
                                                    <li class="{{ Request::is($value_c_h->slug.'/'.$value_h_sub->slug) ? 'active' : '' }}">
                                                        <a href="{{ $subcategoryUrl }}">{{ $value_h_sub->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="{{ url('search') }}" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." 
                                    value="{{ !empty(Request::get('q')) ? Request::get('q') : '' }}"  required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{ Cart::getContent()->count() }}</span>
                            </a>
                            @if(!empty(Cart::getContent()->count()))
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">
                                        @foreach(Cart::getContent() as $header_cart)
                                            @php
                                                $getCartProduct =  App\Models\ProductModel::getSingle($header_cart->id);
                                            @endphp
                                            @if(!empty($getCartProduct))
                                                @php
                                                    $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                                                @endphp
                                                <div class="product">
                                                    <div class="product-cart-details">
                                                        <h4 class="product-title">
                                                            <a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a>
                                                        </h4>

                                                        <span class="cart-product-info">
                                                            <span class="cart-product-qty">{{ $header_cart->quantity }}</span>
                                                            x Rs.{{ number_format($header_cart->price, 2) }}
                                                        </span>
                                                    </div><!-- End .product-cart-details -->

                                                    <figure class="product-image-container">
                                                        <a href="{{ url($getCartProduct->slug) }}" class="product-image">
                                                            <img src="{{ $getProductImage->getProductImage() }}" alt="product">
                                                        </a>
                                                    </figure>
                                                    <a href="{{ url('cart/delete', $header_cart->id) }}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                                </div><!-- End .product -->
                                            @endif
                                        @endforeach
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">Rs.{{ number_format(Cart::getSubTotal(), 2) }}</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ url('cart') }}" class="btn btn-primary">View Cart</a>
                                        
                                        
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdown-menu -->
                            @endif
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->