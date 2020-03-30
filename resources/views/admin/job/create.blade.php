



@extends('adminlte::page')




@section('title', 'Job Vacancy')


@section('content_header')
    <div class="admin-title">Add Vacancy</div>
    <hr>
@stop

@section('content')

<div class="container-fluid">
    <form class=""  method="POST" action="/admin/job" enctype="multipart/form-data">

        @csrf

        <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Basic</h3>

        <div class="row">
            <div class="form-group col-md-4" @if ($errors->has('company_name')) has-error @endif>
                <label for="company_name">Company Name</label>   <span class="text-danger font-weight-bold">*</span>
                <input
                    type="text"
                    name="company_name"
                    class="form-control form-control-lg"
                    placeholder="Company Name"

                    id="company_name"
                    autofocus
                />
                @if ($errors->has('company_name')) <p class="text-danger">{{ $errors->first('company_name') }}</p> @endif
                <div class="text-danger"></div>
            </div>

            <div class="form-group col-md-4" @if ($errors->has('available_position')) has-error @endif>
                <label>Available Position</label>   <span class="text-danger font-weight-bold">*</span>
                <input
                    type="text"
                    placeholder="Available Position"
                    name="available_position"
                    class="form-control form-control-lg"
                />
                @if ($errors->has('available_position')) <p class="text-danger">{{ $errors->first('available_position') }}</p> @endif
                <div class="text-danger"></div>
            </div>

            <div class="col-sm-3">
                <div class="form-group" @if ($errors->has('vacancy_number')) has-error @endif>
                    <label for="category">Number of Vacancies</label>  <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="number"
                        placeholder="0"
                        name="vacancy_number"
                        class="form-control form-control-lg"
                    />
                    @if ($errors->has('vacancy_number')) <p class="text-danger">{{ $errors->first('vacancy_number') }}</p> @endif
                    <div class="text-danger"></div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="form-group col-md-4"@if ($errors->has('experience_years')) has-error @endif>
                <label for="experience_years">Experience</label>   <span class="text-danger font-weight-bold">*</span>
                <input
                    type="number"
                    name="experience_years"
                    class="form-control form-control-lg"
                    placeholder="Experience In Years"

                    id="experience_years"
                    autofocus
                />
                @if ($errors->has('experience_years')) <p class="text-danger">{{ $errors->first('experience_years') }}</p> @endif
                <div class="text-danger"></div>
            </div>

            <div class="form-group col-md-4" @if ($errors->has('job_salary')) has-error @endif>
                <label>Salary</label>   <span class="text-danger font-weight-bold">*</span>
                <input
                    type="number"
                    placeholder="Salary in Rs"
                    name="job_salary"
                    class="form-control form-control-lg"
                />
                @if ($errors->has('job_salary')) <p class="text-danger">{{ $errors->first('job_salary') }}</p> @endif
                <div class="text-danger"></div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="vehicle_status">Vehicle</label>  <span class="text-danger font-weight-bold">*</span>
                    <select
                        name="vehicle_status"
                        id="vehicle_status"
                        class="form-control form-control-lg "
                    >
                        <option value="none">None</option>
                        <option value="office">Office</option>
                        <option value="personal">Personal</option>

                    </select>
                    @error('vehicle_status')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>


        </div>

        <div class="row">
            <div class="form-group col-md-4"@if ($errors->has('job_requirements')) has-error @endif>
                <label for="property_name">Requirements</label>   <span class="text-danger font-weight-bold">*</span>
                <textarea
                    type="name"
                    name="job_requirements"
                    class="form-control form-control-lg"
                    placeholder="Job Requirements"
                    id="job_requirements"
                    autofocus
                ></textarea>
                @if ($errors->has('job_requirements')) <p class="text-danger">{{ $errors->first('job_requirements') }}</p> @endif
                <div class="text-danger"></div>
            </div>

            <div class="form-group col-md-4"@if ($errors->has('working_hours')) has-error @endif>
                <label>Working Hours</label>   <span class="text-danger font-weight-bold">*</span>
                <input
                    type="number"
                    placeholder="Working Hours"
                    name="working_hours"
                    class="form-control form-control-lg"
                />
                @if ($errors->has('working_hours')) <p class="text-danger">{{ $errors->first('working_hours') }}</p> @endif
                <div class="text-danger"></div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="category">Category</label>  <span class="text-danger font-weight-bold">*</span>
                    <select
                        name="category_name"
                        id="category_name"
                        class="form-control form-control-lg "
                    >
                        @foreach($category as $c)
                            <option value="{{$c->category_name}}">{{$c->category_name}}</option>
                        @endforeach

                    </select>
                    @error('category_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-sm-3"@if ($errors->has('salary_status')) has-error @endif>

            <label>Is  Salary Fixed/Negotiable?</label>   <span class="text-danger font-weight-bold">*</span>

            <span class="text-danger"></span>

            <div>
                <div class="radio radio-inline">
                    <input type="radio" name="salary_status" id="fixed" value="fixed" />
                    <label for="fixed">Fixed</label>
                </div>
                <div class="radio radio-inline">
                    <input type="radio" name="salary_status" id="negotiable" value="negotiable" />
                    <label for="negotiable">Negotiable</label>
                </div>
            </div>
            @if ($errors->has('salary_status')) <p class="text-danger">{{ $errors->first('salary_status') }}</p> @endif
        </div>


        <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Location</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group"@if ($errors->has('tole')) has-error @endif>
                    <label>Tole</label>   <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        id="tole"
                        name="tole"
                        placeholder="Tole"
                    />
                    @if ($errors->has('tole')) <p class="text-danger">{{ $errors->first('tole') }}</p> @endif
                    <div class="text-danger"></div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"@if ($errors->has('address')) has-error @endif>
                    <label>Address</label>   <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        id="address"
                        name="address"
                        placeholder="Address"
                    />
                    @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
                    <div class="text-danger"></div>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"@if ($errors->has('city')) has-error @endif>
                    <label>City</label>   <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        id="city"
                        name="city"
                        placeholder="City"
                    />
                    @if ($errors->has('city')) <p class="text-danger">{{ $errors->first('city') }}</p> @endif
                    <div class="text-danger"></div>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"@if ($errors->has('district')) has-error @endif>
                    <label>District</label>   <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        id="district"
                        name="district"
                        placeholder="District"
                    />
                    @if ($errors->has('district')) <p class="text-danger">{{ $errors->first('district') }}</p> @endif
                    <div class="text-danger"></div>

                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group"@if ($errors->has('province')) has-error @endif>
                    <label for="province">Province</label>  <span class="text-danger font-weight-bold">*</span>
                    <select
                        name="province"
                        id="province"
                        class="form-control form-control-lg "
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    @if ($errors->has('province')) <p class="text-danger">{{ $errors->first('province') }}</p> @endif
                    <div class="text-danger"></div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group"@if ($errors->has('country')) has-error @endif>
                    <label>Country</label>   <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        id="country"
                        name="country"
                        placeholder="Country"
                    />
                    @if ($errors->has('country')) <p class="text-danger">{{ $errors->first('country') }}</p> @endif
                    <div class="text-danger"></div>

                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group"@if ($errors->has('ward_number')) has-error @endif>
                    <label>Ward No</label>  <span class="text-danger font-weight-bold">*</span>
                    <input
                        type="number"
                        class="form-control form-control-lg"
                        id="ward_number"
                        name="ward_number"
                        placeholder="Ward No"
                    />
                    @if ($errors->has('ward_number')) <p class="text-danger">{{ $errors->first('ward_number') }}</p> @endif
                    <div class="text-danger"></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h3 class="subheadline  my-4  text-uppercase font-weight-bold text-danger">Extra Facilities</h3>
            <div class="feature-list ">
                <div class="checkbox">
                    <input type="checkbox" id="gym" name="gym" value="yes" />
                    <label for="gym">Gym</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="health" name="health" value="yes"/>
                    <label for="health">Health Checkups</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="lunch" name="lunch" value="yes"/>
                    <label for="lunch">Lunch</label>
                </div>

                <div class="checkbox">
                    <input type="checkbox" id="device" name="device" value="yes"/>
                    <label for="device">Laptop/Desktop</label>
                </div>

            </div>
            </div>

        <div class="form-group"@if ($errors->has('description')) has-error @endif>
            <label>Job Description</label>  <span class="text-danger font-weight-bold">*</span>
            <span class="text-danger"></span>
            <textarea
                class=" description form-control form-control-lg text-editor"
                name="description"
                id="description"
            ></textarea>
            @if ($errors->has('description')) <p class="text-danger">{{ $errors->first('description') }}</p> @endif
        </div>
        <div class="form-group">
            <div class="checkbox">
                <input type="checkbox" id="featured" name="featured" value="yes"/>
                <label for="featured">Yes ‚ feature this listing. </label>
            </div>
        </div>
        <hr />

        <div class="form-group">
            <button type="submit"id="submit" class="btn btn-lg btn-primary mb-2" >

                Save
            </button>
        </div>









    </form>
</div>


@stop

@include('layouts.admin')

