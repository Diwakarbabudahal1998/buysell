
@extends('adminlte::page')

@section('title', 'Edit RealEstate')


@section('content_header')
<div class="row">
<div class=" col-md-4  admin-title">Edit Realestate</div>
<a href="/admin/realestate/{{$real->id}}/photos" class="btn btn-danger pull-left offset-md-6 col-md-2 ">
<i class="far fa-image mr-1"></i>Edit Photos</a>
</div>

<hr>
@stop

@section('content')
<div class="container-fluid">
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

<form method="POST" action="/admin/realestate/{{$real->id}}" >
@csrf
{{method_field("PUT")}}
  <div class="form-group col-md-6">
    <label for="property_name">Property Title</label>
    <input
      type="text"

      class="form-control form-control-lg"
      value="{{ $real->property_name}}"
      name='property_name'
      id="property_name"
      autofocus
    />
  </div>
  <div class="form-group col-md-6">
    <label>Price</label>
    <input
      type="text"
      value="{{($real)?$real['property_price']:''}}"
      name="property_price"
      class="form-control form-control-lg"
    />
  </div>
  <div class="form-group">
    <label>For Sale/Rent?</label>
    <div>
    <?php $rent=''; $sale='';
        ;if($real['property_status']=='sell')
    {
      $sale='checked';
    }
    else
    {
      $rent='checked';
    }
    ?>
      <div class="radio radio-inline">

        <input type="radio" name="property_status" id="rent" value="{{$real['property_status']}}"{!!$rent!!}/>
        <label for="rent">Rent</label>
      </div>
      <div class="radio radio-inline">
        <input type="radio" name="property_status" id="sale" value="{{$real['property_status']}}"{!!$sale!!}/>
        <label for="sale">Sale</label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Is  Price Fixed/Negotiable?</label>
    <div>
    <?php $fixed=''; $negotiable='';
    if($real['price_status']=='fixed')
    {
      $fixed='checked';
    }
    else
    {
      $negotiable='checked';
    }
    ?>
      <div class="radio radio-inline">
        <input type="radio" name="price_status" id="fixed" value="{{($real['price_status'])}}" {!!$fixed!!}/>
        <label for="fixed">Fixed</label>
      </div>
      <div class="radio radio-inline">
        <input type="radio" name="price_status" id="negotiable" value="{{($real['price_status'])}}" {!!$negotiable!!}/>
        <label for="negotiable">Negotiable</label>
      </div>
    </div>
  </div>
  <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Location</h3>
  <div class="row">

    <div class="col-lg-5">
      <div class="form-group">
        <label>Address</label>
        <input
          type="text"
          class="form-control form-control-lg"
          id="address"
          name="address"
          value="{{$real['address']}}"
        />
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label>City</label>
        <input
          type="text"
          class="form-control form-control-lg"
          id="city"
          name="city"
          value="{{$real['city']}}"
        />
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label>District</label>
        <input
          type="text"
          class="form-control form-control-lg"
          id="district"
          name="district"
          value="{{$real['district']}}"
        />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="form-group">
        <label>Country</label>
        <input
          type="text"
          class="form-control form-control-lg"
          placeholder=""
          id="country"
          name="country"
          value="{{$real['country']}}"
        />
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label>Province</label>
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder=""
          id="province"
          name="province"
          value="{{$real['province']}}"
        />
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>Ward No</label>
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder=""
          id="ward_number"
          name="ward_number"
          value="{{$real['ward_number']}}"
        />
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>Zipcode</label>
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder=""
          id="zip_code"
          name="zip_code"
          value="{{$real['zip_code']}}"
        />
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-lg-3">
      <div class="form-group">
        <label>House Number</label>
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder=""
          id="house_number"
          name="house_number"
          value="{{$real['house_number']}}"
        />
      </div>
    </div>


    <div class="col-lg-3">
      <div class="form-group">
        <label>Area Sq/ft</label>
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder=""
          id="property_area"
          name="property_area"
          value="{{$real->property_area}}"
        />
      </div>
    </div>
  </div>
  <h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Features</h3>


  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <label for="bedrooms">Bedrooms</label>
        <select
          name="number_of_bedrooms"
          id="number_of_bedrooms"
          class="form-control form-control-lg ui-select"
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
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label for="number_of_bathrooms">Bathrooms</label>
        <select
          name="number_of_bathrooms"
          id="number_of_bathrooms"
          class="form-control form-control-lg ui-select"
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
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label for="bathrooms">Floors</label>
        <select
          name="number_of_floors"
          id="number_of_floors"
          value="number_of_floors"
          class="form-control form-control-lg ui-select"
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

    <div class="col-md-4">
      <div class="form-group">
        <label>Building Age</label>
        <input
          type="number"
          class="form-control form-control-lg"
          value="{{$real['building_age']}}"
          id="building_age"
          name="building_age" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <h3 class="subheadline">Additional Features</h3>
    <div class="feature-list three_cols">
    <?php $yes=''; $no='';
    if($real['garden']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
      <div class="checkbox">
        <input type="checkbox" id="garden" name="garden" value="yes" {!!$yes!!}/>
        <label for="garden">Garden</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['gym']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="gym" name="gym" value="yes" {!!$yes!!}/>
        <label for="gym">Gym</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['internet']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="internet" name="internet" value="yes" {!!$yes!!}/>
        <label for="Internet">Internet</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['swimming_pool']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="swimming_pool" value="yes"name="swimming_pool"  {!!$yes!!}/>
        <label for="swimming_pool">Swimming Pool</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['water']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="water" name="water" value="yes" {!!$yes!!}/>
        <label for="water">Water</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['parking']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="parking" name="parking" value="yes" {!!$yes!!}/>
        <label for="Parking">Parking</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['school_college_nearby']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="school_college_nearby" name="school_college_nearby" value="yes" {!!$yes!!}/>
        <label for="school_college_nearby">School/College Nearby</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['shopping_nearby']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="shopping_nearby" name="shopping_nearby" value="yes" {!!$yes!!}/>
        <label for="shopping_nearby">Shopping/GroceryNearby</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['bank_nearby']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="bank_nearby" name="bank_nearby" value="yes" {!!$yes!!}/>
        <label for="bank_nearby">Bank</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['pitched_road']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="pitched_road" name="pitched_road" value="yes" {!!$yes!!}/>
        <label for="pitched_road">Pitched Road</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['airport_nearby']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="airport_nearby" name="airport_nearby" value="yes" {!!$yes!!}/>
        <label for="airport_nearby">Airport</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['sewage']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="sewage" name="sewage" value="yes" {!!$yes!!}/>
        <label for="sewage">Sewage</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['alarm']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="alarm" name="alarm" value="yes" {!!$yes!!}/>
        <label for="alarm">Alarm</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['cctv']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="cctv" name="cctv" value="yes" {!!$yes!!} />
        <label for="cctv">CCTV Camera</label>
      </div>
      <div class="checkbox">
      <?php $yes=''; $no='';
    if($real['ac']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }
    ?>
        <input type="checkbox" id="ac" name="ac" value="yes" {!!$yes!!}/>
        <label for="ac">Air Conditioning</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Property Description</label>

    <textarea
      class=" description form-control form-control-lg text-editor"
      name="description"
      id="description"
    >{{$real['description']}}</textarea>
  </div>

  <div class="form-group">
    <div class="checkbox">
<?php    if($real['featured']=='yes')
    {
      $yes='checked';
    }
    else
    {
      $no="checked";
    }?>
      <input type="checkbox" id="featured" name="featured" value="yes" {!!$yes!!}/>
      <label for="featured">Yes ‚ feature this listing. </label>
    </div>
  </div>
  <hr />
  <div class="form-group">
    <button type="submit" class="btn btn-lg btn-primary mb-3">
    <i class="fas fa-pen-square pr-1"></i>Update
    </button>
  </div>
</form>
</div>
@stop

@include('layouts.admin')
