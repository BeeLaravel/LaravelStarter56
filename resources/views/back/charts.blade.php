@extends('back.layouts.master')
@section('page')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card-columns cols-2">
                <div class="card">
                    <div class="card-header">
                        Line Chart
                        <div class="card-actions">
                            <a href="">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="chart-wrapper">
                            <canvas id="canvas-1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Bar Chart
                        <div class="card-actions">
                            <a href="">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="chart-wrapper">
                            <canvas id="canvas-2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Doughnut Chart
                        <div class="card-actions">
                            <a href="">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="chart-wrapper">
                            <canvas id="canvas-3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Radar Chart
                        <div class="card-actions">
                            <a href="">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="chart-wrapper">
                            <canvas id="canvas-4"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Pie Chart
                        <div class="card-actions">
                            <a href="">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="chart-wrapper">
                            <canvas id="canvas-5"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Polar Area Chart
                        <div class="card-actions">
                            <a href="">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="chart-wrapper">
                            <canvas id="canvas-6"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <script src="/template/coreui/js/views/charts.js"></script>
@endsection
