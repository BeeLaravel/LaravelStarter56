@extends('back.layouts.bare')
@section('styles')
@endsection
@section('page')
    <div class="col-md-6">
        <div class="clearfix">
            <h1 class="float-left display-3 mr-2">500</h1>
            <h4 class="pt-1">Houston, we have a problem!</h4>
            <p class="text-muted">The page you are looking for is temporarily unavailable.</p>
        </div>
        <div class="input-prepend input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i>
            </span>
            <input id="prependedInput" class="form-control" size="16" type="text" placeholder="What are you looking for?">
            <span class="input-group-btn">
                <button class="btn btn-info" type="button">Search</button>
            </span>
        </div>
    </div>
@endsection