<?php

namespace App\Http\Controllers;

//use App\Models\Pet;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pet::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('species', 'like', '%' . $request->search . '%')
                  ->orWhere('breed', 'like', '%' . '%' . $request->search . '%');
        }

        // Lọc theo chủ sở hữu (nếu có)
        if ($request->has('owner_id') && $request->owner_id != '') {
            $query->where('owner_id', $request->owner_id);
        }

        $pets = $query->with('owner')->paginate(10); // Thêm phân trang và load owner

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'species' => 'required|max:255',
        'breed' => 'nullable|max:255',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:Male,Female,Unknown',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'nullable',
        'owner_id' => 'required|exists:owners,id',
    ]);

    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('public/pet_images');
        $validatedData['profile_image'] = str_replace('public/', '', $imagePath);
    }

    Pet::create($validatedData);

    return redirect()->route('pets.index')->with('success', 'Thú cưng đã được thêm thành công!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'species' => 'required|max:255',
        'breed' => 'nullable|max:255',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:Male,Female,Unknown',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'nullable',
        'owner_id' => 'required|exists:owners,id',
    ]);

    if ($request->hasFile('profile_image')) {
        if ($pet->profile_image) {
            \Storage::delete('public/' . $pet->profile_image);
        }
        $imagePath = $request->file('profile_image')->store('public/pet_images');
        $validatedData['profile_image'] = str_replace('public/', '', $imagePath);
    }

    $pet->update($validatedData);

    return redirect()->route('pets.index')->with('success', 'Thú cưng đã được cập nhật thành công!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
{
    if ($pet->profile_image) {
        \Storage::delete('public/' . $pet->profile_image);
    }
    $pet->delete();
    return redirect()->route('pets.index')->with('success', 'Thú cưng đã bị xóa!');
}
}