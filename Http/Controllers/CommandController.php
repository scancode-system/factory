<?php

namespace Modules\Factory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Factory\Entities\Size;
use Modules\Factory\Entities\Command;
use Illuminate\Contracts\Support\Renderable;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

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

    public function edit(Request $request)
    {
        return view('factory::commands.edit');
    }

    public function print(Request $request, Command $command)
    {
        $command_risks_grouped = $command->command_risks()->groupBy('reference_id', 'shape_id')->get(['reference_id', 'shape_id']);
        
        return PDF::loadView('factory::commands.print', [
            'command' => $command, 
            'command_fabrics' => $command->command_fabrics, 
            'command_risks' => $command->command_risks, 
            'command_risks_grouped' => $command_risks_grouped,
            'sizes' => Size::all()])->download();
    }
}
