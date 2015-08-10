/**
 * Created by Shubham on 09-08-2015.
 */

$(document).ready(function() {

    $("#add-user-btn").on("click",function() {
        var name = $("#input-data").val();
        if(name!="") {
            $("#ack-msg").empty().append("Saving your entry ..");
            $.ajax({
                url:"/users",
                type:"POST",
                data:{fullname:name},
                success:function(response) {
                    $("#ack-msg").empty().append("Success!");
                    console.log(response);
                },
                error: function (response) {
                    $("#ack-msg").empty().append("Some Error Occurred.");
                    console.log(response);
                }
            });
        }
        else {
            $("#ack-msg").empty().append("Field is mandatory");
        }
    });

    $("#add-tag-btn").click(function () {
        var name = $("#input-data").val();
        if(name!="") {
            $("#ack-msg").empty().append("Saving your entry ..");
            $.ajax({
                url:"/tags",
                type:"POST",
                data:{tagname:name},
                success:function(response) {
                    $("#ack-msg").empty().append("Success!");
                    console.log(response);
                },
                error: function (response) {
                    $("#ack-msg").empty().append("Some Error Occurred.");
                    console.log(response);
                }
            });
        }
        else {
            $("#ack-msg").empty().append("Field is mandatory");
        }
    });

    // Loads user modal pop-up with the data in data
    // attributes when user clicks on edit.

    $(".edit-name").click(function () {
        $("#input-data").val('');  // empty modal input value
        $('.common-modal').modal('show');  // Load user modal pop-up
        $(".modal-title").empty().append("Update User name");
        $(".submit-data-btn").empty().append("Update");
        $(".submit-data-btn").attr("id","edit-user-btn");
        console.log($(this).data('id'));
    });

    // Loads tag modal pop-up  with the data in data
    // attributes when user clicks on edit.

    $(".edit-tag").click(function () {
        $("#input-data").val('');  // empty modal input value
        $('.common-modal').modal('show');  // Load Tag modal pop-up
        $(".modal-title").empty().append("Update Tag name");
        $(".submit-data-btn").empty().append("Update");
        $(".submit-data-btn").attr("id","edit-tag-btn");
        console.log($(this).data('id'));
    });

    $(".add-user").click(function () {
        $("#input-data").val('');  // empty modal input value
        $(".common-modal").modal('show');  // Load Tag modal pop-up
        $(".modal-title").empty().append("Add User");
        $(".submit-data-btn").empty().append("Add");
        $(".submit-data-btn").attr("id","add-user-btn");
    });

    $(".add-tag").click(function () {
        $("#input-data").val('');  // empty modal input value
        $('.common-modal').modal('show');  // Load Tag modal pop-up
        $(".modal-title").empty().append("Add Tag name");
        $(".submit-data-btn").empty().append("Add");
        $(".submit-data-btn").attr("id","add-tag-btn");

    });

});