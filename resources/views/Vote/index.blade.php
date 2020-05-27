@extends('layouts.master')
@section('content')
<div class="jumbotron" style="background-color:#ccebff;">
<h1>Please Vote</h1>
<table class="table table-dark">
<tr>

<th>Candidate Name</th>
<th>Party Name</th>
<th>Party Logo</th>
<th>Vote</th>


</tr>
@foreach($candidates as $candidate)
<tr>

<td>{{$candidate->name}}</td>
<td>{{$candidate->party->name}}</td>
<td>
  @if($candidate->party->logo)
   <img class="img-thumbnail" src="{{asset($candidate->party->logo)}}" width="100px" height="auto" >
     @else
     No Image
     @endif
    </td>





<td>
<form  action="{{route('vote.store'), $candidate->id}}" method='POST'>
@csrf()

<button type="submit" class="btn btn-warning">Voting Button</button>
</form>
</td>

</tr>
@endif
@endforeach
</table>
</div>


</div>
@endsection