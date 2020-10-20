<?php

namespace Modules\Factory\Http\Livewire\Command;

use Livewire\Component;
use Modules\Factory\Entities\Color;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\CommandFabric;
use Modules\Factory\Entities\CommandRisk;
use Modules\Factory\Entities\Produce;
use Modules\Factory\Entities\Reference;
use Modules\Factory\Entities\Size;

class CommandRiskCreateComponent extends Component
{

    protected $listeners = ['commandEdit' => 'resetComponent'];

    public $command;

    public $select_references;
    public $select_shapes;
    public $sizes;

    public $reference_id;
    public $shape_id;
    public $units;

    public function mount(Command $command)
    {
        $this->command = $command;

        $this->select_references = Reference::all()->pluck('code', 'id');
        $this->select_references->prepend('Selecione uma referência', 0);

        $this->select_shapes = collect([]);
        $this->select_shapes->prepend('Selecione um molde', 0);

        $this->sizes = Size::all();

        foreach($this->sizes as $size){
            $this->units[$size->id] = 0;
        }
    }

    public function referenceChanged()
    {
        $this->select_shapes = collect([]);
        $reference = Reference::find($this->reference_id);
        if ($reference) {
            $shapes = collect([]);
            foreach ($this->command->command_fabrics as $i => $command_fabric) {
                $shapes_from_fabrics =  Produce::loadShapeByReferenceAndFabric($reference, $command_fabric->fabric);
                if($i == 0){
                    $shapes = $shapes_from_fabrics; 
                } else {
                    $shapes = $shapes->intersect($shapes_from_fabrics);
                }
            }
            $this->select_shapes = $shapes->pluck('name', 'id');
        }
        $this->select_shapes->prepend('Selecione um molde', 0);
    }

    public function store()
    {
        $validation = $this->validate([
            'reference_id' => 'required|integer|min:1|',
            'shape_id' => 'required|integer|min:1|'
        ]);

        //dd($this->units);

        foreach($this->units as $size_id => $unit){
            if($unit > 0){
                $command_risk = CommandRisk::create($validation+['command_id' => $this->command->id, 'size_id' => $size_id, 'units' => $unit]);
            }
        }

        $this->emit('messageSuccess', 'Os riscos foram adicionados ao comando com sucesso.');
        $this->dispatchBrowserEvent('closeCreateCommandRiskModal');
        $this->emit('commandEdit');

        /*

        $command_fabric = CommandFabric::create($validation+['command_id' => $this->command->id]);
            
        $this->emit('messageSuccess', 'O tecido '.$command_fabric->fabric->name.' da cor '.$command_fabric->color->name.' foi adicionado ao comando com sucesso.');
        $this->resetComponent();
        $this->dispatchBrowserEvent('commandFabricCreated');
        $this->emit('commandEdit');*/
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'reference_id' => 'required|integer|min:1|',
            'shape_id' => 'required|integer|min:1|'
        ]);
    }

    public function render()
    {

        /*$reference = Fabric::all()->pluck('name', 'id');
        $select_fabric->prepend('Selecione um tecido', null);

        $select_color = Color::all()->pluck('name', 'id');
        $select_color->prepend('Selecione uma cor', null);*/

        return view('factory::livewire.command.command-risk-create-component');
    }

    public function resetComponent()
    {
        $this->reset(['reference_id', 'shape_id', 'units']);
    }
}
