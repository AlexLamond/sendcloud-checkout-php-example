<?php

set_include_path(__DIR__."/../../");

require_once(get_include_path().'private/autoload.php');

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
    <script src="https://embed.sendcloud.sc/spp/1.0.0/api.min.js"></script>
    <script>
    this.dc = [];

    this.dc.apikey = "<?php echo $dc->returnApiKey(); ?>"
    this.dc.country = "<?php echo $_POST['country']; ?>"
    this.dc.postal_code = "<?php echo $_POST['postal']; ?>"
    this.dc.city = "<?php echo $_POST['city']; ?>";

    </script>

    <script src="/checkout/service_points.js"></script>

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

        echo "<h5>Method: ".$method->id."</h5>";
        echo "<h6>Type: ".$method->delivery_method_type."</h6><hr>";

        foreach($method->checkoutDates as $method_option)
        {
            switch($method->delivery_method_type)
            {
                case 'same_day_delivery':
                    include(get_include_path()."private/DeliveryOptions/SameDay.php");
                    break;
                case 'nominated_day_delivery':
                    include(get_include_path()."private/DeliveryOptions/NominatedDay.php");
                    break;
                case 'standard_delivery':
                    include(get_include_path()."private/DeliveryOptions/Standard.php");
                    break;
                case 'service_point_delivery':
                    include(get_include_path()."private/DeliveryOptions/ServicePoint.php");
                    break;
            }
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