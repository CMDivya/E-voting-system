@extends('layouts.app')
@section('content')
<h2>Show Voter Details</h2>
<div class="jumbotron"  style="background-color:#ccebff; margin-top:50px;">
<table class="table table-dark" >
<tr>
<th> Name</th>
<th>Email</th>
<th>Adhaar No</th>
<th>Contact No</th>
<th>Gender</th>
<th>Address</th>
<th>State</th>
<th>District</th>
</tr>
<tr>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->adhaar_no}}</td>
<td>{{$user->contact_no}}</td>
<td>{{$user->gender}}</td>
<td>{{$user->address}}</td>
<td>{{$user->district->state->name}}</td>
<td>{{$user->district->name}}</td>
</tr>
<tr>
<td><a class='btn btn-primary' href="/user">Go Back To user List</a></td>
</tr>
</table>
</div>

</div>
@endsection
