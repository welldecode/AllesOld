<?php

namespace App\Http\Controllers;

use App\Models\Collaborators;
use App\Models\Document;
use App\Models\Document_Category;
use App\Models\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class DocumentController extends Controller
{

    public function documentList()
    {
        $list = Document::orderBy('name', 'asc')->get();
        return view('admin.document.index', compact('list'));
    }
    public function documentAdd($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Document::where('id', $id)->firstOrFail();
        }


        $collaborators = Collaborators::all();
        $operator = Collaborators::where('role', 'operador')->get();
        $equipament = Functions::where('type', 'equipamento')->get();
        $document_type = Document_Category::all();
        return view('admin.document.form', compact('template', 'collaborators', 'operator', 'document_type', 'equipament'));

    }
    public function documentStore(Request $request)
    {
        $msg = [];
        if ($request->template_id != 'undefined') {
            $documents = Document::where('id', $request->template_id)->firstOrFail();

            $documents->uuid = Uuid::uuid4();
            $documents->name = $request->name_document ? $request->name_document : 'Documento sem nome.';
            $documents->slug = Str::slug($request->name_document);
            $documents->description = $request->description ? $request->description : 'Nenhuma descrição definida.';
            $documents->type_document = $request->type_document;
            $documents->collaborator = $request->collaborator;
            $documents->expiration = $request->expiration;

            $inputOne = $request->item_one ? $request->item_one : '';
            $inputTwo = $request->item_two ? $request->item_two : '';
 
            $array = [];

            $array['Operador'] = $inputOne;
            $array['Equipamento'] = $inputTwo;

            $documents->vinculation = json_encode($array, true);

            $documents->visible = $request->visible;


            if (!$documents) {
                return Response::json(['error' => true, 'ERRO.'], 500);
            }
            $documents->save();
            return Response::json(['success' => true, 'Editado criado com sucesso.'], 200);

        } else {
            $documents = new Document();

            $documents->uuid = Uuid::uuid4();
            $documents->name = $request->name_document ? $request->name_document : 'Documento sem nome.';
            $documents->slug = Str::slug($request->name_document);
            $documents->description = $request->description ? $request->description : 'Nenhuma descrição definida.';
            $documents->type_document = $request->type_document;
            $documents->collaborator = $request->collaborator;
            $documents->expiration = $request->expiration;

            $inputOne = $request->item_one ? $request->item_one : '';
            $inputTwo = $request->item_two ? $request->item_two : '';
 
            $array = [];

            $array['Operador'] = $inputOne;
            $array['Equipamento'] = $inputTwo;

            $documents->vinculation = json_encode($array, true);
            $documents->visible = $request->visible;

            if (!$documents) {
                return Response::json(['error' => true, 'ERRO.'], 500);
            }
            $documents->save();
            return Response::json(['success' => true, 'Documento criado com sucesso.'], 200);

        }
    }


    public function categoryStore(Request $request)
    {
        $msg = [];
        if ($request->template_id != 'undefined') {
            $document = Document_Category::where('id', $request->template_id)->firstOrFail();
        } else {
            $document = new Document_Category();
        }

        $document->name = $request->name;
        $document->slug = Str::slug($request->name);
        $document->short_name = $request->name;
        $document->color = $request->color;
        $document->visible = $request->visible;

        if (!$document) {
            return Response::json(['error' => true, 'ERRO.'], 500);
        }

        $document->save();

        return Response::json(['success' => true, 'Colaborador criado com sucesso.'], 200);

    }
    public function categoryList()
    {

        $list = Document_Category::orderBy('name', 'asc')->get();
        return view('admin.document.category.list', compact('list'));
    }
    public function addOrUpdateCategory($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Document_Category::where('id', $id)->firstOrFail();
        }


        $collaborators = Collaborators::all();
        $operator = Collaborators::where('role', 'operador')->get();
        return view('admin.document.category.form', compact('template', 'collaborators', 'operator'));

    }
    public function chatCategoriesDelete()
    {

    }
}
