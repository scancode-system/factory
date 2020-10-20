<?php

namespace Modules\Factory\Http\Livewire\Command;

use Livewire\Component;
use Modules\Factory\Entities\Color;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\CommandFabric;

class CommandFabricCreateComponent extends Component
{
   
    protected $listeners = ['commandEdit' => 'resetComponent'];

    public $command;
    public $fabric_id;
    public $color_id;
    public $sheets;

    /*protected $messages = [
        'fabric_id.unique' => 'Já existe este tecido para este comando com esta cor.'
    ];*/

    public function mount(Command $command){
        $this->command = $command;
    }

    public function store()
    {
        $validation = $this->validate([
            'fabric_id' => 'required|integer|min:1', //|unique:command_fabrics,fabric_id,null,id,color_id,'.$this->color_id,',command_id,'.$this->command->id,
            'color_id' => 'required|integer|min:1|',
            'sheets' => 'required|integer|min:1'
        ]);

        $command_fabric = CommandFabric::create($validation+['command_id' => $this->command->id]);
            
        $this->emit('messageSuccess', 'O tecido '.$command_fabric->fabric->name.' da cor '.$command_fabric->color->name.' foi adicionado ao comando com sucesso.');
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

    public function render()
    {
        $select_fabric = Fabric::all()->pluck('name', 'id');
        $select_fabric->prepend('Selecione um tecido', null);

        $select_color = Color::all()->pluck('name', 'id');
        $select_color->prepend('Selecione uma cor', null);

        return view('factory::livewire.command.command-fabric-create-component', ['select_fabric' => $select_fabric, 'select_color' => $select_color]);
    }

    public function resetComponent(){
        $this->reset(['fabric_id', 'color_id', 'sheets']);
    }

}
