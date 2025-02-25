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


}
//country
