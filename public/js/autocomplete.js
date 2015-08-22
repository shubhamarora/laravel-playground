/**
 * Created by Shubham on 12-08-2015.
 */

$(document).ready(function() {

    var tagSearchRequest, userSearchRequest;
    var baseUrl = window.location.origin;

    $("#tag").on("keyup", function (event) {

       $(".tag-suggestions > ul").empty();

       if(tagSearchRequest) {
           tagSearchRequest.abort();
       }
       if($(this).val()!="") {
           tagSearchRequest = $.ajax({
               url: baseUrl + "/tagsearch/" + $(this).val(),
               success: function (response) {
                   response = $.parseJSON(response);
                   $.each(response,function(i, tag){
                       $('.tag-suggestions').css('visibility','visible');
                       $(".tag-suggestions > ul").append('<li>' + tag.tagname + '</li>');
                   });
               }
           });
       }
    });

    $("#user").on("keyup", function (event) {

        $(".user-suggestions > ul").empty();

        if(userSearchRequest) {
            userSearchRequest.abort();
        }

        if($(this).val()!="") {
            userSearchRequest = $.ajax({
                url: baseUrl + "/usersearch/" + $(this).val(),
                success: function (response) {
                    response = $.parseJSON(response);
                    $.each(response,function(i, user){
                        $('.user-suggestions').css('visibility','visible');
                        if(user._id!= currentUserId)
                        $(".user-suggestions > ul").append('<li data-user-id=\"'+ user._id +'\">' + user.fullname + '</li>');
                    });
                }
            });
        }
    });


    // hide suggestions when focus shift from element other than input boxes
    $("#tag, #user").focusout(function () {
        $('.user-suggestions, .tag-suggestions').css('visibility','hidden');
    });

    // using mousedown instead of click because above focusout event
    // is being fired before click event and the suggestion disappears'
    // before one of them receives a click.
    // More info here - http://stackoverflow.com/questions/20054033/jquery-focusout-triggering-before-onclick-for-ajax-suggestion

    $(".user-suggestions").on("mousedown","li",function (event) {
        event.stopPropagation();
        $("#user").val($(event.target).text());
        $("#user-id").val($(this).data("user-id"));
    });

    $(".tag-suggestions").on("mousedown","li",function (event) {
        event.stopPropagation();
        $("#tag").val($(event.target).text());
        $("#tag-name").val($(event.target).text());
    });

    $("#save-relationship-btn").click(function () {
        $("#ack-msg").empty().append("Submitting your entry ...");
        var addUserForm = $("#add-relationship-form");
        $.each(addUserForm.serializeArray(), function (i, field) {
            if(field.value=="") {
                $("#ack-msg").empty().append("All fields are mandatory");
                return false;
            }
        });

        $.ajax({
            url:baseUrl + "/relation",
            data:addUserForm.serialize(),
            type:"POST",
            success: function (response) {
                $("#ack-msg").empty().append("Relationship has been added successfully!");
                console.log(response);
            }
        })
    });
});