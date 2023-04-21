<div class="col-md-3" style="margin-bottom:10px">
                <div class="card">
                    <img src="<?php echo $carrier->logo_url  ?>" width="40" height="40" style="margin-top:5px;"
                        class="card-img-top" alt="<?php echo $carrier->name ?>">
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php echo $method->title ?></h5>
                        <p class="card-text">Description: <?php echo $method->description ?></p>
                        <p class="card-text">Order by: <?php echo $method_option['parcel_handover_date'] ?></p>
                        <p class="card-text">Delivered Today!</p>
                        <p class="card-text">Cost:
                            <?php echo $method->checkoutMethodPrice->price." ".$method->checkoutMethodPrice->currency; ?>
                        </p>
                        <button onclick="setOption(<?php echo $method->id ?>)" class="btn btn-success"
                            style="float:right">Select Method</button>
                    </div>
                </div>
            </div>