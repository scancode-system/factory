<?php

namespace Modules\Factory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('factory::references.index');
    }

    public function create()
    {
        return view('factory::references.create');
    }

    public function edit()
    {
        return view('factory::references.edit');
    }

}
