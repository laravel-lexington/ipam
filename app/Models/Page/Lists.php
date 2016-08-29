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
    
    var $equipment;
    var $listHeading;

    public function equipmentLists(Model $model){

        if ($model instanceof Computers){
            $this->equipment = Computers::all();
            $this->listHeading = "Computers";
        }elseif ($model instanceof Printers){
            $this->equipment = Printers::all();
            $this->listHeading = "Printers";
        }else{
            $this->equipment = Placeholders::all();
            $this->listHeading = "Placeholders";
        }
        
    }

}
