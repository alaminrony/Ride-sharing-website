<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LatestNews;
use App\User;
use App\AdminBillSetting;
use App\HomeSlider;
use App\CmsPage;
use App\TextWidget;
use DB;
use Validator;

class HomeController extends Controller {

    public function index() {
        $latestNews = LatestNews::where('status', '1')->latest()->take(3)->get();
        $homeSlider = HomeSlider::where('status', '1')->latest()->take(5)->get();
        $sectionThree = TextWidget::where('position', '1')->where('status', '1')->first();
        // echo "<pre>";print_r($sectionThree->toArray());exit;
        $title = 'Home';
        return view('frontEnd.index')->with(compact('latestNews', 'homeSlider', 'title', 'sectionThree'));
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
        $sideBarNews = LatestNews::latest()->take(4)->get();
        return view('frontEnd.latestNews.blog-details')->with(compact('latestNews', 'users', 'sideBarNews'));
    }

    public function latestNewsByKeywords(Request $request) {

        $users = User::select(DB::raw("CONCAT(first_name,' ',last_name) as name"), 'id')->pluck('name', 'id')->toArray();
        $latestNews = LatestNews::where('key_words', 'LIKE', "%{$request->keywords}%")->paginate(6);
        return view('frontEnd.latestNews.latest-news-by-keywords')->with(compact('latestNews', 'users'));
    }

    public function distanceAndDuration(Request $request) {
//            echo "<pre>";print_r($request->all());exit;
        $rules = [
            'pickup_address' => 'required',
            'drop_address' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
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
        $request = $url . "?" . http_build_query($options);
        curl_setopt($ch, CURLOPT_URL, $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        if ($output['status'] == 'OK') {
            return $this->estimateFare($output, $pickup_latitude, $pickup_longitude, $drop_latitude, $drop_longitude);
        }
    }

    public function estimateFare($output, $pickup_latitude, $pickup_longitude, $drop_latitude, $drop_longitude) {

        $distanceMiter = $output['rows'][0]['elements'][0]['distance']['value'];
        $durationSecond = $output['rows'][0]['elements'][0]['duration']['value'];
        $duration = $output['rows'][0]['elements'][0]['duration']['text'];

        // Google provide distance in meters & we convert it to kilometer
        $distanceKM = $distanceMiter / 1000;
        // Google provide duration in second & we convert it to Minutes
        $dutationMinutes = ($durationSecond / 60);

        $allFares = AdminBillSetting::get();
        if ($allFares->isNotEmpty()) {
            $competitorFare = [];
            foreach ($allFares as $fare) {
                $competitorFare[$fare->id] = $fare->base_fare + ($fare->cost_per_minutes * $dutationMinutes) + ($fare->cost_per_kilometer * $distanceKM) + $fare->booking_fee;
            }
        }

        $maxFare = max($competitorFare);
        $minFare = min($competitorFare);
        $minFareFormat = number_format(min($competitorFare), 2);


        $reduceFare = DB::table('reduce_fares')->where('id', 1)->first();
        $fareReduce = $reduceFare->reduce_fare_percentage;

        $ourOfferingFare = $minFare - (($fareReduce * $minFare) / 100);
        $ourOfferingFareFormat = number_format($ourOfferingFare, 2);

//        echo "<pre>";print_r($ourOfferingFare);
//        echo "\n";
//        echo "<pre>";print_r($ourOfferingFareFormat);exit;


        $map = view('frontEnd.ajax.map')->with(compact('pickup_latitude', 'pickup_longitude', 'drop_latitude', 'drop_longitude'))->render();

        $data = ['maxFare' => $maxFare, 'minFare' => $minFareFormat, 'fareReducePercent' => $fareReduce, 'ourOfferingFare' => $ourOfferingFareFormat, 'duration' => $duration, 'map' => $map];
        return response()->json(['response' => 'success', 'response_data' => $data]);

        // AdminBillSetting
    }

    public function safetyPage() {
        $cmsPage = CmsPage::where('status', '1')->where('id', '4')->first();
        return view('frontEnd.safety')->with(compact('cmsPage'));
    }

    public function termsAndCondition() {
        $cmsPage = CmsPage::where('status', '1')->where('id', '2')->first();
//        echo "<pre>";print_r($cmsPage->toArray());exit;
        $title = $cmsPage->title;
        return view('frontEnd.terms-condition')->with(compact('cmsPage', 'title'));
    }

    public function faqPage() {
        $cmsPage = CmsPage::where('status', '1')->where('id', '5')->first();
        return view('frontEnd.faq')->with(compact('cmsPage'));
    }

    public function guideline() {
        $cmsPage = CmsPage::where('status', '1')->where('id', '3')->first();
//         echo "<pre>";print_r($cmsPage);exit;
        return view('frontEnd.guideline')->with(compact('cmsPage'));
    }

}
