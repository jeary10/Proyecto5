<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClubRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClubController extends Controller
{

    public function __construct()
    {
        
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->rol !== 'admin') {
                return redirect()->route('clubs.index');
            }
            return $next($request);
        })->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function myclubs(): View
    {
        $clubs = Club::join('members', 'clubs.id', '=', 'members.club_id')
            ->where('members.usuario_id', auth()->user()->id)
            ->select('clubs.*')
            ->paginate(10);
        return view('club.index', compact('clubs'))->with('i');
    }
    
    
    public function index(Request $request): View
    {
        $clubs = Club::paginate();

        return view('club.index', compact('clubs'))
            ->with('i');
    }

   
    public function create(): View
    {
        $club = new Club();

        return view('club.create', compact('club'));
    }

    
    public function store(ClubRequest $request): RedirectResponse
    {
        Club::create($request->validated());

        return Redirect::route('clubs.index')
            ->with('success', 'Club creado con exito!.');
    }

   
    public function show($id): View
    {
        $club = Club::find($id);

        return view('club.show', compact('club'));
    }

    
    public function edit($id): View
    {
        $club = Club::find($id);

        return view('club.edit', compact('club'));
    }

    
    public function update(ClubRequest $request, Club $club): RedirectResponse
    {
        $club->update($request->validated());

        return Redirect::route('clubs.index')
            ->with('success', 'Club actualizado con exito!');
    }

    public function destroy($id): RedirectResponse
    {
        Club::find($id)->delete();

        return Redirect::route('clubs.index')
            ->with('success', 'Club eliminado con exito!');
    }
}
