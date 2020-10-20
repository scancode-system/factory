<?php

namespace Modules\Factory\Http\Livewire\Reference;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\Reference;
use Modules\Factory\Entities\ReferenceCategory;

class ReferenceListComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;

    public $reference_category_id;
    public $model;

    protected $messages = ['reference_category_id.unique' => 'Já existe uma referência com esta categoria e modelo.'];

    public function create()
    {
        $this->resetComponent();
    }

    public function store()
    {
        $validation = $this->validate([
            'reference_category_id' => 'required|integer|min:1|unique:references,reference_category_id,null,id,model,'.$this->model,
            'model' => 'required|string|max:255'
        ]);

        $reference = Reference::create($validation);
        $this->emit('alertComponentSuccess', 'Referência <strong>' . $reference->code . '</strong> criado com sucesso.');
        $this->dispatchBrowserEvent('referenceModalClose');
        $this->resetComponent();
    }

    public function destroy(Reference $reference)
    {
        try {
            $reference->delete();
            $this->emit('alertComponentSuccess', 'Referência <strong>' . $reference->code . '</strong> deletado com sucesso.');
        } catch (Exception $exception) {
            $this->emit('messageDanger', 'Esta referência não pode ser removido.');
        }
    }

    public function render()
    {
        $reference_categories_names = (ReferenceCategory::all())->pluck('name', 'id');
        $reference_categories_names->prepend('Selecione uma categoria', null);

        $references = Reference::select('references.*')->join('reference_categories', 'reference_categories.id', '=', 'references.reference_category_id')->
        whereRaw("CONCAT(reference_categories.name, model) LIKE '%".$this->search."%'")->paginate(7);

        return view('factory::livewire.reference.reference-list-component', ['references' => $references, 'reference_categories_names' => $reference_categories_names]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'reference_category_id' => 'required|integer|min:1',
            'model' => 'required|string|max:255',
        ]);
    }

    private function resetComponent()
    {
        $this->reset(['search', 'model', 'reference_category_id']);
        $this->resetPage();
    }
}
