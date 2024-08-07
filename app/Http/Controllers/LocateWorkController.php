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
class LocateWorkController extends Controller
{
    //

    public function work_places_list()
    {
        $list = Work_places::where('type','work_place')->orderBy('name', 'asc')->get();  
        return view('admin.locate_work.index', compact('list'));
    }

    public function work_places_Add($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Work_places::where('id', $id)->firstOrFail();
        }
        return view('admin.locate_work.form', compact('template'));

    }

    public function work_places_Store(Request $request)
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
        $clients->type = 'work_place'; 
        $clients->availability = $request->availability;

        if(!$clients) {
            return Response::json(['error' => true, 'ERRO.'], 500);
        }
        
        $clients->save();
      
     return Response::json(['success' => true, 'Local de trabalho criado com sucesso.'], 200);

    }

    public function work_places_Delete($id){
        $clients = Work_places::whereId($id)->firstOrFail();
        $clients->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);

    }
}
