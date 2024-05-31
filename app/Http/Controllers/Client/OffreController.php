<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    //
    public function index()
    {
        $offres = Offre::all();
        return view('admin.offres.index', ['offres' => $offres]);
    }

    public function show($id)
    {
        $offre = Offre::findOrFail($id);

        return view('admin.offres.show', ['offre' => $offre]);
    }

    public function approve($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->is_accepted = 1;
        $offre->save();

        return redirect()->route('admin.offres.index');
    }

    public function reject($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->is_accepted = 2;
        $offre->save();

        return redirect()->route('admin.offres.index');
    }

    public function destroy($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->delete();

        return redirect()->route('admin.offres.index');
    }
}
