@extends('layouts.app')
@section('content')
<h2>Show Seat Details</h2>
<div class="jumbotron"  style="background-color:#ccebff; margin-top:50px;">
<table class="table table-dark" >
<tr>
<th>Sl No.</th>
<th> Name</th>
<th>State</th>
<th>District</th>
<th>Action</th>
</tr>
@foreach($seats as $index => $seat)
<tr>
<td>{{$index+$seats->firstItem()}}</td>
<td>{{$seat->name}}</td>
<td>{{$seat->district->state->name}}</td>
<td>{{$seat->district->name}}</td>
<td><a href="/seat/{{$seat->id}}/show"><i class="fa fa-eye" style="color:#00ccff;" aria-hidden="true"></i>
</button></a></td>

<td><a href="/seat/{{$seat->id}}/edit"><i class="fa fa-pencil" style="color:lime;margin-right:20px;" aria-hidden="true"></i>
</button></a></td>

<td>
<form  action='/seat/{{$seat->id}}/delete' method='POST'>
@csrf()
@method('delete')
<button><i class="fa fa-trash" style="color:#ff3300;" aria-hidden="true"></i></button>
</form>
</td>
</tr>
@endforeach
</table>
</div>
{{$seats->appends($_GET)->links()}}
</div>

@endsection
