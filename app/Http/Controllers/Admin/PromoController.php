<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function index()
    {
        return view('admin.promos.index', [
            'promos'  => Promo::orderByDesc('is_active')->orderBy('sort_order')->orderByDesc('id')->get(),
            'running' => Promo::running()->count(),
        ]);
    }

    public function create()
    {
        return view('admin.promos.create', ['promo' => new Promo(['is_active' => false])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('promos', 'public');
        }

        Promo::create($data);

        return redirect()->route('admin.promos.index')->with('ok', 'Promo dibuat.');
    }

    public function edit(Promo $promo)
    {
        return view('admin.promos.edit', ['promo' => $promo]);
    }

    public function update(Request $request, Promo $promo)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($promo->image) {
                Storage::disk('public')->delete($promo->image);
            }
            $data['image'] = $request->file('image')->store('promos', 'public');
        } elseif ($request->boolean('remove_image') && $promo->image) {
            Storage::disk('public')->delete($promo->image);
            $data['image'] = null;
        }

        $promo->update($data);

        return redirect()->route('admin.promos.index')->with('ok', 'Promo diperbarui.');
    }

    public function toggle(Promo $promo)
    {
        $promo->update(['is_active' => ! $promo->is_active]);

        return back()->with('ok', $promo->is_active ? 'Promo diaktifkan.' : 'Promo dinonaktifkan.');
    }

    public function destroy(Promo $promo)
    {
        if ($promo->image) {
            Storage::disk('public')->delete($promo->image);
        }
        $promo->delete();

        return redirect()->route('admin.promos.index')->with('ok', 'Promo dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:120'],
            'discount_label' => ['nullable', 'string', 'max:40'],
            'badge'          => ['nullable', 'string', 'max:30'],
            'description'    => ['nullable', 'string', 'max:500'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'cta_url'        => ['nullable', 'url', 'max:255'],
            'starts_at'      => ['nullable', 'date'],
            'ends_at'        => ['nullable', 'date', 'after_or_equal:starts_at'],
            'is_active'      => ['boolean'],
            'show_in_bar'    => ['boolean'],
            'sort_order'     => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $data['is_active']   = $request->boolean('is_active');
        $data['show_in_bar'] = $request->boolean('show_in_bar');
        $data['sort_order']  = $data['sort_order'] ?? 0;
        unset($data['image']);

        return $data;
    }
}
