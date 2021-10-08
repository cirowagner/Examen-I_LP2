<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tractor;

class Trators extends Component
{
    public $trators;

    public $isOpen = false;

    public function render()
    {
        $this->trators = Tractor::all();
        return view('livewire.trators');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->trac_codigo = '';
        $this->trac_marca = '';
        $this->trac_modelo = '';
        $this->trac_potencia = '';
        $this->trac_velocidad = '';
        $this->trac_articulacion = '';
        $this->trac_estado = '';
        $this->trac_id = '';
    }

    public function store()
    {
        $this->validate([
            'trac_codigo' => 'required',
            'trac_marca' => 'required',
            'trac_modelo' => 'required',
            'trac_potencia' => 'required',
            'trac_velocidad' => 'required',
            'trac_articulacion' => 'required',
            'trac_estado' => 'required',
        ]);

        Tractor::updateOrCreate(['id' => $this->trac_id], [
            'trac_codigo' => $this->trac_codigo,
            'trac_marca' => $this->trac_marca,
            'trac_modelo' => $this->trac_modelo,
            'trac_potencia' => $this->trac_potencia,
            'trac_velocidad' => $this->trac_velocidad,
            'trac_articulacion' => $this->trac_articulacion,
            'trac_estado' => $this->trac_estado
        ]);

        session()->flash('message',
            $this->trac_id ? 'Tractor Updated Successfully.' : 'Tractor Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tractor = Tractor::findOrFail($id);
        $this->trac_id = $id;
        $this->trac_codigo = $tractor->trac_codigo;
        $this->trac_marca = $tractor->trac_marca;
        $this->trac_modelo = $tractor->trac_modelo;
        $this->trac_potencia = $tractor->trac_potencia;
        $this->trac_velocidad = $tractor->trac_velocidad;
        $this->trac_articulacion = $tractor->trac_articulacion;
        $this->trac_estado = $tractor->trac_estado;

        $this->openModal();
    }
    
    public function delete($id)
    {
        Tractor::find($id)->delete();
        session()->flash('message', 'Tractor Deleted Successfully.');
    }
}
