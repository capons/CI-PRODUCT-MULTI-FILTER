<?php if($market_header) echo $market_header; ?>
<!--content -->
<?php
if (isset($_SESSION['marker']['user'])) { // only authorization user can add new post
    ?>
    <div class="well">
        <div class="row">
            <div style="text-align: center" class="col-lg-12">
                <button id="add_post" class="btn btn-primary">Add new post</button>
            </div>
        </div>
    </div>
    <?php
}
?>
<div class="well"> <!--orders filter -->
    <div class="row">
        <form onsubmit="return filter_check()" id="filter-order-form" method="post">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <!--<form id="filter-form-first">-->
                <div class="form-group">
                    <label>City</label>
                    <input name="city" type="text" class="form-control" placeholder="City">
                </div>
                <div class="form-group">
                    <label>Region</label>
                    <input name="region" type="text" class="form-control" placeholder="Region">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <!-- <form id="filter-form-second"> -->
                <div class="form-group">
                    <label>Car brand</label>
                    <input name="car_brand" type="text" class="form-control" placeholder="Brand">
                </div>
                <div class="form-group">
                    <label>Car model</label>
                    <input name="car_model" type="text" class="form-control"  placeholder="Model">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <!-- <form id="filter-form-third">-->
                <div class="form-group">
                    <label>Engine capacity</label>
                    <input name="engine_capacity"  type="date"  class="form-control" placeholder="Engine capacity">
                </div>
                <div class="form-group">
                    <label>Mileage</label>
                    <input name="mileage"  type="date" class="form-control" placeholder="Mileage">
                </div>
                <div class="form-group">
                    <label>Number of owners</label>
                    <input name="owners"  type="date" class="form-control" placeholder="Owners">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button name="order_filter_button" id="filter-orders-b" style="float: right" class="btn btn-primary btn-sm" type="submit"><!--form filter send form button -->
                    <span style="margin-right: 3px" class="glyphicon glyphicon-search"></span>Filter
                </button>
            </div>
        </form><!-- </form>-->
    </div><!--.row -->
</div> <!--end orders filter -->
<div class="container-fluide">
    <div class="col-lg-12 product-content-body">
        <?php
        if(!empty($all_post)) { //array containes all post data
            foreach ($all_post as $val) {
                ?>
                <div class="col-xs-4 no-padding product-presentation-body">
                    <!--product image -->
                    <div class="col-xs-12 product-image-body">
                        <img src="<?php echo base_url().'stock_image/'.$val['image_name'] ?>">
                    </div>
                    <!--product title -->
                    <div class="col-xs-12 product-title">
                        <p><?php echo $val['car_brand']; ?></p>
                    </div>
                    <div class="product-bottom-line">
                        <!--Border line -->
                    </div>
                    <div class="col-xs-12 no-padding">
                        <div class="col-lg-6 no-padding">

                            <div class="product-r-border">
                                <!--Border line -->
                            </div>
                            <!--product price -->
                            <p class="product-price"><?php echo $val['car_model']; ?></p>
                        </div>
                        <div style="text-align: center" class="col-lg-6">
                            <button class="btn btn-primary btn-sm">Buy</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div style="text-align: center" class="alert alert-info" role="alert">';
            echo 'Post is empty';
            echo '</div>';
        }
        ?>
    </div>
        <div class="col-lg-12">
            <?php
            if(isset($links)) {
                echo $links; //pagination
            }
            ?>
        </div>
</div>
<!-- ./content-->

<!--Load modal window layout -->
<?php if($market_modal) echo $market_modal; ?>
<!-- ./modal-->

<?php if($market_footer) echo $market_footer; ?>
