<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use App\Models\File;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;



class DocumentsController extends Controller

{

    public function index()

    {

        $documents = File::all();

        return view('documents/index', compact('documents'));

    }

    public function addFile()

    {

        return view('documents.addfile');

    }



    public function store(Request $req)

    {

        $req->validate([

            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048',

        ]);



        $fileModel = new File();



        if ($req->file()) {

            $fileName = time() . '_' . $req->file->getClientOriginalName();

            $filePath = $req->file('file')->storeAs('', $fileName, 'public');



            $fileModel->description = time() . '_' . $req->file->getClientOriginalName();

            $fileModel->file_path = $fileName; // Almacena solo el nombre del archivo

            $fileModel->save();



            return redirect()->route('documents')

                ->with('success_message', 'The file has been uploaded successfully');

        }

    }

    public function edit($id)

    {

        $document = File::findOrFail($id);

        return view('documents.edit', compact('document'));

    }

    public function update(Request $request, $id)

    {

        $request->validate([

            'file_description' => 'required',

            'file' => 'sometimes|mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048',

        ]);



        $file = File::findOrFail($id);



        $file->description = $request->input('file_description');



        if ($request->hasFile('file')) {

            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();

            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $file->file_path = $filePath;

        }



        $file->save();



        return redirect()->route('documents')

            ->with('success_message', 'The document has been updated successfully.');

    }



    public function destroy($id)

    {

        $file = File::findOrFail($id);



        // Get the file path before deleting the record

        $filePath = public_path($file->file_path);



        // Delete the file from the public folder using the Storage facade

        if (Storage::disk('public')->exists($file->file_path)) {

            Storage::disk('public')->delete($file->file_path);

        }



        // Delete the record from the database

        $file->delete();



        return redirect()->route('documents')

            ->with('success_message', 'The document has been deleted successfully.');

    }

}

