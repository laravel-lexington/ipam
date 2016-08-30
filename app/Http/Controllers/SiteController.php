<?php

namespace App\Http\Controllers;

use App\Models\Database\Printers;
use App\Models\Database\Computers;
use App\Models\Database\Placeholders;
use App\Models\Database\Subnets;
use App\Models\Database\Subnet_Nodes;
use App\Models\Database\Sites;
use App\Models\Database\Site_Locations;
use App\Models\Page\Charts;
use App\Models\Page\Tables;
use App\Models\Page\Lists;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    var $uiTheme;
    var $menu = [
        'Sites' => '../sites',
        'Subnets' => '../subnets    ',
        'Equipment' => '../equipment',
    ];
    var $submenu = [
        'Computers' => '../equipment/computers',
        'Printers' => '../equipment/printers',
        'Placeholders' => '../equipment/placeholders',
    ];
    
    public function sitesTable(Request $request){

        $title = [

            'title' => 'Sites'

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

        $sites = Sites::all();

        return view('sites')->with('title', $title)->with('uiTheme', $uiTheme )->with('menu', $menu)->with('submenu', $submenu)->with('sites', $sites);

    }
}
