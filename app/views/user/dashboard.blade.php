@extends('layouts.master')
@section('header-js')
    {{ HTML::script('js/highcharts.js') }}
    {{ HTML::script('js/highcharts-exporting.js') }}
    {{ HTML::script('js/knob.js') }}
@stop

@section('content')
<h1>Dashboard <small>Hi, {{ $user->first_name ?: $user->username }}</small></h1>
<hr>
<div class="row">

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Site-wide Trends</h3>
            </div>
            <div class="panel-body">
                <div id="trends"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h1><i class="fa fa-file-text"></i> <span id="reports">0</span> Reports</h1>
                    </div>
                    <div class="col-md-6">
                        <h1><i class="fa fa-users"></i> <span id="users">0</span> Users</h1>
                    </div>
                </div>
            </div>
        </div>

        <h3>Notifications <span class="badge">2</span></h3>

        <div class="list-group">
            <a href="#" class="list-group-item">Porta ac consectetur ac <span class="label label-default pull-right">6 hours ago</span></a>
            <a href="#" class="list-group-item">Vestibulum at eros <span class="label label-default pull-right">2 days ago</span></a>
        </div>

    </div>

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Your Summary</h3>
            </div>
            <div class="dashboard-knob-panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="reports">
                        <div class="knob-content"><strong>Reports</strong></div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="feedback">
                        <div class="knob-content"><strong>Feedback</strong></div>
                    </div>
                </div>
            </div>
        </div>

        <h3>Timeline</h3>
        <ul class="list-group">
            <li class="list-group-item">Dapibus ac facilisis in <span class="label label-default pull-right">3 mins ago</span></li>
            <li class="list-group-item">Porta ac consectetur ac <span class="label label-default pull-right">1 hour ago</span></li>
        </ul>

        <h3>Favourites <span class="badge">2</span></h3>
        <div class="list-group">
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>

        <h3>Network Updates</h3>
        <ul class="list-group">
            <li class="list-group-item">Dapibus ac facilisis in <span class="label label-default pull-right">3 mins ago</span></li>
            <li class="list-group-item">Porta ac consectetur ac <span class="label label-default pull-right">1 hour ago</span></li>
        </ul>

        <h3>Connections <span class="badge">2</span></h3>
        <div class="list-group">
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>

    </div>

</div>

@stop

@section('footer-js')
    {{ HTML::script('js/animateNumber.min.js') }}
    <script>
        var users = {{ json_encode($users) }};
        var reports = {{ json_encode($reports) }};
        var user_reports = {{ json_encode($user_reports) }};
        var feedback = {{ json_encode($feedback) }};
    </script>
@stop