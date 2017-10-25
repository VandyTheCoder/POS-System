@extends('layouts.default')
@section('content')

<style>
    body{
        background-color: #222;
    }
    .head
    {
        text-align: center;
        font-size: 25px;
        font-family: "Trebuchet MS";
    }
    .table-striped
    {
        background-color: #909497;

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
        <table class="table table-striped">
            <tr class = "head" style = "border-color: #222">
                <td style = 'background-color: #5cb85c'><b style = 'color: white'>Product ID</b></td>
                <td style = 'background-color: #337ab7'><b style = 'color: white'>Barcode ID</b></td>
                <td style = 'background-color: #f0ad4e'><b style = 'color: white'>Product Name</b></td>
                <td style = 'background-color: #a569bd'><b style = 'color: white'>Prices $</b></td>
                <td style = 'background-color: #636b6f'><b style = 'color: white'>Quantity</b></td>
                <td style = 'background-color: #c9302c; border-left: 1px solid #ddd'><b style = 'color: white'>Total $</b></td>
            </tr>
            <?php
              if(!empty($bid))
              {
                for($i = 0; $i < count($bid); $i++)
                {
                        echo "<tr class = 'element'>
                          <td>$bid[$i]</td>
                          <td>$bbarcode[$i]</td>
                          <td>$bname[$i]</td>
                          <td>$bprice[$i]</td>
                          <td>$bquantity[$i]</td>
                          <td style = 'border-left: 1px solid #ddd'>$ $btotal[$i]</td>
                        </tr>";
                }
                for($i = 0; $i < 10 - count($bid); $i++)
                {
                  echo "<tr class = 'element'>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td style = 'border-left: 1px solid #ddd'>-</td>
                        </tr>";
                }
                if(count($bid) >= 10)
                {
                  echo "<tr class = 'element'>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td style = 'border-left: 1px solid #ddd'>-</td>
                        </tr>";
                }
              }
              else
              {
                for($i = 0; $i < 10; $i++)
                {
                  echo "<tr class = 'element'>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td style = 'border-left: 1px solid #ddd'>-</td>
                        </tr>";
                }
              }
            ?>
            
            <tr class = "head active">
                <td style = 'background-color: #229954'></td>
                <td style = 'background-color: #229954'></td>
                <td style = 'background-color: #229954'></td>
                <td style = 'background-color: #229954'></td>
                <td style = 'background-color: #229954; color: white'>Total Price</td>
                <td style = 'background-color: #c9302c; color: white; border-left: 1px solid #ddd'><?php if(!empty($bid)) {echo "$ ".$btotalFinal;} else{echo "$ ";} ?></td>
            </tr>

        </table>
    </div>
<br>

<div class = "">
        <div class = "col-lg-4 col-md-4 col-sm-4">
          <?php
            if(!empty($message))
            {
              echo "<span style = 'color: red'>* $message</span>";
            }
          ?>
        </div>

        <div class = "col-lg-4 col-md-4 col-sm-4">
            <p style = "color: white">® All Rights Reserved. C4U Technology Col Ltd.</p>
        </div>

        <div class = "col-lg-4 col-md-4 col-sm-4" align = "right">
            <!-- Sell -->
            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#sell"><img src = "images/sale.png"></button>

            <!-- Button Remove -->
            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#return"><img src = "images/return.png"></button>

            <!-- Button Buy -->
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#add"><img src = "images/buy.png"></button>

            <form action = "/sell" method = "post">
                {!! csrf_field() !!}
                <div class="modal fade" style = "margin-top: 150px" id="sell" tabindex="-1" role="dialog" aria-labelledby="myModalLabe0">
                    <div class="modal-dialog" role="document" style = "width: 300px">
                        <div class="modal-content" style = "background-color: rgba(255, 255, 255, 0.8)">
                            <div class="modal-header" align = "center">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabe0">Total Money</h4>
                            </div>
                            <div class="modal-body">
                                <input name = "total" value = "<?php if(!empty($bid)) {echo "$ ".$btotalFinal;} ?>" readonly type="text" class="form-control">
                                <br>
                                <input name = "total" value = "<?php if(!empty($bid)) {echo "៛ ".($btotalFinal * 4100);} ?>" readonly type="text" class="form-control">
                                <br>
                                <input style = 'width: 268px' class="awesomplete form-control" list="mylist2" name = "mem_id" type="text" class="awesomplete form-control" placeholder="Membership ID"/>
                                <datalist id="mylist2">
                                    <?php
                                    foreach ($mem_search as $mem)
                                    {
                                        echo "<option>$mem->id</option>";
                                    }
                                    ?>
                                </datalist>
                                <br>
                                <br>
                                <input name = "receivedDollar" type="number" class="form-control" placeholder="Received Money $">
                                <br>
                                <input name = "receivedRiel" type="number" class="form-control" placeholder="Received Money ៛">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="sellout" class="btn btn-success">Sell</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action = "/remove" method = "post">
                {!! csrf_field() !!}
                <div class="modal fade" style = "margin-top: 150px" id="return" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style = "width: 300px">
                        <div class="modal-content" style = "background-color: rgba(255, 255, 255, 0.8)">
                            <div class="modal-header" align = "center">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Remove Product</h4>
                            </div>
                            <div class="modal-body">
                                <input name = "rid" type="number" class="form-control" placeholder="Product's ID">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="remove" class="btn btn-warning">Remove From Table</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form action = "/buy" method = "post">
            {!! csrf_field() !!}
              <div class="modal fade" style = "margin-top: 150px" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2">
                <div class="modal-dialog" role="document" style = "width: 300px">
                  <div class="modal-content" style = "background-color: rgba(255, 255, 255, 0.8)">
                    <div class="modal-header" align = "center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabe2">Sell Management</h4>
                    </div>
                    <div class="modal-body">
                        <input style = 'width: 268px' class="awesomplete form-control" list="mylist3" required name = "abarcode" type="text" class="awesomplete form-control" placeholder="Barcode's ID"/>
                        <datalist id="mylist3">
                            <?php
                            foreach ($barcode_search as $barcode)
                            {
                                echo "<option>$barcode->barcode_id</option>";
                            }
                            ?>
                        </datalist>
                      <br>
                        <br>
                      <input name = "aquantity" type="number" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name = "add" class="btn btn-success">Add to Table</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
<br><br><br>

@stop