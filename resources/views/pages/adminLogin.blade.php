@extends('layouts.login')
@section('content')

    <style>
        .form-control
        {
            width: 250px;
            background: none;
        }
        .btn
        {
            width: 125px;
        }
    </style>

    <div class = "container">
        <div class = "row">
            <br><br><br><br><br><br><br><br>

            <div class = "col-lg-4 col-md-4">
            </div>

            <div class = "col-lg-4 col-md-4 box" align = "center" style = "background-color: rgba(255,255,255,0.95);border: 5px solid #ddd; border-radius: 10px;">
                <i><h3><img style = "margin-top: -7px" src="images/icon.png"> Mart Administrator</h3></i>
                <hr style = "border: 1px solid #BDBDBD" width = "300px">
                <br>
                <form action = "/admin/check" method = "post">
                    {!! csrf_field() !!}
                    <input name = "email" type="email" class="form-control" placeholder="Email"><br>
                    <input name = "password" type="password" class="form-control" placeholder="Password"><br>
                    <?php
                    if(!empty($message))
                    {
                        echo "<span style = 'color: red'>$message</span>";
                    }
                    ?>
                    <br><br>
                    <button type="submit" name = "login" value = "login "class="btn btn-primary">Login</button>
                </form>
                <br><br>
            </div>

            <div class = "col-lg-4 col-md-4">
            </div>

        </div>
    </div>

@stop