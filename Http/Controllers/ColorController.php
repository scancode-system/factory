<?php

namespace Modules\Factory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ColorController extends Controller
{

    public function index()
    {
        return view('factory::colors.index');
    }

}
