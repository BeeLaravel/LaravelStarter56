@extends('backend.layouts.bare')
@section('styles')
@endsection
@section('page')
    <div class="col-md-6">
        <div class="card mx-2">
            <div class="card-block p-2">
                <h1>@lang('view.register')</h1>
                <p class="text-muted">@lang('view.register_desc')</p>
                <div class="input-group mb-1">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" class="form-control" placeholder="@lang('view.username')">
                </div>

                <div class="input-group mb-1">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" placeholder="@lang('view.email')">
                </div>

                <div class="input-group mb-1">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input type="password" class="form-control" placeholder="@lang('view.password')">
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input type="password" class="form-control" placeholder="@lang('view.repeat_password')">
                </div>

                <button type="button" class="btn btn-block btn-success">@lang('view.create_account')</button>
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
