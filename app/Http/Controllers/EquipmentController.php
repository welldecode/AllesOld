<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Hoists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EquipmentController extends Controller
{
    //

    public function equipmentlist()
    {
        $list = Hoists::orderBy('model', 'asc')->get();

        return view('admin.equipment.index', compact('list'));
    }

    public function equipmentAdd($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Hoists::where('id', $id)->firstOrFail();
        }
        return view('admin.equipment.form', compact('template'));

    }

    public function equipmentStore(Request $request)
    {
        $msg = [];
        if ($request->template_id != 'undefined') {
            $clients = Hoists::where('id', $request->template_id)->firstOrFail(); 
            
            $clients->model = $request->model;
            $clients->plate = $request->plate;
            $clients->slug = Str::slug($request->plate);
            $clients->type = $request->type;
            $clients->visible = $request->visible;
            $clients->frotas = $request->frotas;

            if (!$clients) {
                return Response::json(['error' => true, 'ERRO.'], 500);
            }
            $clients->save(); 
            return Response::json(['success' => true, 'Equipamento criado com sucesso.'], 200);

        } else {
            $clients = new Hoists(); 
            if (Hoists::where('model', $request->model)->exists()) {
                return Response::json(['success' => true, 'Já existe um equipamento cadastrado.'], 200);
            }

            $clients->model = $request->model;
            $clients->plate = $request->plate;
            $clients->slug = Str::slug($request->plate);
            $clients->type = $request->type;
            $clients->visible = $request->visible;
            $clients->frotas = $request->frotas;

            if (!$clients) {
                return Response::json(['error' => true, 'ERRO.'], 500);
            }
            $clients->save(); 
            return Response::json(['success' => true, 'Equipamento criado com sucesso.'], 200);

        }

    }
    public function equipmentDelete($id)
    {
        $clients = Hoists::whereId($id)->firstOrFail();
        $clients->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);
    }
}
