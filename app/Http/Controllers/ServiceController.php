<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }
            $service->image = $request->file('image')->store('services', 'public');
        }

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $service->image,
        ]);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::delete('public/' . $service->image);
        }
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
