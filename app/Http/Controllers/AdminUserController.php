<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
{
    $query = User::where('role', 'user');

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    $users = $query->paginate(5)->withQueryString();

    $totalActivos = User::where('role', 'user')->where('active', true)->count();
    $totalInactivos = User::where('role', 'user')->where('active', false)->count();

    return view('admin.users.index', compact('users', 'totalActivos', 'totalInactivos'));
}



    public function toggle(User $user)
    {
        $user->active = !$user->active;
        $user->save();

        $accion = $user->active ? 'activado' : 'desactivado';
        $mensaje = "Has {$accion} al usuario {$user->name}.";

        return redirect()->back()->with('status', $mensaje);
    }
}
