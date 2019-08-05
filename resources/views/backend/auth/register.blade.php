@extends('backend.layouts.bare')
@section('styles')
@endsection
@section('page')
    <div class="col-md-6">
        <div class="card mx-2">
            <div class="card-block p-2">
                <form method="post">
                    <h1>@lang('view.register')</h1>
                    <p class="text-muted">@lang('view.register_desc')</p>
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-q">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="@lang('view.username')">
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-q">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="@lang('view.email')">
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-q">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" name="password" value="" class="form-control" placeholder="@lang('view.password')">
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-q">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('view.repeat_password')">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-success">@lang('view.create_account')</button>
                </form>
            </div>
            <div class="card-footer p-2">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-block btn-facebook" role="button" href="/backend/facebook/login">
                            <span>@lang('view.facebook')</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-block btn-twitter" role="button" href="/backend/twitter/login">
                            <span>@lang('view.twitter')</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
