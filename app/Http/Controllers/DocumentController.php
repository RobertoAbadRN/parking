<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Property;
use Illuminate\Support\Facades\File as Doc;
use PhpOffice\PhpWord\TemplateProcessor;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = File::all();
        $properties = Property::where('permit_status', 'active')->get();
        return view('documents/index', compact('documents', 'properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.addfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'file_en' => 'required|mimes:doc,docx|max:2048',
            'file_es' => 'required|mimes:doc,docx|max:2048',
        ]);

        if($req->file()){
            $fileEN           = $req->file('file_en');
            $fileNameEN       = time().uniqid() . '_' . $req->file_en->getClientOriginalName();
            $fileES           = $req->file('file_es');
            $fileNameES       = time().uniqid() . '_' . $req->file_es->getClientOriginalName();



            $fileModel = new File();
            $fileModel->description = $req->file_description;
            $fileModel->file_path_es = $fileNameES;
            $fileModel->file_path_en = $fileNameEN;
            $fileEN->move(public_path('documents/'), $fileNameEN);
            $fileES->move(public_path('documents/'), $fileNameES);
            $fileModel->save();

            return redirect()->route('documents.index')
                ->with('success_message', 'The file has been uploaded successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = File::findOrFail($id);
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'file_en' => 'required|mimes:doc,docx|max:2048',
            'file_es' => 'required|mimes:doc,docx|max:2048',
        ]);

        if($req->file()){
            $fileModel = File::findOrFail($id);
            $fileEN           = $req->file('file_en');
            $fileNameEN       = time().uniqid() . '_' . $req->file_en->getClientOriginalName();
            $fileES           = $req->file('file_es');
            $fileNameES       = time().uniqid() . '_' . $req->file_es->getClientOriginalName();

            if (Doc::exists(public_path('documents/'.$fileModel->file_path_es))) {
                Doc::delete(public_path('documents/'.$fileModel->file_path_es));
            }

            if (Doc::exists(public_path('documents/'.$fileModel->file_path_en))) {
                Doc::delete(public_path('documents/'.$fileModel->file_path_en));
            }

            $fileModel->description = $req->file_description;
            $fileModel->file_path_es = $fileNameES;
            $fileModel->file_path_en = $fileNameEN;
            $fileEN->move(public_path('documents/'), $fileNameEN);
            $fileES->move(public_path('documents/'), $fileNameES);
            $fileModel->save();

            return redirect()->route('documents.index')
            ->with('success_message', 'The document has been updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileModel = File::findOrFail($id);
        if (Doc::exists(public_path('documents/'.$fileModel->file_path_es))) {
            Doc::delete(public_path('documents/'.$fileModel->file_path_es));
        }

        if (Doc::exists(public_path('documents/'.$fileModel->file_path_en))) {
            Doc::delete(public_path('documents/'.$fileModel->file_path_en));
        }
        // Delete the record from the database
        $fileModel->delete();
        return redirect()->route('documents.index')
            ->with('success_message', 'The document has been deleted successfully.');
    }

    public function property(Request $req)
    {
        $document = File::findOrFail($req->doc_id);
        if($document) {
            $property = Property::findOrFail($req->property_id);
            if($req->language == 'es') {
                $doc_es = new TemplateProcessor(public_path('documents/'.$document->file_path_es));
                $doc_es->setValue('property', $property->name);
                $doc_es->saveAs(public_path().'/'.$document->file_path_es);
                return response()->download(public_path().'/'.$document->file_path_es)->deleteFileAfterSend(true);
            }
            if($req->language == 'en') {
                $doc_en = new TemplateProcessor(public_path('documents/'.$document->file_path_en));
                $doc_en->setValue('property', $property->name);
                $doc_en->saveAs(public_path().'/'.$document->file_path_en);
                return response()->download(public_path().'/'.$document->file_path_en)->deleteFileAfterSend(true);
            }
        }
        return redirect()->route('documents.index')
            ->with('error_message', 'The document has been not download.');
    }
}
