<?php
/**
 * Created by PhpStorm.
 * User: charlescombs
 * Date: 9/7/16
 * Time: 6:47 AM
 */

namespace App\Models\Page;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Database\Computers;
use App\Models\Database\Printers;
use App\Models\Database\Placeholders;

class Modals
{


    //NOT IN USE AT THE MOMENT


    var $equipmentFormTitle;
    var $equipmentForm;

    public function equipmentModalForm(Model $model)
    {

        //ToDo add variable to argument list for where clause

        if ($model instanceof Computers)
        {

            $this->equipmentForm = Computers::where('id', 1)->get();
            $this->equipmentFormTitle = "Computer";

        }elseif($model instanceof Printers){

            $this->equipmentForm = Printers::where('id', 1)->get();
            $this->equipmentFormTitle = "Printer";

        }elseif($model instanceof Placeholders){

            $this->equipmentForm = Placeholders::where('id', 1)->get();
            $this->equipmentFormTitle = "Placeholder";

        }else{

        }



    }

}