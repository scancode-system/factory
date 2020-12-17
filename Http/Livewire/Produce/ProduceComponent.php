<?php

namespace Modules\Factory\Http\Livewire\Produce;

use Exception;
use Livewire\Component;
use Modules\Factory\Entities\Shape;
use Modules\Factory\Entities\Fabric;
use Modules\Factory\Entities\Produce;
use Modules\Factory\Entities\Reference;

class ProduceComponent extends Component
{

    public $reference;
    public $produces;
    //public $fabrics;
    //public $shapes;

    public $produce2;

    public $reference_id;
    public $fabric_id;
    public $shape_id;
    public $length;
    public $units;

    protected $listeners = ['destroy'];
    protected $messages = ['fabric_id.unique' => 'Já existe um rendimento com este tecido e com este molde.'];

    public function mount(Reference $reference)
    {
        $this->reference = $reference;
        $this->reference_id = $reference->id;
        $this->produces = $this->reference->produces;
    }

    public function create(){
        $this->produce2 = null;
        $this->initialize();
        $this->dispatchBrowserEvent('produceModalOpen');       
    }

    public function store()
    {
        $validation = $this->validate([
            'reference_id' => 'required|integer|min:0',
            //'fabric_id' => 'required|integer|min:1', //|unique:produces,fabric_id,null,id,shape_id,' . $this->shape_id,
            'fabric_id' => 'required|integer|min:1|unique:produces,fabric_id,null,id,fabric_id,'.$this->fabric_id.',shape_id,' . $this->shape_id.',reference_id,' . $this->reference_id,
            'shape_id' => 'required|integer|min:1',
            'length' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|integer|min:1'
        ]);

        $produce = Produce::create($validation);
        $this->emit('alertComponentSuccess', 'Rendimento criado com sucesso.');
        $this->dispatchBrowserEvent('produceModalClose');
        $this->initialize(true);
    }

    public function edit(Produce $produce2){
        $this->produce2 = $produce2;
        $this->initialize();
        $this->dispatchBrowserEvent('produceModalOpen');
    }

    public function update(Produce $produce2){
        $validation = $this->validate([
            'reference_id' => 'required|integer|min:0',
            //'fabric_id' => 'required|integer|min:1', //|unique:produces,fabric_id,'.$produce2->id.',id,shape_id,' . $this->shape_id,
            'fabric_id' => 'required|integer|min:1|unique:produces,fabric_id,'.$produce2->id.',id,fabric_id,'.$this->fabric_id.',shape_id,' . $this->shape_id.',reference_id,' . $this->reference_id,
            'shape_id' => 'required|integer|min:1',
            'length' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|integer|min:1'
        ]);

        $produce2->update($validation);
        $this->emit('alertComponentSuccess', 'Rendimento atualizado com sucesso.');
        $this->dispatchBrowserEvent('produceModalClose');
        $this->initialize(true);
    }

    public function destroy(Produce $produce2){
        try{
            $produce2->delete();
            $this->emit('alertComponentSuccess', 'Rendimento deletado com sucesso.');
            $this->initialize();
        } catch(Exception $e){
            // do someting because there is a restrict relation between produce and fabricc
        }
    }

    public function render()
    {
        /*if(!$this->produces){
            $this->produces = Produce::orderBy('fabric_id')->get();
        }*/

       // if(!$this->fabrics){
            $fabrics = Fabric::orderBy('name')->get()->pluck('name', 'id');
            $fabrics->prepend('Selecione um tecido', '0');
        //}

       // dd($fabrics);
        
        //if(!$this->shapes){
        //    $this->shapes = Shape::orderBy('name')->get()->pluck('name', 'id');
            //dd($this->shapes);
            //$this->shapes->prepend('Selecione um molde', '0');
        //}



        $shapes = Shape::orderBy('name')->get()->pluck('name', 'id');
        $shapes->prepend('Selecione um molde', '0');

        return view('factory::livewire.produce.produce-component', ['fabrics' => $fabrics, 'shapes' => $shapes]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'fabric_id' => 'required|integer|min:1',
            'shape_id' => 'required|integer|min:1',
            'length' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'units' => 'required|integer|min:1'
        ]);
    }

    public function initialize($load = false){
        if($this->produce2){
            $this->fabric_id = $this->produce2->fabric_id;
            $this->shape_id = $this->produce2->shape_id;
            $this->length = $this->produce2->length;
            $this->units = $this->produce2->units;
        } else {
            $this->reset(['fabric_id', 'shape_id', 'length', 'units']);
            $this->resetValidation();
        }

        if($load){
            $this->produces = $this->reference->produces()->get();
        }
    }

}
