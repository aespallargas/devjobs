<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',
    ];

    //Se ejecuta automático, cuando el componente haya sido instanciado y queremos que solo se ejecute una vez
    /** 
     * Cuando ejecutamos este codigo en edit.blade.php
     * <livewire:editar-vacante                
     * :vacante="$vacante"
     * />
     * Se ejecuta esta funcion con el parámetro $vacante
     * **/ 
    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }


    public function editarVacante()
    {
        $datos = $this->validate();

        //Si hay una nueva imagen
        if($this->imagen_nueva)
        {
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
        }

        //Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //Assignar valores
        $vacante->titulo = $datos['titulo']; 
        $vacante->salario_id = $datos['salario']; 
        $vacante->categoria_id = $datos['categoria']; 
        $vacante->empresa = $datos['empresa']; 
        $vacante->ultimo_dia = $datos['ultimo_dia']; 
        $vacante->descripcion = $datos['descripcion']; 
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        //Guardar la vacante
        $vacante->save();

        //Redireccionar
        session()->flash('mensaje', 'La vacante se actualizó Correctamente');
        return redirect()->route('vacantes.index');

    }


    public function render()
    {
        //Consultar BBDD
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}