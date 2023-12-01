<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{

    #[On('eliminarVacante')]
    public function eliminarVacante(Vacante $vacante)
    {
        $this->authorize('delete', $vacante);

        if( $vacante->imagen ) {
            Storage::delete('public/vacantes/' . $vacante->imagen);            
        }

        /* 
        AÑADIR MÁS ADELANTE CUANDO TENGAMOS LOS CANDIDATOS CREADOS

        if( $vacante->candidatos->count() ) {
            foreach( $vacante->candidatos as $candidato ) {
                if( $candidato->cv ) {
                    Storage::delete('public/cv/' . $candidato->cv);
                }
            }
        }
        */

        $vacante->delete();
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
