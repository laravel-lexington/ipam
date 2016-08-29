<?php
/**
 * Created by IntelliJ IDEA.
 * User: charlescombs
 * Date: 8/26/16
 * Time: 11:13 AM
 */

namespace App\Models\Page;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Database\Computers;
use App\Models\Database\Printers;
use App\Models\Database\Placeholders;



class Charts//Should it be a model?
{

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

    public function statCards(Model $model, $description){
        $number = 12988; //calculation expression goes here
        $delta = 5; //calculation expression goes here

        $statCardOutcome = "'statcard-success'"; //should be a calculated value, with -success being default
        $statCardDescription = "$description";
        $statCardNumber = $number; //int -> format for comma
        $statCardDeltaIndicator = "''"; //should be a calculated value with default being empty
        $statCardDeltaValue = "'$delta'.'%'"; // should be a calculated value with a % concatenated

        //div class="statcard ***statcard-success***"
        //TODO: find out what class="p-a" does
        //div class=***"p-a"***
        //span class="statcard-desc">***Page views***</span
        //h2 class="statcard-number"
        //***12,938***
        //small class="delta-indicator delta-positive">5%</small

        if ($model instanceof Computers){
            //$this->value = Computers::all()->count();
        }elseif ($model instanceof Printers){
            //$this->value = Printers::all()->count();
        //TODO add additional Models to this block
        }else{
            //$this->value = Placeholders::all()->count();
        }
    }

    public function sparkLineCharts(Model $model){

        //SparkLines are a line graph that plot data points over time
        //<canvas id="sparkline1"
        //width="378"
        //height="94"
        //class="sparkline"
        //data-chart="spark-line"
        //data-value="[{data:[28,68,41,43,96,45,100]}]"
        //data-labels="['a','b','c','d','e','f','g']"
        //style="width: 189px; height: 47px;"></canvas>

        if ($model instanceof Computers){
            //$this->value = Computers::all()->count();
            //gather data values here
            //loop through data values and an a two dimensional array to assign data labels
            //2 dimensional loop  [a-z followed by A-Z][1-largest available integer value]
        }elseif ($model instanceof Printers){
            //$this->value = Printers::all()->count();
            //gather data values here
            //loop through data values and an a two dimensional array to assign data labels
            //2 dimensional loop  [a-z followed by A-Z][1-largest available integer value]

            //TODO add additional Models to this block
        }else{
            //$this->value = Placeholders::all()->count();
            //gather data values here
            //loop through data values and an a two dimensional array to assign data labels
            //2 dimensional loop  [a-z followed by A-Z][1-largest available integer value]
        }
    }

}

