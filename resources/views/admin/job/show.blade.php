@extends('adminlte::page')

@section('title', 'View Vacancy')

@section('content_header')
    <h4>View Vacancy</h4>
    <hr>
@stop

@section('content')
<div class="container-fluid">
    <form method="POST" action="" >
        <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Basic</h3>
        <div class="row mb-2">
            <div class="input-group col-md-6 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Company Name</div>
                </div>
                <input type="text" value="{{($job)?$job['company_name']:''}}" name="company_name" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-5 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Available position</div>
                </div>
                <input type="text" value="{{($job)?$job['available_position']:''}}" name="available_position" class="form-control"disabled/>
            </div>
        </div>
        <div class="row">
            <div class="input-group col-md-6 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Number of Vacancies</div>
                </div>
                <input type="text" value="{{($job)?$job['vacancy_number']:''}}" name="vacancy_number" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-5 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Experience</div>
                </div>
                <input type="text" value="{{($job)?$job['experience_years']:''}}" name="experience_years" class="form-control"disabled/>
            </div>
        </div>
        <div class="row">
            <div class="input-group col-md-6 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Salary</div>
                </div>
                <input type="text" value="{{($job)?$job['job_salary']:''}}" name="job_salary" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-5 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Working Hours</div>
                </div>
                <input type="text" value="{{($job)?$job['working_hours']:''}}" name="working_hours" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-6 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Vehicle</div>
                </div>
                <input type="text" value="{{($job)?$job['vehicle_status']:''}}" name="vehicle_status" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-5 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Category</div>
                </div>
                <input type="text" value="{{($job)?$job['category']:''}}" name="category_name" class="form-control"disabled/>
            </div>
        </div>

</div>
            <div class="form-group col-md-4">
                <label for="job_requirements">Requirements</label>
                <textarea
                    type="name"
                    name="job_requirements"
                    class="form-control form-control-lg"
                    placeholder="Job Requirements"
                    id="job_requirements"
                    readonly
                >{{$job['job_requirements']}}</textarea>
            </div>




        <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Location</h3>
        <div class="row">
            <div class="input-group col-md-4 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Address</div>
                </div>
                <input type="text" value="{{($job)?$job['address']:''}}" name="address" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-4 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">City</div>
                </div>
                <input type="text" value="{{($job)?$job['city']:''}}" name="city" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-4 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Distict</div>
                </div>
                <input type="text" value="{{($job)?$job['district']:''}}" name="district" class="form-control"disabled/>
            </div>
            <div class="input-group col-md-4 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Ward No</div>
                </div>
                <input
                    type="number"
                    class="form-control "
                    placeholder=""
                    id="ward_number"
                    name="ward_number"
                    value="{{$job['ward_number']}}"
                    disabled
                />
            </div>

        </div>

        <div class="row">
            <div class="input-group col-md-4 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Country</div>
                </div>
                <input type="text" value="{{($job)?$job['country']:''}}" name="country" class="form-control"disabled/>
            </div>

            <div class="input-group col-md-4 mb-2 mr-sm-2 ">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-success">Province</div>
                </div>
                <input type="text" value="{{($job)?$job['province']:''}}" name="province" class="form-control"disabled/>
            </div>
        </div>






        <div class="form-group">
            <h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Extra Facilities</h3>
            <div class="feature-list three_cols">
                <div>
                    <?php $yes=''; $no='';
                    if($job['gym']=='yes')
                    {
                        $yes='<span class="badge badge-pill bg-success">Yes</span>';
                    }
                    else
                    {
                        $yes='<span class="badge badge-pill bg-danger">No</span>';
                    }
                    ?>
                    <div>
                        <label for="gym" class="mr-2">Gym</label>{!!$yes!!}
                    </div>
                </div>

                <div>
                    <?php $yes=''; $no='';
                    if($job['health']=='yes')
                    {
                        $yes='<span class="badge badge-pill bg-success">Yes</span>';
                    }
                    else
                    {
                        $yes='<span class="badge badge-pill bg-danger">No</span>';
                    }
                    ?>
                    <div>
                        <label for="health_checkups" class="mr-2">Health Ceckups</label>{!!$yes!!}
                    </div>
                </div>

                <div>
                    <?php $yes=''; $no='';
                    if($job['lunch']=='yes')
                    {
                        $yes='<span class="badge badge-pill bg-success">Yes</span>';
                    }
                    else
                    {
                        $yes='<span class="badge badge-pill bg-danger">No</span>';
                    }
                    ?>
                    <label for="lunch" class="mr-2">Lunch</label>{!!$yes!!}
                </div>


                <div >
                    <?php $yes=''; $no='';
                    if($job['device']=='yes')
                    {
                        $yes='<span class="badge badge-pill bg-success">Yes</span>';
                    }
                    else
                    {
                        $yes='<span class="badge badge-pill bg-danger">No</span>';
                    }
                    ?>
                    <label for="device" class="mr-2">Laptop/Desktop</label>{!!$yes!!}
                </div>


                <div class="form-group mb-5">
                    <h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Job Description</h3>
                    <textarea
                        class="form-control form-control-lg text-editor mb-5"
                        name="description"
                        id="description"
                        rows="4"
                        readonly
                    >{{$job['description']}}</textarea>

                </div>
            </div>
            </form>

@stop

@include('layouts.admin')

