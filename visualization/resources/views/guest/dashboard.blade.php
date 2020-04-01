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
                                <span class="info-box-number"><big>{{$total_covid_positives}}</big></span>
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
                                <span class="info-box-number"><big>{{$total_recovered}}</big> <small>{{$total_recovered*100/$total_covid_positives}}%</small></span>
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
                                <span class="info-box-number"><big>{{$total_covid_positives -$total_recovered - $total_diseased}}</big> <small>{{($total_covid_positives -$total_recovered - $total_diseased)*100/$total_covid_positives}}%</small></span>
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
                                <span class="info-box-number"><big>{{$total_diseased}} </big> <small>{{$total_diseased*100/$total_covid_positives}}%</small></span>
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
                                            <canvas id="dailyChart" height="300" style="height: 300px;"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
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
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{trans('global.dashboard.age_chart.header')}}</h5>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            <strong>{{trans('global.dashboard.age_chart.center_message')}}</strong>
                                        </p>

                                        <div class="chart">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="age_chart" height="300" style="height: 300px;"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{trans('global.dashboard.district_chart.header')}}</h5>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            <strong>{{trans('global.dashboard.district_chart.center_message')}}</strong>
                                        </p>

                                        <div class="chart">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="district_chart" height="300" style="height: 300px;"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
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
                                        @foreach($patients as $patient)
                                            <tr>
                                                <td>{{$patient->alias}}</td>
                                                <td>{{$patient->clusterQC->cluster_name}}</td>
                                                <td>
                                                    <span class="badge {{$patient->patientStatuses()->latest('state')->first()->state =='QUARANTINE' ? 'badge-warning':''}} {{$patient->patientStatuses()->latest('state')->first()->state =='COVID_POSITIVE' ? 'badge-danger':''}} {{$patient->patientStatuses()->latest('state')->first()->state =='RECOVERED' ? 'badge-success':''}} {{$patient->patientStatuses()->latest('state')->first()->state =='DEAD' ? 'badge-success':''}}">
                                                        {{$patient->patientStatuses()->latest('state')->first()->state ?? ''}}
                                                    </span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                        {{$patient->exposure_state}}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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
                                <ul class="nav nav-pills flex-column"><li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <span class="float-right">
                                                {{trans('global.dashboard.gender_chart.percentage_today')}}
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{trans('global.dashboard.gender_chart.male')}}
                                            <span class="float-right" id="genderUpdateMale">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{trans('global.dashboard.gender_chart.female')}}
                                            <span class="float-right" id="genderUpdateFemale">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" >
                                            {{trans('global.dashboard.gender_chart.unknown')}}
                                            <span class="float-right" id="genderUpdateUnknown">
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
                                    @foreach($messages as $message)
                                        <li class="item">
                                            {{--<p>--}}
                                                @if(App::isLocale('en'))
                                                    <span class="badge badge-info label-many">{{$message->english}}</span>
                                                @elseif(App::isLocale('sin'))
                                                    <span class="badge badge-info">{{$message->sinhala}}</span>
                                                @elseif(App::isLocale('tam'))
                                                    <spap class="badge badge-info">{{$message->tamil}}</spap>
                                                @endif
                                            {{--</p>--}}
                                                <a href="{{$message->url}}" class="nav-link">
                                            <span class="float-right">
                                                {{trans('global.dashboard.messages.link')}}
                                            </span>
                                                </a>
                                                <p><span class="float-left">
                                                {{$message->created_at}}
                                            </span></p>
                                        </li>
                                        @endforeach
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

        var dates = {!! json_encode($dates) !!} ;
        var covid_positves = {!! json_encode($covid_positives) !!};
        var criticals = {!! json_encode($criticals) !!};
        var diseased = {!! json_encode($diseased) !!};
        var recovered = {!! json_encode($recovered) !!};
        var gender_count = {!! json_encode($gender_count) !!} ;

        var district_lables = {!! json_encode($districts) !!};
        var district_count = {!! json_encode($district_count) !!}

        var age_distribution_labels = {!! json_encode($age_distribution_labels) !!};
        var age_distribution = {!! json_encode($age_distribution) !!}

        var cumilative_cases = [];
        var total_cases_count = 0;
        for(var i =0; i<covid_positves.length;i++){
            total_cases_count += covid_positves[i];
            cumilative_cases[i] = total_cases_count;
        }
        var gender_count_today = {!! json_encode($gender_count_today) !!} ;

        if(!('MALE' in gender_count)){
            gender_count['MALE'] = 0;
        }
        if(!('FEMALE' in gender_count)){
            gender_count['FEMALE'] = 0;
        }
        if(!('UNKNOWN' in gender_count)){
            gender_count['UNKNOWN'] = 0;
        }
        if(!('MALE' in gender_count_today)){
            gender_count_today['MALE'] = 0;
        }
        if(!('FEMALE' in gender_count_today)){
            gender_count_today['FEMALE'] = 0;
        }
        if(!('UNKNOWN' in gender_count_today)){
            gender_count_today['UNKNOWN'] = 0;
        }
        var previousMalePercentage = gender_count['MALE']/total_cases_count;
        var previousFemalePercentage = gender_count['FEMALE']/total_cases_count;
        var previousUnknownPercentage = gender_count['UNKNOWN']/total_cases_count;

        var newMalePercentage = gender_count_today['MALE']/total_cases_count;
        var newFemalePercentage = gender_count_today['FEMALE']/total_cases_count;
        var newUnknownPercentage = gender_count_today['UNKNOWN']/total_cases_count;


        var dailyChartCanvas = $('#dailyChart').get(0).getContext('2d')

        var dailyChartData = {
            labels: dates, //['January', 'February', 'March', 'April', 'May', 'June', 'July','January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'COVID Positive',
                    backgroundColor: '#844a3c',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: covid_positves, //[28, 48, 40, 19, 86, 27, 90,28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Recovered Patients',
                    backgroundColor: '#11d124',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: recovered,//[65, 59, 80, 81, 56, 55, 40,28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Cumilative Case Count',
                    backgroundColor: '#114fd1',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: cumilative_cases,//[65, 59, 80, 81, 56, 55, 40,28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Diseased Patients',
                    backgroundColor: '#d10b26',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: diseased,//[65, 59, 80, 81, 56, 55, 40,28, 48, 40, 19, 86, 27, 90]
                },
            ]
        }

        var dailyChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var dailyChart = new Chart(dailyChartCanvas, {
                type: 'bar',
                data: dailyChartData,
                options: dailyChartOptions
            }
        );
        $('#invoke_line').click(function () {
            dailyChart.config.type = 'line';
            dailyChart.update();
        });
        $('#invoke_bar').click(function () {
            dailyChart.config.type = 'bar';
            dailyChart.update();
        });
        //---------------------------
        //- END MONTHLY DAILY CHART -
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
                    data: [gender_count['MALE'], gender_count['FEMALE'], gender_count['UNKNOWN']],
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
        });

        if(newMalePercentage > previousMalePercentage){
            $('#genderUpdateMale').addClass('text-danger');
            $('#genderUpdateMale').append('<i class="fas fa-arrow-up text-sm"></i>'+newMalePercentage +"%");
        } else if(newMalePercentage === previousMalePercentage){
            $('#genderUpdateMale').addClass('text-warning');
            $('#genderUpdateMale').append('<i class="fas fa-arrow-left text-sm"></i>'+newMalePercentage+"%");
        }else{
            $('#genderUpdateMale').addClass('text-success');
            $('#genderUpdateMale').append('<i class="fas fa-arrow-down text-sm"></i>'+newMalePercentage+"%");
        }
        if(newFemalePercentage > previousFemalePercentage){
            $('#genderUpdateFemale').addClass('text-danger');
            $('#genderUpdateFemale').append('<i class="fas fa-arrow-up text-sm"></i>'+newFemalePercentage+"%")
        } else if(newFemalePercentage === previousFemalePercentage){
            $('#genderUpdateFemale').addClass('text-warning');
            $('#genderUpdateFemale').append('<i class="fas fa-arrow-left text-sm"></i>'+newFemalePercentage+"%")
        }else{
            $('#genderUpdateFemale').addClass('text-success');
            $('#genderUpdateFemale').append('<i class="fas fa-arrow-down text-sm"></i>'+newFemalePercentage+"%")
        }
        if(newUnknownPercentage > previousUnknownPercentage){
            $('#genderUpdateUnknown').addClass('text-danger');
            $('#genderUpdateUnknown').append('<i class="fas fa-arrow-up text-sm"></i>'+newUnknownPercentage+"%")
        } else if(newUnknownPercentage === previousUnknownPercentage){
            $('#genderUpdateUnknown').addClass('text-warning');
            $('#genderUpdateUnknown').append('<i class="fas fa-arrow-left text-sm"></i>'+newUnknownPercentage+"%")
        }else{
            $('#genderUpdateUnknown').addClass('text-success');
            $('#genderUpdateUnknown').append('<i class="fas fa-arrow-down text-sm"></i>'+newUnknownPercentage+"%")
        }
        //-----------------
        //- END PIE CHART -
        //-----------------

        //-------------
        //- RADIAL AGE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var ageChartCanvas = $('#age_chart').get(0).getContext('2d')
        var ageData = {
            labels: age_distribution_labels,
            datasets: [
                {
                    data: age_distribution,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12','#2a5cf3','#18f3af'],
                }
            ]
        }
        var ageOptions = {
            legend: {
                display: true
            }
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var ageChart = new Chart(ageChartCanvas, {
            type: 'polarArea',
            data: ageData,
            options: ageOptions
        });
        /* jVector Maps
         * ------------
         * Create a world map with markers
         */
        //-----------------
        //- END RADIAL AGE CHART -
        //-----------------

        $("#world-map-markers").mapael({
            map: {
                name: "sri_lanka"
                // Enable zoom on the map
                , zoom: {
                    enabled: true,
                    maxLevel: 30
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
                'NIID': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 6.9225,
                    longitude: 79.9182,
                    tooltip: {content: "<span style=\"font-weight:bold;\">NIID {{trans('global.dashboard.map.hospital')}}</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'NHSL': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 6.9188,
                    longitude:79.8690,
                    tooltip: {content: "<span style=\"font-weight:bold;\">NHSL :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'TH Ragama': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 7.0291,
                    longitude: 79.9241,
                    tooltip: {content: "<span style=\"font-weight:bold;\">TH Ragama {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },'TH Karapitiya': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 6.0671,
                    longitude: 80.2261,
                    tooltip: {content: "<span style=\"font-weight:bold;\">TH Karapitiya {{trans('global.dashboard.map.hospital')}} :</span> "},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },'TH Anuradhapura': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 7.4818,
                    longitude: 80.3609,
                    tooltip: {content: "<span style=\"font-weight:bold;\">TH Anuradhapura {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },'TH Jafna': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 9.6627,
                    longitude: 80.0215,
                    tooltip: {content: "<span style=\"font-weight:bold;\">TH Jafna {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'NH Kandy': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 7.291418,
                    longitude:  80.636696,
                    tooltip: {content: "<span style=\"font-weight:bold;\">NH Kandy {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'NH Baticaloa': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 7.4236,
                    longitude: 81.4132,
                    tooltip: {content: "<span style=\"font-weight:bold;\">NH Baticaloa {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'DGH Gampaha': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 7.087310,
                    longitude: 80.014366,
                    tooltip: {content: "<span style=\"font-weight:bold;\">DGH Gampaha {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'DGH Negambo': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 7.2120,
                    longitude: 79.8490,
                    tooltip: {content: "<span style=\"font-weight:bold;\">DGH Negambo {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'TH Ratnapura': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 6.6827798,
                    longitude: 80.3991699,
                    tooltip: {content: "<span style=\"font-weight:bold;\">TH Rathnapura{{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'PGH Badulla': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 6.9918,
                    longitude: 81.0524,
                    tooltip: {content: "<span style=\"font-weight:bold;\">PGH Badulla {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                'LRH': {
                    type: "svg",
                    path: "M 24.267286,27.102843 15.08644,22.838269 6.3686216,27.983579 7.5874348,17.934248 0,11.2331 9.9341158,9.2868473 13.962641,0 l 4.920808,8.8464793 10.077199,0.961561 -6.892889,7.4136777 z",
                    width: 15,
                    height: 15,
                    latitude: 6.9177,
                    longitude: 79.8763,
                    tooltip: {content: "<span style=\"font-weight:bold;\">LRH {{trans('global.dashboard.map.hospital')}} :</span>"},
                    attrs: {
                        opacity: 1,
                        fill: "#1c841a"
                    }
                },
                // Circle plot
                @foreach($clusterQCsCount as $clusterQC)
                {!! json_encode($clusterQC->cluster_name) !!}: {
                    type: "circle",
                    size: 15,
                    latitude: {!! json_encode($clusterQC->lat) !!},
                    longitude: {!! json_encode($clusterQC->long) !!},
                    value: 40,
                    attrs: {
                        opacity: 1,
                        fill: "#840d15"
                    },
                    tooltip: {content: "<span style=\"font-weight:bold;\">"+'{{trans('global.dashboard.map.cluster')}}' +":" +{!! json_encode($clusterQC->cluster_name) !!} +"</span>"},
                    text: {content: {!! json_encode($clusterQC->cluster_name)!!} +':'+ '{!! json_encode($clusterQC->count) !!}'  }
                },
                @endforeach

                {{--// Square plot--}}
                {{--'rennes': {--}}
                    {{--type: "square",--}}
                    {{--size: 20,--}}
                    {{--latitude: 48.114166666667,--}}
                    {{--longitude: -1.6808333333333,--}}
                    {{--tooltip: {content: "<span style=\"font-weight:bold;\">{{trans('global.dashboard.map.city')}} :</span> Rennes"},--}}
                    {{--text: {content: "Rennes"}--}}
                {{--},--}}

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

        var districtChartCanvas = $('#district_chart').get(0).getContext('2d')

        var districtChartData = {
            labels: district_lables, //['January', 'February', 'March', 'April', 'May', 'June', 'July','January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Confirmed Cases in District',
                    backgroundColor: '#844a3c',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: district_count, //[28, 48, 40, 19, 86, 27, 90,28, 48, 40, 19, 86, 27, 90]
                },
            ]
        }

        var districtChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var districtChart = new Chart(districtChartCanvas, {
                type: 'bar',
                data: districtChartData,
                options: districtChartOptions
            }
        );
        $('.datatable:not(.ajaxTable)').DataTable();

    </script>
@endsection
