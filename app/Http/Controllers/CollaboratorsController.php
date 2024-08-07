<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Collaborators;
use App\Models\Functions;
use App\Models\Hoists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CollaboratorsController extends Controller
{
    //

    public function collaboratorslist()
    {
        $list = Collaborators::orderBy('id', 'asc')->get();

        return view('admin.collaborators.index', compact('list'));
    }

    public function collaboratorsAdd($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Collaborators::where('id', $id)->firstOrFail();
        }

        $functions = Functions::where('type', 'colaborador')->get();  
        return view('admin.collaborators.form', compact('template', 'functions')); 

    }

    public function collaboratorsStore(Request $request)
    {
       
        if ($request->template_id != 'undefined') {
            $collaborators = Collaborators::where('id', $request->template_id)->firstOrFail();
        } else {
            $collaborators = new Collaborators();
        }

        $collaborators->name = $request->name;
        $collaborators->email = $request->email ? $request->email : $request->name; 
        $collaborators->slug = Str::slug($request->name);
        $collaborators->description = $request->description;
        $collaborators->visible = $request->visible;
        $collaborators->type = 'true';
        $collaborators->role = $request->role;
        $collaborators->availability = $request->availability;

        if (!$collaborators) {
            return Response::json(['error' => true, 'ERRO.'], 500);
        }

        $collaborators->save();

        return Response::json(['success' => true, 'Colaborador criado com sucesso.'], 200);

    }
    public function  collaboratorsDelete($id){
        $collaborators = Collaborators::whereId($id)->firstOrFail();
        $collaborators->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);
    }
}

