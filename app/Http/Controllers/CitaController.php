<?php

namespace App\Http\Controllers;

use App\Models\cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function update()
    {
 
        $id_cita = cita::find(request('id'));
        $cita = cita::where('id', $id_cita->id)->first();

        // dd($cita);

        if ($cita) {
            $cita->update([
                'centro_id' => request('centro_id'),
                'dia' => request('dia'),
                'hora' => request('hora'),
                'estado' => request('estado'),
            ]);
        }

        return redirect('/ver_citas')->with('success', 'Cita actualizada correctamente.');
    }   




}
