
<script>
var option;
var delivery_date;
var delivery_details;

function setOption(methodid) {
    this.option = methodid;
}

window.onload = function() {
    this.delivery_details = <?php echo json_encode($_POST) ?>
}

function submitRequest() {

    $.post("/public/send_order.php", {
            delivery_details
        })
        .done(function(data) {
            //alert("Data Loaded: " + data);
        });
}
</script>