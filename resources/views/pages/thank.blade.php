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
        <img src = "{{asset('images/thank.png') }}"><h2>Thanks You, Come Again!</h2>
        <hr style = "width: 300px; border: 1px solid #ddd">
        <br>

            <div class = "row" align = "center">

                <div align = "right" class = 'col-lg-6 col-md-6 col-sm-6' style = "border-right: 1px solid #ddd">

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Member ID</span>
                        <input type="text" readonly name = "mem_id" value = "<?php if(!empty($mem_id)){echo $clerk_id;}?>" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Received $</span>
                        <input type="text" name = "received" readonly value = "{{ $received }}" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Discount %</span>
                        <input type="text" name = "discount" readonly value = "<?php if(!empty($discount)){echo $discount;}else{echo "0";}?>" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Member Score</span>
                        <input type="text"  readonly value = "<?php if(!empty($mem_score)){echo $mem_score;}else{echo "0";}?>" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                </div>

                <div align = "left" class = 'col-lg-6 col-md-6 col-sm-6'>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Clerk ID</span>
                        <input type="text" name = "clerk_id" readonly value = "{{ $clerk_id }}" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Clerk Score</span>
                        <input type="text" name = "score" readonly value = "{{ $score }}" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Return $</span>
                        <input type="text" name = "return" readonly value = "{{ $return }}" class="form-control" aria-describedby="basic-addon1">
                    </div>

                    <br>

                    <div class="input-group">
                        <span style = "width: 115px; text-align: left" class="input-group-addon" id="basic-addon1">Total $</span>
                        <input type="text" name = "total" readonly value = "{{ $total }}" class="form-control" aria-describedby="basic-addon1">
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
                        if($message != "Thanks for Hard Work! :)")
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
                    <a href = '/homepage'><button type="button" class = "btn btn-success"><img style = "margin-top: -4px" src = "{{asset('images/save.png') }}"> Finish</button></a>
                </div>
            </div>

            <br>
    </div>

    <div class = 'col-lg-3 col-md-3 col-sm-3'>

    </div>

@stop