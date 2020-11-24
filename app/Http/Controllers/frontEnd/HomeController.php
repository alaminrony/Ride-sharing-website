<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LatestNews;
use App\User;
use App\AdminBillSetting;
use App\HomeSlider;
use App\CmsPage;
use DB;
use Validator;

class HomeController extends Controller {

    public function index() {
        $latestNews = LatestNews::where('status', '1')->latest()->take(3)->get();
        $homeSlider = HomeSlider::where('status', '1')->latest()->take(5)->get();
        $title = 'Home';
        return view('frontEnd.index')->with(compact('latestNews','homeSlider','title'));
    }

    public function listLatestNews(Request $request) {
        $users = User::select(DB::raw("CONCAT(first_name,' ',last_name) as name"), 'id')->pluck('name', 'id')->toArray();
        $latestNews = LatestNews::where('status', '1')->orderBy('id', 'desc')->paginate(3);
        return view('frontEnd.latestNews.blog-list')->with(compact('latestNews', 'users'));
    }

    public function gridListLatestNews(Request $request) {
        $users = User::select(DB::raw("CONCAT(first_name,' ',last_name) as name"), 'id')->pluck('name', 'id')->toArray();
        $latestNews = LatestNews::where('status', '1')->orderBy('id', 'desc')->paginate(6);
//        echo "<pre>";print_r($latestNews->toArray());exit;
        return view('frontEnd.latestNews.blog-grid')->with(compact('latestNews', 'users'));
    }

    public function latestNewsDetails(Request $request) {
        $users = User::select(DB::raw("CONCAT(first_name,' ',last_name) as name"), 'id')->pluck('name', 'id')->toArray();
        $latestNews = LatestNews::findOrFail($request->id);
        return view('frontEnd.latestNews.blog-details')->with(compact('latestNews', 'users'));
    }

    public function distanceAndDuration(Request $request) {
//            echo "<pre>";print_r($request->all());exit;
        $rules = [
            'pickup_address' => 'required',
            'drop_address' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
       $pickup_latitude = $request->pickup_latitude;
       $pickup_longitude = $request->pickup_longitude;
       $drop_latitude = $request->drop_latitude;
       $drop_longitude = $request->drop_longitude;
        
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json";
        $options = array(
            "origins" => "{$request->pickup_latitude},{$request->pickup_longitude}",
            "destinations" => "{$request->drop_latitude},{$request->drop_longitude}",
//            "units" => "imperial",
//            "language" => "en-GB",
            "key" => 'AIzaSyCxuo3YR2wuXgT4maohLxkTp1QFEuTLz1Q'
        );
        $ch = curl_init();
        $request = $url . "?". http_build_query($options);
        curl_setopt($ch, CURLOPT_URL, $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        if ($output['status'] == 'OK') {
            return $this->estimateFare($output,$pickup_latitude,$pickup_longitude,$drop_latitude,$drop_longitude);
        }
    }

    public function estimateFare($output,$pickup_latitude,$pickup_longitude,$drop_latitude,$drop_longitude) {
//        echo "<pre>";print_r($pickup_longitude);exit;
       $distanceArr = explode(' ',$output['rows'][0]['elements'][0]['distance']['text']);
       $durationArr = explode(' ',$output['rows'][0]['elements'][0]['duration']['text']);
       $duration = $output['rows'][0]['elements'][0]['duration']['text'];
       
       if(!empty($durationArr[0]) && !empty($durationArr[2])){
           $dutationMinutes = (($durationArr[0] * 60) + $durationArr[2]);
       }else{
           $dutationMinutes = $durationArr[0];
       }
       
       $distanceKM = $distanceArr[0];
       
        $allFares = AdminBillSetting::get();
//        
        if ($allFares->isNotEmpty()) {
            $competitorFare = [];
            foreach ($allFares as $fare) {
                $competitorFare[$fare->id] = $fare->base_fare + ($fare->cost_per_minutes * $dutationMinutes) + ($fare->cost_per_kilometer * $distanceKM) + $fare->booking_fee;
            }
        }

        $maxFare = number_format(max($competitorFare),2);
        $minFare = number_format(min($competitorFare),2);

        $reduceFare = DB::table('reduce_fares')->where('id', 1)->first();
        $fareReduce = $reduceFare->reduce_fare_percentage;

        $ourOfferingFare = $minFare - (($fareReduce * $minFare) / 100);
        $ourOfferingFare = number_format($ourOfferingFare, 2);
        
        $map = view('frontEnd.ajax.map')->with(compact('pickup_latitude','pickup_longitude','drop_latitude','drop_longitude'))->render();
        
        $data = ['maxFare' => $maxFare, 'minFare' => $minFare, 'fareReducePercent' => $fareReduce, 'ourOfferingFare' => $ourOfferingFare,'duration'=>$duration,'map'=>$map];
        return response()->json(['response' => 'success', 'response_data' => $data]);

        // AdminBillSetting
    }
    
    public function safetyPage(){
        $cmsPage  = CmsPage::where('status','1')->where('id','4')->first();
        return view('frontEnd.safety')->with(compact('cmsPage'));
    }
    
    public function termsAndCondition(){
         $cmsPage  = CmsPage::where('status','1')->where('id','2')->first();
//        echo "<pre>";print_r($cmsPage->toArray());exit;
         $title = $cmsPage->title;
        return view('frontEnd.terms-condition')->with(compact('cmsPage','title'));
    }
    public function faqPage(){
        return view('frontEnd.faq');
    }
    public function guideline(){
         $cmsPage  = CmsPage::where('status','1')->where('id','3')->first();
//         echo "<pre>";print_r($cmsPage);exit;
        return view('frontEnd.guideline')->with(compact('cmsPage','title'));
    }

}
