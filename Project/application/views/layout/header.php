<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>style/market.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/script_v1.js"></script>
</head>
<body>
<!--header -->
<!--JS base_url GLOBAL -->
<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <p class="no-margin w-title"><span style="color:red">b</span>Shop</p>
            </div>
            <div id="basket-wreaper" class="col-lg-8">
                <ul>
                    <li>
                        <button id="s-join" class="btn b_full_container">Join</button>
                    </li>
                    <li>
                        <button id="s-sign-in" class="btn b_full_container<?php if(isset($_SESSION['marker']['user'])){ echo ' g_l';} ?>">Sign in</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- ./header-->

