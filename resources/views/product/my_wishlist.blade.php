@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
<style type="text/css">
	.active-color {
		border: 3px solid #333333 !important;
	}
</style>
@endsection

@section('content')

<main class="main">
	<div class="page-header text-center" style="background-image: url('{{ url('') }}/assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">My Wishlist</h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="toolbox">
						<div class="toolbox-left" style="margin-bottom: 15px;">
							@php
							$totalEntries = $getProduct->total();
							$firstEntry = ($getProduct->currentPage() - 1) * $getProduct->perPage() + 1;
							$lastEntry = $firstEntry + $getProduct->count() - 1;
							@endphp

							<div class="toolbox-info">
								Showing <span>{{ $firstEntry }} to {{ $lastEntry }}</span> of <span>{{ $totalEntries }}</span> Products
							</div><!-- End .toolbox-info -->

						</div><!-- End .toolbox-left -->

					</div><!-- End .toolbox -->

					
						@include('product._list')
					

					<div style="padding: 10px; float: right;">
						{!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))
						->links() !!}
					</div>

				</div><!-- End .col-lg-9 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')

@endsection