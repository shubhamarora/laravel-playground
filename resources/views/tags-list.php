<!DOCTYPE html>
<html>
<head>
    <title>Tags</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container col-md-6 col-md-offset-3">
    <div class="well">
        <h3>Relationship Builder</h3>
    </div>
    <div class="jumbotron">

        <div class="pull-left">
            <a href="/users" ><button type="button" class="btn btn-default btn-lg">Users</button></a>
            <button type="button" class="btn btn-default btn-xs cust-modal" data-toggle="modal" data-target=".add-user">Add Users</button>
        </div>

        <div class="pull-right">
            <a href="/tags" ><button type="button" class="btn btn-default btn-lg">Tags</button></a>
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target=".add-tag">Add Tags</button>
        </div>

        <div class="clearfix" style="margin: 15px"></div>

        <div class="row">
            <table class="table table-striped">

                <tr>
                    <td><b>#</b></td>
                    <td colspan="2"><b>Tag Name</b></td>
                </tr>
                <?php $i=0; foreach($tags as $tag) { ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $tag->tagname; ?></td>
                        <td data-id="<?=$tag->_id?>" >Edit</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Add user modal window -->
<div class="modal fade add-user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" placeholder="Full Name" id="full-name">
                <input type="hidden" name="_token" value="<?php csrf_token();?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="add-name-button">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<!-- Add user modal window -->
<div class="modal fade add-tag" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Tag</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" placeholder="Tag Name" id="tag-name">
<!--                <input type="hidden" name="_token" value="--><?php //csrf_token();?><!--">-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="add-tag-button">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
