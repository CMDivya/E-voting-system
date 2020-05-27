@extends('layouts.app')
@section('content')


<div class="jumbotron"style="background-color:#ccebff;">
<form action="{{route('user.update', $user)}}" method="POST"  enctype="multipart/form-data">
@csrf()
@method('PUT')

<div class="form-group">
      <h2><label for="Name">Update Voter Information</label></h2>

  </div>
    <div class="form-group">
      <label for="Name">Edit Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}"placeholder=" Name">

  </div>
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
      <label for="adhaar">Adhaar No</label>
      <input type="text" class="form-control" name="adhaar_no" value="{{$user->adhaar_no}}" placeholder="Enter Your Adhaar Number">
  </div>
  @error('adhaar_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="form-group">
    <label for="E-Mail">Email Id</label>
  </div>
  <div class="form-group">
    <input type="email" name="email" value="{{$user->name}}" placeholder="Enter Your Email"></input>
  </div>
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="category">Update Gender</label>
  </div>
  <div>
  <select class="browser-default custom-select" name="gender">
  
  <option selected value="{{$user->gender}}">Male</option>
  <option>Female</option>

</select>
</div>

<div class="form-group">
    <label for="contact_no">Contact No</label>
    <input type="text" class="form-control" name="contact_no" value="{{$user->contact_no}}" placeholder="Enter Your Phone Number">
  </div>
  @error('contact_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="Address">Address</label>
  </div>
  <div class="form-group">
    <textarea rows="3" cols="184" name="address" value="{{$user->address}}" placeholder="Enter Your Address"></textarea>
  </div>
  @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group">
      <label for="image">Image</label>
      <input name="image" type="file" class="form-control" id="image" value="{{$user->image}}">
     <img class="img-thumbnail" src="{{asset($user->image)}}" width="250px" height="250px" >
       </div>

  <div class="form-group">
    <label for="district">Update District</label>
  </div>
  <div>
  <select class="browser-default custom-select" name="district_id">
  
  @foreach($districts as $district)
  <option
    @if($district->id==$user->district_id)
    selected
    @endif value="{{$district->id}}">{{$district->name}}</option>
  @endforeach
</select>
</div>
@error('district')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="district">Update State</label>
  </div>
  <div>
  <select class="browser-default custom-select" name="state_id">
  
  @foreach($states as $state)
  <option
    @if($state->id==$user->state_id)
    selected
    @endif value="{{$state->id}}">{{$state->name}}</option>
  @endforeach
</select>
</div>
@error('state')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

   <div>
  <button href="" type="Submit" class="btn btn-primary">Update</button>
  </div>

</form>
</div>
@endsection

