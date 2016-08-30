<?php
/**
 * Created by IntelliJ IDEA.
 * User: charlescombs
 * Date: 8/20/16
 * Time: 1:48 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
</head>

<body>
@section('side-bar')
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


                    <form class="sidebar-form" method="post" action="/subnets">
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
<!--                    <h6 class="dashhead-subtitle">Dashboards, {//{ /$binary[/'binary'] }//}</h6>-->
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

            <div class="flextable table-actions">
                <div class="flextable-item flextable-primary">
                    <div class="btn-toolbar-item input-with-icon">
                        <input type="text" class="form-control input-block" placeholder="Search orders">
                        <span class="icon icon-magnifying-glass"></span>
                    </div>
                </div>
                <div class="flextable-item">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary-outline">
                            <span class="icon icon-pencil"></span>
                        </button>
                        <button type="button" class="btn btn-primary-outline">
                            <span class="icon icon-erase"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-full">
                <div class="table-responsive">
                    @yield('table')
                </div>
            </div>

            <div class="text-center">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    @yield('content')
</div>
@show

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
</body>
</html>


