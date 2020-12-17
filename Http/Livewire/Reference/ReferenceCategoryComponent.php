<?php

namespace Modules\Factory\Http\Livewire\Reference;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\ReferenceCategory;
use Exception;

class ReferenceCategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;

    public $reference_category;
    public $reference_category_id;
    public $name;


    public function create()
    {
        $this->reference_category = null;
        $this->resetComponent();
    }

    public function store()
    {
        $validation = $this->validate(['name' => 'required|unique:reference_categories']);
        $reference_category = ReferenceCategory::create($validation);
        $this->emit('alertComponentSuccess', 'Categoria da Referência <strong>' . $reference_category->name . '</strong> criado com sucesso.');
        $this->resetComponent();
    }

    public function edit(ReferenceCategory  $reference_category)
    {
        $this->reference_category = $reference_category;
        $this->resetComponent();
    }

    public function update(ReferenceCategory  $reference_category)
    {
        $validation = $this->validate(['name' => 'required|unique:reference_categories,name,' . $reference_category->id]);
        $reference_category->update($validation);
        $this->reference_category = $reference_category;
        $this->emit('alertComponentSuccess', 'Categoria da Referência <strong>' . $reference_category->name . '</strong> atualizado com sucesso.');
        $this->resetComponent();
    }

    public function destroy(ReferenceCategory  $reference_category)
    {
        try {
            $reference_category->delete();
            $this->emit('alertComponentSuccess', 'Categoria da Referência <strong>' . $reference_category->name . '</strong> deletado com sucesso.');
            $this->create();
        } catch (Exception $e) {
            $this->emit('messageDanger', 'Esta categoria da referência não pode ser removida.');
        }
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if ($this->reference_category_id) {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:reference_categories,name,' . $this->reference_category_id
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name' => 'required|unique:reference_categories'
            ]);
        }
    }

    private function resetComponent()
    {
        if ($this->reference_category) {
            $this->reference_category_id = $this->reference_category->id;
            $this->name = $this->reference_category->name;
        } else {
            $this->reset(['search', 'name', 'reference_category_id']);
        }
        $this->resetPage();
        $this->resetValidation();
    }



    public function render()
    {
        return view('factory::livewire.reference.reference-category-component', ['reference_categories' => ReferenceCategory::where('name', 'like', '%' . $this->search . '%')->paginate(7)]);
    }
}
