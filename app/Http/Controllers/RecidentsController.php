<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class RecidentsController extends Controller
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $residents = User::join('departments', 'users.id', '=', 'departments.user_id')
            ->where('users.access_level', 'Resident')
            ->select('users.*', 'departments.apart_unit', 'departments.lease_expiration', 'departments.reserved_space', 'departments.permit_status')
            ->get();

        //dd($residents); // Agregamos dd() para ver los datos antes de pasarlos a la vista

        return view('residents.index', compact('residents'));
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
    public function residentStore(Request $request)
    {
        // Validate the incoming form data
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'property_code' => 'required|string',
            'apart_unit' => 'required|string',
            'reserved_space' => 'required|string',
        ]);

        // Create a new user record
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->access_level = 'Resident';
        $user->property_code = $request->input('property_code');
        $user->banned = false;
        $user->status = 'active';
        $user->save();

        // Create a new department record and associate it with the user
        $department = new Department();
        $department->user_id = $user->id; // Set the user_id foreign key here
        $department->apart_unit = $request->input('apart_unit');
        $department->reserved_space = $request->input('reserved_space');
        $department->property_code = $request->input('property_code');
        $department->permit_status = 'pending';

        // Use the save() method to insert the data into the departments table
        $department->save();

        // Redirect to a specific route after successful form submission
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

    public function destroy(Property $property)
    {

        //

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

}
