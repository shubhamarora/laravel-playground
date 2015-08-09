/**
 * Created by Shubham on 09-08-2015.
 */

$(document).ready(function() {

    $("#add-name-button").click(function () {
        var name = $("#full-name").val();
        if(name!="") {
            $.ajax({
                url:"/users",
                type:"POST",
                data:{fullname:name},
                success:function(response) {
                    console.log(response);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
    });
});