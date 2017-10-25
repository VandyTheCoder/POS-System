@extends('layouts.default')
@section('content')

<style>
	.box
    {
    	box-shadow: 10px 10px 5px #888888;
    }
</style>

<br><br><br><br>
<div class = 'col-lg-4 col-md-4 col-sm-4'>

</div>

<div class = "col-lg-4 col-md-4 col-sm-4 box" align = "center" style = "background-color: #222;border: 2px solid #ddd; border-radius: 10px">
	<br>
	<img src = "{{asset('images/lockBig.png') }}">
	<hr style = "width: 300px; border: 1px solid #ddd">
	<form action = "/password" method = "post">
	{!! csrf_field() !!}
		<div class="input-group">
			<span style = "width: 50px; background-color: #5cb85c;text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/lock.png')}}"></span>
			<input placeholder="Old Password" type="password" name = "oldPass"class="form-control" aria-describedby="basic-addon1">
		</div>
		<hr>
		<div class="input-group">
			<span style = "width: 50px; background-color: #5cb85c;text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/lock.png')}}"></span>
			<input placeholder="New Password" type="password" name = "newPass"class="form-control" aria-describedby="basic-addon1">
		</div>
		<br>
		<div class="input-group">
			<span style = "width: 50px; background-color: #5cb85c;text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/lock.png')}}"></span>
			<input placeholder="Confirm Password" type="password" name = "confirm"class="form-control" aria-describedby="basic-addon1">
		</div>
		<br>
		<?php
			if(!empty($message))
			{
				echo "<span style = 'color: red'>*$message</span>";
			}
		?>
		<br><br>
		<div>
			<button class = "btn btn-success" type = "submit" name = "button" value = "change"><img style = "margin-top: -4px" src = "{{asset('images/keyChange.png') }}"> Change Password</button>
		</div>

		<br><br>

	</form>

</div>

<div class = 'col-lg-4 col-md-4 col-sm-4'>

</div>

@stop