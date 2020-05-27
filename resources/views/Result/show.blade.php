@extends('layouts.master')
@section('content')
<div class="jumbotron" style="background-color:#ccebff;">
<h1>Please Vote</h1>
<table class="table table-dark">
<!--<th>Candidate Name</th>
<th>Party Name</th>
<th>No of Votes</th>-->
@foreach($districts as $district)
<th>District - {{$district->name}}</th>
<?php
$winner="tie";
$max=0;
?>
<tr><th>Candidate</th><th>Party</th><th>Vote Count</th></tr>
@foreach($district->candidates as $candidates)
<tr>
<td>{{$candidate->name}}</td>
<td>{{$candidate->party->name}}</td>
<td>
<?php
$vote=DB::table('votes')->where('candidate_id',$candidate->id)->count();
echo $vote;
if($vote>$max)
{
    $winner=$candidate->name;
    $max=$vote;
}
?>
</td>
</tr>
@endforeach
</table>
<span> Winner -> </span>
<h3><?php
echo $winner;

?></h3>
<hr>
@endforeach
<div>
@endsection