<?php

namespace Modules\Factory\Http\Livewire\Fabric;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\Fabric;

class FabricCrudComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;
    public $fabric;

    public $fabric_id;
    public $name;
    public $code;
    public $meter;
    public $price;


    public function create()
    {
        $this->fabric = null;
        $this->resetComponent();
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required|unique:fabrics',
            'code' => 'required|unique:fabrics',
            'meter' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $fabric = Fabric::create($validation);
        $this->emit('alertComponentSuccess', 'Tecido <strong>' . $fabric->name . '</strong> criado(a) com sucesso.');
        $this->resetComponent();
    }

    public function edit(Fabric  $fabric)
    {
        $this->fabric = $fabric;
        $this->resetComponent();
    }

    public function update(Fabric  $fabric)
    {
        $validation = $this->validate([
            'name' => 'required|unique:fabrics,name,' . $fabric->id,
            'code' => 'required|unique:fabrics,code,' . $fabric->id,
            'meter' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $fabric->update($validation);
        $this->fabric = $fabric;
        $this->emit('alertComponentSuccess', 'Tecido <strong>' . $fabric->name . '</strong> atualizado(a) com sucesso.');
        $this->resetComponent();
    }

    public function destroy(Fabric  $fabric)
    {
        try {
            $fabric->delete();
            $this->create();
            $this->emit('alertComponentSuccess', 'Tecido <strong>' . $fabric->name . '</strong> deletado(a) com sucesso.');
        } catch (Exception $e) {
            $this->emit('messageDanger', 'Este tecido não pode ser removido.');
        }
    }

    public function render()
    {
        $fabrics = Fabric::where('name', 'like', '%' . $this->search . '%')->orWhere('code', 'like', '%' . $this->search . '%')->paginate(7);
        return view('factory::livewire.fabric.fabric-crud-component', ['fabrics' => $fabrics]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if ($this->fabric_id) {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:fabrics,name,' . $this->fabric_id,
                'code' => 'required|unique:fabrics,code,' . $this->fabric_id,
                'meter' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
                'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/'
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:fabrics',
                'code' => 'required|unique:fabrics',
                'meter' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
                'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/'
            ]);
        }
    }

    private function resetComponent()
    {
        if ($this->fabric) {
            $this->fabric_id = $this->fabric->id;
            $this->name = $this->fabric->name;
            $this->code = $this->fabric->code;
            $this->meter = $this->fabric->meter;
            $this->price = $this->fabric->price;
        } else {
            $this->reset(['search', 'name', 'code', 'meter', 'price', 'fabric_id']);
        }
        $this->resetPage();
        $this->resetValidation();
    }
}
