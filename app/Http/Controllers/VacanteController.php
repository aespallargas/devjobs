<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);

        return view('vacantes/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vacante::class);

        return view('vacantes/create');
    }


    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes/show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * public function edit($id)
     * con el route building podemos usar el modelo y ya tenemos todos los datos
     */
    public function edit(Vacante $vacante)
    {
        //Este update, hace referencia al metodo del VacantePolicy
        $this->authorize('update', $vacante);

        return view('vacantes/edit', [
            'vacante' => $vacante
        ]);
    }


}
