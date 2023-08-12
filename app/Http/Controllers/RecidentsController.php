<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SignAgreement;
use App\Models\Department;
use App\Models\Property;
use App\Models\ResidentUpload;
use App\Models\ResidentUploadFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RecidentsController extends Controller
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function index()
    {
        $residents = User::select(
                'users.*',
                'departments.apart_unit',
                'departments.lease_expiration',
                'departments.reserved_space',
                'departments.property_code',
                'departments.permit_status',
                'departments.terms_agreement_status',
                'departments.agreement_token',
                'departments.id as department_id',
                'departments.date_status'
            )
            ->join('departments', 'users.id', '=', 'departments.user_id')
            ->where('users.access_level', 'Resident')
            ->get();
    
        return view('residents.index-admin', compact('residents'));
    }
    
    
     
    public function import()
    {
        return view('residents.import');
    }

    public function import_upload(Request $request)
    {
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

        if ($file_extension === "xlsx") {
            try {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($file_path);
                $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
                $sheet_data = $sheet->toArray();

                foreach ($sheet_data as $tmp_data) {
                    $new_resident_uploa_file = new ResidentUploadFile();
                    $new_resident_uploa_file->file_data = json_encode([
                        "resident_name" => $tmp_data[0],
                        "apartment" => $tmp_data[1],
                        "email" => $tmp_data[2],
                        "phone" => $tmp_data[3],
                        "lease_expiration" => $tmp_data[4],
                    ]);
                    $new_resident_uploa_file->upload_id = $new_resident_upload->id;
                    $new_resident_uploa_file->save();
                    var_dump($tmp_data);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => 'Processing error',
                    'exception' => $e,
                ]);
            }
            return response()->json([
                'success' => true,
                'error' => '',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Wrong file type',
            ]);
        }
    }

    public function import_uploaded()
    {
        $resident_uploads = ResidentUpload::all();
        return view('residents.import-uploaded', compact('resident_uploads'));
    }

    public function import_uploaded_files(Request $request, $upload_id)
    {
        if (!$upload_id) {
            return redirect('residents.import.uploaded')->with('error', 'Uploaded file not found');
        }

        $resident_upload_files = ResidentUploadFile::select("*")->where("upload_id", $upload_id)->get();
        return view('residents.import-uploaded-files', compact('resident_upload_files', 'upload_id'));
    }

    public function import_uploaded_files_id(Request $request, $upload_id, $file_id)
    {
        if (!$upload_id) {
            return redirect('residents.import.uploaded')->with('error', 'File not found');
        }

        $resident_upload_file = ResidentUploadFile::select("*")->where([
            ["upload_id", $upload_id],
            ["id", $file_id],
        ])->get();
        if (sizeof($resident_upload_file) > 0) {
            $resident_upload_file = $resident_upload_file[0];
        }

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

    public function approve(Request $request, $id)
    {
        $resident = User::find($id);
        if ($resident) {
            $resident->status = "Approve";
            $resident->save();
        }
        return redirect()->route('recidents')->with('success', 'Resident approved successfully!');
    }
    public function decline(Request $request, $id)
    {
        $resident = User::find($id);
        if ($resident) {
            $resident->status = "Decline";
            $resident->save();
        }
        return redirect()->route('recidents')->with('success', 'Resident rejected successfully!');
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function residentStore(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'user' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'property_id' => 'required', // Asegúrate de que el name del select sea "property_id"
            'apart_unit' => 'required|string',
            'reserved_space' => 'required|string',
        ]);

        // Crear un nuevo registro de usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->access_level = 'Resident';
        $user->property_code = $request->input('property_code');
        $user->banned = false;
        $user->status = 'Pending';
        $user->save();

        // Crear un nuevo registro de departamento y asociarlo al usuario
        $department = new Department();
        $department->user_id = $user->id;
        $department->apart_unit = $request->input('apart_unit');
        $department->reserved_space = $request->input('reserved_space');
        $department->property_code = $request->input('property_code');
        $department->terms_agreement_status = 'pending';
        $department->save();

        // Relacionar el usuario con la propiedad en la tabla intermedia user_properties
        $property = Property::find($request->input('property_id'));
        $user->properties()->attach($property);

        // Generar y almacenar el token único
        $token = Str::random(40);
        $department->agreement_token = $token;
        $department->save();

        // Generar el enlace para los términos y condiciones
        $link = route('terms-and-conditions', ['token' => $token]);

        // Enviar un correo electrónico
        Mail::to($user->email)->send(new SignAgreement($user, $link));

        return redirect()->route('recidents')->with('success', 'Resident registered successfully!');
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

     public function destroy(User $resident)
     {
         // Obtener el departamento asociado al residente
         $department = Department::where('user_id', $resident->id)->first();
     
         if ($department) {
             // Eliminar el departamento
             $department->delete();
         }
     
         // Eliminar al residente (usuario)
         $resident->delete();
     
         return redirect()->route('recidents')
             ->with('success-message', 'Resident and associated department deleted successfully.');
     }

    public function updateStatus(Request $request)
    {
        $residentId = $request->input('resident_id');
        $status = $request->input('status') === 'Active' ? 'Active' : 'Decline';

        $resident = User::find($residentId);

        if ($resident) {
            $resident->status = $status;
            $resident->save();

            return redirect()->back()->with('success', 'Status updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Resident not found with ID: ' . $residentId);
        }
    }


    public function updateReservedSpace(Request $request, $departmentId)
    {
        $request->validate([
            'reserved_space' => 'required|numeric|min:0',
        ]);

        // Actualiza el valor en la tabla de departamentos
        $department = Department::findOrFail($departmentId);
        //dd($department);
        $department->update([
            'reserved_space' => $request->reserved_space,
        ]);

        return redirect()->route('recidents')->with('success-message', 'Valor reservado actualizado correctamente.');
    }

}
