<?php

namespace App\Http\Controllers;

use App\Models\Database\Subnets;
use App\Models\Database\Printers;
use App\Models\Database\Computers;
use App\Models\Database\Placeholders;
use App\Models\Page\Charts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NetworkController extends Controller
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

}

