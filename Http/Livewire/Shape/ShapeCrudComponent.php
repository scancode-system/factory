<?php

namespace Modules\Factory\Http\Livewire\Shape;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\Shape;

class ShapeCrudComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;
    public $shape;

    public $shape_id;
    public $name;


    public function create()
    {
        $this->shape = null;
        $this->resetComponent();
    }

    public function store()
    {
        $validation = $this->validate(['name' => 'required|unique:shapes']);
        $shape = Shape::create($validation);
        $this->emit('alertComponentSuccess', 'Molde <strong>' . $shape->name . '</strong> criado(a) com sucesso.');
        $this->resetComponent();
    }

    public function edit(Shape  $shape)
    {
        $this->shape = $shape;
        $this->resetComponent();
    }

    public function update(Shape  $shape)
    {
        $validation = $this->validate(['name' => 'required|unique:shapes,name,'.$shape->id]);
        $shape->update($validation);
        $this->shape = $shape;
        $this->emit('alertComponentSuccess', 'Molde <strong>' . $shape->name . '</strong> atualizado(a) com sucesso.');
        $this->resetComponent();
    }

    public function destroy(Shape  $shape)
    {
        try {
            $shape->delete();
            $this->create();
            $this->emit('alertComponentSuccess', 'Molde <strong>' . $shape->name . '</strong> deletado(a) com sucesso.');
        } catch(Exception $e){
            $this->emit('messageDanger', 'Este molde não pode ser deletado.');
        }
    }

    public function render()
    {
        return view('factory::livewire.shape.shape-crud-component', ['shapes' => Shape::where('name', 'like', '%' . $this->search . '%')->paginate(7)]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if($this->shape){
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:shapes,name,'.$this->shape_id
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:shapes'
            ]);
        }
    }

    private function resetComponent()
    {
        if($this->shape){
            $this->shape_id = $this->shape->id;
            $this->name = $this->shape->name;
        } else {
            $this->reset(['search', 'name', 'shape_id']);
        }
        $this->resetPage();
        $this->resetValidation();
    }
}
