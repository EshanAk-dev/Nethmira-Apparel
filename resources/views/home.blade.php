@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="assets/css/demos/demo-18.css">
@endsection

@section('content')

<main class="main">
    <div class="container banners">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner banner-hover">
                    <a href="{{ url('women-collection') }}">
                        <img src="assets/images/demos/demo-18/banners/banner-1.jpg" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h3 class="banner-title text-white"><a href="{{ url('women-collection') }}">Women’s Collection</a></h3><!-- End .banner-title -->
                        <a href="{{ url('women-collection') }}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->

            <div class="col-sm-6 col-lg-3">
                <div class="banner banner-hover">
                    <a href="{{ url('men-collection') }}">
                        <img src="assets/images/demos/demo-18/banners/banner-2.jpg" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h3 class="banner-title text-white"><a href="{{ url('men-collection') }}">Men’s Collection</a></h3><!-- End .banner-title -->
                        <a href="{{ url('men-collection') }}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 -->

            <div class="col-sm-6 col-lg-3">
                <div class="banner banner-hover">
                    <a href="{{ url('women-collection/women-jackets') }}">
                        <img src="assets/images/demos/demo-18/banners/banner-3.jpg" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h3 class="banner-title text-white"><a href="{{ url('women-collection/women-jackets') }}">Women’s jackets</a></h3><!-- End .banner-title -->
                        <a href="{{ url('women-collection/women-jackets') }}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->

                <div class="banner banner-hover">
                    <a href="{{ url('kids-collection') }}">
                        <img src="{{ url('kids-collection.jpg') }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h3 class="banner-title text-white"><a href="{{ url('kids-collection') }}">Kids' Collection</a></h3><!-- End .banner-title -->
                        <a href="{{ url('kids-collection') }}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- End .mb-5 -->

    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title">Trendy Products</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="trendy-women-link" data-toggle="tab" href="#trendy-women-tab" role="tab" aria-controls="trendy-women-tab" aria-selected="false">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="trendy-men-link" data-toggle="tab" href="#trendy-men-tab" role="tab" aria-controls="trendy-men-tab" aria-selected="false">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="trendy-kids-link" data-toggle="tab" href="#trendy-kids-tab" role="tab" aria-controls="trendy-kids-tab" aria-selected="false">Kids</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="trendy-gents-link" data-toggle="tab" href="#trendy-gents-tab" role="tab" aria-controls="trendy-gents-tab" aria-selected="false">Gents</a>
                </li>
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                    @foreach($getProduct as $value)
                    @php
                    $getProductImage = $value->getImageSingle($value->id);
                    @endphp
                    <div class="product product-2" style="border-radius: 5%;">
                        <figure class="product-media" style="border-radius: 5%;">
                            <a href="{{ url($value->slug) }}">
                                @if(!empty($getProductImage) && !empty($getProductImage->getProductImage()))
                                <img style="height: 380px; width: 100%; object-fit: cover;" src="{{ $getProductImage->getProductImage() }}" alt="{{ $value->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                @if(!empty(Auth::check()))
                                <a href="javascript:;" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $value->id }}
                            {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }} " title="Wishlist" id="{{ $value->id }}"><span>add to wishlist</span></a>
                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $value->title }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                Rs.{{ number_format($value->price, 2) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endforeach


                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="trendy-women-tab" role="tabpanel" aria-labelledby="trendy-women-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>

                    @foreach($getProduct as $value)
                    @php
                    $getProductImage = $value->getImageSingle($value->id);
                    @endphp
                    @if($value->category_slug == 'women-collection')
                    <div class="product product-2" style="border-radius: 5%;">
                        <figure class="product-media" style="border-radius: 5%;">
                            <a href="{{ url($value->slug) }}">
                                @if(!empty($getProductImage) && !empty($getProductImage->getProductImage()))
                                <img style="height: 380px; width: 100%; object-fit: cover;" src="{{ $getProductImage->getProductImage() }}" alt="{{ $value->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                @if(!empty(Auth::check()))
                                <a href="javascript:;" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $value->id }}
                            {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }} " title="Wishlist" id="{{ $value->id }}"><span>add to wishlist</span></a>
                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $value->title }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                Rs.{{ number_format($value->price, 2) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endif
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="trendy-men-tab" role="tabpanel" aria-labelledby="trendy-men-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                    @foreach($getProduct as $value)
                    @php
                    $getProductImage = $value->getImageSingle($value->id);
                    @endphp
                    @if($value->category_slug == 'men-collection')
                    <div class="product product-2" style="border-radius: 5%;">
                        <figure class="product-media" style="border-radius: 5%;">
                            <a href="{{ url($value->slug) }}">
                                @if(!empty($getProductImage) && !empty($getProductImage->getProductImage()))
                                <img style="height: 380px; width: 100%; object-fit: cover;" src="{{ $getProductImage->getProductImage() }}" alt="{{ $value->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                @if(!empty(Auth::check()))
                                <a href="javascript:;" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $value->id }}
                            {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }} " title="Wishlist" id="{{ $value->id }}"><span>add to wishlist</span></a>
                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $value->title }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                Rs.{{ number_format($value->price, 2) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endif
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="trendy-kids-tab" role="tabpanel" aria-labelledby="trendy-kids-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                    @foreach($getProduct as $value)
                    @php
                    $getProductImage = $value->getImageSingle($value->id);
                    @endphp
                    @if($value->category_slug == 'kids-collection')
                    <div class="product product-2" style="border-radius: 5%;">
                        <figure class="product-media" style="border-radius: 5%;">
                            <a href="{{ url($value->slug) }}">
                                @if(!empty($getProductImage) && !empty($getProductImage->getProductImage()))
                                <img style="height: 380px; width: 100%; object-fit: cover;" src="{{ $getProductImage->getProductImage() }}" alt="{{ $value->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                @if(!empty(Auth::check()))
                                <a href="javascript:;" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $value->id }}
                            {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }} " title="Wishlist" id="{{ $value->id }}"><span>add to wishlist</span></a>
                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $value->title }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                Rs.{{ number_format($value->price, 2) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endif
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="trendy-gents-tab" role="tabpanel" aria-labelledby="trendy-gents-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                    @foreach($getProduct as $value)
                    @php
                    $getProductImage = $value->getImageSingle($value->id);
                    @endphp
                    @if($value->category_slug == 'gents-collection')
                    <div class="product product-2" style="border-radius: 5%;">
                        <figure class="product-media" style="border-radius: 5%;">
                            <a href="{{ url($value->slug) }}">
                                @if(!empty($getProductImage) && !empty($getProductImage->getProductImage()))
                                <img style="height: 380px; width: 100%; object-fit: cover;" src="{{ $getProductImage->getProductImage() }}" alt="{{ $value->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                @if(!empty(Auth::check()))
                                <a href="javascript:;" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $value->id }}
                            {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }} " title="Wishlist" id="{{ $value->id }}"><span>add to wishlist</span></a>
                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                                @endif
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $value->title }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                Rs.{{ number_format($value->price, 2) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endif
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- End .mb-5 -->


    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rocket"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                    <p>Free shipping</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rotate-left"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                    <p>Free 100% money back guarantee</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-life-ring"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                    <p>Alway online feedback 24/7</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->
    </div><!-- End .row -->
</main><!-- End .main -->

@endsection