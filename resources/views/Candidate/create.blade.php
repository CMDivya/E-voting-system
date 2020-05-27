@extend('layouts.app')
@section('content')
<form action="{{route('candidate.store')}}" method="POST" enctype="multipart/form-data">
@csrf()
<div class="jumbotron"style="background-color:#ccebff;">
<div class="form-group">
      <h2><label for="Name">Candidate Information</label></h2>
  </div>
 

    <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
  </div>
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
      <label for="adhaar">Adhaar No</label>
      <input type="text" class="form-control" name="adhaar_no" id="adhaar" placeholder="Enter Your Adhaar Number">
  </div>
  @error('adhaar_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="form-group">
    <label for="E-Mail">Email Id</label>
  </div>
  <div class="form-group">
    <input type="email" name="email" id="email" placeholder="Enter Your Email"></input>
  </div>
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="contact_no">Contact No</label>
    <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Your Phone Number">
  </div>
  @error('contact_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="Address">Address</label>
  </div>
  <div class="form-group">
    <textarea rows="3" cols="184" name="address" id="address" placeholder="Enter Your Address"></textarea>
  </div>
  @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="image">Photo</label>
  </div>
  <div class="form-group">
  <input name="image" type="file" class="form-control" id="image">
  </div>

  <div class="form-group">
    <label for="gender">Gender</label>
  </div>
  <div>
  <select class="browser-default custom-select" name="gender">
  <option selected>Select</option>
  <option value="{{male}}">Male</option>
  <option value="{{female}}">Female</option>
  @endforeach
</select>
</div>
@error('gender')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="district"></label>
  </div>
  <div>
  <select class="browser-default custom-select" name="district">
  <option selected>Select District</option>
  @foreach($districts as $district)
  <option value="{{$district->id}}">{{$district->name}}</option>
  @endforeach
</select>
</div>
@error('district')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="state"></label>
  </div>
  <div>
  <select class="browser-default custom-select" name="state">
  <option selected>Select District</option>
  @foreach($states as $state)
  <option value="{{$state->id}}">{{$state->name}}</option>
  @endforeach
</select>
</div>
@error('state')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="Submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection
