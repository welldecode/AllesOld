<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Work_places;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 
class ResponsibleController extends Controller
{
    //

    public function responsible_list()
    {
        $list = Work_places::where('type','responsible')->orderBy('name', 'asc')->get();  
        return view('admin.responsible.index', compact('list'));
    }

    public function responsible_Add($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Work_places::where('id', $id)->firstOrFail();
        }
        return view('admin.responsible.form', compact('template'));

    }

    public function responsible_Store(Request $request)
    {
        $msg = [];
        if ($request->template_id != 'undefined') {
            $clients = Work_places::where('id', $request->template_id)->firstOrFail();
        } else {
            $clients = new Work_places();
        }

        $clients->name = $request->name;  
        $clients->slug = Str::slug($request->name); 
        $clients->visible = $request->visible; 
        $clients->type = 'responsible'; 
        $clients->availability = $request->availability;

        if(!$clients) {
            return Response::json(['error' => true, 'ERRO.'], 500);
        }
        
        $clients->save();
      
     return Response::json(['success' => true, 'Local de trabalho criado com sucesso.'], 200);

    }

    public function responsible_Delete($id){
        $clients = Work_places::whereId($id)->firstOrFail();
        $clients->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);

    }
}
