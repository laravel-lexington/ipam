<?php

namespace App\Models\Page;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Database\Computers;
use App\Models\Database\Printers;
use App\Models\Database\Placeholders;

class Lists
{

    var $listLimit;
    
    public function equipmentLists(Model $model){
        
        $computerCount = Computers::all()->count();
        $printerCount = Printers::all()->count();
        $placeholderCount = Placeholders::all()->count();

        if ($computerCount <= $printerCount && $computerCount <= $placeholderCount){
            $this->listLimit = $computerCount;
        } elseif ($printerCount <= $computerCount && $printerCount <= $placeholderCount){
            $this->listLimit = $printerCount;
        } else {
            $this->listLimit = $placeholderCount;
        }

        $limit = $this->listLimit;

        if ($model instanceof Computers) {
            $computers = Computers::all();
            $computerSlice = $computers->slice(0, $limit);
            return $computerSlice->all();
        } elseif ($model instanceof Printers) {
            $printers = Printers::all();
            $printerSlice = $printers->slice(0, $limit);
            return $printerSlice->all();
        } else {
            $placeholders = Placeholders::all();
            $placeholderSlice = $placeholders->slice(0, $limit);
            return $placeholderSlice->all();
        }

    }

}
