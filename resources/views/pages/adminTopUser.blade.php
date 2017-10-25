@extends('layouts.adminDefault')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Admin / People / Top User</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">People</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img style = "margin-top: -15px" src = "{{asset('images/starAdmin.png')}}"><a herf = "#" style = "font-size: 25px"> Top User</a>
                    </div>
                    <div class="panel-body" style = "border: none">
                        <div class="icon-grid" style = "border: none">
                            <div class='col-lg-4 col-md-4 col-sm-12' style = "border: none">
                                <div class = "row" style = "border: none">
                                <?php
                                    if(!empty($topClerk))
                                    {
                                        foreach ($topClerk as $user)
                                        {
                                            echo   "<div class='col-lg-12' style = 'border-radius: 10px; padding-left: 20px; text-align: left; font-size: 17px; height: 425px'>";
                                ?>
                                                        <div align="center" style = "border:none; margin-left: -13px">
                                                            <img src = '{{asset('images/starTop.png')}}'>
                                                        </div><hr>
                                <?php
                                            echo "
                                                        ID : <i><b>$user->id</b></i> <br>
                                                        Name : <i><b>$user->name</b></i> <br>
                                                        Date of Birth : <i><b>$user->dob</b></i> <br>
                                                        Position : <i><b>$user->position</b></i> <br>
                                                        Gender : <i><b>$user->gender</b></i> <br>
                                                        Email : <i><b>$user->email</b></i> <br>
                                                        Phone : <i><b>$user->phone</b></i> <br>
                                                        Score : <i><b>$user->score</b></i>

                                                    </div>";
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12' style = "border: none">
                                <div class = "row" style = "border: none">
                                    <?php
                                    if(!empty($topMember))
                                    {
                                        foreach ($topMember as $user)
                                        {
                                            echo   "<div class='col-lg-12' style = 'border-radius: 10px; padding-left: 20px; text-align: left; font-size: 17px; height: 425px'>";
                                    ?>
                                                        <div align="center" style = "border:none; margin-left: -13px">
                                                            <img src = '{{asset('images/starTop.png')}}'>
                                                        </div><hr>
                                    <?php
                                    echo "
                                                        ID : <i><b>$user->id</b></i> <br>
                                                        Name : <i><b>$user->name</b></i> <br>
                                                        Phone : <i><b>$user->phone</b></i> <br>
                                                        Email : <i><b>$user->email</b></i> <br>
                                                        Discount : <i><b>$user->discount_percentage %</b></i> <br>
                                                        Created Date : <i><b>$user->created_date</b></i> <br>
                                                        Expired Date : <i><b>$user->expired_date</b></i> <br>
                                                        Score : <i><b>$user->score</b></i>
                                                    </div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12'style = "border: none">
                                <div class = "row" style = "border: none">
                                    <?php
                                    if(!empty($topSupplier))
                                    {
                                        foreach ($topSupplier as $user)
                                        {
                                            echo   "<div class='col-lg-12' style = 'border-radius: 10px; padding-left: 20px; text-align: left; font-size: 17px; height: 425px'>";
                                    ?>
                                                        <div align="center" style = "border:none; margin-left: -13px">
                                                            <img src = "{{asset('images/starTop.png')}}">
                                                        </div><hr>
                                    <?php
                                    echo "
                                                        ID : <i><b>$user->id</b></i> <br>
                                                        Name : <i><b>$user->name</b></i> <br>
                                                        Phone : <i><b>$user->phone</b></i> <br>
                                                        Email : <i><b>$user->email</b></i> <br>
                                                        Score : <i><b>$user->score</b></i>
                                                    </div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop