<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    #[On('terminosbuscar')]
    public function terminosbuscar($termino, $categoria, $salario)
    {
        $this->termino      = $termino;
        $this->categoria    = $categoria;
        $this->salario      = $salario;

    }

    public function render()
    {
        //$vacantes = Vacante::paginate(6);

        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%".$this->termino."%");
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa', 'LIKE', "%".$this->termino."%");
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })
        ->paginate(6);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
