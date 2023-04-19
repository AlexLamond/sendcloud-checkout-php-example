<?php

require_once(__DIR__.'/../../private/autoload.php');

Functions::setEnvVars();

$dc = new CheckoutConfig($_POST['checkoutid'], $_POST['apikey'], $_POST['apisecret']);
$configuration = (array)$dc->getAllDeliveryOptions((string)$_POST['country'], (int)$_POST['weight']);

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top:40px">

    <?php 

    foreach ($configuration['delivery_options'] as $delivery_option)
    {
    ?>
        <div class="row">
        <?php
        
        $carrier = new Carrier((array)$delivery_option['carrier']);
        $method = new CheckoutMethod((array)$delivery_option);

        echo "<h5>Method: ".$method->id."</h5><hr>";

        foreach($method->checkoutDates as $method_option)
        {
            if($method_option['delivery_date'] != "Anytime")
            {
                $method_option['parcel_handover_date'] = date("Y-m-d H:i", strtotime($method_option['parcel_handover_date']));
                $method_option['delivery_date'] = date("Y-m-d", strtotime($method_option['delivery_date']));
            }
    ?>
            <div class="col-md-3" style="margin-bottom:10px">
                <div class="card">
                    <img src="<?php echo $carrier->logo_url  ?>" width="40" height="40" style="margin-top:5px;"
                        class="card-img-top" alt="<?php echo $carrier->name ?>">
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php echo $method->title ?></h5>
                        <p class="card-text">Description: <?php echo $method->description ?></p>
                        <p class="card-text">Order by: <?php echo $method_option['parcel_handover_date'] ?></p>
                        <p class="card-text">Delivered on: <?php echo $method_option['delivery_date'] ?></p>
                        <p class="card-text">Cost:
                            <?php echo $method->checkoutMethodPrice->price." ".$method->checkoutMethodPrice->currency; ?>
                        </p>
                        <button onclick="setOption(<?php echo $method->id ?>)" class="btn btn-success"
                            style="float:right">Select Method</button>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>

        </div>
        <br>

    <?php
    }
    ?>

    </div>
</body>
</html>