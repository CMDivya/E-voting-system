@extends('layouts.app')
@section('content')


<div class="jumbotron"style="background-color:#ccebff;">
<form action="{{route('seat.update', $seat)}}" method="POST"  enctype="multipart/form-data">
@csrf()
@method('PUT')

<div class="form-group">
      <h2><label for="Name">Update Seat Information</label></h2>

  </div>
    <div class="form-group">
      <label for="Name">Edit Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{$seat->name}}"placeholder=" Name">

  </div>
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  
  
  
<div class="form-group">
    <label for="district">Update State</label>
  </div>
  <div>
  <select class="browser-default custom-select" name="state_id">
  
  @foreach($states as $state)
  <option
    @if($state->id==$seat->state_id)
    selected
    @endif value="{{$state->id}}">{{$state->name}}</option>
  @endforeach
</select>
</div>
@error('state')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="district">Update District</label>
  </div>
  <div>
  <select class="browser-default custom-select" name="district_id">
@foreach($districts as $district)
  <option
    @if($district->id==$seat->district_id)
    selected
    @endif value="{{$district->id}}">{{$district->name}}</option>
  @endforeach
</select>
</div>
@error('district')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


   <div>
  <button href="" type="Submit" class="btn btn-primary">Update</button>
  </div>

</form>
</div>
@endsection

