
@extends('adminlte::page')

@section('title', 'Create RealEstate')


@section('content_header')
<div class="admin-title">Add Realestate</div>
<hr>
@stop

@section('content')
<div class="container-fluid">

<form method="POST" action="/admin/realestate" enctype="multipart/form-data">
@csrf

<div class="row">
  <div class="form-group col-md-4">
    <label for="property_name">Property Title</label>   <span class="text-danger font-weight-bold">*</span>
    <input
      type="text"
      name="property_name"
      class="form-control form-control-lg"
      placeholder="Property Title"

      id="property_name"
      autofocus
    />
    @error('property_name')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label>Price</label>   <span class="text-danger font-weight-bold">*</span>
    <input
      type="number"
      placeholder="Price in Rs"
      name="property_price"
      class="form-control form-control-lg"
    />
    @error('property_price')
    <div class="text-danger">{{$message}}</div>
    @enderror
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
  <div class="form-group col-md-6">
    <label>For Sale/Rent?</label>   <span class="text-danger font-weight-bold">*</span>
    @error('property_status')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <div>
      <div class="radio radio-inline">
        <input type="radio" name="property_status" id="rent" value="rent" />
        <label for="rent">Rent</label>
      </div>
      <div class="radio radio-inline">
        <input type="radio" name="property_status" id="sell" value="sell" />
        <label for="sell">Sell</label>
      </div>
    </div>
  </div>
  
  <div class="form-group col-md-6">
    <label>Is  Price Fixed/Negotiable?</label>   <span class="text-danger font-weight-bold">*</span>
    @error('price_status')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <div>
      <div class="radio radio-inline">
        <input type="radio" name="price_status" id="fixed" value="fixed" />
        <label for="fixed">Fixed</label>
      </div>
      <div class="radio radio-inline">
        <input type="radio" name="price_status" id="negotiable" value="negotiable" />
        <label for="negotiable">Negotiable</label>
      </div>
    </div>
  </div>
  <h3 class="subheadline my-4 text-uppercase font-weight-bold text-danger">Location</h3>   
  <div class="row">
  <div class="col-md-3">
      <div class="form-group">
        <label>Tole</label>   <span class="text-danger font-weight-bold">*</span>
        <input
          type="text"
          class="form-control form-control-lg"
          id="tole"
          name="tole"
          placeholder="Tole"
        />
        @error('address')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label>Address</label>   <span class="text-danger font-weight-bold">*</span>
        <input
          type="text"
          class="form-control form-control-lg"
          id="address"
          name="address"
          placeholder="Address"
        />
        @error('address')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>City</label>   <span class="text-danger font-weight-bold">*</span>
        <input
          type="text"
          class="form-control form-control-lg"
          id="city"
          name="city"
          placeholder="City"
        />
        @error('city')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>District</label>   <span class="text-danger font-weight-bold">*</span>
        <input
          type="text"
          class="form-control form-control-lg"
          id="district"
          name="district"
          placeholder="District"
        />
        @error('district')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-sm-1">
      <div class="form-group">
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
        @error('province')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>

    <div class="col-lg-3">
      <div class="form-group">
        <label>Country</label>   <span class="text-danger font-weight-bold">*</span>
        <input
          type="text"
          class="form-control form-control-lg"
          id="country"
          name="country"
          placeholder="Country"
        />
        @error('country')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
   
    <div class="col-lg-2">
      <div class="form-group">
        <label>Ward No</label>  <span class="text-danger font-weight-bold">*</span>
        <input
          type="number"
          class="form-control form-control-lg"
          id="ward_number"
          name="ward_number"
          placeholder="Ward No"
        />
        @error('ward_number')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
      </div>
      <div class="col-lg-2">
      <div class="form-group">
        <label>Zipcode</label>  <span class="text-danger font-weight-bold">*</span>
        <input
          type="number"
          class="form-control form-control-lg"
          id="zip_code"
          name="zip_code"
          placeholder="Zip Code"
        />
        @error('zip_code')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
  
 
  <div class="col-lg-2">
      <div class="form-group">
        <label>House Number</label>
        <input
          type="number"
          class="form-control form-control-lg"

          id="house_number"
          name="house_number"
          placeholder="House No."
        />
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>Built Year</label>  <span class="text-danger font-weight-bold">*</span>
        <input
          type="date"
          class="form-control form-control-lg"
          placeholder="Building Age"
          id="built_year"
          name="built_year" />
          @error('built_year')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-lg-3">
      <div class="form-group">
        <label>Area</label>   <span class="text-danger font-weight-bold">*</span>
        <input
          type="number"
          class="form-control form-control-lg"
          id="property_area"
          name="property_area"
          placeholder="Area in Ana/Dhur"
        />
        @error('property_area')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="bedrooms">Area Type</label>  <span class="text-danger font-weight-bold">*</span>
        <select
          name="area_type"
          id="area_type"
          class="form-control form-control-lg "
        >
          <option value="Aana">Aana</option>
          <option value="Dhur">Dhur</option>
   
        </select>
        @error('area_type')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Mohoda Length</label>  <span class="text-danger font-weight-bold">*</span>
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder="Mohoda Length"
          id="mohoda_length"
          name="mohoda_length" />
          @error('mohoda_length')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="mohoda_direction">Mohoda Direction</label>  <span class="text-danger font-weight-bold">*</span>
        <select
          name="mohoda_direction"
          id="mohoda_direction"
          class="form-control form-control-lg "
        >
          <option value="East">East</option>
          <option value="West">West</option>
          <option value="North">North</option>
          <option value="South">South</option>
        </select>
        @error('mohoda_direction')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Latitude</label>  
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder="Latitude"
          id="latitude"
          name="latitude" />
          @error('latitude')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Longitude</label>  
        <input
          type="number"
          class="form-control form-control-lg"
          placeholder="Longitude"
          id="longitude"
          name="longitude" />
          @error('longitude')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    
  </div>
  <h3 class="subheadline my-4  text-uppercase font-weight-bold text-danger">Features</h3>   
  <div class="row">
    <div class="col-sm-2">
      <div class="form-group">
        <label for="bedrooms">Bedrooms</label>  <span class="text-danger font-weight-bold">*</span>
        <select
          name="number_of_bedrooms"
          id="number_of_bedrooms"
          class="form-control form-control-lg "
        >
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7+">7+</option>
        </select>
        @error('number_of_bedrooms')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="number_of_bathrooms">Bathrooms</label>  <span class="text-danger font-weight-bold">*</span>
        <select
          name="number_of_bathrooms"
          id="number_of_bathrooms"
          class="form-control form-control-lg ui-select"
        >
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5+">5+</option>
        </select>
        @error('number_of_bathrooms')
    <div class="text-danger">{{$message}}</div>
    @enderror
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="bathrooms">Floors</label>  <span class="text-danger font-weight-bold">*</span>
        <select
          name="number_of_floors"
          id="number_of_floors"
          value="number_of_floors"
          class="form-control form-control-lg ui-select"
        >
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5+">5+</option>
        </select>
        @error('number_of_floors')
    <div class="text-danger">{{$message}}</div>
    @enderror
    
      </div>
      
  </div>
  <div class="col-sm-2">
      <div class="form-group">
        <label for="kitchen">Kitchen</label>  <span class="text-danger font-weight-bold">*</span>
        <select
          name="number_of_kitchen"
          id="number_of_kitchen"
          value="number_of_kitchen"
          class="form-control form-control-lg ui-select"
        >
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5+">5+</option>
        </select>
        @error('number_of_kitchen')
    <div class="text-danger">{{$message}}</div>
    @enderror
    
      </div>
      
  </div>

  
  </div>
 
  <div class="form-group">
    <h3 class="subheadline  my-4  text-uppercase font-weight-bold text-danger">Additional Features</h3>
    <div class="feature-list ">
      <div class="checkbox">
        <input type="checkbox" id="garden" name="garden" value="yes" />
        <label for="garden">Garden</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="gym" name="gym" value="yes"/>
        <label for="gym">Gym</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="internet" name="internet" value="yes"/>
        <label for="internet">Internet</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="swimming_pool" name="swimming_pool" value="yes"/>
        <label for="swimming_pool">Swimming Pool</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="water" name="water" value="yes"/>
        <label for="water">Water</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="parking" name="parking" value="yes"/>
        <label for="parking">Parking</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="school_college_nearby" name="school_college_nearby" value="yes"/>
        <label for="school_college_nearby">School/College Nearby</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="shopping_nearby" name="shopping_nearby" value="yes"/>
        <label for="shopping_nearby">Shopping/GroceryNearby</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="bank_nearby" name="bank_nearby" value="yes"/>
        <label for="bank_nearby">Bank</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="pitched_road" name="pitched_road" value="yes"/>
        <label for="pitched_road">Pitched Road</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="airport_nearby" name="airport_nearby" value="yes"/>
        <label for="airport_nearby">Airport</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="sewage" name="sewage" value="yes"/>
        <label for="sewage">Sewage</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="alarm" name="alarm" value="yes"/>
        <label for="alarm">Alarm</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="cctv" name="cctv" value="yes" />
        <label for="cctv">CCTV Camera</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="ac" name="ac" value="yes"/>
        <label for="ac">Air Conditioning</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Property Description</label>  <span class="text-danger font-weight-bold">*</span>
    @error('description')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <textarea
      class=" description form-control form-control-lg text-editor"
      name="description"
      id="description"
    ></textarea>
    
  </div>
  <div class="form-group">
    <div class="checkbox">
      <input type="checkbox" id="featured" name="featured"/>
      <label for="featured">Yes ‚ feature this listing. </label>
    </div>
  </div>
  <hr />
  <div class="form-group">
    <button type="submit" class="btn btn-lg btn-primary mb-2">
 Save
    </button>
  </div>
</form>
</div>
@stop

@include('layouts.admin')
