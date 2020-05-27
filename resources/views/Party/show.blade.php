@extends('layouts.app')
@section('content')
<h2>Show Party Details</h2>
<div class="jumbotron"  style="background-color:#ccebff; margin-top:50px;">
<table class="table table-dark" width="" >
<tr>
<th> Name</th>
<th>Logo</th>
<th>Candidates</th>
</tr>
<tr>
<td>{{$party->name}}</td>
<td>{{$party->logo}}</td>
<td>
@foreach($party->candidates as$index=>$candidate)
{{++$index}}-{{$candidate->name}}<br>
@endforeach</td>
</tr>
<tr>
<td><a class='btn btn-primary' href="/party">Go Back To Party List</a></td>
</tr>
</table>
</div>

</div>
@endsection
