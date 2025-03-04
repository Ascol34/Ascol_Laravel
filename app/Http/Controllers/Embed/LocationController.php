<?php 
namespace App\Http\Controllers\Embed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE App\Models\Location;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller{
    public function location_list(){

        $location  = Location::get();
        return view('welcome',compact("location"));
}
 public function edit_location($id) {
    $location = Location::findOrFail($id); // Retrieve the location by ID
    return view('edit-location', compact('location')); // Return the edit form view
}
public function store_location(Request $request) {

    $validstor = Validator::make($request->all(), [
        'country' => 'required|string|max:255',
        'district' => 'nullable|string',
        'village' => 'required|string|max:255',
        'image_url' => 'required|url',
    ]);

    
    if ($validstor->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validstor->errors(),
        ], 422);
    }
    $location = Location::create($validstor->validated());

    
    return response()->json([
        'success' => true,
        'message' => 'Location created successfully',  
        'data' => $location,  
    ], 201);
}

public function update_location(Request $request, $id) {
    $validstor = Validator::make($request->all(), [
        'country' => 'required|string|max:255',
        'district' => 'nullable|string',
        'village' => 'required|string|max:255',
        'image_url' => 'required|url',
    ]);

    if ($validstor->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validstor->errors(),
        ], 422);
    }

    $location = Location::findOrFail($id);
    $location->update($validstor->validated());

    return response()->json([
        'success' => true,
        'message' => 'Location updated successfully',
        'data' => $location,
    ], 200);
}
public function delete_location($id) {
    $location = Location::findOrFail($id); 
    $location->delete();
    return response()->json(['success' => 'Location deleted successfully!']);
}

}

