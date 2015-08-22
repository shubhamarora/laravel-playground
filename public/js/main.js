/**
 * Created by Shubham on 09-08-2015.
 */

$(document).ready(function() {

    $(".submit-data-btn").on("click", function (event) {
        event.preventDefault();
        var name = $("#input-data").val();
        var saveAction = $(this).data("save-action");
        if (name != "") {
            switch (saveAction) {
                case 'edit-user-name':
                    EditUserName();
                    break;
                case 'add-user-name':
                    AddUserName();
                    break;
                case 'edit-tag-name':
                    EditTagName();
                    break;
                case 'add-tag-name':
                    AddTagName();
                    break;
            }
        }
        else {
            $("#ack-msg").empty().append("Field is mandatory");
        }
    })

    function AddUserName() {
        var name = $("#input-data").val();
        var _token = $("#_token").val();
        $("#ack-msg").empty().append("Saving your entry ..");
        $.ajax({
            url: "/users",
            type: "POST",
            data: {fullname: name,_token:_token},
            success: function (response) {
                $("#ack-msg").empty().append("Success!");
                console.log(response);
            },
            error: function (response) {
                $("#ack-msg").empty().append("Some Error Occurred.");
                console.log(response);
            }
        });
    }

    function EditUserName() {
        var name = $("#input-data").val();
        var _token = $("#_token").val();
        $("#ack-msg").empty().append("Saving your entry ..");
        $.ajax({
            url: "/users/"+$(".submit-data-btn").data("id"),
            type: "PUT",
            data: {fullname: name,_token:_token},
            success: function (response) {
                $("#ack-msg").empty().append("Success!");
                console.log(response);
            },
            error: function (response) {
                $("#ack-msg").empty().append("Some Error Occurred.");
                console.log(response);
            }
        });
    }

    function AddTagName() {
        var name = $("#input-data").val();
        var _token = $("#_token").val();
        $("#ack-msg").empty().append("Saving your entry ..");
        $.ajax({
            url: "/tags",
            type: "POST",
            data: {tagname: name,_token:_token},
            success: function (response) {
                $("#ack-msg").empty().append("Success!");
                console.log(response);
            },
            error: function (response) {
                $("#ack-msg").empty().append("Some Error Occurred.");
                console.log(response);
            }
        });
    }

    function EditTagName() {
        var name = $("#input-data").val();
        var _token = $("#_token").val();
        $("#ack-msg").empty().append("Saving your entry ..");
        $.ajax({
            url: "/tags/"+$(".submit-data-btn").data("id"),
            type: "PUT",
            data: {tagname: name,_token:_token},
            success: function (response) {
                $("#ack-msg").empty().append("Success!");
                console.log(response);
            },
            error: function (response) {
                $("#ack-msg").empty().append("Some Error Occurred.");
                console.log(response);
            }
        });
    }

    // Below attached events will load the modal with existing data (from html5 data attribute)
    // which is to be updated and update the modal with it respectively. This is done so as to
    // use the same modal pop-up for all the purpose - Add/edit user, add/edit tag.

    $(".edit-name").click(function (event) {
        event.preventDefault();
        $("#input-data").val($(this).data("name"));
        $(".modal-title").empty().append("Update User name");
        $(".submit-data-btn").empty().append("Update").attr("data-save-action","edit-user-name").attr("data-id",$(this).data('id'));
        $('.common-modal').modal('show');
    });

    $(".edit-tag").click(function () {
        $("#input-data").val($(this).data("name"));
        $(".modal-title").empty().append("Update Tag name");
        $(".submit-data-btn").empty().append("Update").attr("data-save-action","edit-tag-name").attr("data-id",$(this).data('id'));
        $('.common-modal').modal('show');
    });

    $(".add-user").click(function () {
        $(".modal-title").empty().append("Add User");
        $(".submit-data-btn").empty().append("Add").attr("data-save-action","add-user-name");
        $('.common-modal').modal('show');
    });

    $(".add-tag").click(function () {
        $(".modal-title").empty().append("Add Tag name");
        $(".submit-data-btn").empty().append("Add").attr("data-save-action","add-tag-name");
        $('.common-modal').modal('show');
    });

    // clear input value and acknowledge message when modal is dismissed.

    $('.common-modal').on('hidden.bs.modal', function () {
        $(".ack-msg").empty();
        $("#input-data").val('');
    })

});