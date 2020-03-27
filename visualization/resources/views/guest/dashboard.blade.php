@extends('layouts.guest')
@section('content')
    <div class="content-wrapper no-left-margin">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ trans('global.dashboard.covid19') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ trans('global.dashboard.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ trans('global.dashboard.dashboard') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.dashboard.total_cases_helper') }}">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ trans('global.dashboard.total_cases') }}</span>
                                <span class="info-box-number">10</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.dashboard.recovered_helper') }}">
                            <span class="info-box-icon bg-success-gradient elevation-1"><i
                                    class="fas fa-running"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ trans('global.dashboard.recovered') }}</span>
                                <span class="info-box-number">41,410 &nbsp;<small>12%</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.dashboard.under_treatment_helper') }}">
                            <span class="info-box-icon bg-warning-gradient elevation-1"><i
                                    class="fas fa-procedures"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ trans('global.dashboard.under_treatment') }}</span>
                                <span class="info-box-number">41,410 &nbsp;<small>12%</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.dashboard.diseased_helper') }}">
                            <span class="info-box-icon bg-danger-gradient elevation-1"><i class="fas fa-bed"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ trans('global.dashboard.diseased') }}</span>
                                <span class="info-box-number">41,410 &nbsp;<small>12%</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{trans('global.dashboard.daily_chart.header')}}</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" id="invoke_line"
                                               class="dropdown-item">{{trans('global.dashboard.daily_chart.line_chart')}}</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="#" id="invoke_bar"
                                               class="dropdown-item">{{trans('global.dashboard.daily_chart.bar_chart')}}</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            <strong>{{trans('global.dashboard.daily_chart.daily_range')}}</strong>
                                        </p>

                                        <div class="chart">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="dailyChart" height="180" style="height: 180px;"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                {{--<div class="col-md-4">--}}
                                {{--<p class="text-center">--}}
                                {{--<strong>Goal Completion</strong>--}}
                                {{--</p>--}}

                                {{--<div class="progress-group">--}}
                                {{--Add Products to Cart--}}
                                {{--<span class="float-right"><b>160</b>/200</span>--}}
                                {{--<div class="progress progress-sm">--}}
                                {{--<div class="progress-bar bg-primary" style="width: 80%"></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.progress-group -->--}}

                                {{--<div class="progress-group">--}}
                                {{--Complete Purchase--}}
                                {{--<span class="float-right"><b>310</b>/400</span>--}}
                                {{--<div class="progress progress-sm">--}}
                                {{--<div class="progress-bar bg-danger" style="width: 75%"></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                {{--<!-- /.progress-group -->--}}
                                {{--<div class="progress-group">--}}
                                {{--<span class="progress-text">Visit Premium Page</span>--}}
                                {{--<span class="float-right"><b>480</b>/800</span>--}}
                                {{--<div class="progress progress-sm">--}}
                                {{--<div class="progress-bar bg-success" style="width: 60%"></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                {{--<!-- /.progress-group -->--}}
                                {{--<div class="progress-group">--}}
                                {{--Send Inquiries--}}
                                {{--<span class="float-right"><b>250</b>/500</span>--}}
                                {{--<div class="progress progress-sm">--}}
                                {{--<div class="progress-bar bg-warning" style="width: 50%"></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.progress-group -->--}}
                                {{--</div>--}}
                                <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i> 17%</span>
                                            <h5 class="description-header">6</h5>
                                            <span
                                                class="description-text">{{trans('global.dashboard.daily_chart.global_total')}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-warning"><i
                                                    class="fas fa-caret-left"></i> 1%</span>
                                            <h5 class="description-header">3</h5>
                                            <span
                                                class="description-text">{{trans('global.dashboard.daily_chart.global_recovered')}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i> 20%</span>
                                            <h5 class="description-header">24,813.53</h5>
                                            <span
                                                class="description-text">{{trans('global.dashboard.daily_chart.global_treatment')}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-danger"><i
                                                    class="fas fa-caret-down"></i> 18%</span>
                                            <h5 class="description-header">1200</h5>
                                            <span
                                                class="description-text">{{trans('global.dashboard.daily_chart.global_diseased')}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">
                        <!-- MAP & BOX PANE -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('global.dashboard.map.header')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-1">
                                <div class="d-md-flex">
                                    <div class="p-1 flex-fill" style="overflow: hidden">
                                        <div class="row justify-content-center">
                                        {{--<div class="col-12 col-md-7">--}}
                                        <!-- Map will be created here -->
                                            <div id="world-map-markers" style="width: 300px; overflow: hidden">
                                                <div class="map"></div>
                                            </div>
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    {{--<div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">--}}
                                    {{--<div class="description-block mb-4">--}}
                                    {{--<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>--}}
                                    {{--<h5 class="description-header">8390</h5>--}}
                                    {{--<span class="description-text">Visits</span>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.description-block -->--}}
                                    {{--<div class="description-block mb-4">--}}
                                    {{--<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>--}}
                                    {{--<h5 class="description-header">30%</h5>--}}
                                    {{--<span class="description-text">Referrals</span>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.description-block -->--}}
                                    {{--<div class="description-block">--}}
                                    {{--<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>--}}
                                    {{--<h5 class="description-header">70%</h5>--}}
                                    {{--<span class="description-text">Organic</span>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.description-block -->--}}
                                    {{--</div><!-- /.card-pane-right -->--}}
                                </div><!-- /.d-md-flex -->
                            </div>
                            <!-- /.card-body -->
                        </div>


                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">{{trans('global.dashboard.patient_report.header')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0 table table-bordered table-striped table-hover datatable">
                                        <thead>
                                        <tr>
                                            <th>{{trans('global.dashboard.patient_report.alias')}}</th>
                                            <th>{{trans('global.dashboard.patient_report.cluster')}}</th>
                                            <th>{{trans('global.dashboard.patient_report.status')}}</th>
                                            <th>{{trans('global.dashboard.patient_report.exposure_type')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>#01</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-danger">Confirmed</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Imported Case from China
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#02</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-danger">Confirmed</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Sri lankan from Italy
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#03</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-danger">Confirmed</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Sri lankan from Italy
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#04</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-danger">Confirmed</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Sri lankan from Italy
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#05</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-warning">Under Quarantine</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Sri lankan from Italy
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#06</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-success">Recovered</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Sri lankan from Italy
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#06</td>
                                            <td>Colombo</td>
                                            <td><span class="badge badge-success">Recovered</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    Exposure to foreign group
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <!-- Info Boxes Style 2 -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('global.dashboard.gender_chart.header')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChart" height="500"></canvas>
                                        </div>
                                        <!-- ./chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li>
                                                <i class="far fa-circle text-danger"></i> {{trans('global.dashboard.gender_chart.male')}}
                                            </li>
                                            <li>
                                                <i class="far fa-circle text-success"></i> {{trans('global.dashboard.gender_chart.female')}}
                                            </li>
                                            <li>
                                                <i class="far fa-circle text-warning"></i> {{trans('global.dashboard.gender_chart.unknown')}}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-white p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{trans('global.dashboard.gender_chart.male')}}                                            <span class="float-right text-danger">
                                                <i class="fas fa-arrow-down text-sm"></i>
                                            12%</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{trans('global.dashboard.gender_chart.female')}}                                            <span class="float-right text-success">
                                                <i class="fas fa-arrow-up text-sm"></i> 4%
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{trans('global.dashboard.gender_chart.unknown')}}                                            <span class="float-right text-warning">
                                                <i class="fas fa-arrow-left text-sm"></i> 0%
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.footer -->
                        </div>
                        <!-- /.card -->

                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('global.dashboard.messages.title')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <p>This is a sample message</p>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <p>This is a sample message</p>
                                    </li>
                                    <li class="item">
                                        <p>This is a sample message</p>
                                    </li>
                                    <li class="item">
                                        <p>This is a sample message</p>
                                    </li>
                                    <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">{{trans('global.dashboard.messages.view_all')}}</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var salesChartCanvas = $('#dailyChart').get(0).getContext('2d')

        var salesChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'New Cases',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90,28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Recovered Patients',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40,28, 48, 40, 19, 86, 27, 90]
                },
            ]
        }

        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas, {
                type: 'bar',
                data: salesChartData,
                options: salesChartOptions
            }
        );

        //---------------------------
        //- END MONTHLY SALES CHART -
        //---------------------------

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: [
                'Male',
                'Female',
                'Unknown',
            ],
            datasets: [
                {
                    data: [700, 500, 400],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
                }
            ]
        }
        var pieOptions = {
            legend: {
                display: false
            }
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })

        //-----------------
        //- END PIE CHART -
        //-----------------

        /* jVector Maps
         * ------------
         * Create a world map with markers
         */

        $("#world-map-markers").mapael({
            map: {
                name: "sri_lanka"
                // Enable zoom on the map
                , zoom: {
                    enabled: true,
                    maxLevel: 10
                }
                // Set default plots and areas style
                , defaultPlot: {
                    attrs: {
                        fill: "#004a9b"
                        , opacity: 0.6
                    }
                    , attrsHover: {
                        opacity: 1
                    }
                    , text: {
                        attrs: {
                            fill: "#505444"
                        }
                        , attrsHover: {
                            fill: "#d3d2cf"
                        }
                    }
                }
                ,
            },


            // Add some plots on the map
            plots: {
                // SVG Plot Star
                'Limoge': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 30,
                    height: 30,
                    latitude: 7.9271,
                    longitude: 79.8612,
                    tooltip: {content: "<span style=\"font-weight:bold;\">{{trans('global.dashboard.map.hospital')}} :</span> Lyon"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                // Circle plot
                'lyon': {
                    type: "circle",
                    size: 30,
                    latitude: 6.9271,
                    longitude: 79.8812,
                    value: 40,
                    attrs: {
                        opacity: 1,
                        fill: "#840d15"
                    },
                    tooltip: {content: "<span style=\"font-weight:bold;\">{{trans('global.dashboard.map.cluster')}} :</span>"},
                    text: {content: "Colombo"}
                },
                // Square plot
                'rennes': {
                    type: "square",
                    size: 20,
                    latitude: 48.114166666667,
                    longitude: -1.6808333333333,
                    tooltip: {content: "<span style=\"font-weight:bold;\">{{trans('global.dashboard.map.city')}} :</span> Rennes"},
                    text: {content: "Rennes"}
                },

                // Plot positioned by x and y instead of latitude, longitude
                'legend_hospital': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 30,
                    height: 30,
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    },
                    x: 400,
                    y: 100,
                    text: {
                        content: "{{trans('global.dashboard.map.hospital')}}"
                        , position: "left"
                        , attrs: {"font-size": 14, fill: "#004a9b", opacity: 0.6}
                        , attrsHover: {fill: "#004a9b", opacity: 1}
                    },
                },
                'legend_cluster': {
                    type: "circle",
                    size: 20,
                    attrs: {
                        opacity: 1,
                        fill: "#d30e3d"
                    },
                    x: 400,
                    y: 135,
                    text: {
                        content: "{{trans('global.dashboard.map.cluster')}}"
                        , position: "left"
                        , attrs: {"font-size": 14, fill: "#004a9b", opacity: 0.6}
                        , attrsHover: {fill: "#004a9b", opacity: 1}
                    },
                },
            }
        });
        $('.datatable:not(.ajaxTable)').DataTable();

    </script>
@endsection
