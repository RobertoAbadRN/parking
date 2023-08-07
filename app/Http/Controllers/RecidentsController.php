<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\ResidentUpload;
use App\Models\ResidentUploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $loggued_user = auth()->user();
        // if($loggued_user->access_level == "property_manager") {
            $residents = DB::table('users')
                ->select('users.name', 'users.email', 'users.phone', 'departments.apart_unit', 'departments.reserved_space', 'departments.permit_status', 'departments.lease_expiration', 'vehicles.*')
                ->join('departments', 'users.id', '=', 'departments.user_id')
                ->leftJoin('vehicles', 'users.id', '=', 'vehicles.user_id')
                ->orderBy('users.id')
                ->distinct()
                ->get();
            return view('residents.index-admin', compact('residents'));
        // } else {
        //     $residents = DB::table('users')
        //         ->select('users.name', 'users.email', 'users.phone', 'departments.apart_unit', 'departments.reserved_space', 'departments.permit_status', 'departments.lease_expiration', 'vehicles.*')
        //         ->join('departments', 'users.id', '=', 'departments.user_id')
        //         ->leftJoin('vehicles', 'users.id', '=', 'vehicles.user_id')
        //         ->orderBy('users.id')
        //         ->where("users.id", $loggued_user->id)
        //         ->distinct()
        //         ->get();
        //     return view('residents.index', compact('residents'));
        // }

    }

    public function import() {
        return view('residents.import');
    }

    public function import_upload(Request $request) {
        $file_uloaded = $request->file('file');
        $file_info = $file_uloaded->getClientOriginalName();
        $filename = pathinfo($file_info, PATHINFO_FILENAME);
        $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . '.' . $file_extension;
        $file_uloaded->move(public_path('uploads'), $file_name);
        $file_path = 'uploads\\' . $file_name;
        $full_path = public_path('uploads') . "\\" . $file_name;

        $new_resident_upload = new ResidentUpload();
        $new_resident_upload->file_name = $file_name;
        $new_resident_upload->file_name_original = $file_info;
        $new_resident_upload->file_extension = $file_extension;
        $new_resident_upload->file_path = $file_path;
        $new_resident_upload->full_path = $full_path;
        $new_resident_upload->save();

        if($file_extension === "xlsx") {
            try {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($file_path);
                $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
                $sheet_data = $sheet->toArray();

                foreach($sheet_data as $tmp_data) {
                    $new_resident_uploa_file = new ResidentUploadFile();
                    $new_resident_uploa_file->file_data = json_encode([
                        "resident_name" => $tmp_data[0],
                        "apartment" => $tmp_data[1],
                        "email" => $tmp_data[2],
                        "phone" => $tmp_data[3],
                        "lease_expiration" => $tmp_data[4]
                    ]);
                    $new_resident_uploa_file->upload_id = $new_resident_upload->id;
                    $new_resident_uploa_file->save();
                    var_dump($tmp_data);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => 'Processing error',
                    'exception' => $e
                ]);
            }
            return response()->json([
                'success' => true,
                'error' => ''
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Wrong file type'
            ]);
        }
    }

    public function import_uploaded() {
        $resident_uploads = ResidentUpload::all();
        return view('residents.import-uploaded', compact('resident_uploads'));
    }

    public function import_uploaded_files(Request $request, $upload_id) {
        if(!$upload_id)
            return redirect('residents.import.uploaded')->with('error', 'Uploaded file not found');
        $resident_upload_files = ResidentUploadFile::select("*")->where("upload_id", $upload_id)->get();
        return view('residents.import-uploaded-files', compact('resident_upload_files', 'upload_id'));
    }

    public function import_uploaded_files_id(Request $request, $upload_id, $file_id) {
        if(!$upload_id)
            return redirect('residents.import.uploaded')->with('error', 'File not found');
        $resident_upload_file = ResidentUploadFile::select("*")->where([
            ["upload_id", $upload_id],
            ["id", $file_id]
        ])->get();
        if(sizeof($resident_upload_file) > 0)
            $resident_upload_file = $resident_upload_file[0];
        return view('residents.import-uploaded-files-id', compact('resident_upload_file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addResident()
    {
        $properties = Property::all();
        return view('residents.addresident', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
