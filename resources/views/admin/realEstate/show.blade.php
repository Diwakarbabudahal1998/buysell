
@extends('adminlte::page')

@section('title', 'View RealEstate')

@section('content_header')
<h4>View RealEstate</h4>
<hr>
@stop

@section('content')
<div class="container-fluid">
<form method="POST" action="" >
<h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Basic</h3>   
<div class="row mb-2">
    <div class="input-group col-md-6 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Property Title</div>
        </div>
        <input type="text" value="{{($real)?$real['property_name']:''}}" name="property_price" class="form-control"disabled/>
    </div>
  <div class="input-group col-md-4 mb-2 mr-sm-2 ">
    <div class="input-group-prepend">
      <div class="input-group-text bg-success">Price</div>
    </div>
    <input type="text" value="{{($real)?$real['property_price']:''}}" name="property_price" class="form-control"disabled/>
  </div>
</div>
<div class="row">
    <div class="input-group col-md-6 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Sale/Rent</div>
        </div>
        <input type="text" value="{{($real)?$real['property_status']:''}}" name="property_price" class="form-control"disabled/>
    </div>
  <div class="input-group col-md-5 mb-2 mr-sm-2 ">
    <div class="input-group-prepend">
      <div class="input-group-text bg-success">Price Status</div>
    </div>
    <input type="text" value="{{($real)?$real['price_status']:''}}" name="property_price" class="form-control"disabled/>
  </div>
</div>

  <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Location</h3>   
<div class="row">   
  <div class="input-group col-md-5 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Address</div>
        </div>
        <input type="text" value="{{($real)?$real['address']:''}}" name="property_price" class="form-control"disabled/>
  </div>
  <div class="input-group col-md-3 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">City</div>
        </div>
        <input type="text" value="{{($real)?$real['city']:''}}" name="property_price" class="form-control"disabled/>
  </div>
  <div class="input-group col-md-3 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Disrtict</div>
        </div>
        <input type="text" value="{{($real)?$real['district']:''}}" name="property_price" class="form-control"disabled/>
   </div>
</div>  

<div class="row">
    <div class="input-group col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Country</div>
        </div>
        <input type="text" value="{{($real)?$real['country']:''}}" name="property_price" class="form-control"disabled/>
  </div>
      
    <div class="input-group col-md-3 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Province</div>
        </div>
        <input type="text" value="{{($real)?$real['province']:''}}" name="property_price" class="form-control"disabled/>
  </div>
  <div class="input-group col-md-2 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Ward No</div>
        </div>
        <input
          type="number"
          class="form-control "
          placeholder=""
          id="ward_number"
          name="ward_number"
          value="{{$real['ward_number']}}"
          disabled
        />  </div>
  <div class="input-group col-md-2 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Zip Code</div>
        </div>
        <input type="text" value="{{($real)?$real['zip_code']:''}}" name="property_price" class="form-control"disabled/>
  </div>
</div>
<div class="row">
  <div class="input-group col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">House Number</div>
        </div>
        <input
          type="number"
          class="form-control"
          placeholder=""
          id="house_number"
          name="house_number"
          value="{{$real['house_number']}}"
          disabled
        />  
    </div>
    <div class="input-group col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Year Build</div>
        </div>
        <input
          type="number"
          class="form-control form-control"
          placeholder=""
          id="year_build"
          name="year_build"
          value="{{$real->year_build}}"
          disabled
        />
    </div>
</div>
<h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Features</h3> 
<div class="row">
    <div class="input-group col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Bedrooms </div>
        </div>
        <select
          name="number_of_bedrooms"
          id="number_of_bedrooms"
          class="form-control  ui-select"
          disabled
        >
        <option value="0"
          <?php
          if($real['number_of_bedrooms']=='0')
          {
            echo "selected";
          }
          ?>
          >0</option>
          <option value="1"
          <?php
          if($real['number_of_bedrooms']=='1')
          {
            echo "selected";
          }
          ?>
          >1</option>
          <option value="2"
          <?php
          if($real['number_of_bedrooms']=='2')
          {
            echo "selected";
          }
          ?>
          >2</option>
          <option value="3"
          <?php
          if($real['number_of_bedrooms']=='3')
          {
            echo "selected";
          }
          ?>
          >3</option>
          <option value="4"
          <?php
          if($real['number_of_bedrooms']=='4')
          {
            echo "selected";
          }
          ?>
          >4</option>
          <option value="5"
          <?php
          if($real['number_of_bedrooms']=='5')
          {
            echo "selected";
          }
          ?>
          >5</option>
          <option value="6"
          <?php
          if($real['number_of_bedrooms']=='6')
          {
            echo "selected";
          }
          ?>
          >6</option>
          <option value="7+"
          <?php
          if($real['number_of_bedrooms']=='7+')
          {
            echo "selected";
          }
          ?>
          >7+</option>
        </select>
    </div>
    <div class="input-group col-md-4 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Bathrooms</div>
        </div>
        <select
          name="number_of_bathrooms"
          id="number_of_bathrooms"
          class="form-control  ui-select"
          disabled
        >
          <option value="0"
          <?php
          if($real['number_of_bathrooms']=='0')
          {
            echo "selected";
          }
          ?>
          >0</option>
          <option value="1"
          <?php
          if($real['number_of_bathrooms']=='1')
          {
            echo "selected";
          }
          ?>
          >1</option>
          <option value="2"
          <?php
          if($real['number_of_bathrooms']=='2')
          {
            echo "selected";
          }
          ?>>2</option>
          <option value="3"
          <?php
          if($real['number_of_bathrooms']=='3')
          {
            echo "selected";
          }
          ?>
          >3</option>
          <option value="4"
          <?php
          if($real['number_of_bathrooms']=='4')
          {
            echo "selected";
          }
          ?>
          >4</option>
          <option value="5+"
          <?php
          if($real['number_of_bathrooms']=='5+')
          {
            echo "selected";
          }
          ?>
          >5+</option>
        </select>
    </div>
    
    <div class="input-group col-md-3 mb-2 mr-sm-2 ">
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Floors</div>
        </div>
        <select
          name="number_of_floors"
          id="number_of_floors"
          value="number_of_floors"
          class="form-control ui-select"
          disabled
        >
          <option value="0"
          <?php
          if($real['number_of_floors']=='0')
          {
            echo "selected";
          }
          ?>
          >0</option>
          <option value="1"
          <?php
          if($real['number_of_floors']=='1')
          {
            echo "selected";
          }
          ?>
          >1</option>
          <option value="2"
          <?php
          if($real['number_of_floors']=='2')
          {
            echo "selected";
          }
          ?>
          >2</option>
          <option value="3"
          <?php
          if($real['number_of_floors']=='3')
          {
            echo "selected";
          }
          ?>
          >3</option>
          <option value="4"
          <?php
          if($real['number_of_floors']=='4')
          {
            echo "selected";
          }
          ?>
          >4</option>
          <option value="5+"
          <?php
          if($real['number_of_floors']=='5+')
          {
            echo "selected";
          }
          ?>
          >5+</option>
        </select>
      </div>
    </div>  
</div>  
<div class="row">
    <div class="input-group col-md-4 mb-2 mr-sm-2 ">  
        <div class="input-group-prepend">
            <div class="input-group-text bg-success">Building Age </div>
        </div>
        <input
          type="number"
          class="form-control "
          value="{{$real['building_age']}}"
          id="building_age"
          name="building_age" 
          disabled/>
    </div>
</div>



  
<div class="form-group">
  <h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Additional Features</h3> 
    <div class="feature-list three_cols">
      <div> 
        <?php $yes=''; $no='';
        if($real['garden']=='yes')
          {
            $yes='<span class="badge badge-pill bg-success">Yes</span>';
          }
        else
          {
            $yes='<span class="badge badge-pill bg-danger">No</span>';
          }
          ?>
        <div>
          <label for="garden" class="mr-2">Garden</label>{!!$yes!!}
        </div>
      </div>
   
      <div>
       <?php $yes=''; $no='';
          if($real['gym']=='yes')
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
          if($real['internet']=='yes')
            {
                $yes='<span class="badge badge-pill bg-success">Yes</span>';
            }
           else
            {
               $yes='<span class="badge badge-pill bg-danger">No</span>';
            }
        ?>
        <label for="Internet" class="mr-2">Internet</label>{!!$yes!!}
      </div>

      <div>
        <?php $yes=''; $no='';
          if($real['swimming_pool']=='yes')
          {
            $yes='<span class="badge badge-pill bg-success">Yes</span>';
          }
          else
          {
             $yes='<span class="badge badge-pill bg-danger">No</span>';
          }
        ?>
        <label for="swimming_pool" class="mr-2">Swimming Pool</label>{!!$yes!!}
      </div>

      <div >
         <?php $yes=''; $no='';
          if($real['water']=='yes')
          {
            $yes='<span class="badge badge-pill bg-success">Yes</span>';
          }
          else
          {
            $yes='<span class="badge badge-pill bg-danger">No</span>';
          }
          ?>
          <label for="water" class="mr-2">Water</label>{!!$yes!!}
      </div>
      <div>
        <?php $yes=''; $no='';
          if($real['parking']=='yes')
          {
             $yes='<span class="badge badge-pill bg-success">Yes</span>';
          }
          else
          {
             $yes='<span class="badge badge-pill bg-danger">No</span>';
          }
          ?>
        
          <label for="Parking" class="mr-2">Parking</label>{!!$yes!!}
      </div>

      <div>
        <?php $yes=''; $no='';
          if($real['school_college_nearby']=='yes')
          {
            $yes='<span class="badge badge-pill bg-success">Yes</span>';
          }
          else
          {
            $yes='<span class="badge badge-pill bg-danger">No</span>';
          }
        ?>
        <label for="school_college_nearby" class="mr-2">School/College Nearby</label>{!!$yes!!}
      </div>

      <div>
        <?php $yes=''; $no='';
        if($real['shopping_nearby']=='yes')
          {
            $yes='<span class="badge badge-pill bg-success">Yes</span>';
          }
        else
          {
            $yes='<span class="badge badge-pill bg-danger">No</span>';
          }
        ?>
        <label for="shopping_nearby" class="mr-2">Shopping/GroceryNearby</label>{!!$yes!!}
      </div>

      <div >
      <?php $yes=''; $no='';
    if($real['bank_nearby']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="bank_nearby" class="mr-2">Bank</label>{!!$yes!!}
      </div>

      <div >
      <?php $yes=''; $no='';
    if($real['pitched_road']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="pitched_road" class="mr-2">Pitched Road</label>{!!$yes!!}
      </div>
      <div >
      <?php $yes=''; $no='';
    if($real['airport_nearby']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="airport_nearby" class="mr-2">Airport</label>{!!$yes!!}
      </div>
      <div >
      <?php $yes=''; $no='';
    if($real['sewage']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="sewage" class="mr-2">Sewage</label>{!!$yes!!}
      </div>
      <div >
      <?php $yes=''; $no='';
    if($real['alarm']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="alarm" class="mr-2">Alarm</label>{!!$yes!!}
      </div>
      <div >
      <?php $yes=''; $no='';
    if($real['cctv']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="cctv" class="mr-2">CCTV Camera</label>{!!$yes!!}
      </div>
      <div>
      <?php $yes=''; $no='';
    if($real['ac']=='yes')
    {
      $yes='<span class="badge badge-pill bg-success">Yes</span>';
    }
    else
    {
      $yes='<span class="badge badge-pill bg-danger">No</span>';
    }
    ?>
        <label for="ac" class="mr-2">Air Conditioning</label>{!!$yes!!}
      </div>
    </div>
  </div>

    
  
  <div class="form-group mb-5">
    <h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Property Description</h3> 
    <textarea
      class="form-control form-control-lg text-editor mb-5"
      name="description"
      id="description"
      rows="4"
      readonly
    >{!!$real->description!!}</textarea>
    
  </div>
</form>
@stop

@include('layouts.admin')
