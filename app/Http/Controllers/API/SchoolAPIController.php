<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\UpdateSchoolAPIRequest;
use App\Http\Requests\API\CreateSchoolAPIRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSchoolRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Repositories\SchoolRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\School;
use App\Models\Level;
use App\Models\City;
use App\Post;
use Response;
use Input;

/**
 * Class SchoolController
 * @package App\Http\Controllers\API
 */

class SchoolAPIController extends AppBaseController
{
    /** @var  SchoolRepository */
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Display a listing of the School.
     * GET|HEAD /schools
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $schools = $this->schoolRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($schools->toArray(), 'Schools retrieved successfully');
    }

    /**
     * Store a newly created School in storage.
     * POST /schools
     *
     * @param CreateSchoolAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $schoolModel = new School;
        $schoolModel->nama_sekolah = $request->nama_sekolah;
        $schoolModel->slug_sekolah = $request->slug_sekolah;
        $schoolModel->slug_sekolah = Str::slug($request->nama_sekolah, '-');
        $schoolModel->level_id = $request->level_id;
        $schoolModel->city_id = $request->city_id;
        $schoolModel->biaya_pendaftaran = $request->biaya_pendaftaran;
        $schoolModel->biaya_spp = $request->biaya_spp;
        $schoolModel->yayasan = $request->yayasan;
        $schoolModel->address = $request->address;
        $schoolModel->lat = $request->lat;
        $schoolModel->lng = $request->lng;
        $schoolModel->map = $request->map;
        $schoolModel->email = $request->email;
        $schoolModel->website = $request->website;
        $schoolModel->phone1 = $request->phone1;
        $schoolModel->phone2 = $request->phone2;
        $schoolModel->facebook = $request->facebook;
        $schoolModel->instagram = $request->instagram;
        $schoolModel->twitter = $request->twitter;
        $schoolModel->youtube = $request->youtube;
        $schoolModel->contact_person = $request->contact_person;
        $schoolModel->hp = $request->hp;
        $collection = 'logos';
            $filePath = '';
            
            if($request->hasFile("logo")) {
                $file = $request->file("logo");
                $name = time() . '_'. $file->getClientOriginalName();
                $filePath = $collection . '/' . $name;

                Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            }
        $schoolModel->logo = $request->logo;
        for ($i = 1; $i < 9; $i++){
            $collection = 'photo';
            $filePath = '';
            
            if($request->hasFile("photo".($i))) {
                $file = $request->file("photo".($i));
                $name = time() . '_'. $file->getClientOriginalName();
                $filePath = $collection . '/' . $name;

                Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            }
            $schoolModel->{"photo".($i)} = $filePath;
        }
        $schoolModel->video_profil = $request->video_profil;
        for ($i = 1; $i < 9; $i++){
            $collection = 'brochure';
            $filePath = '';
            
            if($request->hasFile("brochure".($i))) {
                $file = $request->file("brochure".($i));
                $name = time() . '_'. $file->getClientOriginalName();
                $filePath = $collection . '/' . $name;

                Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            }
            $schoolModel->{"brochure".($i)} = $filePath;
        }
        $schoolModel->short_description = $request->short_description;
        $schoolModel->description = $request->description;

        // \App\Models\SchoolFacility::where('school_id', $schoolModel->id)->delete();

        $schoolModel->save();

        foreach ($request->input('facilities', []) as $k=>$facility) {
            $schoolFacility = new \App\Models\SchoolFacility;
            $schoolFacility->school_id = $schoolModel->id;
            $schoolFacility->facility_id = $facility;
            $schoolFacility->save();
        }

        return $this->sendResponse('School saved successfully'.$filePath, 200);
    }


    /**
     * Display the specified School.
     * GET|HEAD /schools/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var School $school */
        $schools = $this->schoolRepository->find($id);

        if (empty($schools)) {
            return $this->sendError('School not found');
        }

        return $this->sendResponse($schools->toArray(), 'School retrieved successfully');
    }

    
    /**
     * Update the specified School in storage.
     * PUT/PATCH /schools/{id}
     *
     * @param int $id
     * @param UpdateSchoolAPIRequest $request
     *
     * @return Response
     */
    public function update($id, $request)
    {
        $input = $request->all();

        /** @var School $school */
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            return $this->sendError('School not found');
        }

        $school = $this->schoolRepository->update($input, $id);

        return $this->sendResponse($school->toArray(), 'School updated successfully');
    }

    /**
     * Remove the specified School from storage.
     * DELETE /schools/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var School $school */
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            return $this->sendError('School not found');
        }

        $school->delete();
        return $this->sendResponse($id, 'School deleted successfully');
    }

    public function getCities() {
        $theCities = City::all();
        $cities = [];
        $cities[] = ['id' => '', 'text' => 'Ketik nama Kota'];
        $cities[''] = 'Ketik nama Kota';

        foreach($theCities as $city) {
            $cities[] = ['id' => $city->id, 'text' => $city->city_province()];
            $cities[$city->id] = $city->city_province();
        }

        return $cities;
    }
    public function search() {
        $keyword = Input::get('keyword');
        $city = Input::get('city');
        $facilities_form = Input::get('facilities');
        $min_price = Input::get('min_price');
        $max_price = Input::get('max_price');
        $levels = Input::get('levels');
        $expand = false;

        $getSchools = School::orderBy('schools.created_at', 'desc')->where('status', 'Published')->get();

        if(!empty($keyword)) {
            $getSchools = School::where('nama_sekolah', 'LIKE', "%".$keyword."%")->get();
            $expand = true;
        }

        if(!empty($city)) {
            $getSchools = School::where('city_id', $city)->get();
            $expand = true;
        } 

        if(!isset($facilities_form)) $facilities_form=array();
        if(count($facilities_form) > 0) {
            foreach ($facilities_form as $ff) {
                School::whereHas('facilities', function ($query) use ($ff) {     
                    $query->where('facility_id', $ff);
                });
            }
            $expand = true;
        }

        if(!empty($min_price)) {
            $getSchools = School::where('biaya_spp', '>=', $min_price)->get();
            $expand = true;
        }

        if(!empty($max_price)) {
            $getSchools = School::where('biaya_spp', '<=', $max_price)->get();
            $expand = true;
        }

        if(!empty($levels)){
            $getSchools = School::where('level_id', $levels)->get();
            $expand = true;
        }
        

        if (count($getSchools) == 0){
            return $this->sendError('sekolah tidak ditemukan', 404);    
        }
        // $result = Schools::with('province')->get();
        // return $this->sendResponse($result, 'city muncul');
        return $this->sendResponse($getSchools, 'sekolah berhasil di temukan', 200);        
    }

   
}

// public function createschool(Request $request)
    // {
    // $validator = Validator::make($request->all(),[
    //     'level_id' => 'required',
    //     'city_id' => 'required',
    //     'nama_sekolah' => 'required',
    //     'biaya_pendaftaran' => 'required',
    //     'biaya_spp' => 'required',
    //     'yayasan' => 'required',
    //     'address' => 'required',
    //     'lat' => 'required',
    //     'lng' => 'required',
    //     'map' => 'required',
    //     'email' => 'required',
    //     'website' => 'required',
    //     'phone1' => 'required',
    //     'phone2' => 'required',
    //     'logo' => 'required',
    //     'photo1' => 'required',
    //     'photo2' => 'required',
    //     'photo3' => 'required',
    //     'photo4' => 'required',
    //     'video_profil' => 'required',
    //     'brochure' => 'required',
    //     'short_description' => 'required',
    //     'description' => 'required',

    // ]);

    // if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'silakan isi yang kosong',
    //             'data' => $validator->errors()
    //         ],401);
    // }else {
        
    //     $school = Post::create([
    //         'level_id' => $request->input('level_id'),
    //         'city_id' => $request->input('city_id'),
    //         'nama_sekolah' =>$request->input('nama_sekolah'),
    //         'biaya_pendaftaran' =>$request->input('biaya_pendaftaran'),
    //         'biaya_spp' =>$request->input('biaya_spp'),
    //         'yayasan' =>$request->input('yayasan'),
    //         'address' => $request->input('address'),
    //         'lat' =>$request->input('lat'),
    //         'lng' =>$request->input('lng'),
    //         'map' =>$request->input('map'),
    //         'email' =>$request->input('email'),
    //         'website' =>$request->input('website'),
    //         'phone1' =>$request->input('phone1'),
    //         'phone2' =>$request->input('phone2'),
    //         'logo' =>$request->input('logo'),
    //         'photo1' =>$request->input('photo1'),
    //         'photo2' =>$request->input('photo2'),
    //         'photo3' =>$request->input('photo3'),
    //         'photo4' =>$request->input('photo4'),
    //         'video_profil' =>$request->input('video_profile'),
    //         'brochure' =>$request->input('brochure'),
    //         'short_description' =>$request->input('short_description'),
    //         'description' =>$request->input('description')
    //     ]);

    //     if ($school) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Sekolah berhasil disimpan',
    //         ], 200);
    //     }else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Sekolah gagal disimpan',
    //         ],401);
    //     }
    //     }
    // }