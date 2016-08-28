<?php

namespace App;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Computers;
use App\Printers;
use App\Placeholders;


use Illuminate\Http\Request;

use App\Http\Requests;

class Tables//should it be a model?
{
    public function computersTable(){
        $computers = Computers::all();
    }

    public function printersTable(){
        $printers = Printers::all();
    }

    public function placeholdersTable(){
        $placeholders = Placeholders::all();
    }
}
