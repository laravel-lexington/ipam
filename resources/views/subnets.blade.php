<?php
/**
 * Created by IntelliJ IDEA.
 * User: charlescombs
 * Date: 8/20/16
 * Time: 1:48 PM
 */
?>
@extends('layouts.tables')

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lorem Ipsum">
    <meta name="keywords" content="subnet, subnets, tables">
    <meta name="author" content="Charles Combs">

    <title>

        Subnets &middot;

    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">

    <link href="{{ $uiTheme }}" rel="stylesheet">


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
@endsection

<!--<body>-->
@section('table')
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
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('modal')
    <div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Example modal</h4>
            </div>
            <div class="modal-body">
                <p>You're looking at an example modal on the subnet dashboard.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
            </div>
        </div>
    </div>
    @yield('footer')
</div>
@endsection
