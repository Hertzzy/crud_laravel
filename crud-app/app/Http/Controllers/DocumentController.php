<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Documents;
use App\Models\User;


class DocumentController extends Controller
{
    public function create(Request $request) {

        $document = new Documents;

        $document->documentType = $request->documentType;
        $document->documentCode = $request->documentType;
        $document->name = $request->documentType;
        $document->documentCpf = $request->documentType;
        $document->documentRg = $request->documentType;
        $document->documentDate = $request->documentType;


         // Document Upload
        if($request->hasFile('uploadDoc') && $request->file('uploadDoc')->isValid()){

            $requestImage = $request->uploadDoc;
            
            $extension = $requestImage->extension();

            // Nome da imagem no servidor
            $DocName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            // Salvar imagem
            $requestImage->move(public_path('Documents/Docs'), $DocName);

            $document->uploadDoc = $DocName;
        }

        // $user = auth()->user();

        // $document->user_id = $user->id;
        // // Salva no banco de dados
        $document->save();

        return redirect('/documents')->with('msg', 'Documento criado com sucesso!');

        // return view('documents.create');
    }
}
