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
                <p>You're looking at an example modal on the Entities page.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
            </div>
        </div>
    </div>
</div>
@endsection


