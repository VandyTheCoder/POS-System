@extends('layouts.adminDefault')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <table class="table table-striped">
            <tr>
                <th colspan="9"><h1 style = "text-align: center">Supplier</h1></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Score</th>
                <th style = "text-align: center">Remove</th>
            </tr>
            <?php
                if(!empty($sup_id))
                {
                    for($i = 0; $i <count($sup_id); $i++)
                    {   echo "<form action = '/admin/activateSupplier' method = 'post'>";
            ?>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
            <?php
                        echo "
                                <input type = 'hidden' name = 'currentStatus' value = '$sup_status[$i]'>
                                <tr>
                                    <td style = 'vertical-align: middle'>$sup_id[$i]</td>
                                    <td style = 'vertical-align: middle'>$sup_name[$i]</td>
                                    <td style = 'vertical-align: middle'>$sup_phone[$i]</td>
                                    <td style = 'vertical-align: middle'>$sup_email[$i]</td>
                                    <td style = 'vertical-align: middle'>$sup_score[$i]</td>
                                    <td><div align='center'> ";
                                        if($sup_status[$i] == "Activate")
                                        {
                                            echo "<button type = 'submit' class = 'btn btn-success' name = 'status' value = '$sup_id[$i]'>$sup_status[$i]</button>";
                                        }
                                        else
                                        {
                                            echo "<button type = 'submit' class = 'btn btn-danger' name = 'status' value = '$sup_id[$i]'>$sup_status[$i]</button>";
                                        }
                        echo "      </div></td>
                                </tr>
                              </form>";
                    }
                }
            ?>
        </table>
    </div>
@stop