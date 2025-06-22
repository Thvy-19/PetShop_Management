<?php

namespace App\Http\Controllers;
use App\Models\Owner;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Owner::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $owners = $query->paginate(10); // Thêm phân trang ở đây

        return view('owners.index', compact('owners'));
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
        'address' => 'nullable|max:255',
        'phone' => 'nullable|max:20',
        'email' => 'required|email|unique:owners,email',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Quy tắc validation cho ảnh
    ]);

    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('public/owner_images');
        $validatedData['profile_image'] = str_replace('public/', '', $imagePath);
    }

    Owner::create($validatedData);

    return redirect()->route('owners.index')->with('success', 'Chủ sở hữu đã được thêm thành công!');
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
    public function update(Request $request, Owner $owner)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'address' => 'nullable|max:255',
        'phone' => 'nullable|max:20',
        'email' => 'required|email|unique:owners,email,' . $owner->id,
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('profile_image')) {
        // Xóa ảnh cũ nếu có
        if ($owner->profile_image) {
            \Storage::delete('public/' . $owner->profile_image);
        }
        $imagePath = $request->file('profile_image')->store('public/owner_images');
        $validatedData['profile_image'] = str_replace('public/', '', $imagePath);
    }

    $owner->update($validatedData);

    return redirect()->route('owners.index')->with('success', 'Chủ sở hữu đã được cập nhật thành công!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
{
    if ($owner->profile_image) {
        \Storage::delete('public/' . $owner->profile_image);
    }
    $owner->delete();
    return redirect()->route('owners.index')->with('success', 'Chủ sở hữu đã bị xóa!');
}
}