<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
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
            <a href="" ><button type="button" class="btn btn-default btn-xs">Add Users</button></a>
        </div>

        <div class="pull-right">
            <a href="/tags" ><button type="button" class="btn btn-default btn-lg">Tags</button></a>
            <a href="" ><button type="button" class="btn btn-default btn-xs">Add Tags</button></a>
        </div>

        <div class="clearfix" style="margin: 15px"></div>

        <div class="row">
            <table class="table table-striped">

                <tr>
                    <td><b>#</b></td>
                    <td colspan="3"><b>User Name</b></td>
                </tr>
                <?php $i=0; foreach($users as $user) { ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $user->fullname; ?></td>
                    <td data-id="<?=$user->_id?>" >Edit</td>
                    <td>Add Relation</td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
