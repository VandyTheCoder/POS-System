@extends('layouts.adminDefault')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Admin / Products / Food</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products</h1>
            </div>
        </div><!--/.row-->
<style>
    p{
        text-align: left;
    }
    
</style>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Category
                                <?php
                                if(!empty($message))
                                {
                                    echo "<span style = 'color: red; float: right'>$message</span>";
                                }
                                ?>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div>
                            <?php
                                if(!empty($pid))
                                {
                                    for($i = 0; $i < count($pid); $i++)
                                    {
                                        echo    "<div class='col-lg-3 col-md-4 col-sm-6' style = 'border: 1px solid #ddd'>
                                                    <div align='center' style = 'padding-top: 10px'>
                                                        <img width = '150px' height = '150px' src = '$image_path[$i]'>
                                                    </div>
                                                    <hr style = 'border: 2px solid #ddd'>
                                                    <p>Product ID : <i><b>$pid[$i]</b></i></p>
                                                    <p>Barcode ID : <i><b>$barcode[$i]</b></i></p>
                                                    <p>Name : <i><b>$pname[$i]</b></i></p>
                                                    <p>Country : <i><b>$country[$i]</b></i></p>
                                                    <p>Quantity : <i><b>$quantity[$i]</b></i></p>
                                                    <p>Price : <i><b>$ $price[$i]</b></i></p>
                                                    <p>Category : <i><b>$category[$i]</b></i></p>
                                                    <p>Import Date : <i><b>$imported_date[$i]</b></i></p>
                                                    <p>Expire Date : <i><b>$expired_date[$i]</b></i></p>
                                                    <div align='center'>
                                                        <button class = 'btn btn-primary' data-toggle='modal' data-target='#$pid[$i]supply' type = 'button'>Supply</button>
                                                        <button class = 'btn btn-danger' data-toggle='modal' data-target='#$pid[$i]remove' type = 'button'>Remove</button>
                                                    </div>
                                                    <br>
                                                </div>";
                                        echo "<form action = '/admin/supplyProduct' method = 'post'>";
                            ?>
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                            <?php
                                        echo "
                                            <div class='modal fade' style = 'margin-top: 250px' id='$pid[$i]supply' align='center' tabindex='-1' role='dialog' aria-labelledby='myModalLabel$pid[$i]'>
                                                <div class='modal-dialog' role='document' style = 'width: 300px'>
                                                    <div class = 'modal-content'>
                                                        <div class='modal-header' align = 'center'>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                            <h4 class='modal-title' id='myModalLabel$pid[$i]'>Product ID : $pid[$i]</h4>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <div class='input-group'>
                                                                <input type = 'number' min = '$quantity[$i]' value = '$quantity[$i]' required name = 'quantity' class ='form-control' placeholder='Quantity'>
                                                                <br><br>
                                                                <input type = 'text' value = '$price[$i]' name = 'price' required class = 'form-control' placeholder='New Price $'>
                                                                <br><br>
                                                                <input type = 'number' name = 'supplier_id' required class = 'form-control' placeholder='Supplier ID'>
                                                            </div>
                                                        </div>
                                                        <div class='modal-footer'>
                                                               <input type = 'hidden' name = 'oldQuantity' value='$quantity[$i]'>
                                                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                                                            <button type= 'submit' value = '$pid[$i]' name='supply' class='btn btn-success'>Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>";

                                        echo "<form action = '/admin/removeProduct' method = 'post'>";
                            ?>
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                            <?php
                                        echo "
                                            <div class='modal fade' style = 'margin-top: 250px' id='$pid[$i]remove' tabindex='-1' role='dialog' aria-labelledby='myModalLabe$pid[$i]'>
                                                <div class='modal-dialog' role='document' style = 'width: 300px'>
                                                    <div class = 'modal-content'>
                                                        <div class='modal-header' align = 'center'>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                            <h4 class='modal-title' id='myModalLabe$pid[$i]'>Product ID : $pid[$i]</h4>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <div class='input-group' align='center'>
                                                                <p style = 'color: red; font-size: 13px; text-align: center'>Are you sure to delete the Product ID : $pid[$i]</p>
                                                            </div>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
                                                            <button type= 'submit' value = '$pid[$i]' name='remove' class='btn btn-success'>Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop