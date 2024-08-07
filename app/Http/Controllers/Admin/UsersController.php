<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function index(){ 
        $list = User::orderBy('name', 'asc')->get();
        return view('admin.users.index', compact('list'));
    }

    public function addorupdate($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = User::where('id', $id)->firstOrFail();
        }
        return view('admin.users.form', compact('template'));

    }

    
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

      
     return Response::json(['success' => true, 'Cliente criado com sucesso.'], 200);

    } public function  delete($id){
        $clients = User::whereId($id)->firstOrFail();
        $clients->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);
    }
}
