<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSchoolRequest;
use App\Repositories\SchoolRepository;
use Exception;
use Flash;
use Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class WebController extends AppBaseController
{
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        //$this->middleware('auth');
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = \App\Models\Facility::where('display', true)->get();
        $editor_choices = \App\Models\School::orderBy('created_at', 'desc')->where('status', 'Published')->where('editor_choice', true)->take(4)->get();
        $latest_schools = \App\Models\School::orderBy('created_at', 'desc')->where('status', 'Published')->orderBy('published_at', 'desc')->take(8)->get();
        $levels = \App\Models\Level::orderBy('sequence')->get();

        $cities = $this->getCities();

        return view('web.index', compact('facilities', 'editor_choices', 'latest_schools', 'levels', 'cities'));
    }

    public function getCities() {
        $theCities = \App\Models\City::all();
        $cities = [];
        //$cities[] = ['id' => '', 'text' => 'Ketik nama Kota'];
        $cities[''] = 'Ketik nama Kota';

        foreach($theCities as $city) {
            //$cities[] = ['id' => $city->id, 'text' => $city->city_province()];
            $cities[$city->id] = $city->city_province();
        }

        return $cities;
    }

    public function detail($slug_sekolah)
    {
        $school = \App\Models\School::where('slug_sekolah', $slug_sekolah)->first();

        if(empty($school)) {
            return abort(404);
        }

        $facilities = \App\Models\Facility::where('display', true)->get();
        
        $other_schools_samelevelcity = \App\Models\School::orderBy('created_at', 'desc')
            ->where('id', '!=', $school->id)
            ->where('level_id', '=', $school->level_id)
            ->where('city_id', '=', $school->city_id)
            ->where('status', 'Published')
            ->inRandomOrder()->take(4)
            ->get();

        $other_schools_samelevel = \App\Models\School::orderBy('created_at', 'desc')
            ->where('id', '!=', $school->id)
            ->where('level_id', '=', $school->level_id)
            ->where('status', 'Published')
            ->inRandomOrder()->take(4)
            ->get();

        $other_schools  = $other_schools_samelevel->merge($other_schools_samelevelcity);

        $levels = \App\Models\Level::orderBy('sequence')->get();

        $cities = $this->getCities();
        $title = $school->nama_sekolah;

        return view('web.detail', compact('school', 'title', 'facilities', 'other_schools', 'levels', 'cities'));
    }

    public function search() {
        $keyword = Input::get('keyword');
        $city = Input::get('city');
        $facilities_form = Input::get('facilities');
        $min_price = Input::get('min_price');
        $max_price = Input::get('max_price');
        $expand = false;

        $facilities = \App\Models\Facility::where('display', true)->get();
        $cities = $this->getCities();

        $schools = \App\Models\School::orderBy('schools.created_at', 'desc')
            ->where('status', 'Published');

        if(!empty($keyword)) {
            $schools = $schools->where('nama_sekolah', 'LIKE', "%{$keyword}%");
        }

        if(!empty($city)) {
            $schools = $schools->where('city_id', $city);
        }

        if(!isset($facilities_form)) $facilities_form=array();
        if(count($facilities_form) > 0) {
            foreach ($facilities_form as $ff) {
                $schools->whereHas('facilities', function ($query) use ($ff) {     
                    $query->where('facility_id', $ff);
                });
            }
            $expand = true;
        }

        if(!empty($min_price)) {
            $schools = $schools->where('biaya_spp', '>=', $min_price);
            $expand = true;
        }

        if(!empty($max_price)) {
            $schools = $schools->where('biaya_spp', '<=', $max_price);
            $expand = true;
        }
        
        $schools = $schools->paginate(config('app.pagination_page', 40))->appends(request()->except('page'));
        
        return view('web.search', compact(
            'schools', 
            'facilities', 
            'cities', 
            'city', 
            'keyword', 
            'min_price', 
            'max_price', 
            'facilities_form',
            'expand'
        ));
    }

    public function level($name) {
        $level = \App\Models\Level::where('name', $name)->first();

        if(empty($level)) {
            return abort(404);
        }

        $title = $level->description;

        $schools = \App\Models\School::orderBy('created_at', 'desc')
            ->where('level_id', $level->id)
            ->where('status', 'Published');

        $schools = $schools->paginate(config('app.pagination_page', 40))->appends(request()->except('page'));

        return view('web.level', compact('schools', 'level', 'title'));
    }

    public function submit() {
        //$provinces = $this->dropDown(\App\Models\Province::orderBy('name')->get(), 'name', 'id', 'Pilih Provinsi');
        $theCities = \App\Models\City::all();
        $levels = $this->dropDownWithoutNone(\App\Models\Level::orderBy('sequence')->get(), 'name', 'id');
        $facilities = \App\Models\Facility::all();
        $cities = [];

        foreach($theCities as $city) {
            $cities[$city->id] = $city->city_province();
        }

        $title = "Submit Data";

        return view('web.submit', compact('levels', 'facilities', 'cities', 'title'));
    }

    public function store(CreateSchoolRequest $request)
    {
        $input = $request->all();
        
        $school = $this->schoolRepository->create($input);

        for($i = 0; $i < 8; $i++){
            $school->{"brochure".($i+1)} = null;
            $school->{"photo".($i+1)} = null;
        }

        foreach ($request->input('brochures', []) as $k=>$brochure) {
            $school->{"brochure".($k+1)} = $brochure;
        }

        foreach ($request->input('photos', []) as $k=>$photo) {
            $school->{"photo".($k+1)} = $photo;
        }

        \App\Models\SchoolFacility::where('school_id', $school->id)->delete();

        foreach ($request->input('facilities', []) as $k=>$facility) {
            $schoolFacility = new \App\Models\SchoolFacility;
            $schoolFacility->school_id = $school->id;
            $schoolFacility->facility_id = $facility;
            $schoolFacility->save();
        }

        $school->biaya_pendaftaran = str_replace(',', '', $school->biaya_pendaftaran);
        $school->biaya_spp = str_replace(',', '', $school->biaya_spp);
        $school->slug_sekolah = Str::slug($school->nama_sekolah, '-');
        
        $school->save();

        $apiToken = "1595239233:AAEXNMdImNppyz_Xl5hb5ShUdtfhc8yyr7Y";
        $data = [
            'chat_id' => '721270213',
            'text' => 'Ada yang Baru Daftar'

        ];

        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

        Flash::success('Data sekolah berhasil ditambahkan.');

        return redirect(route('web.submit', 'response'));
        
    }
  

    public function subscribe() {
        $email = Input::get('email_subscribe');

        $subsriber = new \App\Models\Subscriber;
        $subsriber->email = $email;
        $subsriber->save();

        return redirect(route('web.subscribed'));
    }

    public function subscribed() {
        $title = "Subscribed";
        return view('web.subscribed', compact('title'));
    }

    public function tentang() {
        $title = "Tentang";
        return view('web.tentang', compact('title'));
    }

    public function contact() {
        $title = "Contact";
        return view('web.contact', compact('title'));
    }
}
