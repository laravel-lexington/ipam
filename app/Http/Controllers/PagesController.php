<?php

namespace App\Http\Controllers;

use App\Models\Database\Subnets;
use App\Models\Database\Printers;
use App\Models\Database\Computers;
use App\Models\Database\Placeholders;
use App\Models\Page\Charts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//TODO split into Network and Equipment Controllers -> class is too big
class PagesController extends Controller
{

    var $uiTheme;

    var $menu = [
        'Sites' => '../sites',
        'Subnets' => '../subnets',
        'Equipment' => '../equipment',
    ];

    var $submenu = [
        'Computers' => '../equipment/computers',
        'Printers' => '../equipment/printers',
        'Placeholders' => '../equipment/placeholders',
    ];

    public function subnetsTable(Request $request)
    {


        $title = [

            'title' => 'Subnets'

        ];

        if ($request->button == "light"){
            $this->uiTheme = elixir('css/toolkit-light.css');
        }elseif ($request->button == "dark") {
            $this->uiTheme = elixir('css/toolkit-inverse.css');
        } else {
            $this->uiTheme = elixir('css/toolkit-inverse.css');
        }

        $uiTheme = $this->uiTheme;

        $menu = $this->menu;

        $submenu = $this->submenu;

        $subnets = Subnets::all();

        //TODO: create subnets directory and subnets/index.blade.php
        return view('subnets')->with('title', $title)->with('uiTheme', $uiTheme )->with('menu', $menu)->with('submenu', $submenu)->with('subnets', $subnets);//->with('binary', $binary);

    }

    //stores an instance of Subnets as a new row in the subnets table
    public function storeSubnets(Request $request)
    {

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

    public function exampleCharts()
    {
        $title = [

            'title' => 'Example Charts'

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

        $doughnutCharts = collect(
            [
                [
                    'class' => 'ex-graph',
                    'width' => '200',
                    'height' => '200',
                    'dataChart' => 'doughnut',
                    //'dataValue' => $computerCharts,
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

        return view('example-charts')->with('title', $title)->with('dashboards', $dashboards)->with('more', $more)->with('doughnutCharts', $doughnutCharts);
    }


    public function equipmentCharts(Charts $charts){

        $title = [

            'title' => 'Equipment'

        ];

        $dashboards = [

            'Sites' => '../sites',
            'Subnets' => '../subnets',
            'Equipment' => '../tables/equipment',
            '...' => '../tables/...',
        ];

        $more = [
            'Toolkit-docs' => '',
            'Bootstrap-docs' => '',
            'Light-UI' => '../light/layout',
        ];

        $computers = new Computers();
        $computerData = $charts->doughnutCharts($computers, "'#1ca8dd'","'computers'", "network", "computers vs all equipment");
        $computerClass = $computerData[0];
        $computerWidth = $computerData[1];
        $computerHeight = $computerData[2];
        $computerDataChart = $computerData[3];
        $computerDataSegmentStrokeColor = $computerData[4];
        $computerValue = $computerData[5];
        $computerLabel = $computerData[6];
        $computerColor = $computerData[7];
        $computerChartName = $computerData[8];
        $computerChartHeading = $computerData[9];

        $printers = new Printers();
        $printerData = $charts->doughnutCharts($printers, "'#1ca8dd'", "'printers'", "network", "printers vs all equipment");
        $printerClass = $printerData[0];
        $printerWidth = $printerData[1];
        $printerHeight = $printerData[2];
        $printerDataChart = $printerData[3];
        $printerDataSegmentStrokeColor = $printerData[4];
        $printerValue = $printerData[5];
        $printerLabel = $printerData[6];
        $printerColor = $printerData[7];
        $printerChartName = $printerData[8];
        $printerChartHeading = $printerData[9];

        $placeholders = new Placeholders();
        $placeholderData = $charts->doughnutCharts($placeholders, "'#1ca8dd'", "'placeholders'", "network", "placeholders vs all equipment");
        $placeholderClass = $placeholderData[0];
        $placeholderWidth = $placeholderData[1];
        $placeholderHeight = $placeholderData[2];
        $placeholderDataChart = $placeholderData[3];
        $placeholderDataSegmentStrokeColor = $placeholderData[4];
        $placeholderValue = $placeholderData[5];
        $placeholderLabel = $placeholderData[6];
        $placeholderColor = $placeholderData[7];
        $placeholderChartName = $placeholderData[8];
        $placeholderChartHeading = $placeholderData[9];

        $aggregateValue = $computerValue + $printerValue + $placeholderValue;
        $aggregateColor = "'#1bc98e'";
        $aggregateLabel = "'All Equipment'";

        $computerDataValue = "[{ value: $computerValue, color: $computerColor, label: $computerLabel}, { value: $aggregateValue, color: $aggregateColor, label: $aggregateLabel}]";
        $computerArray =[
            'class' => $computerClass,
            'width' => $computerWidth,
            'height' => $computerHeight,
            'dataChart' => $computerDataChart,
            'dataValue' => $computerDataValue,
            'dataSegmentStrokeColor' => $computerDataSegmentStrokeColor,
            'name' => $computerChartName,
            'chartHeading' => $computerChartHeading
        ];

        $printerDataValue = "[{ value: $printerValue, color: $printerColor, label: $printerLabel}, { value: $aggregateValue, color: $aggregateColor, label: $aggregateLabel}]";
        $printerArray =[
            'class' => $printerClass,
            'width' => $printerWidth,
            'height' => $printerHeight,
            'dataChart' => $printerDataChart,
            'dataValue' => $printerDataValue,
            'dataSegmentStrokeColor' => $printerDataSegmentStrokeColor,
            'name' => $printerChartName,
            'chartHeading' => $printerChartHeading
        ];

        $placeholderDataValue = "[{ value: $placeholderValue, color: $placeholderColor, label: $placeholderLabel }, { value: $aggregateValue, color: $aggregateColor, label: $aggregateLabel}]";
        $placeholderArray =[
            'class' => $placeholderClass,
            'width' => $placeholderWidth,
            'height' => $placeholderHeight,
            'dataChart' => $placeholderDataChart,
            'dataValue' => $placeholderDataValue,
            'dataSegmentStrokeColor' => $placeholderDataSegmentStrokeColor,
            'name' => $placeholderChartName,
            'chartHeading' => $placeholderChartHeading
        ];

        $chartCollections = [$computerArray, $printerArray, $placeholderArray];

        return view('equipment')->with('title', $title)->with('dashboards', $dashboards)->with('more', $more)->with('chartCollections', $chartCollections);
    }

}

