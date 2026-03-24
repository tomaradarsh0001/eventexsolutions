<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhyUs;
use App\Models\WhyUsItem;

class WhyUsController extends Controller
{
    // 🔹 Show frontend (welcome page)
    public function home()
    {
        $whyus = WhyUs::with('items')->first();
        return view('welcome', compact('whyus'));
    }

    // 🔹 Admin index page
    public function index()
    {
        $whyus = WhyUs::with('items')->first();
        return view('admin.whyus.index', compact('whyus'));
    }

    // 🔹 Create page
    public function create()
    {
        return view('admin.whyus.create');
    }

    // 🔹 Store data
    public function store(Request $request)
    {
        $request->validate([
            'whyus_paragraph' => 'required',
            'items.*.icon' => 'required',
            'items.*.title' => 'required',
            'items.*.description' => 'required',
        ]);

        $whyus = WhyUs::create([
            'whyus_paragraph' => $request->whyus_paragraph
        ]);

        foreach ($request->items as $item) {
            WhyUsItem::create([
                'why_us_id' => $whyus->id,
                'icon' => $item['icon'],
                'title' => $item['title'],
                'description' => $item['description'],
            ]);
        }

        return redirect()->route('admin.whyus.index')->with('success', 'Created Successfully');
    }

    // 🔹 Edit page
    public function edit()
    {
        $whyus = WhyUs::with('items')->first();
        return view('admin.whyus.edit', compact('whyus'));
    }

    // 🔹 Update
    public function update(Request $request)
    {
        $whyus = WhyUs::first();

        $whyus->update([
            'whyus_paragraph' => $request->whyus_paragraph
        ]);

        // delete old items
        $whyus->items()->delete();

        foreach ($request->items as $item) {
            WhyUsItem::create([
                'why_us_id' => $whyus->id,
                'icon' => $item['icon'],
                'title' => $item['title'],
                'description' => $item['description'],
            ]);
        }

        return redirect()->route('admin.whyus.index')->with('success', 'Updated Successfully');
    }
    public function destroy()
{
    $whyus = \App\Models\WhyUs::first();

    if ($whyus) {
        $whyus->delete(); // items auto delete (cascade)
    }

    return redirect()->route('admin.whyus.index')->with('success', 'Why Us Deleted Successfully');
}

}
