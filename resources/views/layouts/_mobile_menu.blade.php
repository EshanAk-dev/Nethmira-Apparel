<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
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
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->