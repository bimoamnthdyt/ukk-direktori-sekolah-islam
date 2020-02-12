<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolDataTable;
use App\DataTables\VerifiedSchoolDataTable;
use App\DataTables\UnverifiedSchoolDataTable;
use App\DataTables\UnpublishedSchoolDataTable;
use App\DataTables\PublishedSchoolDataTable;
use App\DataTables\EditorChoiceSchoolDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Repositories\SchoolRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MediaController;
use Response;
use Illuminate\Support\Facades\Storage;
use Input;
use Illuminate\Support\Str;

class SchoolController extends AppBaseController
{
    /** @var  SchoolRepository */
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Display a listing of the School.
     *
     * @param SchoolDataTable $schoolDataTable
     * @return Response
     */
    public function index(SchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('schools.index');
    }

    public function verified(VerifiedSchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('schools.index');
    }

    public function unverified(UnverifiedSchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('schools.index');
    }

    public function unpublished(UnpublishedSchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('schools.index');
    }

    public function published(PublishedSchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('schools.index');
    }

    public function editor_choice(EditorChoiceSchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('schools.editor_choice');
    }

    /**
     * Show the form for creating a new School.
     *
     * @return Response
     */
    public function create()
    {
        $levels = $this->dropDownWithoutNone(\App\Models\Level::orderBy('sequence')->get(), 'name', 'id');
        $facilities = \App\Models\Facility::all();
        $users =$this->dropDownWithoutNone(\App\Models\User::all(), 'name', 'id');
        return view('schools.create', compact('levels', 'facilities', 'users'));
    }

    /**
     * Store a newly created School in storage.
     *
     * @param CreateSchoolRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolRequest $request)
    {
        $input = $request->all();
        
        $school = $this->schoolRepository->create($input);

        //$logo_url = Storage::disk('s3')->url($input['logo']);
        //$school->addMedia(storage_path('tmp/uploads/' . $input['logo']))->toMediaCollection('logos');
        //unlink(storage_path('tmp/uploads/' . $input['logo']));
        for($i = 0; $i < 8; $i++){
            $school->{"brochure".($i+1)} = null;
            $school->{"photo".($i+1)} = null;
        }

        foreach ($request->input('brochures', []) as $k=>$brochure) {
            if($k < 8) $school->{"brochure".($k+1)} = $brochure;
        }

        foreach ($request->input('photos', []) as $k=>$photo) {
            if($k < 8) $school->{"photo".($k+1)} = $photo;
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

        if(\App\Models\Role::isAdmin()) {
            $school->verified_at = date('Y-m-d H:i:s');
        }
        
        $school->save();

        Flash::success('School saved successfully.');

        return redirect(route('schools.index'));
    }

    /**
     * Display the specified School.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        return view('schools.show')->with('school', $school);
    }

    /**
     * Show the form for editing the specified School.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $school = $this->schoolRepository->find($id);
        
        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        $levels = $this->dropDownWithoutNone(\App\Models\Level::orderBy('sequence')->get(), 'name', 'id');
        $facilities = \App\Models\Facility::all();
        $users =$this->dropDownWithoutNone(\App\Models\User::all(), 'name', 'id');

        return view('schools.edit', compact('levels', 'facilities', 'users'))->with('school', $school);
    }

    /**
     * Update the specified School in storage.
     *
     * @param  int              $id
     * @param UpdateSchoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolRequest $request)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        $school = $this->schoolRepository->update($request->all(), $id);

        for($i = 0; $i < 8; $i++){
            $school->{"brochure".($i+1)} = null;
            $school->{"photo".($i+1)} = null;
        }

        foreach ($request->input('brochures', []) as $k=>$brochure) {
            if($k < 8) $school->{"brochure".($k+1)} = $brochure;
        }

        foreach ($request->input('photos', []) as $k=>$photo) {
            if($k < 8) $school->{"photo".($k+1)} = $photo;
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

        Flash::success('School updated successfully.');

        return redirect(route('schools.index'));
    }

    /**
     * Remove the specified School from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        if(\App\Models\Role::isAdmin() || 
            (\App\Models\Role::isContributor() && 
                ($school->created_by == auth()->user()->id || $school->assignee == auth()->user()->id)
            )
        ) { 
            $this->schoolRepository->delete($id);
            Flash::success('School deleted successfully.');
        } else {
            Flash::error('No permission!');
        }

        

        return redirect(route('schools.index'));
    }

    public function verify($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.unverified'));
        }
        
        $school->verified_at = date('Y-m-d H:i:s');
        $school->save();

        Flash::success('School verified successfully.');

        return redirect(route('schools.verified'));
    }

    public function publish($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.verified'));
        }

        $school->status = "Published";
        $school->published_at = \Carbon\Carbon::now();
        $school->save();

        Flash::success('School published successfully.');

        return redirect(route('schools.verified'));
    }

    public function unpublish($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.verified'));
        }

        $school->status = "Unpublished";
        $school->save();

        Flash::success('School unpublished successfully.');

        return redirect(route('schools.verified'));
    }

    public function make_choice($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.verified'));
        }

        $school->editor_choice = true;
        $school->save();

        Flash::success('School updated successfully.');

        return redirect(route('schools.editor_choice'));
    }

    public function remove_from_choice($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.verified'));
        }

        $school->editor_choice = false;
        $school->save();

        Flash::success('School updated successfully.');

        return redirect(route('schools.editor_choice'));
    }

    public function duplicate($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.show', ['id'=>$id]));
        }

        $newSchool = $school->replicate();
        $newSchool->save();

        $newSchool->nama_sekolah = $school->nama_sekolah.'_'.$newSchool->id;
        $newSchool->slug_sekolah = Str::slug($newSchool->nama_sekolah, '-');
        if(!empty($school->logo)) {
            $newLogoFilePath = (new MediaController)->copyMedia('logos', $school->logo);
        } else {
            $newLogoFilePath = null;
        }
        $newSchool->logo = $newLogoFilePath;

        for($i = 0; $i < 8; $i++){
            if(!empty($newSchool->{"brochure".($i+1)})) {
                $newBrochureFilePath = (new MediaController)->copyMedia('brochures', $school->{"brochure".($i+1)});
            } else {
                $newBrochureFilePath = null;
            }
            $newSchool->{"brochure".($i+1)} = !empty($newBrochureFilePath) ? $newBrochureFilePath : null;


            if(!empty($newSchool->{"photo".($i+1)})) {
                $newPhotoFilePath = (new MediaController)->copyMedia('photos', $school->{"photo".($i+1)});
            } else {
                $newPhotoFilePath = null;
            }
            $newSchool->{"photo".($i+1)} = !empty($newPhotoFilePath) ? $newPhotoFilePath : null;
        }

        $newSchool->created_at = date('Y-m-d H:i:s');
        $newSchool->updated_at = date('Y-m-d H:i:s');

        if(\App\Models\Role::isAdmin()) {
            $newSchool->verified_at = date('Y-m-d H:i:s');
        }
        $newSchool->status = 'Unpublished';
        $newSchool->published_at = null;

        $newSchool->created_by = auth()->user()->id;
        $newSchool->updated_by = auth()->user()->id;

        $newSchool->save();
        // $school->status = "Published";
        // $school->published_at = \Carbon\Carbon::now();
        // $school->save();

        // Flash::success('School published successfully.');

        // return redirect(route('schools.verified'));
        
        return redirect(route('schools.edit', ['id'=>$newSchool->id]));
        
    }
    /*
    public function storeMedia($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            return $this->sendError('School not found');
        }

        $collection = Input::get('collection');
        $filePath = '';

        if(Input::hasFile('file')) {
            $file = Input::file('file');
            $name = time() . '_'. $file->getClientOriginalName();
            $filePath = $collection . '/' . $name;

            $school->addMedia($filePath)->toMediaCollection($collection, 's3');
            //Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
        }

        return response()->json([
            'filePath' => $filePath,
        ]);
    }*/
}
