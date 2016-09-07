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

    <!--<link href="{/{ elixir('css/toolkit-inverse.css') }}" rel="stylesheet">-->
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
    <!--TODO: this list becomes a form-->
    <div class="list-group">
        <h4 class="list-group-header">
            <!--printers-->
            Computers
        </h4>

        @foreach($listComputers as $listComputer)
            <a class="list-group-item" href="#equipmentModal" data-toggle="modal" data-id="{{ $listComputer['id'] }}" data-subnet_id="{{ $listComputer['subnet_id'] }}" data-ip_address="{{ $listComputer['ip_address'] }}" data-mac_address="{{ $listComputer['mac_address'] }}" data-serial_number="{{ $listComputer['serial_number'] }}">
                <span class="pull-right text-muted">{{ $listComputer['ip_address'] }}</span>
                {{ $listComputer['mac_address'] }}
            </a>
        @endforeach

    </div>
    <a href="#" class="btn btn-primary-outline p-x">All Computers</a>
@endsection

@section('tier3list2')
    <!--TODO: this list becomes a form-->
    <div class="list-group">
        <h4 class="list-group-header">
            Printers
        </h4>

        @foreach($listPrinters as $listPrinter)
            <a class="list-group-item" href="#equipmentModal" data-toggle="modal" data-id="{{ $listPrinter['id'] }}" data-subnet_id="{{ $listPrinter['subnet_id'] }}" data-ip_address="{{ $listPrinter['ip_address'] }}" data-mac_address="{{ $listPrinter['mac_address'] }}" data-serial_number="{{ $listPrinter['serial_number'] }}">
                <span class="pull-right text-muted">{{ $listPrinter['ip_address'] }}</span>
                {{ $listPrinter['mac_address'] }}
            </a>
        @endforeach

    </div>
    <a href="#" class="btn btn-primary-outline p-x">All Printers</a>
@endsection

@section('tier3list3')
    <!--TODO: this list becomes a form-->
    <div class="list-group">
        <h4 class="list-group-header">
            Placeholders
        </h4>

        @foreach($listPlaceholders as $listPlaceholder)
            <a class="list-group-item" href="#equipmentModal" data-toggle="modal" data-id="{{ $listPlaceholder['id'] }}" data-subnet_id="{{ $listPlaceholder['subnet_id'] }}" data-ip_address="{{ $listPlaceholder['ip_address'] }}" data-mac_address="{{ $listPlaceholder['mac_address'] }}" data-serial_number="{{ $listPlaceholder['serial_number'] }}">
                <span class="pull-right text-muted">{{ $listPlaceholder['ip_address'] }}</span>
                {{ $listPlaceholder['mac_address'] }}
            </a>
        @endforeach

    </div>
    <a href="#" class="btn btn-primary-outline p-x">All Placeholders</a>
@endsection

@section('modal')
<div id="equipmentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="equipmentLabel"><span>Modal</span></h4>
            </div>
            <div class="modal-body">

            <form id="modalForm" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="equipmentId">Table ID</label>
                    <input type="text" class="form-control" name="id" id="equipmentId" disabled>
                </div>
                <div class="form-group">
                    <label for="equipmentSubnetId">Subnet ID</label>
                    <input type="text" class="form-control" name="subnet_id" id="equipmentSubnetId">
                </div>
                <div class="form-group">
                    <label for="equipmentIpAddress">IP Address</label>
                    <input type="text" class="form-control" name="ip_address" id="equipmentIpAddress">
                </div>
                <div class="form-group">
                    <label for="equipmentMacAddress">MAC Address</label>
                    <input type="text" class="form-control" name="mac_address" id="equipmentMacAddress">
                </div>
                <div class="form-group">
                    <label for="equipmentSerialNumber">Serial Number</label>
                    <input type="text" class="form-control" name="serial_number" id="equipmentSerialNumber">
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="notes">Notes</label>--}}
                    {{--<textarea name="body" class="form-control" id="notes"></textarea>--}}
                {{--</div>--}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
            </div>
        </div>
    </div>
</div>
@endsection


