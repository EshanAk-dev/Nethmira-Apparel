@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center;margin-bottom: 15px; border-radius: 20px;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        {{ session('error') }}
    </div>
@endif

@if(session()->has('payment-error'))
    <div class="alert alert-danger" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        {{ session('payment-error') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        <strong>Warning:</strong> {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        <strong>Info:</strong> {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has('primary'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        <strong>Primary:</strong> {{ session('primary') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has('secondary'))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        <strong>Secondary:</strong> {{ session('secondary') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has('light'))
    <div class="alert alert-light alert-dismissible fade show" role="alert" style="text-align: center;margin-bottom: 15px;border-radius: 20px;">
        <strong>Light:</strong> {{ session('light') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
