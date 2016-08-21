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
                    <form class="sidebar-form">
                        <input class="form-control" type="text" placeholder="Search...">
                        <button type="submit" class="btn-link">
                            <span class="icon icon-magnifying-glass"></span>
                        </button>
                    </form>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="nav-header">Dashboards</li>
                        <li >
                            <a href="../index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="../subnetsInherits">Subnets</a>
                        </li>
                        <li >
                            <a href="../fluid/index.html">###</a>
                        </li>
                        <li >
                            <a href="../icon-nav/index.html">@@@</a>
                        </li>

                        <li class="nav-header">More</li>
                        <li >
                            <a href="../docs/index.html">
                                Toolkit docs
                            </a>
                        </li>
                        <li>
                            <a href="http://getbootstrap.com" target="blank">
                                Bootstrap docs
                            </a>
                        </li>
                        <li >
                            <a href="../light/index.html">Light UI</a>
                        </li>
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
                    <h2 class="dashhead-title"> { { { Subnets } } }</h2>
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

            <!--<div>-->
            <!--{/{ $object }}-->
            <!--/@/yield('thing')-->
            <!--</div>-->

            <div class="table-full">
                <div class="table-responsive">
                    <table class="table" data-sort="table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="select-all" id="selectAll"></th>
                            <th>id</th>
                            <th>site_id</th>
                            <th>subnet_node_id</th>
                            <th>ip_address</th>
                            <th>prefix_length</th>
                            <th>name</th>
                            <th>default_gateway</th>
                            <th>created_at</th>
                            <!--<th><input type="checkbox" class="select-all" id="selectAll"></th>-->
                            <!--/@/foreach($columnHeaders as $header)-->
                            <!--<th>{/{ $header }}</th>-->
                            <!--/@/endforeach-->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subnets as $subnet)
                        <tr>
                            <td><input type="checkbox" class="select-row"></td>
                            <td><a href="#">{{ $subnet->id }}</a></td>
                            <td>{{ $subnet->site_id }}</td>
                            <td>{{ $subnet->subnet_node_id }}</td>
                            <td>{{ $subnet->ip_address }}</td>
                            <td>{{ $subnet->prefix_length }}</td>
                            <td>{{ $subnet->name }}</td>
                            <td>{{ $subnet->default_gateway }}</td>
                            <td>{{ $subnet->created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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


