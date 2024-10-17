@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!-- Bagian gambar login -->
        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('storage/logo/pngegg.png') }}" alt="Login Image" class="img-fluid" style="border-radius: 10px;">
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg" style="border-radius: 15px;">
                <div class="card-header bg-primary text-white text-center" style="border-radius: 15px 15px 0 0;">
                    <h3>{{ __('Login') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4 text-center">
                            @if (session('logoPath')) 
                                <img id="logoPreview" src="{{ Storage::url(session('logoPath')) }}" alt="Logo Preview"
                                style="max-width: 100%; display: block; border-radius: 10px; border: 1px solid #e9ecef; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            @else
                                <img id="logoPreview" src="" alt="Logo Preview" style="max-width: 100%; display: none; border-radius: 10px; border: 1px solid #e9ecef; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Email Address') }}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-check mb-4">
                            <div class="col-md-12">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 30px;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-2 d-block text-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function previewLogo(event) {
        const logoPreview = document.getElementById('logoPreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            logoPreview.src = e.target.result;
            logoPreview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
