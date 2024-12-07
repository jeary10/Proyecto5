<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && !(auth()->user()->rol == 'admin' || auth()->user()->is_presidente)) {
                return redirect()->route('dashboard');
            }
            return $next($request);
        })->only(['index', 'efectuar']);
    }

    public function solicitar($clubId)
    {
        Member::create([
            'usuario_id' => auth()->user()->id,
            'club_id' => $clubId,
            'rol' => 'miembro', 
        ]);

        return redirect()->route('clubs.index');
    }


    public function index()
    {
        $solicitudes = Member::join('clubs','clubs.id','=','members.club_id')
        ->where('estado','pendiente')->where('presidente_id',auth()->user()->id)
        ->select('members.*')->get();

        return view('solicitudes.index', compact('solicitudes'));
    }

    public function efectuar($id, Request $request)
    {
        $solicitud = Member::findOrFail($id);
    
        $solicitud->estado = $request->accion;
    
        $solicitud->save(); 
    
        return redirect()->route('solicitar.index')->with('success', 'Solicitud procesada correctamente.');
    }
}
