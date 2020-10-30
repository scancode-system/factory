<?php

namespace Modules\Factory\Http\Livewire\Command;

use Livewire\Component;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\CommandRisk;

class CommandRiskListComponent extends Component
{

    protected $listeners = ['commandEdit' => 'resetComponent', 'destroyCommandRisk'];

    public $command;
    public $command_risks;

    public $command_risk;
    public $command_risk_id;
    public $reference_name;
    public $shape_name;
    public $size_name;
    public $units;

    public function mount(Command $command){
        $this->command = $command;
        $this->resetComponent();
    }

    public function editCommandRisk(CommandRisk $command_risk){
        $this->command_risk = $command_risk;
        $this->command_risk_id = $command_risk->id;
        $this->reference_name = $command_risk->reference->code;
        $this->shape_name = $command_risk->shape->name;
        $this->size_name = $command_risk->size->name;
        $this->units = $command_risk->units;
        $this->dispatchBrowserEvent('openEditCommandRiskModal');
    }

    public function update()
    {
        $validation = $this->validate([
            'units' => 'required|integer|min:1'
        ]);

        $this->command_risk->update($validation);
            
        $this->emit('messageSuccess', 'Risco atualizado com sucesso.');
        $this->emit('commandEdit');
        $this->dispatchBrowserEvent('closeEditCommandRiskModal');
    }

    public function destroyCommandRisk(CommandRisk $command_risk){
        $command_risk->delete();
        $this->emit('messageSuccess', 'Risco excluído com sucesso.');
        $this->emit('commandEdit');
    }

    public function render()
    {
        return view('factory::livewire.command.command-risk-list-component');
    }

    public function resetComponent(){
        $this->command_risks = CommandRisk::loadByCommand($this->command);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'units' => 'required|integer|min:1'
        ]);
    }

}
