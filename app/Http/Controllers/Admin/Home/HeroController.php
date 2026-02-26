<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::firstOrFail();

        return view('admin.home.hero.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'video' => 'nullable|mimetypes:video/mp4,video/webm,video/ogg|max:51200',
        ]);

        $hero = Hero::firstOrFail();

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        if ($request->hasFile('video')) {
            if ($hero->video) {
                Storage::disk('public')->delete($hero->video);
            }

            $data['video'] = $request->file('video')->store('hero/videos', 'public');
        }

        $hero->update($data);

        return redirect()->route('admin.hero.edit')->with('success', 'Hero section updated successfully.');
    }
}
