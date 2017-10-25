@extends('layouts.default')
@section('content')
    <style>
        .head
        {
            text-align: center;
            font-size: 25px;
            font-family: "Trebuchet MS";
        }
        .element
        {
            text-align: center;
            font-size: 20px;
            height: 15px;
        }
    </style>
    <br>
    <div class="table-responsive">
        <div align="center">
        <img src = "{{asset('images/profile.png') }}">
        </div>
        <hr style = "width: 300px; border: 1px solid #ddd">
        <br>
        <table class="table table-hover">
            <tr class = "head">
                <td style = 'background-color: #333333'><b style = 'color: white'>ID</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Name</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Phone</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Email</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Discount %</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Created Date</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Expried Date</b></td>
                <td style = 'background-color: #333333'><b style = 'color: white'>Score</b></td>
            </tr>
            <?php
                if(!empty($message))
                {
                    echo "<tr><td colspan='8'></td></tr>
                          <tr class = 'element'>
                            <td colspan='8' style = 'color: red; text-align: center'>$message</td>
                          </tr>";
                }
                if(!empty($members))
                {
                        foreach ($members as $member)
                        {
                            echo "<tr class = 'element'>
                                <td>$member->id</td>
                                <td>$member->name</td>
                                <td>$member->phone</td>
                                <td>$member->email</td>
                                <td>$member->discount_percentage</td>
                                <td>$member->created_date</td>
                                <td>$member->expired_date</td>
                                <td>$member->score</td>
                              </tr>";
                        }

                }
            ?>
        </table>
        <br><br><br><br>
        <hr style = "border: 2px solid #ddd">

    </div>
@stop