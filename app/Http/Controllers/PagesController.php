<?php

namespace App\Http\Controllers;

use App\Subnets;
use App\Printers;
use App\Computers;
use App\Placeholders;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function subnetsTable(){

        //$columnHeaders = $subnets->keys();

        //$object = var_dump($columnHeaders);

        $title = [

            'title'=> 'Subnets'

            ];

        $dashboards = [

            'Sites' => '../tables/sites',
            'Subnets' => '../subnets',
            'Equipment' => '../equipment',
            '...' => '../tables/...',
        ];

        $more = [
            'Toolkit-docs' => '',
            'Bootstrap-docs' => '',
            'Light-UI' => '../light/layout',
        ];

        $subnets = Subnets::all();

       $ip = [

           'ip' => long2ip(rand(0, "4294967295")),
           'long' => ip2long('255.255.255.255'),

        ];

        $binary = [

            //below are not valid
            //'binary' => inet_ntop('255.255.255.255')
            //'binary' => inet_ntop('11111111111111111111111111111111')

        ];

        //TODO: create subnets directory and subnets/index.blade.php
        return view('subnets')->with('title', $title)->with('dashboards', $dashboards)->with('more', $more)->with('subnets', $subnets);//->with('binary', $binary);

    }

    //stores an instance of Subnets as a new row in the subnets table
    public function storeSubnets(Request $request){

        $subnets = new Subnets;

        $subnets->id = $request->id;
        $subnets->site_id = $request->site_id;
        $subnets->subnet_node_id = $request->subnet_node_id;
        $subnets->ip_address = $request->ip_address;
        $subnets->prefix_length = $request->prefix_length;
        $subnets->name = $request->name;
        $subnets->default_gateway = $request->default_gateway;
        $subnets->created_at = $request->created_at;

        $subnets->save();

    }


    public function equipmentCharts(){

        $title = [

            'title'=> 'Equipment'

        ];

        $dashboards = [

            'Sites' => '../tables/sites',
            'Subnets' => '../subnets',
            'Equipment' => '../tables/equipment',
            '...' => '../tables/...',
        ];

        $more = [
            'Toolkit-docs' => '',
            'Bootstrap-docs' => '',
            'Light-UI' => '../light/layout',
        ];

        $charts = collect(
            [
                [
                    'class' => 'ex-graph',
                    'width' => '200',
                    'height' => '200',
                    'dataChart' => 'doughnut',
                    'dataValue' => "[{ value: 100, color: '#1ca8dd', label: 'Recurring' }, { value: 260, color: '#1bc98e', label: 'New' }]",
                    'dataSegmentStrokeColor' => '#252830',
                    'name' => 'Venkman',
                    'chartHeading' => 'Peter vs Dana'
                ],
                [
                    'class' => 'ex-graph',
                    'width' => '200',
                    'height' => '200',
                    'dataChart' => 'doughnut',
                    'dataValue' => "[{ value: 300, color: '#1ca8dd', label: 'Slimer' }, { value: 60, color: '#1bc98e', label: 'Ghostbusters' }]",
                    'dataSegmentStrokeColor' => '#252830',
                    'name' => 'Stantz',
                    'chartHeading' => 'Ray vs Slimer'
                ],
                //TODO make loop ???
                [
                    'class' => 'ex-graph',
                    'width' => '200',
                    'height' => '200',
                    'dataChart' => 'doughnut',
                    //'dataValue' => $dataValue,
                    'dataValue' => "[{ value: 180, color: '#1ca8dd', label: 'Slime' }, { value: 180, color: '#1bc98e', label: 'Ghostbusters' }]",
                    'dataSegmentStrokeColor' => '#252830',
                    //'name' => $name,
                    'name' => 'Stantz',
                    //'chartHeading' => $chartHeading,
                    'chartHeading' => 'Egon vs Marshmallows'
                ]
            ]);

        return view('equipment')->with('title', $title)->with('dashboards', $dashboards)->with('more', $more)->with('charts', $charts);
    }

}
