<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container" style="margin-top:40px">
        <form class="row g-3" action="checkout/" method="POST">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="Tech Support" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="techsupport@sendcloud.com" required>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" value="Stadhuisplein 10" placeholder="Stadhuisplein 10" required>
            </div>
            <div class="col-12">
                <label for="address2" class="form-label">Address 2</label>
                <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="city" value="Eindhoven" required>
            </div>
            <div class="col-md-2">
                <label for="postal" class="form-label">Postal Code</label>
                <input type="text" name="postal" class="form-control" id="postal" value="5611EM" required>
            </div>
            <div class="col-md-4">
                <label for="country" class="form-label">Country</label>
                <select id="country" name="country" class="form-select">
                    <?php require_once('countries.html'); ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="weight" class="form-label">Weight (g)</label>
                <input type="number" name="weight" class="form-control" value="1000.00" id="weight" required>
            </div>
            <div class="col-md-4">
                API Primary Key:<input type="password" name="apikey" class="form-control"> Only fill this in if you are testing a specific user
                <br>It is recommended to use a test key here if so
            </div>
            <div class="col-md-4">
                API Secret Key:<input type="password" name="apisecret" class="form-control"> Only fill this in if you are testing a specific user
                <br>It is recommended to use a test key here if so
            </div>
            <div class="col-md-4">
                Checkout ID:<input type="text" name="checkoutid" class="form-control">Only fill this in if you are testing a specific Checkout ID
                <br> You can leave this blank otherwise
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="float:right">Checkout</button>
            </div>
        </form>
    </div>
</body>

</html>