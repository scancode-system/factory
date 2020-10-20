<?php

namespace Modules\Factory\Http\Livewire\Collection;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\Collection;

class CollectionComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;

    public $collection;
    public $collection_id;
    public $name;

    public function create()
    {
        $this->collection = null;
        $this->resetComponent();
    }

    public function store() 
    {
        $validation = $this->validate(['name' => 'required|unique:colors']);
        $collection = Collection::create($validation);
        $this->emit('messageSuccess', 'Coleção <strong>' . $collection->name . '</strong> criado com sucesso.');
        $this->resetComponent();
    }

    public function edit(Collection  $collection)
    {
        $this->collection = $collection;
        $this->resetComponent();
    }

    public function update(Collection  $collection)
    {
        $validation = $this->validate(['name' => 'required|unique:collections,name,'.$collection->id]);
        $collection->update($validation);
        $this->collection = $collection;
        $this->emit('messageSuccess', 'Coleção <strong>' . $collection->name . '</strong> atualizado com sucesso.');
        $this->resetComponent();
    }

    public function destroy(Collection  $collection)
    {
        try {
            $collection->delete();
            $this->create();
            $this->emit('messageSuccess', 'Coleção <strong>' . $collection->name . '</strong> deletado com sucesso.');
        } catch (Exception $e) {
            $this->emit('messageDanger', 'Este tecido não pode ser removido.');
        }
    }


    public function render()
    {
        return view('factory::livewire.collection.collection-component', ['collections' => Collection::where('name', 'like', '%' . $this->search . '%')->paginate(7)]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if($this->collection_id){
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:collections,name,'.$this->collection_id
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:collections'
            ]);
        }
    }

    private function resetComponent()
    {
        if($this->collection){
            $this->collection_id = $this->collection->id;
            $this->name = $this->collection->name;
        } else {
            $this->reset(['search', 'name', 'collection_id']);
        }
        $this->resetPage();
        $this->resetValidation();
    }
}
