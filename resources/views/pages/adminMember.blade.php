@extends('layouts.adminDefault')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <table class="table table-striped">
            <tr>
                <th colspan="9"><h1 style = "text-align: center">Membership</h1></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Discount %</th>
                <th>Created Date</th>
                <th>Expired Date</th>
                <th>Score</th>
                <th style = "text-align: center">Expend & Delete</th>
            </tr>
            <?php
                if(!empty($mem_id))
                {
                    for($i = 0; $i < count($mem_id); $i++)
                    {
                        echo "<tr>
                                <td style = 'vertical-align: middle'>$mem_id[$i]</td>
                                <td style = 'vertical-align: middle'>$mem_name[$i]</td>
                                <td style = 'vertical-align: middle'>$mem_phone[$i]</td>
                                <td style = 'vertical-align: middle'>$mem_email[$i]</td>
                                <td style = 'vertical-align: middle'>$mem_discount[$i] %</td>
                                <td style = 'vertical-align: middle'>$mem_created[$i]</td>
                                <td style = 'vertical-align: middle'>$mem_expired[$i]</td>
                                <td style = 'vertical-align: middle'>$mem_score[$i]</td>
                                <td>
                                    <div align='center'>
                                        <botton type='button' class='btn btn-warning' data-toggle='modal' data-target='#$mem_id[$i]expend'>Expend Expired</botton>
                                        <botton type='button' class='btn btn-danger' data-toggle='modal' data-target='#$mem_id[$i]delete'>Delete Member</botton>
                                    </div>
                                </td>
                              </tr>";

                        echo "<form action = '/admin/MemExpend' method = 'post'>";
            ?>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
            <?php
                        echo "
                                <div class='modal fade' style = 'margin-top: 250px' id='$mem_id[$i]expend' tabindex='-1' role='dialog' aria-labelledby='myModalLabel$mem_id[$i]'>
                                    <div class='modal-dialog' role='document' style = 'width: 300px'>
                                        <div class = 'modal-content'>
                                            <div class='modal-header' align = 'center'>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                <h4 class='modal-title' id='myModalLabel$mem_id[$i]'>Member ID : $mem_id[$i]</h4>
                                            </div>
                                            <div class='modal-body'>
                                                <div class='input-group'>
                                                    <input style = 'width: 267px; background-color: #e6e6e6; border-radius: 10px; text-align: center' class='form-control' value = '$mem_expired[$i]' id='date' name='dob' placeholder='YYYY-MM-DD' type='text'/>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                                                <button type= 'submit' value = '$mem_id[$i]' name='expend' class='btn btn-warning'>Expend</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        ";

                        echo "<form action = '/admin/MemDelete' method = 'post'>";
            ?>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
            <?php
                        echo "
                                <div class='modal fade' style = 'margin-top: 250px' id='$mem_id[$i]delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabe$mem_id[$i]'>
                                    <div class='modal-dialog' role='document' style = 'width: 300px'>
                                        <div class = 'modal-content'>
                                            <div class='modal-header' align = 'center'>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                <h4 class='modal-title' id='myModalLabe$mem_id[$i]'>Member ID : $mem_id[$i]</h4>
                                            </div>
                                            <div class='modal-body'>
                                                <div class='input-group'>
                                                    <p style = 'color: red; font-size: 13px; text-align: center'>Are you sure to delete the membership ID : $mem_id[$i]</p>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
                                                <button type= 'submit' value = '$mem_id[$i]' name='delete' class='btn btn-success'>Yes</button>
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
    </div>
@stop