<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($getProduct as $value)
        @php
        $getProductImage = $value->getImageSingle($value->id);
        @endphp
        <div class="col-12 col-md-4 col-lg-4">
            <div class="product product-7 text-center" style="border-radius: 5%;">
                <figure class="product-media" style="border-radius: 5%;">
                    <a href="{{ url($value->slug) }}">
                        @if(!empty($getProductImage) && !empty($getProductImage->getProductImage()))
                        <img style="height: 350px; width: 100%; object-fit: cover;" src="{{ $getProductImage->getProductImage() }}" alt="{{ $value->title }}" class="product-image">
                        @endif
                    </a>

                    <div class="product-action-vertical">
                        @if(!empty(Auth::check()))
                        <a href="javascript:;" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $value->id }}
                            {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }} " title="Wishlist" id="{{ $value->id }}"><span>add to wishlist</span></a>
                        @else
                        <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to wishlist</span></a>
                        @endif
                    </div>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{ url($value->slug) }}">{{ $value->title }}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        Rs.{{ number_format($value->price, 2) }}
                    </div><!-- End .product-price -->


                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 col-lg-4 -->
        @endforeach
    </div><!-- End .row -->
</div><!-- End .products -->