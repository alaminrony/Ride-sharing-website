<?php  

 namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 class FirebaseController extends Controller  
 {  
   


   public function index(Request $request)  
   { 

   	$distance = app('firebase.firestore')->database()->collection('distance')->document('1')
            ->update([
                ['path' => 'distance_km', 'value' => floatval($settings->distance)]
            ]);
   }
   	
    
 } 