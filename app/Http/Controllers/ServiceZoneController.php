<?php

namespace App\Http\Controllers;

use App\Models\ServiceZone;
use Illuminate\Http\Request;

class ServiceZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!auth()->user()->can('view-service-zone')) {
            return redirect('dashboard');
        }

        $zones = ServiceZone::all();
        return view('zones.zone-index', compact('zones'));
    }

    public function store(Request $request)
    {
        $zone = new ServiceZone();
        $zone->name = $request->name;
        $zone->area = $request->area;
        $zone->save();

        return redirect('service-zone')->with('success', __('Service zone successfully added'));
    }

    public function edit($id)
    {
        if (!auth()->user()->can('edit-service-zone')) {
            return redirect('dashboard');
        }

        $serviceZone = ServiceZone::findOrFail($id);
        return view('zones.zone-edit', compact('serviceZone'));
    }

    public function update(Request $request, $id)
    {
        $serviceZone = ServiceZone::findOrFail($id);
        $serviceZone->name = $request->name;
        $serviceZone->area = $request->area;
        $serviceZone->save();

        return redirect('service-zone')->with('success', __('Service zone successfully updated'));
    }
}
