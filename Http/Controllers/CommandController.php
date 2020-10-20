<?php

namespace Modules\Factory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('factory::commands.index');
    }

    public function edit(Request $request){
        return view('factory::commands.edit');
    }

}
