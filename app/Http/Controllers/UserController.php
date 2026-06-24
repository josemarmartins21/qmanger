<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequestUpdate;
use App\Models\Permission;
use App\Models\User;
use App\Traits\PermissionTrait;
use Exception;
use LogicException;

class UserController extends Controller
{
    use PermissionTrait;

    public function __cosntruct()
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('users.create', compact('permissions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $userPermissions = $user->load('permissions')['permissions'];
        $permissions = Permission::all();

        return view('users.edit', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequestUpdate $request, User $user)
    {
        
        try {
            $validated = $request->validated();

            $userPermissions = $user->load('permissions')['permissions'];
            $this->flushPermissions($userPermissions, $user);
            
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);
    
            $this->givePermissions($request->roles, $user);

            return redirect()->route('users.index');
            
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }



    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {

            $user->delete();
            return redirect()->back()->with('success', 'Usuário excluido com sucesso!');
    
        } catch (LogicException $e) {
            return redirect()->back()->with('error', 'Não foi possivel excluir o usuário. Tente novamente mais tarde. Código do erro: ' . $e->getCode());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel excluir o usuário. Tente novamente mais tarde. Código do erro: ' . $e->getCode());
        }
    }
}
