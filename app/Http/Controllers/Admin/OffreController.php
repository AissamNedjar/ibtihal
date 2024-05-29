<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offre;
use App\Http\Controllers\Controller;

class OffreController extends Controller
{
    public function index()
    {
        $offers = Offre::all();
        return view('admin.offers.index', ['offers' => $offers]);
    }

    public function show($id)
    {
        $offre = Offre::findOrFail($id);

        return view('admin.offers.show', ['offre' => $offre]);
    }

    public function approve($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->is_accepted = 1;
        $offre->save();

        return redirect()->route('admin.offers.index');
    }

    public function reject($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->is_accepted = 2;
        $offre->save();

        return redirect()->route('admin.offers.index');
    }

    public function destroy($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->delete();

        return redirect()->route('admin.offers.index');
    }
}
