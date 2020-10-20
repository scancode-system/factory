<?php

namespace Modules\Factory\Http\Livewire\Reference;

use Livewire\Component;
use Modules\Factory\Entities\Reference;
use Modules\Factory\Entities\ReferenceCategory;

class ReferenceEditComponent extends Component
{

    public $reference_id;
    public $reference_category_id;
    public $model;

    protected $messages = [
        'reference_category_id.unique' => 'Já existe uma referência com esta categoria e modelo.'
    ];

    public function mount(Reference $reference){
        $this->reference_id = $reference->id;
        $this->reference_category_id = $reference->reference_category_id;
        $this->model = $reference->model;
    }

    public function update(Reference $reference)
    {
        $validation = $this->validate([
            'reference_category_id' => 'required|integer|min:1|unique:references,reference_category_id,'.$reference->id.',id,model,'.$this->model,
            'model' => 'required|string|max:255'
        ]);

        $reference->update($validation);
        $this->emit('alertComponentSuccess', 'Referência <strong>' . $reference->code . '</strong> atualizado com sucesso.');
        $this->dispatchBrowserEvent('newReferenceSaved');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'reference_category_id' => 'required|integer|min:1',
            'model' => 'required|string|max:255',
        ]);
    }

    public function render()
    {
        $reference_categories_names = (ReferenceCategory::all())->pluck('name', 'id');
        $reference_categories_names->prepend('Selecione uma categoria', null);

        return view('factory::livewire.reference.reference-edit-component', ['reference_categories_names' => $reference_categories_names]);
    }

}
