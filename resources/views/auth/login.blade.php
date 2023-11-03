@extends('auth.partials.master')
@section('content')
    <div class="container mt-5 p-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h1 class="text-center">{{ trans('panel.site_title') }}</h1>

                        <p class="text-muted">{{ trans('global.login') }}</p>

                        @if (session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="h6 fa fa-user"></i>
                                    </span>
                                </div>

                                <input id="email" name="email" type="text"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                    autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                    value="{{ old('email', null) }}">

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="h6 fa fa-lock"></i></span>
                                </div>

                                <input id="password" name="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                    placeholder="{{ trans('global.login_password') }}">

                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-6 form-check checkbox">
                                    <input class="form-check-input" name="remember" type="checkbox" id="remember"
                                        style="vertical-align: middle;" />
                                    <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                        {{ trans('global.remember_me') }}
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                            {{ trans('global.forgot_password') }}
                                        </a><br>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" style="width:400px"class=" btn btn-primary px-5">
                                    {{ trans('global.login') }}
                                </button>
                            </div>
                            <div>
                                <a class="btn btn-link px-0" href="{{ route('signup') }}">Register</a><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
