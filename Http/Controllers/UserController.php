<?php

namespace Modules\Factory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function edit(Request $request)
    {
        return view('factory::users.edit');
    }

}
