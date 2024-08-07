<?php

namespace App\Http\Controllers;

use App\Models\Functions;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class FunctionsController extends Controller
{

    public function functionsList(){ 

        $list = Functions::orderBy('name', 'asc')->get();

        return view('admin.functions.index', compact('list'));
    }
    public function functionsAdd($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Functions::where('id', $id)->firstOrFail();
        }

         
        return view('admin.functions.form', compact('template'));

    }

    public function functionsStore(Request $request)
    {
        if ($request->template_id != 'undefined') {
            $functions = Functions::where('id', $request->template_id)->firstOrFail(); 
            
            $functions->name = $request->name; 
            $functions->slug = Str::slug($request->name);
            $functions->type = $request->type;
            $functions->visible = $request->visible;  

            $functions->save(); 
            return Response::json(['success' => true, 'Equipamento editado com sucesso.'], 200);

        } else {

            $functions = new Functions(); 

            if (Functions::where('name', $request->name)->exists()) {
                return Response::json(['success' => true, 'Já existe uma função com esse nome cadastrado.'], 200);
            } 

            $functions->name = $request->name; 
            $functions->slug = Str::slug($request->name);
            $functions->type = $request->type;
            $functions->visible = $request->visible;  
            $functions->availability = $request->availability;  
 
            $functions->save(); 
            return Response::json(['success' => true, 'Função criado com sucesso.'], 200);

        } 

    }   
    public function functionsDelete($id)
    {
        $clients = Functions::whereId($id)->firstOrFail();
        $clients->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);
    }
}
