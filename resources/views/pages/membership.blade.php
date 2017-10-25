@extends('layouts.default')
@section('content')
	
@extends('layouts.default')
@section('content')

<style>
	.box
    {
    	box-shadow: 10px 10px 5px #888888;
    }
</style>

<br><br>
<div class = 'col-lg-3 col-md-3 col-sm-3'>

</div>

<div class = "col-lg-6 col-md-6 col-sm-6 box" align = "center" style = "border: 2px solid #ddd; border-radius: 10px">
	<br>
	<img src = "{{asset('images/profile.png') }}">
	<hr style = "width: 300px; border: 1px solid #ddd">
	<br>

	<form action = "/update" method = "post">
	{!! csrf_field() !!}

		<div class = "row" align = "center">

			<div align = "right" class = 'col-lg-6 col-md-6 col-sm-6' style = "border-right: 1px solid #ddd">
			
						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Membership's ID</span>
						  <input type="text" readonly value = "{{ $id }}" class="form-control" aria-describedby="basic-addon1">
						</div>

						<br>
					 
						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Name</span>
						  <input type="text" name = "name" value = "{{ $name }}" class="form-control" aria-describedby="basic-addon1">
						</div>
					  
						<br>

						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Date of Birth</span>
        					<input class="form-control" value = "{{ $dob }}" id="date" name="dob" placeholder="YYYY-MM-DD" type="text"/>
						</div>
					 
					  	<br>

						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Position</span>
						  <input type="text" readonly value = "{{ $position }}" class="form-control" aria-describedby="basic-addon1">
						</div>
			  	
					  <br>

			</div>

			<div align = "left" class = 'col-lg-6 col-md-6 col-sm-6'>

						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Gender</span>
						  <?php
						  	if($gender == "Male")
						  	{
						  		$genderI = "Female";
						  	}
						  	else
						  	{
						  		$genderI = "Male";
						  	}
						  	echo "<select style = 'width: 170px' name = 'gender' class = 'form-control'>
						  			<option value = '$gender'>$gender</option>
						  			<option value = '$genderI'>$genderI</option>
						  		</select>";
						  ?>
						</div>

						<br>

						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Email</span>
						  <input type="email" name = "email" value = "{{ $email }}" class="form-control" aria-describedby="basic-addon1">
						</div>
					  
					  	<br>

						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Phone</span>
						  <input type="text" name = "phone" value = "{{ $phone }}" class="form-control" aria-describedby="basic-addon1">
						</div>
					  
					  	<br>

						<div class="input-group">
						  <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Discount %</span>
						  <input type="text" readonly value = "{{ $discount }}" class="form-control" aria-describedby="basic-addon1">
						</div>

					  <br>

			</div>
		</div>

		<br><br>

		<div class = "row">
			<div class = "col-lg-6 col-md-6 col-sm-6" align="left">
				<?php
					if(!empty($message))
					{
						if($message == "*All fields must be filled!")
						{
							echo "<span style = 'color: red'>$message</span>";
						}
						else
						{
							echo "<span style = 'color: green'>$message</span>";
						}	
					}
				?>
			</div>
			<div class = "col-lg-6 col-md-6 col-sm-6" align="right">
				<button class = "btn btn-success" type = "submit" name = "button" value = "save"><img style = "margin-top: -4px" src = "{{asset('images/save.png') }}"> Save & Change</button>
			</div>
		</div>
		
		<br>
	</form>
</div>

<div class = 'col-lg-3 col-md-3 col-sm-3'>

</div>

@stop

@stop