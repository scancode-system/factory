<?php

namespace Modules\Factory\Http\Livewire\Command;

use Livewire\Component;
use Modules\Factory\Entities\Color;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\CommandFabric;

class CommandFabricListComponent extends Component
{

    protected $listeners = ['commandEdit' => 'resetComponent', 'destroyCommandFabric'];

    public $command;
    public $command_fabrics;

    public $command_fabric;
    public $command_fabric_id;
    public $fabric_id;
    public $color_id;
    public $sheets;

    public function mount(Command $command){
        $this->command = $command;
        $this->resetComponent();
    }

    public function editCommandFabric(CommandFabric $command_fabric){
        $this->command_fabric = $command_fabric;
        $this->command_fabric_id = $command_fabric->id;
        $this->fabric_id = $command_fabric->fabric_id;
        $this->color_id = $command_fabric->color_id;
        $this->sheets = $command_fabric->sheets;
        $this->dispatchBrowserEvent('openEditCommandFabricModal');
    } 

    public function update()
    {
        $validation = $this->validate([
            'sheets' => 'required|integer|min:1'
        ]);

        $this->command_fabric->update($validation);
            
        $this->emit('messageSuccess', 'O tecido '.$this->command_fabric->fabric->name.' da cor '.$this->command_fabric->color->name.' foi atualizado.');
        $this->emit('commandEdit');
        $this->dispatchBrowserEvent('editCommandFabricModalClose');

    }

    public function destroyCommandFabric(CommandFabric $command_fabric){
        $command_fabric->delete();
        $this->emit('messageSuccess', 'Tecido removido do comando com sucesso.');
        $this->emit('commandEdit');
    }


    public function render()
    {
        $select_fabric = Fabric::all()->pluck('name', 'id');
        $select_fabric->prepend('Selecione um tecido', null);

        $select_color = Color::all()->pluck('name', 'id');
        $select_color->prepend('Selecione uma cor', null);

        return view('factory::livewire.command.command-fabric-list-component', ['select_fabric' => $select_fabric, 'select_color' => $select_color]);
    }

    public function resetComponent(){
        $this->command_fabrics = CommandFabric::loadByCommand($this->command);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'sheets' => 'required|integer|min:1'
        ]);
    }

}
