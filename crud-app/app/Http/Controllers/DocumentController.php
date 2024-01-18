<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Documents;
use App\Models\User;


class DocumentController extends Controller
{
    public function create(Request $request) {

        $request->validate([
            'documentType' => 'required',
            'documentCode' => 'required',
            'name' => 'required',
            'documentCpf' => 'required|digits:11', // Ajuste para validar CPF com 11 dígitos
            'documentRg' => 'required|digits:9',  // Ajuste para validar RG com 9 dígitos
            'documentDate' => 'required|date',
            'uploadDoc' => 'sometimes|file|mimes:pdf|max:10240', // Adicione regras de validação para o upload do documento
        ]);

        $document = new Documents;

        $document->documentType = $request->documentType;
        $document->documentCode = $request->documentCode;
        $document->name = $request->name;
        $document->documentCpf = $request->documentCpf;
        $document->documentRg = $request->documentRg;
        $document->documentDate = $request->documentDate;

        // Document Upload
        if ($request->hasFile('uploadDoc') && $request->file('uploadDoc')->isValid()) {
            $requestImage = $request->uploadDoc;
            $extension = $requestImage->extension();
            $DocName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('Documents/Docs'), $DocName);
            $document->uploadDoc = $DocName;
        }

        $document->save();

        // return redirect()->route('documents.index')->with('msg', 'Documento criado com sucesso!');

        return view('documents.create');
    }
}
