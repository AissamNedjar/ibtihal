<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('admin.activities.index', ['activities' => $activities]);
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return view('admin.activities.show', ['activity' => $activity]);
    }

    public function approve($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->is_accepted = 1;
        $activity->save();

        return redirect()->route('admin.activities.index');
    }

    public function reject($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->is_accepted = 2;
        $activity->save();

        return redirect()->route('admin.activities.index');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('admin.activities.index');
    }
}
