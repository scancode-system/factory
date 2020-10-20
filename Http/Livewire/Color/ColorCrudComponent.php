<?php

namespace Modules\Factory\Http\Livewire\Color;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\Color;

class ColorCrudComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;

    public $color;
    public $color_id;
    public $name;

    public function create()
    {
        $this->color = null;
        $this->resetComponent();
    }

    public function store() 
    {
        $validation = $this->validate(['name' => 'required|unique:colors']);
        $color = Color::create($validation);
        $this->emit('alertComponentSuccess', 'Cor <strong>' . $color->name . '</strong> criada com sucesso.');
        $this->resetComponent();
    }

    public function edit(Color  $color)
    {
        $this->color = $color;
        $this->resetComponent();
    }

    public function update(Color  $color)
    {
        $validation = $this->validate(['name' => 'required|unique:colors,name,'.$color->id]);
        $color->update($validation);
        $this->color = $color;
        $this->emit('alertComponentSuccess', 'Cor <strong>' . $color->name . '</strong> atualizado com sucesso.');
        $this->resetComponent();
    }

    public function destroy(Color  $color)
    {
        $color->delete();
        $this->create();
        $this->emit('alertComponentSuccess', 'Cor <strong>' . $color->name . '</strong> deletada com sucesso.');
    }


    public function render()
    {
        return view('factory::livewire.color.color-crud-component', ['colors' => Color::where('name', 'like', '%' . $this->search . '%')->paginate(7)]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if($this->color_id){
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:colors,name,'.$this->color_id
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:colors'
            ]);
        }
    }

    private function resetComponent()
    {
        if($this->color){
            $this->color_id = $this->color->id;
            $this->name = $this->color->name;
        } else {
            $this->reset(['search', 'name', 'color_id']);
        }
        $this->resetPage();
        $this->resetValidation();
    }
}
