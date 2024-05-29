<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ads;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::all();
        return view('admin.ads.index', ['ads' => $ads]);
    }

    public function show($id)
    {
        $ads = Ads::findOrFail($id);

        return view('admin.ads.show', ['ads' => $ads]);
    }

    public function approve($id)
    {
        $ads = Ads::findOrFail($id);
        $ads->is_accepted = 1;
        $ads->save();

        return redirect()->route('admin.ads.index');
    }

    public function reject($id)
    {
        $ads = Ads::findOrFail($id);
        $ads->is_accepted = 2;
        $ads->save();

        return redirect()->route('admin.ads.index');
    }

    public function destroy($id)
    {
        $ads = Ads::findOrFail($id);
        $ads->delete();

        return redirect()->route('admin.ads.index');
    }
}
