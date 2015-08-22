<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Direct Relation</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container col-md-6 col-md-offset-3">
    <div class="well">
        <h3>Relationship Builder</h3>
        <p>(Direct Relation)</p>
    </div>
    <div class="jumbotron">

        <div align="center">
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#add-relation-modal">Add Relative</button>
        </div>

        <div class="clearfix" style="margin: 15px"></div>
        <div class="row">
            <table class="table table-striped">

                <tr>
                    <td><b>#</b></td>
                    <td><b>Relation</b></td>
                    <td><b>Relative</b></td>
                </tr>
                <?php $i=0; foreach($userUserMapping as $uum) { ?>
                    <tr>
                        <td><?=++$i; ?></td>
                        <td><?php echo $uum['relationshipTag']; ?></td>
                        <td><?php echo ($uum['userid'] == $currentUserId ? $uum['relativeUserName'] : $uum['username']." (He Says)") ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Add user modal window -->
<div class="modal fade" id="add-relation-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Relation</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Add Tag" id="tag" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Add User" id="user" autocomplete="off">
                    </div>
                </div>
                <div class="row typi-suggestion">
                    <div class="col-md-6 tag-suggestions" style="visibility: hidden;">
                        <ul></ul>
                    </div>
                    <div class="col-md-6 user-suggestions" style="visibility: hidden">
                        <ul></ul>
                    </div>
                </div>
                <form id="add-relationship-form">
                    <input type="hidden" name="current-user-id" id="current-user-id" value="<?=$currentUserId?>" />
                    <input type="hidden" name="tag-name" id="tag-name" value="" />
                    <input type="hidden" name="user-id" id="user-id" value="" />
                    <input type="hidden" name="_token" id="_token" value="<?=csrf_token();?>" />
                </form>
            </div>
            <div class="modal-footer">
                <span class="pull-left" id="ack-msg"></span>
                <button type="button" class="btn btn-default" id="save-relationship-btn">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<script>
    currentUserId = <?=$currentUserId?>;
</script>
<script src="../js/jquery-2.1.4.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/autocomplete.js"></script>
</body>
</html>
