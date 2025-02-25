<?php 
namespace App\Http\Controllers\Embed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE App\Models\Location;

class LocationController extends Controller{
    public function location_list(){

        $location  = Location::get();
        return view('welcome',compact("location"));
}
}
