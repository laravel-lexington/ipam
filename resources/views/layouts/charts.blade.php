<?php
/**
 * Created by PhpStorm.
 * User: tarle
 * Date: 7/1/2016
 * Time: 7:44 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>

        Overview &middot;

    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">

    <link href="{{ elixir('css/toolkit-inverse.css') }}" rel="stylesheet">


    <link href="{{ elixir('css/application.css') }}" rel="stylesheet">

    <style>
        /* note: this is a hack for ios iframe for bootstrap themes shopify page */
        /* this chunk of css is not part of the toolkit :) */
        body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
        }
    </style>
</head>


<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3 sidebar">
            <nav class="sidebar-nav">
                <div class="sidebar-header">
                    <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm">
                        <span class="sr-only">Toggle nav</span>
                    </button>
                    <a class="sidebar-brand img-responsive" href="index.html">
                        <span class="icon icon-leaf sidebar-brand-icon"></span>
                    </a>
                </div>

                <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">

                    <form class="sidebar-form">
                        <input class="form-control" type="text" placeholder="Search...">
                        <button type="submit" class="btn-link">
                            <span class="icon icon-magnifying-glass"></span>
                        </button>
                    </form>

                    <!--dashboard-goes-here-->
                    <ul class="nav nav-pills nav-stacked">
                        <li class="nav-header">Dashboards</li>

                        @foreach($dashboards as $key => $value)

                        <li id="{{ $key }}">
                            <a href="{{ $value }}">{{ $key }}</a>
                        </li>

                        @endforeach

                        <li class="nav-header">More</li>

                        @foreach($more as $key => $value)
                        <li id="{{ $key }}">
                            <a href="{{ $value }}">
                                {{ $key }}
                            </a>
                        </li>

                        @endforeach

                    </ul>

                    <hr class="visible-xs m-t">
                </div>
            </nav>
        </div>
        <div class="col-sm-9 content">
            <div class="dashhead">
                <div class="dashhead-titles">
                    <h6 class="dashhead-subtitle">Dashboards</h6>
                    <h2 class="dashhead-title">Overview</h2>
                </div>

                <div class="btn-toolbar dashhead-toolbar">
                    <div class="btn-toolbar-item input-with-icon">
                        <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                        <span class="icon icon-calendar"></span>
                    </div>
                </div>
            </div>

            <hr class="m-t">

            <div class="row text-center m-t-lg">

                @foreach($charts as $chart)
                <div class="col-sm-4 m-b-md">
                    <div class="w-lg m-x-auto">
                        <canvas
                                class="{{ $chart['class'] }}"
                                width="{{ $chart['width'] }}" height="{{ $chart['height'] }}"
                                data-chart="{{ $chart['dataChart'] }}"
                                data-value="{{ $chart['dataValue'] }}"
                                data-segment-stroke-color="{{ $chart['dataSegmentStrokeColor'] }}">
                        </canvas>
                    </div>
                    <strong class="text-muted">{{ $chart['name'] }}</strong>
                    <h3>{{ $chart['chartHeading'] }}</h3>
                </div>
                @endforeach

            </div>

            <div class="hr-divider m-t-md m-b">
                <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
            </div>

            <div class="row statcards">
                <div class="col-sm-6 col-lg-3 m-b">
                    <div class="statcard statcard-success">
                        <div class="p-a">
                            <span class="statcard-desc">Page views</span>
                            <h2 class="statcard-number">
                                12,938
                                <small class="delta-indicator delta-positive">5%</small>
                            </h2>
                            <hr class="statcard-hr m-b-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[28,68,41,43,96,45,100]}]" data-labels="['a','b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 m-b">
                    <div class="statcard statcard-danger">
                        <div class="p-a">
                            <span class="statcard-desc">Downloads</span>
                            <h2 class="statcard-number">
                                758
                                <small class="delta-indicator delta-negative">1.3%</small>
                            </h2>
                            <hr class="statcard-hr m-b-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[4,34,64,27,96,50,80]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 m-b">
                    <div class="statcard statcard-info">
                        <div class="p-a">
                            <span class="statcard-desc">Sign-ups</span>
                            <h2 class="statcard-number">
                                1,293
                                <small class="delta-indicator delta-positive">6.75%</small>
                            </h2>
                            <hr class="statcard-hr m-b-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[12,38,32,60,36,54,68]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 m-b">
                    <div class="statcard statcard-warning">
                        <div class="p-a">
                            <span class="statcard-desc">Downloads</span>
                            <h2 class="statcard-number">
                                758
                                <small class="delta-indicator delta-negative">1.3%</small>
                            </h2>
                            <hr class="statcard-hr m-b-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline" data-chart="spark-line" data-value="[{data:[43,48,52,58,50,95,100]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
            </div>

            <hr class="m-t">

            <div class="row">
                <div class="col-md-6 m-b-md">
                    <div class="list-group">
                        <h4 class="list-group-header">
                            Countries
                        </h4>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 62.4%;"></span>
                            <span class="pull-right text-muted">62.4%</span>
                            United States
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 15.0%;"></span>
                            <span class="pull-right text-muted">15.0%</span>
                            India
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 5.0%;"></span>
                            <span class="pull-right text-muted">5.0%</span>
                            United Kingdom
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 5.0%;"></span>
                            <span class="pull-right text-muted">5.0%</span>
                            Canada
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 4.5%;"></span>
                            <span class="pull-right text-muted">4.5%</span>
                            Russia
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 2.3%;"></span>
                            <span class="pull-right text-muted">2.3%</span>
                            Mexico
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 1.7%;"></span>
                            <span class="pull-right text-muted">1.7%</span>
                            Spain
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 1.5%;"></span>
                            <span class="pull-right text-muted">1.5%</span>
                            France
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 1.4%;"></span>
                            <span class="pull-right text-muted">1.4%</span>
                            South Africa
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="list-group-progress" style="width: 1.2%;"></span>
                            <span class="pull-right text-muted">1.2%</span>
                            Japan
                        </a>

                    </div>
                    <a href="#" class="btn btn-primary-outline p-x">All countries</a>
                </div>
                <div class="col-md-6 m-b-md">
                    <div class="list-group">
                        <h4 class="list-group-header">
                            Most visited pages
                        </h4>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">3,929,481</span>
                            / (Logged out)
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">1,143,393</span>
                            / (Logged in)
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">938,287</span>
                            /tour
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">749,393</span>
                            /features/something
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">695,912</span>
                            /features/another-thing
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">501,938</span>
                            /users/username
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">392,842</span>
                            /page-title
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">298,183</span>
                            /some/page-slug
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">193,129</span>
                            /another/directory/and/page-title
                        </a>

                        <a class="list-group-item" href="#">
                            <span class="pull-right text-muted">93,382</span>
                            /one-more/page/directory/file-name
                        </a>

                    </div>
                    <a href="#" class="btn btn-primary-outline p-x">View all pages</a>
                </div>
            </div>

            <div class="list-group">
                <h4 class="list-group-header">
                    Devices and resolutions
                </h4>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">3,929,481</span>
                    Desktop (1920x1080)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">1,143,393</span>
                    Desktop (1366x768)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">938,287</span>
                    Desktop (1440x900)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">749,393</span>
                    Desktop (1280x800)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">695,912</span>
                    Tablet (1024x768)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">501,938</span>
                    Tablet (768x1024)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">392,842</span>
                    Phone (320x480)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">298,183</span>
                    Phone (720x450)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">193,129</span>
                    Desktop (2560x1080)
                </a>

                <a class="list-group-item" href="#">
                    <span class="pull-right text-muted">93,382</span>
                    Desktop (2560x1600)
                </a>

            </div>
            <a href="#" class="btn btn-primary-outline p-x">View all devices</a>

        </div>
    </div>
</div>

<div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Example modal</h4>
            </div>
            <div class="modal-body">
                <p>You're looking at an example modal in the dashboard theme.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ elixir('js/jquery.min.js') }}"></script>
<script src="{{ elixir('js/chart.js') }}"></script>
<script src="{{ elixir('js/tablesorter.min.js') }}"></script>
<script src="{{ elixir('js/toolkit.js') }}"></script>
<script src="{{ elixir('js/application.js') }}"></script>
<script>
    // execute/clear BS loaders for docs
    $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
</script>
<script>
    $(document).ready(function(){
        $('#Overview').addClass('active');
    });
</script>
</body>
</html>


