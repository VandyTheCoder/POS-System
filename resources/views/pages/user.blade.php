@extends('layouts.default')
@section('content')

<style>
	.box
    {
    	box-shadow: 10px 10px 5px #888888;
    }
</style>
<div align="center" class = "row">
<br><br>
<div class="col-lg-3"></div>

<div class = "col-lg-6 col-md-6 col-sm-6 box" align = "center" style = "background-color: #222 ;border: 2px solid #ddd; border-radius: 10px">
	<br>
	<img src = "{{asset('images/adminUser.png') }}">
	<hr style = "width: 300px; border: 1px solid #ddd">
	<br>
	<div align="center">
	<form action = "/update" method = "post">
	{!! csrf_field() !!}

		<div class = "row" align = "center">

			<div align = "center" class = 'col-lg-6 col-md-6 col-sm-6' style = "border-right: 1px solid #ddd">
			
						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/id.png')}}"></span>
						  	<input required style = "width: 186px" type="text" readonly value = "{{ $id }}" class="form-control" aria-describedby="basic-addon1">
						</div>

						<br>
					 
						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eName.png')}}"></span>
						  <input required style = "width: 186px" type="text" name = "name" value = "{{ $name }}" class="form-control" aria-describedby="basic-addon1">
						</div>
					  
						<br>

						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eDOB.png')}}"></span>
        					<input required style = "width: 186px" class="form-control" value = "{{ $dob }}" id="date" name="dob" placeholder="YYYY-MM-DD" type="text"/>
						</div>
					 
					  	<br>

						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePosition.png')}}"></span>
						  <input required style = "width: 186px" type="text" readonly value = "{{ $position }}" class="form-control" aria-describedby="basic-addon1">
						</div>
			  	
					  <br>

			</div>

			<div align = "center" class = 'col-lg-6 col-md-6 col-sm-6'>

						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eGender.png')}}"></span>
						  <?php
						  	if($gender == "Male")
						  	{
						  		$genderI = "Female";
						  	}
						  	else
						  	{
						  		$genderI = "Male";
						  	}
						  	echo "<select style = 'width: 186px' name = 'gender' class = 'form-control'>
						  			<option value = '$gender'>$gender</option>
						  			<option value = '$genderI'>$genderI</option>
						  		</select>";
						  ?>
						</div>

						<br>

						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eEmail.png')}}"></span>
						  <input required style = "width: 186px" type="email" name = "email" value = "{{ $email }}" class="form-control" aria-describedby="basic-addon1">
						</div>
					  
					  	<br>

						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePhone.png')}}"></span>
						  <input required style = "width: 186px" type="text" name = "phone" value = "{{ $phone }}" class="form-control" aria-describedby="basic-addon1">
						</div>
					  
					  	<br>

						<div class="input-group">
							<span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/score.png')}}"></span>
						  <input required style = "width: 186px" type="text" readonly value = "{{ $score }}" class="form-control" aria-describedby="basic-addon1">
						</div>

					  <br>

			</div>
		</div>

		<hr>

		<div class = "row">
			<div class = "col-lg-6 col-md-6 col-sm-6" align="left">
				<?php
					if(!empty($message))
					{
						if($message != "Save Information to Database Successfully!")
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

	</form></div>
</div>
	<div class="col-lg-3"></div>


</div>

@stop