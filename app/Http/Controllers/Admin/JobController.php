<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\JobCategory;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job=Job::orderBy('created_at','desc')->where('status','active')->paginate(5);;
        return view('admin.job.index',compact('job'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=JobCategory::all()->where('status','active');
        if($category)
        {
            return view('admin.job.create',compact('category'));
        }
        else{
            return view('admin.job.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $job=new Job;
        $validatedData = $request->validated();
        $job->company_name=$request->company_name;
        $job->available_position=$request->available_position;
        $job->vacancy_number=$request->vacancy_number;
        $job->description=$request->description;
        $job->job_requirements=$request->job_requirements;
        $job->experience_years=$request->experience_years;
        $job->tole=$request->tole;
        $job->address=$request->address;
        $job->city=$request->city;
        $job->country=$request->country;
        $job->district=$request->district;
        $job->province=$request->province;
        $job->ward_number=$request->ward_number;
        $job->job_salary=$request->job_salary;
        $job->salary_status=$request->salary_status;
        $job->working_hours=$request->working_hours;
        $job->category=$request->category_name;
        $job->category=$request->category_name;
        $job->gym= ($request->gym==='yes')?$request->gym:'no';
        $job->health= ($request->health==='yes')?$request->health:'no';
        $job->lunch= ($request->lunch==='yes')?$request->lunch:'no';
        $job->device= ($request->device==='yes')?$request->device:'no';
        $job->vehicle_status=($request->vehicle_status)?$request->vehicle_status:'no';
        $job->featured=($request->featured==='yes')?$request->featured:'no';
        $job->user_id=Auth::user()->id;
        $job->status="active";
        $job->save();
        return redirect('admin/job');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job=Job::find($id);

        return view('admin.job.show',compact('job'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job=Job::find($id);
        $category=JobCategory::all()->where('status','active');
        if($category)
        {
            return view('admin.job.edit',compact('job','category'));
        }
        else{
            return view('admin.job.edit');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $job=Job::find($id);
        $validatedData = $request->validated();
        $job->company_name=$request->company_name;
        $job->available_position=$request->available_position;
        $job->vacancy_number=$request->vacancy_number;
        $job->description=$request->description;
        $job->job_requirements=$request->job_requirements;
        $job->experience_years=$request->experience_years;
        $job->tole=$request->tole;
        $job->address=$request->address;
        $job->city=$request->city;
        $job->country=$request->country;
        $job->district=$request->district;
        $job->province=$request->province;
        $job->ward_number=$request->ward_number;
        $job->job_salary=$request->job_salary;
        $job->salary_status=$request->salary_status;
        $job->working_hours=$request->working_hours;
        $job->category=$request->category_name;
        $job->gym= ($request->gym==='yes')?$request->gym:'no';
        $job->health= ($request->health==='yes')?$request->health:'no';
        $job->lunch= ($request->lunch==='yes')?$request->lunch:'no';
        $job->device= ($request->device==='yes')?$request->device:'no';
        $job->vehicle_status=($request->vehicle_status)?$request->vehicle_status:'no';
        $job->featured=($request->featured==='yes')?$request->featured:'no';
        $job->user_id=Auth::user()->id;
        $job->status="active";
        $job->save();
        return redirect('admin/job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=Job::find($id);
        $job->status="inactive";
        $job->save();
        return redirect('/admin/job');
    }

    public function search(Request $request)
    {

        $job=Job::where('company_name','LIKE',"%{$request->search}%")
            ->orWhere('available_position','LIKE',"%{$request->search}%")

            ->paginate(5);
        return view('admin.job.index',compact('job'));
    }

    public function viewCategory()
    {
        $category=JobCategory::orderBy('created_at', 'desc')->where('status','active')->paginate(5);
        if($category)
        {
            return view('admin.job.category',compact('category'));
        }
        else{
            return view('admin.job.category');

        }
    }
    public function addCategory(Request $request)
    {
        $category=new JobCategory;
        $category->category_name=$request->category_name;
        $category->status="active";
        $category->save();
        return redirect('/admin/job/category/create');
    }
    public function deleteCategory($id)
    {
        $category=JobCategory::find($id);
        $category->status="inactive";
        $category->save();
        return redirect('/admin/job/category/create');

    }



}
