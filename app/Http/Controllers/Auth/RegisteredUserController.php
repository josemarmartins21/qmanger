<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use App\Traits\PermissionTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use PermissionTrait;
    
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $permissions = Permission::all();
        return view('users.create', compact('permissions'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', /* Rules\Password::defaults() */],
        ]);

        
        if ($request->roles === null) {
            return redirect()->back()->with('nullRole', 'Selecione ao menos um nível de acesso');
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->givePermissions($request->roles, $user);

        return redirect()->route('users.index')->with('success', 'Utilizador registrado com sucesso!');
    }
}
