<!DOCTYPE html>
<html>
<head>
    <title>Tags</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container col-md-6 col-md-offset-3">
    <div class="well">
        <h3>Relationship Builder</h3>
    </div>
    <div class="jumbotron">

        <div class="pull-left">
            <a href="/users" ><button type="button" class="btn btn-default btn-lg">Users</button></a>
            <button type="button" class="btn btn-default btn-xs add-user">Add Users</button>
        </div>

        <div class="pull-right">
            <a href="/tags" ><button type="button" class="btn btn-default btn-lg">Tags</button></a>
            <button type="button" class="btn btn-default btn-xs add-tag">Add Tags</button>
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
                        <td><?=++$i; ?></td>
                        <td><?=$tag->tagname; ?></td>
                        <td class="edit-tag" data-id="<?=$tag->_id?>" data-name="<?=$tag->tagname;?>">Edit</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Add modal window -->
<div class="modal fade tag-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Tag</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" placeholder="Tag Name" id="tag-name">
            </div>
            <div class="modal-footer">
                <span class="pull-left" id="ack-msg"></span>
                <button type="button" class="btn btn-default" id="save-tag-button">Save</button>
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
