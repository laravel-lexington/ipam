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
    @yield('head')
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
                    <a class="sidebar-brand img-responsive" href="../index.html">
                        <img src="favicon.png"/>
                    </a>
                </div>

                <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">


                    <form class="sidebar-form" method="post" action="/equipment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="input-group">
                                <div class="container-fluid">
                                    <span class="input-group-btn">
                                        <button name="button" class="btn btn-primary-outline form-control" value="dark" type="submit">
                                            <span class="icon icon-light-down">dark-ui</span>
                                        </button>
                                    </span>
                                    <span class="input-group-btn">
                                        <button name="button" class="btn btn-warning-outline form-control" value="light" type="submit">
                                            <span class="icon icon-light-up">light-ui</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="sidebar-form">
                        <input class="form-control" type="text" placeholder="Search...">
                        <button type="submit" class="btn-link">
                            <span class="icon icon-magnifying-glass"></span>
                        </button>
                    </form>

                    <ul class="nav nav-pills nav-stacked">

                        <li class="nav-header">Dashboards</li>

                        @foreach($menu as $key => $value)
                        <li id="{{ $key }}">
                            <a href="{{ $value }}">{{ $key }}</a>
                        </li>
                        @endforeach


                        <li class="nav-header">More</li>

                        @foreach($submenu as $key => $value)
                        <li id="{{ $key }}">
                            <a href="{{ $value }}">
                                {{ $key }}
                            </a>
                        </li>
                        @endforeach
                        <li>
                            <a href="#docsModal" data-toggle="modal">
                                Example modal
                            </a>
                        </li>

                    </ul>
                    <hr class="visible-xs m-t">
                </div>
            </nav>
        </div>
        <div class="col-sm-9 content">
            <div class="dashhead">
                <div class="dashhead-titles">
                    <h6 class="dashhead-subtitle">Dashboards</h6>

                    <h2 class="dashhead-title"> {{ $title['title'] }}</h2>
                </div>

                <div class="btn-toolbar dashhead-toolbar">
                    <div class="btn-toolbar-item input-with-icon">
                        <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                        <span class="icon icon-calendar"></span>
                    </div>
                </div>
            </div>

            <hr class="m-t">

                @yield('tier1content')

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

                    @yield('tier3list1')

                </div>
                <div class="col-md-6 m-b-md">

                    @yield('tier3list2')

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 m-b-md">

                @yield('tier3list3')

                </div>
            </div>

        </div>
    </div>
</div>

@yield('modal')

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


