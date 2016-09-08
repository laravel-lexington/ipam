<?php

namespace App\Http\Controllers;

use App\Models\Database\Subnets;
use App\Models\Database\Printers;
use App\Models\Database\Computers;
use App\Models\Database\Placeholders;
use App\Models\Page\Charts;
use App\Models\Page\Tables;
use App\Models\Page\Lists;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EquipmentController extends Controller
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

    public function equipmentCharts(Charts $charts, Lists $lists, Request $request){

        $title = [

            'title' => 'Equipment'

        ];

        //Request $request used here to switch between light and dark themes
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
        $placeholders->equipmentType = "placeholder";
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

        //TODO: determine if Modals php functions go here

        $chartCollections = [$computerArray, $printerArray, $placeholderArray];
        $listComputers = $lists->equipmentLists($computers);
        $listPrinters = $lists->equipmentLists($printers);
        $listPlaceholders = $lists->equipmentLists($placeholders);

        return view('equipment')->with('title', $title)->with('uiTheme', $uiTheme)->with('menu', $menu)->with('submenu', $submenu)->with('chartCollections', $chartCollections)->with('listComputers', $listComputers)->with('listPrinters', $listPrinters)->with('listPlaceholders', $listPlaceholders);
    }

    //stores an instance of Subnets as a new row in the computers table
    public function storeComputers(Request $request)
    {

        $computer = Computers::find($request->id);

        $computer->subnet_id = $request->subnet_id;
        $computer->ip_address = $request->ip_address;
        $computer->mac_address = $request->mac_address;
        $computer->serial_number = $request->serial_number;

        $computer->save();

        return back();
    }

    //stores an instance of Printers as a new row in the printers table
    public function storePrinters(Request $request)
    {

        $printer = Printers::find($request->id);

        $printer->subnet_id = $request->subnet_id;
        $printer->ip_address = $request->ip_address;
        $printer->mac_address = $request->mac_address;
        $printer->serial_number = $request->serial_number;

        $printer->save();

        return back();
    }

    //stores an instance of Placeholders as a new row in the placeholders table
    public function storePlaceholders(Request $request)
    {

        $placeholder = Placeholders::find($request->id);

        $placeholder->subnet_id = $request->subnet_id;
        $placeholder->ip_address = $request->ip_address;
        $placeholder->mac_address = $request->mac_address;
        $placeholder->serial_number = $request->serial_number;

        $placeholder->save();

        return back();
    }

    public function equipmentTables(Tables $tables){}

}
