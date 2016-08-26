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


class ChartFunctions extends Controller
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

var $count;

    public function dataCollect(Model $model, $label, $color){

        if ($model instanceof Computers){
            $this->count = Computers::all()->count();
        }elseif ($model instanceof Printers){
            $this->count = Printers::all()->count();
        }else{
            $this->count = Placeholders::all()->count();
        }

        return [$this->count, $label, $color];
    }

}