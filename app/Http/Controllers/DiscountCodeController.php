<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use App\Models\User;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    public function index()
    {
        $codes = DiscountCode::with('users')->latest()->get();
        return view('admin.discount_codes.index', compact('codes'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.discount_codes.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:discount_codes,code',
            'percentage' => 'required|numeric|min:1|max:100',
            'expires_at' => 'nullable|date',
            'is_active' => 'required|boolean',
            'users' => 'nullable|array'
        ]);

        $code = DiscountCode::create($request->only('code', 'percentage', 'expires_at', 'is_active'));

        if ($request->filled('users')) {
            $code->users()->attach($request->users);
        } else {
            $users = User::pluck('id')->toArray();
            $code->users()->attach($users);
        }

        return redirect()->route('discount_codes.index')->with('success', __('cupon_creado_exito', ['code' => $code->code]));
    }

    public function toggle(DiscountCode $discountCode)
    {
        $discountCode->is_active = !$discountCode->is_active;
        $discountCode->save();

        return redirect()->back()->with('success', __('estado_cupon_actualizado', ['code' => $discountCode->code]));
    }


    public function edit(DiscountCode $discountCode)
{
    $users = User::all();
    return view('admin.discount_codes.edit', compact('discountCode', 'users'));
}

public function update(Request $request, DiscountCode $discountCode)
{
    $request->validate([
        'code' => 'required|unique:discount_codes,code,' . $discountCode->id,
        'percentage' => 'required|numeric|min:1|max:100',
        'expires_at' => 'nullable|date',
        'users' => 'nullable|array'
    ]);

    $discountCode->update([
        'code' => $request->code,
        'percentage' => $request->percentage,
        'expires_at' => $request->expires_at,
        'is_active' => $request->has('is_active'),
    ]);

    $discountCode->users()->sync($request->users ?? []);

    return redirect()->route('discount_codes.index')->with('success', __('cupon_actualizado', ['code' => $discountCode->code]));
}
}