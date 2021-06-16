<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use Response;
use Input;

class DetailController extends AppBaseController
{
    public function otherSchools()
    {
        $schoolId = Input::get('school_id');
        $levelId = Input::get('level_id');
        $cityId = Input::get('city_id');
        $other_schools_samelevelcity = School::orderBy('created_at', 'desc')
        ->where('id', '!=', $schoolId)
            ->where('level_id', '=', $levelId)
            ->where('city_id', '=', $cityId)
            ->where('status', 'Published')
            ->inRandomOrder()->take(4)
            ->get();

        $other_schools_samelevel = School::orderBy('created_at', 'desc')
            ->where('id', '!=', $schoolId)
            ->where('level_id', '=', $levelId)
            ->where('status', 'Published')
            ->inRandomOrder()->take(4)
            ->get();

        $other_schools  = $other_schools_samelevel->merge($other_schools_samelevelcity);

        if (count($other_schools) == 0){
            return $this->sendError('tidak ada sekolah', 404);    
        }

        return $this->sendResponse($other_schools, 'Schools retrieved successfully', 200);
    }
}
