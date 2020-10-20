<?php

namespace Modules\Factory\Http\Livewire\Command;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Factory\Entities\Command;
use Modules\Factory\Entities\Collection;
use Illuminate\Database\Eloquent\Builder;

class CommandComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public $search;

    public $collection_id;
    public $code;

    protected $messages = ['collection_id.unique' => 'Já existe um comando com esta coleção e código.'];

    public function create()
    {
        $this->resetComponent();
    }

    public function store()
    {
        $validation = $this->validate([
            'collection_id' => 'required|integer|min:1|unique:commands,collection_id,null,id,code,'.$this->code,
            'code' => 'required|string|max:255'
        ]);

        $command = Command::create($validation);
        $this->emit('messageSuccess', 'Comando <strong>' . $command->code . '('.$command->collection->name.')</strong> criado com sucesso.');
        $this->dispatchBrowserEvent('commandModalClose');
        $this->resetComponent();
    }

    public function destroy(Command $command)
    {
        try {
            $command->delete();
            $this->emit('messageSuccess', 'Comando <strong>' . $command->code . '('.$command->collection->name.')</strong> deletado com sucesso.');
        } catch (Exception $exception) {
            $this->emit('messageDanger', 'Este comando não pode ser removido.');
        }
    }

    public function render()
    {
        $select_collections = (Collection::all())->pluck('name', 'id');
        $select_collections->prepend('Selecione uma coleção', null);

        $search = $this->search;
        $commands = Command::where('code', 'like', '%' . $this->search . '%')->orwhereHas('collection', function (Builder $query) use($search) {
            $query->where('name', 'like', '%'.$search.'%');
        })->paginate(7);
    
        return view('factory::livewire.command.command-component', ['commands' => $commands, 'select_collections' => $select_collections]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'collection_id' => 'required|integer|min:1',
            'code' => 'required|string|max:255',
        ]);
    }

    private function resetComponent()
    {
        $this->reset(['search', 'code', 'collection_id']);
        $this->resetPage();
    }
}
