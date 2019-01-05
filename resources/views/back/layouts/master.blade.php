@extends('back.layouts.base')
@section('body')
    @include('back.sections.header')
    <div class="app-body">
        @include('back.sections.aside')
        <main class="main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu hidden-md-down">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                        <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
					@yield('page')
                </div>
            </div>
        </main>
        @include('back.sections.asside-menu')
    </div>
    @include('back.sections.footer')
@endsection
@section('scripts')
    @parent

    <script src="/template/coreui/assets/js/libs/pace.min.js"></script>
    <script src="/template/coreui/assets/js/libs/Chart.min.js"></script>
    <script src="/template/coreui/js/app.js"></script>
@show
