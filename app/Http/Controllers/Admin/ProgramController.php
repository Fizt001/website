<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $unit = $request->query('unit', 'smk');
        $programs = Program::where('unit', $unit)->with('galleries')->get();
        return view('admin.programs.index', compact('programs', 'unit'));
    }

    public function create(Request $request)
    {
        $unit = $request->query('unit', 'smk');
        return view('admin.programs.form', compact('unit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required|in:smk,smp,bkk,spmb',
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'image_icon' => 'nullable|image|max:2048',
            'galleries.*' => 'nullable|image|max:2048'
        ]);

        $data = $request->only('unit', 'type', 'title', 'description', 'icon');

        if ($request->hasFile('image_icon')) {
            $data['image_icon'] = $request->file('image_icon')->store('programs', 'uploads');
        }

        $program = Program::create($data);

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $image) {
                $path = $image->store('programs', 'uploads');
                $program->galleries()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.programs.index', ['unit' => $program->unit])->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.form', ['program' => $program, 'unit' => $program->unit]);
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'image_icon' => 'nullable|image|max:2048',
            'galleries.*' => 'nullable|image|max:2048'
        ]);

        $data = $request->only('title', 'type', 'description', 'icon');

        if ($request->hasFile('image_icon')) {
            $data['image_icon'] = $request->file('image_icon')->store('programs', 'uploads');
        }

        $program->update($data);

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $image) {
                $path = $image->store('programs', 'uploads');
                $program->galleries()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.programs.index', ['unit' => $program->unit])->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $unit = $program->unit;
        foreach ($program->galleries as $gallery) {
            Storage::disk('uploads')->delete($gallery->image_path);
        }
        $program->delete();
        return redirect()->route('admin.programs.index', ['unit' => $unit])->with('success', 'Program berhasil dihapus.');
    }

    public function deleteGallery(ProgramGallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
