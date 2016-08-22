<?php

namespace App\Http\Controllers;

use App\Subnets;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function subnetsTable(){

        //$columnHeaders = $subnets->keys();

        //$object = var_dump($columnHeaders);

        $title = [

            'title'=> 'Subnets'

            ];

        $dashboards = [

            'Sites' => '../tables/sites',
            'Subnets' => '../tables/subnets',
            'Equipment' => '../tables/equipment',
            '...' => '../tables/...',
        ];

        $more = [
            'Toolkit-docs' => '',
            'Bootstrap-docs' => '',
            'Light-UI' => '../light/layout',
        ];

        $subnets = Subnets::all();

        //TODO: create subnets directory and subnets/index.blade.php
        return view('subnets')->with('title', $title)->with('dashboards', $dashboards)->with('more', $more)->with('subnets', $subnets);

    }

    //stores an instance of Subnets as a new row in the subnets table
    public function storeSubnets(Request $request){

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
