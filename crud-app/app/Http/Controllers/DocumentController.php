<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Documents;
use App\Models\User;
use League\CommonMark\Node\Block\Document;

class DocumentController extends Controller
{
    public function index() {

        $documents = Documents::all();

        return view('documents.documents', ['documents'=> $documents]);
    }

    public function create() {

        return view('documents.create');
    }

    public function store(Request $request) {

        // Estancia a classe do model
        $document = new Documents;

        $document->documentType = $request->documentType;
        $document->documentCode = $request->documentCode;
        $document->name = $request->name;
        $document->documentCpf = $request->documentCpf;
        $document->documentRg = $request->documentRg;
        $document->documentDate = $request->documentDate;

        if($request->hasFile('uploadDoc') && $request->file('uploadDoc')->isValid()){

            $requestUpload = $request->uploadDoc;
            
            $extension = $requestUpload->extension();

            // Nome da imagem no servidor
            $uploadName = md5($requestUpload->getClientOriginalName() . strtotime("now") . "." . $extension);

            // Salvar imagem
            $requestUpload->move(public_path('docs/documentos'), $uploadName);

            $document->uploadDoc = $uploadName;
        }
        // Salva no banco de dados
        $document->save();

        // Redireciona o usuario para outra página
        return redirect('/documents/documents')->with('msg', 'Documento criado com sucesso!');
    }

    public function show($id){

        $document = Documents::findOrFail($id);

        // $documentOwner = User::where('id', $document->user_id)->first()->toArray();
        return view('documents.show', ['document' => $document]);
    }
}
