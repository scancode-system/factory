<?php

namespace Modules\Factory\Http\Livewire\Command;

use Livewire\Component;
use Modules\Factory\Entities\Color;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\Produce;
use Modules\Factory\Entities\CommandRisk;
use Modules\Factory\Entities\CommandFabric;
use Modules\Factory\Entities\CommandFabricCommandRisk;

class CommandFabricCreateComponent extends Component
{

    protected $listeners = ['commandEdit' => 'resetComponent'];

    public $command;
    public $fabric_id;
    public $color_id;
    public $sheets; 

    protected $messages = [
        'fabric_id.unique' => 'Já existe este tecido para este comando com esta cor.'
    ];

    public function mount(Command $command)
    {
        $this->command = $command;
    }

    public function store()
    {
        //dd($this->command->id);
        $validation = $this->validate([
            //'fabric_id' => 'required|integer|min:1', //|unique:command_fabrics,fabric_id,null,id,color_id,'.$this->color_id,',command_id,'.$this->command->id,
            'fabric_id' => 'required|integer|min:1|unique:command_fabrics,fabric_id,null,id,fabric_id,'.$this->fabric_id.',color_id,'.$this->color_id.',command_id,'.$this->command->id,
            'color_id' => 'required|integer|min:1|',
            'sheets' => 'required|integer|min:1'
        ]);
    
        $command_fabric = CommandFabric::create($validation + ['command_id' => $this->command->id]);

        $this->emit('messageSuccess', 'O tecido ' . $command_fabric->fabric->name . ' da cor ' . $command_fabric->color->name . ' foi adicionado ao comando com sucesso.');
        $this->resetComponent();
        $this->dispatchBrowserEvent('commandFabricCreated');
        $this->emit('commandEdit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'fabric_id' => 'required|integer|min:1|',
            'color_id' => 'required|integer|min:1|',
            'sheets' => 'required|integer|min:1'
        ]);
    }

    private function loadSelectFabrics()
    {
        $fabrics = Fabric::all();
        $select_fabric = collect([]);
        $command_risks = $this->command->command_risks;

        foreach ($fabrics as $fabric) {
            $have_produces = true;
            foreach ($command_risks as $command_risk) {
                if (!Produce::loadByReferenceShapeFabric($command_risk->reference, $command_risk->shape, $fabric)) {
                    $have_produces = false;
                }
            }
            if($have_produces){
                $select_fabric->push($fabric);
            }
        }

        $select_fabric = $select_fabric->pluck('name', 'id');
        $select_fabric->prepend('Selecione um tecido', null);
        return $select_fabric;
    }

    public function render()
    {
        $select_fabric = $this->loadSelectFabrics();

        $select_color = Color::all()->pluck('name', 'id');
        $select_color->prepend('Selecione uma cor', null);

        return view('factory::livewire.command.command-fabric-create-component', ['select_fabric' => $select_fabric, 'select_color' => $select_color]);
    }

    public function resetComponent()
    {
        $this->reset(['fabric_id', 'color_id', 'sheets']);
    }
}
