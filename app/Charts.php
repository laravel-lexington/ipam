<?php
/**
 * Created by IntelliJ IDEA.
 * User: charlescombs
 * Date: 8/26/16
 * Time: 11:13 AM
 */

namespace App;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Computers;
use App\Printers;
use App\Placeholders;


//TODO: refactor as Charts
class Charts extends Controller
{

//    public function dataCollect(Model $model, $label, $color)
//    {
//        //$dataCollection = collect
//
//        $dataCollection = collect
//        ([
//            $equipmentLabel = $label,
//
//            $equipmentCount = $model->count(),
//
//            $chartColor = $color
//
//        ]);
//        return $dataCollection;
//    }
//
//    public function chartData(Model $model, $label, $color)
//    {
//        $model = $model::all();
//        return $this->dataCollect($model, $label, $color);
//    }

var $value;
var $name;
var $chartHeading;

    public function doughnutCharts(Model $model, $color, $label, $name, $chartHeading){

        $class = "ex-graph";
        $width = "200";
        $height = "200";
        $dataChart = "doughnut";
        $dataSegmentStrokeColor = '#252830';

        $this->name = $name;
        $this->chartHeading = $chartHeading;

        if ($model instanceof Computers){
            $this->value = Computers::all()->count();
        }elseif ($model instanceof Printers){
            $this->value = Printers::all()->count();
        }else{
            $this->value = Placeholders::all()->count();
        }

        return [$class, $width, $height, $dataChart, $dataSegmentStrokeColor, $this->value, $label, $color, $this->name, $this->chartHeading];
    }

}