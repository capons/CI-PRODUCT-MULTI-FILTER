<!-- Join us modal-->
<div id="join-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Join us</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="market/registration_user" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="u-email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="u-pass" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Join</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./Join us modal-->

<!-- Sign in modal-->
<div id="sign-in-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sign in</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="market/authorization_user" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="s-email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="s-pass" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./Sign in modal-->

<!-- Add a post-->
<div id="post-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add new post</h4>
            </div>
            <div style="height: 400px" class="modal-body">
                <form onsubmit="return validate_goods_add();" id="new-goods-form" method="post" action="market/post" enctype="multipart/form-data"> <!--enctype for multiple upload -->
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <!--<form id="filter-form-first">-->
                        <div class="form-group">
                            <label>City</label>
                            <input name="m_p_city" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <input name="m_p_region" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Car brand</label>
                            <input name="m_p_brand" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <!-- <form id="filter-form-second"> -->
                        <div class="form-group">
                            <label>Car model</label>
                            <input name="m_p_model" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Engine capacity</label>
                            <input name="m_p_capacity" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mileage</label>
                            <input name="m_p_mileage" type="number"  class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <!-- <form id="filter-form-third">-->
                        <div class="form-group">
                            <label>Number of owners</label>
                            <input name="m_p_owners" type="number"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product images</label>
                            <div style="padding: 0px" class="col-md-12">
                                <div id="btn" class="form-control" ></div>
                                <input id="upfile" type="file" multiple name="uf[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button name="new_goods_button" id="new_goods_button" style="float: right" class="btn btn-primary btn-sm" type="submit"><!--form filter send form button -->
                            <span style="margin-right: 3px" class="glyphicon glyphicon-plus"></span>Append
                        </button>
                    </div>
                </form><!-- </form>-->
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./Add a post-->

<!-- Modal info-->
<div id="w-info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div style="text-align: center" id="info-body" class="modal-body">
                <?php
                echo $this->session->flashdata('message');
                ?>
            </div>
            <div class="modal-footer">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./Modal info-->

<!-- Modal show post filter info-->
<div id="modal-admin-orders-info" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="admin-orders-info" style="text-align: center;font-weight: 700"></p>
            </div>
            <div class="modal-footer">
                <!--
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./Modal post filter info-->