@extends('layouts.adminDefault')
@section('content')

    <br><br>


    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong style="color: #30a5ff">Data Mining</strong>
                    </div>
                    <div class = "row" style="border-bottom: 1px solid #ddd">
                        <div class = "col-lg-5" style="border-right: 1px solid #ddd">
                            <?php
                            $dataPoints = array(
                                array("y" => $value[0], "label" => "ID : $product_id[0]"),
                                array("y" => $value[1], "label" => "ID : $product_id[1]"),
                                array("y" => $value[2], "label" => "ID : $product_id[2]")
                            );
                            ?>
                            <div id="chartContainer" style="height: 200px"></div>
                            <script type="text/javascript">

                                $(function () {
                                    var chart = new CanvasJS.Chart("chartContainer", {
                                        theme: "theme4",
                                        animationEnabled: true,
                                        title: {
                                            text: "The Most Selling Product"
                                        },
                                        data: [
                                            {
                                                type: "column",
                                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                            }
                                        ]
                                    });
                                    chart.render();
                                });
                            </script>

                        </div>
                        <div class = "col-lg-7">
                            <?php
                            $finalTotal = $total[0] + $total[1] + $total[2];
                            $value1 = $total[0] * 100 / $finalTotal;
                            $value2 = $total[1] * 100 / $finalTotal;
                            $value3 = $total[2] * 100 / $finalTotal;

                            $value1 = round( $value1, 1, PHP_ROUND_HALF_UP);
                            $value2 = round( $value2, 1, PHP_ROUND_HALF_UP);
                            $value3 = round( $value3, 1, PHP_ROUND_HALF_UP);
                            $dataPoint = array(
                                array("y" => $value1, "name" => "$product_name[0]: ", "exploded" => true),
                                array("y" => $value2, "name" => "$product_name[1]: "),
                                array("y" => $value3, "name" => "$product_name[2]: "),
                            );
                            ?>


                            <div id="chartContainer1"style="height: 200px"></div>
                            <script type="text/javascript">
                                $(function () {
                                    var chart = new CanvasJS.Chart("chartContainer1",
                                        {
                                            theme: "theme4",
                                            title:{
                                                text: "The Most Earning"
                                            },
                                            exportFileName: "New Year Resolutions",
                                            exportEnabled: true,
                                            animationEnabled: true,
                                            data: [
                                                {
                                                    type: "pie",
                                                    showInLegend: true,
                                                    toolTipContent: "{name}: <strong>{y}%</strong>",
                                                    indexLabel: "{name} {y}%",
                                                    dataPoints: <?php echo json_encode($dataPoint, JSON_NUMERIC_CHECK); ?>
                                                }]
                                        });
                                    chart.render();
                                });
                            </script>

                        </div>
                    </div>

                    <br>
                    <div class="panel-heading" align="center">
                        <strong style="color: #30a5ff; text-align: center">Daily Report</strong>
                    </div>
                    <div class = "row" style = "border-top: 1px solid #ddd">

                        <div class = "col-lg-7" style="border-right: 1px solid #ddd">
                            <?php
                                $dataPoints2 = array();
                                for($i = 0; $i < count($date); $i++)
                                {
                                    $temp = array("y" => $amount[$i], "label" => "$date[$i]");
                                    array_push($dataPoints2, $temp);
                                }
                            ?>
                            <div id="chartContainer2" style="height: 295px"></div>
                            <script type="text/javascript">

                                $(function () {
                                    var chart = new CanvasJS.Chart("chartContainer2", {
                                        theme: "theme4",
                                        animationEnabled: true,
                                        title: {
                                            text: "Daily Income"
                                        },
                                        data: [
                                            {
                                                type: "splineArea",
                                                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                                            }
                                        ]
                                    });
                                    chart.render();
                                });
                            </script>
                            <hr>
                                <?php
                                $dataPoints3 = array();
                                for($i = 0; $i < count($date); $i++)
                                {
                                    $temp = array("y" => $NumberProduct[$i], "label" => "$date[$i]");
                                    array_push($dataPoints3, $temp);
                                }
                                ?>
                                <div id="chartContainer3" style="height: 295px"></div>
                                <script type="text/javascript">

                                    $(function () {
                                        var chart = new CanvasJS.Chart("chartContainer3", {
                                            theme: "theme4",
                                            animationEnabled: true,
                                            title: {
                                                text: "Daily Products"
                                            },
                                            data: [
                                                {
                                                    type: "splineArea",
                                                    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                                                }
                                            ]
                                        });
                                        chart.render();
                                    });
                                </script>
                        </div>
                        <div class = "col-lg-5">
                            <h4>Report Detail</h4>
                            <hr>
                            <?php
                                for($i = count($date) - 1; $i >= 0; $i--)
                                {
                                    echo "<h5>Date: <u>$date[$i]</u> : </h5>";
                                            echo "
                                                <ul class='nav nav-pills nav-justified'>
                                                  <li role='presentation'><a href='#'>Income = $ $amount[$i]</a></li>
                                                  <li role='presentation'><a href='#'>Products: $NumberProduct[$i]</a></li>
                                                  <li role='presentation'><a href='#'>Most: $mostProduct[$i]</a></li>
                                                </ul>
                                                ";
                                }

                            ?>
                        </div>
                    </div>

                    <br>

                    <div class="panel-heading" align="center">
                        <strong style="color: #30a5ff; text-align: center">Recommendation and Alert</strong>
                    </div>
                    <div class = "row" style = "border-top: 1px solid #ddd">
                        <div class = "col-lg-6" >
                            <h4 style = "padding-left: 15px">Recommendation</h4>
                            <hr>
                            <?php
                                if($mostProduct[6] != $mostProduct[5] && $mostProduct[6] != $mostProduct[4])
                                {
                                    if($mostProduct[5] == $mostProduct[4])
                                    {
                                        echo "<p style = 'padding-left: 10px'>=> We suggest you to supply more quality on Product ID: $mostProduct[6] rather than ID: $mostProduct[5]</p>";
                                        echo "<p style = 'padding-left: 10px'>=> Please make some discount on Product ID $mostProduct[5]></p>";
                                    }
                                    else
                                    {
                                        echo "<p style = 'padding-left: 10px'>=> We suggest you to supply more quality on Product ID: $mostProduct[6] rather than ID: $mostProduct[5] or $mostProduct[4]</p>";
                                        echo "<p style = 'padding-left: 10px'>=> Please make some discount on Product ID $mostProduct[5] or $mostProduct[4]</p>";
                                    }
                                }
                                if($mostProduct[6] != $mostProduct[5] && $mostProduct[6] == $mostProduct[4])
                                {
                                    echo "<p style = 'padding-left: 10px'>We suggest you to supply more quality on Product ID: $mostProduct[6] rather than ID: $mostProduct[5]</p>";
                                    echo "<p style = 'padding-left: 10px'>Please make some discount on Product ID $mostProduct[5]</p>";
                                }
                            ?>

                        </div>
                        <div class="col-lg-6" style="border-left: 1px solid #ddd">
                            <h4 style = "padding-left: 10px">Alert</h4>
                            <hr>
                            <?php
                                if(!empty($productOut))
                                {
                                    $number = count($productOut);
                                    echo "<p>=> There is/are $number products that is/are nearly of stock: </p><p>(Barcode ID: ";
                                    foreach ($productOut as $product)
                                    {
                                        echo $product->barcode_id.", ";
                                    }
                                    echo ")</p>";
                                }
                                if(!empty($productExp))
                                {
                                    $number = count($productExp);
                                    echo "<p>=> There is/are $number products that is/are nearly of Expired: </p><p>(Barcode ID: ";
                                    foreach ($productExp as $product)
                                    {
                                        echo $product->barcode_id.", ";
                                    }
                                    echo ")</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </div>
@stop