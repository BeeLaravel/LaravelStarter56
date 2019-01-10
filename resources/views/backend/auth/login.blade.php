@extends('backend.layouts.bare')
@section('styles')
@endsection
@section('page')
    <div class="col-md-8">
        <div class="card-group mb-0">
            <div class="card p-2">
                <div class="card-block">
                    <form method="post">
                        <h1>@lang('view.login')</h1>
                        <p class="text-muted">@lang('view.login_desc')</p>
                        @csrf
                        <div class="input-group mb-1">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="@lang('view.username')">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="@lang('view.password')">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-2">@lang('view.login')</button>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/backend/password/reset" role="button" class="btn btn-link px-0">@lang('view.forgot_password')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                <div class="card-block text-center">
                    <div>
                        <h2>@lang('view.sign_up')</h2>
                        <p>@lang('view.sign_up_desc')</p>
                        <a href="/backend/register" role="button" class="btn btn-primary active mt-1">@lang('view.register_now')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
