@extends('layouts.adminDefault')
@section('content')
    <style>
        .panel-default .panel-heading
        {
            height: 47px;
        }
        a, a:hover, a:focus {
            text-decoration: none;
        }
    </style>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Admin / Homepage / </li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->

        <hr style = "border: 1px solid #ddd">

        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $allProduct[0] }}</div>
                            <div class="text-muted">Products</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <img style = "height: 45.5px; width: 52.2px" src = "{{asset('images/incomeAdmin.png')}}">
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large" style="font-size: 25px">$ {{$allIncome}}</div>
                            <div class="text-muted">Incomes</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $allUser[3] }}</div>
                            <div class="text-muted">People</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $allReport[3] }}</div>
                            <div class="text-muted">Reports</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->

        <hr style = "border: 1px solid #ddd">

        <div class = "row">

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="collapseListGroupHeading1" role="tab" style = "background-color: #30a5ff; color: white; text-decoration: none">
                            <h4 class="panel-title">
                                <div class="collapsed" role="button" aria-expanded="true" aria-controls="collapseListGroup1" href="#collapseListGroup1" data-toggle="collapse">
                                    <p style = "font-size: 23px; color: white">Product Menu <img style = "float: right" src = "{{asset('images/downAdmin.png')}}"></p>
                                </div>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseListGroup1" role="tabpanel" aria-expanded="false" aria-labelledby="collapseListGroupHeading1" style="height: 0px;">
                            <ul class="list-group" color = "#337AB7">
                                <a href="/homepage/getFood" class="list-group-item">Foods<img style = "float: right" src = "{{asset('images/foodAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #30a5ff" class="badge">{{ $allProduct[1] }}</span>
                                </a>
                                <a href="/homepage/getGadget" class="list-group-item">Gadgets<img style = "float: right" src = "{{asset('images/toolAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #30a5ff" class="badge">{{ $allProduct[2] }}</span>
                                </a>
                                <a href="/homepage/getDrink" class="list-group-item">Drinks<img style = "float: right" src = "{{asset('images/drinkAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #30a5ff" class="badge">{{ $allProduct[3] }}</span>
                                </a>
                                <a href="/homepage/getBeauty" class="list-group-item">Beauty<img style = "float: right" src = "{{asset('images/beautyAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #30a5ff" class="badge">{{ $allProduct[4] }}</span>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="collapseListGroupHeading2" role="tab" style = "background-color: #ffb53e; color: white; text-decoration: none">
                            <h4 class="panel-title">
                                <div class="collapsed" role="button" aria-expanded="true" aria-controls="collapseListGroup2" href="#collapseListGroup2" data-toggle="collapse">
                                    <p style = "font-size: 23px; color: white">Income Money <img style = "float: right" src = "{{asset('images/downAdmin.png')}}"></p>
                                </div>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseListGroup2" role="tabpanel" aria-expanded="false" aria-labelledby="collapseListGroupHeading2" style="height: 0px;">
                            <ul class="list-group" color = "#337AB7">
                                <a href="#" class="list-group-item">Day Income<img style = "float: right" src = "{{asset('images/moneyAdmin.png')}}"></a>
                                <a href="#" class="list-group-item">Week Income<img style = "float: right" src = "{{asset('images/moneyAdmin.png')}}"></a>
                                <a href="#" class="list-group-item">Month Income<img style = "float: right" src = "{{asset('images/moneyAdmin.png')}}"></a>
                                <a href="#" class="list-group-item">Year Income<img style = "float: right" src = "{{asset('images/moneyAdmin.png')}}"></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="collapseListGroupHeading3" role="tab" style = "background-color: #1ebfae; color: white; text-decoration: none">
                            <h4 class="panel-title">
                                <div class="collapsed" role="button" aria-expanded="true" aria-controls="collapseListGroup3" href="#collapseListGroup3" data-toggle="collapse">
                                    <p style = "font-size: 23px; color: white">People <img style = "float: right" src = "{{asset('images/downAdmin.png')}}"></p>
                                </div>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseListGroup3" role="tabpanel" aria-expanded="false" aria-labelledby="collapseListGroupHeading3" style="height: 0px;">
                            <ul class="list-group" color = "#337AB7">
                                <a href="/admin/getTopUser" class="list-group-item">Top Active User<img style = "float: right" src = "{{asset('images/topEmployeeAdmin.png')}}"></a>
                                <a href="/admin/getClerks" class="list-group-item">Employees<img style = "float: right" src = "{{asset('images/employeeAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #1ebfae" class="badge">{{ $allUser[0] }}</span>
                                </a>
                                <a href="/admin/getMemberships" class="list-group-item">Membership<img style = "float: right" src = "{{asset('images/employeeAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #1ebfae" class="badge">{{ $allUser[1] }}</span>
                                </a>
                                <a href="/admin/getSuppliers" class="list-group-item">Suppliers<img style = "float: right" src = "{{asset('images/supplierAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #1ebfae" class="badge">{{ $allUser[2] }}</span>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="collapseListGroupHeading4" role="tab" style = "background-color: #f9243f; color: white; text-decoration: none">
                            <h4 class="panel-title">
                                <div class="collapsed" role="button" aria-expanded="true" aria-controls="collapseListGroup4" href="#collapseListGroup4" data-toggle="collapse">
                                    <p style = "font-size: 23px; color: white">Report <img style = "float: right" src = "{{asset('images/downAdmin.png')}}"></p>
                                </div>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseListGroup4" role="tabpanel" aria-expanded="false" aria-labelledby="collapseListGroupHeading4" style="height: 0px;">
                            <ul class="list-group" color = "#337AB7">
                                <a href="/homepage/stockout" class="list-group-item">Out of Stock Product<img style = "float: right" src = "{{asset('images/outAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #f9243f" class="badge">{{ $allReport[0] }}</span>
                                </a>
                                <a href="/homepage/getExpired" class="list-group-item">Expired Product<img style = "float: right" src = "{{asset('images/expiredAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #f9243f" class="badge">{{ $allReport[1] }}</span>
                                </a>
                                <a href="/homepage/getExpiredMember" class="list-group-item">Expired Membership<img style = "float: right" src = "{{asset('images/expiredAdmin.png')}}">
                                    <span align = 'right' style = "background-color: #f9243f" class="badge">{{ $allReport[2] }}</span>
                                </a>
                                <a href="#" class="list-group-item">Employee Feedback<img style = "float: right" src = "{{asset('images/feedbackAdmin.png')}}"></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr style = "border: 1px solid #ddd">
        </div>




    </div>	<!--/.main-->
    @stop