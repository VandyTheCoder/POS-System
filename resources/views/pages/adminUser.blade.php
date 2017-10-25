@extends('layouts.adminDefault')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <table class="table table-striped">
        <tr>
            <th colspan="9"><h1 style = "text-align: center">Clerks</h1></th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Score</th>
            <th style = "text-align: center">Edit & Delete</th>
        </tr>
        <?php
            if(!empty($clerk_id))
            {
                for($i = 0; $i < count($clerk_id); $i++)
                {
                    echo "<form action = '/admin/changeStatus' method = 'post'>";
            ?>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
        <?php
            echo        "
                               <input type = 'hidden' name = 'currentStatus' value = '$clerk_status[$i]'>
                              <tr>
                                <td style = 'vertical-align: middle'>$clerk_id[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_name[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_gender[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_dob[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_position[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_email[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_phone[$i]</td>
                                <td style = 'vertical-align: middle'>$clerk_score[$i]</td>
                                <td style = 'vertical-align: middle;'>
                                    <div align = 'center'>
                                        <botton type='button' class='btn btn-primary' data-toggle='modal' data-target='#$clerk_id[$i]'>Promote</botton> ";
                                if($clerk_status[$i] == "Activate")
                                {
                                    echo "<button type = 'submit' class = 'btn btn-success' name = 'status' value = '$clerk_id[$i]'>$clerk_status[$i]</button>";
                                }
                                else
                                {
                                    echo "<button type = 'submit' class = 'btn btn-danger' name = 'status' value = '$clerk_id[$i]'>$clerk_status[$i]</button>";
                                }

            echo "
                                    </div>
                                </td>
                              </tr>
                          </form>
                         ";
                    echo "<form action = '/admin/promote' method = 'post'>";
        ?>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
        <?php
                    echo "
                            <div class='modal fade' id='$clerk_id[$i]' tabindex='-1' role='dialog' aria-labelledby='myModalLabe$clerk_id[$i]'>
                                <div class='modal-dialog' role='document' style = 'width: 300px'>
                                    <div class = 'modal-content'>
                                        <div class='modal-header' align = 'center'>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                            <h4 class='modal-title' id='myModalLabe$clerk_id[$i]'>Promote Clerk ID : $clerk_id[$i]</h4>
                                        </div>
                                        <div class='modal-body'>
                                            <select class = 'form-control' name = 'position'>
                                                <option value='$clerk_position[$i]'>$clerk_position[$i]</option>
                                                <option value='Admin'>Admin</option>
                                            </select>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                                            <button type= 'submit' value = '$clerk_id[$i]' name='approve' class='btn btn-success'>Approve</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                         ";
                }
            }
        ?>

    </table>
    <hr>
</div>

@stop