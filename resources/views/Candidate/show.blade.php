@extends('layouts.app')
@section('content')
<h2>Show Candidate Details</h2>
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
<td>{{$candidate->name}}</td>
<td>{{$candidate->email}}</td>
<td>{{$candidate->adhaar_no}}</td>
<td>{{$candidate->contact_no}}</td>
<td>{{$candidate->gender}}</td>
<td>{{$candidate->address}}</td>
<td>{{$candidate->district->state->name}}</td>
<td>{{$candidate->district->name}}</td>
</tr>
<tr>
<td><a class='btn btn-primary' href="/candidate">Go Back To candidate List</a></td>
</tr>
</table>
</div>

</div>
@endsection
