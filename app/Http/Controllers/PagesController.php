<?php

namespace App\Http\Controllers;

use App\Subnets;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function indexSubnets(){

        $subnets = Subnets::all();

        //TODO: create subnets directory and subnets/index.blade.php
        return view('subnets.index', compact($subnets));//requires a subnets directory with an index page

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

    public function subnetsTable() {

        $subnets = Subnets::all();

        //$columnHeaders = $subnets->keys();

        //$object = var_dump($columnHeaders);

        return view('subnets', compact('subnets', $subnets));

    }

    public function subnetsTableInherits() {

        $subnets = Subnets::all();

        //$columnHeaders = $subnets->keys();

        //$object = var_dump($columnHeaders);

        return view('subnetsInherits', compact('subnets', $subnets));

    }
}
