<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 
class ClientsController extends Controller
{
    //

    public function clientlist()
    {
        $list = Clients::orderBy('name', 'asc')->get();  
        return view('admin.clients.index', compact('list'));
    }

    public function clientAdd($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Clients::where('id', $id)->firstOrFail();
        }
        return view('admin.clients.form', compact('template'));

    }

    public function clientStore(Request $request)
    {
        $msg = [];
        if ($request->template_id != 'undefined') {
            $clients = Clients::where('id', $request->template_id)->firstOrFail();
        } else {
            $clients = new Clients();
        }

        $clients->name = $request->name; 
        $clients->email = $request->email ? $request->email : $request->name; 
        $clients->slug = Str::slug($request->name);
        $clients->description = $request->description ? $request->description : 'Nenhuma descrição'; 
        $clients->visible = $request->visible;
        $clients->role = $request->role;
        $clients->availability = $request->availability;

        if(!$clients) {
            return Response::json(['error' => true, 'ERRO.'], 500);
        }
        
        $clients->save();
      
     return Response::json(['success' => true, 'Cliente criado com sucesso.'], 200);

    }

    public function  clientDelete($id){
        $clients = Clients::whereId($id)->firstOrFail();
        $clients->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);

    }
}
