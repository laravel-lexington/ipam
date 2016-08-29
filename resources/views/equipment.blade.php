<?php
/**
 * Created by PhpStorm.
 * User: tarle
 * Date: 7/1/2016
 * Time: 7:44 PM
 */
?>
@extends('layouts.charts')

@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Lorem Ipsum">
<meta name="keywords" content="computers, printers, placeholders, network, entities, charts">
<meta name="author" content="Charles Combs">

<title>

    Equipment &middot;

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
@endsection

@section('tier1content')
<div class="row text-center m-t-lg">

    @foreach($chartCollections as $chartCollection)
    <div class="col-sm-4 m-b-md">
        <div class="w-lg m-x-auto">
            <canvas
                class="{{ $chartCollection['class'] }}"
                width="{{ $chartCollection['width'] }}" height="{{ $chartCollection['height'] }}"
                data-chart="{{ $chartCollection['dataChart'] }}"
                data-value="{{ $chartCollection['dataValue'] }}"
                data-segment-stroke-color="{{ $chartCollection['dataSegmentStrokeColor'] }}">
            </canvas>
        </div>
        <strong class="text-muted">{{ $chartCollection['name'] }}</strong>
        <h3>{{ $chartCollection['chartHeading'] }}</h3>
    </div>
    @endforeach

</div>
@endsection

@section('tier3list1')
    <div class="list-group">
        <h4 class="list-group-header">
            <!--printers-->
            Computers
        </h4>

        @foreach($listComputers as $listComputer)
        <a class="list-group-item" href="#">
            <!--progress span not needed here-->
            <!--<span class="list-group-progress" style="width: 62.4%;"></span>-->
            <!--???printer subnet name or ip address???-->
            <span class="pull-right text-muted">{{$listComputer['ip_address']}}</span>
            <!--printer name-->
            {{$listComputer['mac_address']}}
        </a>
        @endforeach

    </div>
    <a href="#" class="btn btn-primary-outline p-x">All Computers</a>
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
                <p>You're looking at an example modal on the Equipment page.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
            </div>
        </div>
    </div>
</div>
@endsection


