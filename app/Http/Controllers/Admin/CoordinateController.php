<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    public function edit(Coordinate $coordinate)
    {
        $coordinate = Coordinate::first();

        return view('admin.contact_us.index', compact('coordinate'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lang' => 'required|numeric',
        ]);

        $coordinate = Coordinate::firstOrCreate(
            ['id' => 1],
            ['lat' => 30.0074, 'lang' => 31.4913] // قيم افتراضية احتياطية
        );

        $coordinate->update([
            'lat' => $request->lat,
            'lang' => $request->lang,
        ]);

        return redirect()->back()->with('success', 'Coordinates updated successfully!');
    }
}
