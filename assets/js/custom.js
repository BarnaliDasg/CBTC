//for preview the post img

var input=document.querySelector("#select_post_img");

input.addEventListener("change",preview);

function preview(){
    var fileobject = this.files[0];
    var filereader = new FileReader();

    filereader.readAsDataURL(fileobject);

    filereader.onload = function(){
        var img_src = filereader.result;
        var img = document.querySelector("#post_img");
        img.setAttribute('src',img_src);
        img.setAttribute('style','display:');
    }
}

//for follow the user
$(".followbtn").click(function () {
    var u_id_v = $(this).data("user-id");
    var button = $(this);
    $(button).attr('disabled',true);

    $.ajax({
        url: "assets/php/ajax.php?follow",
        method: "POST",
        dataType: "json",
        data: { u_id: u_id_v },
        success: function (response) {
            if (response.status) {
                button.html('<i class="fas fa-check-circle text-white"></i> Following');
                button.removeClass("btn-primary").addClass("bg-primary text-white px-3 py-1 rounded border-0");
            }else{
                $(button).attr('disabled',false);
                alert('something is wrong, try again after sometime');
            }
        }
    });
});

//for unfollow the user
$(".unfollowbtn").click(function () {
    var u_id_v = $(this).data("user-id");
    var button = $(this);
    $(button).attr('disabled',true);

    $.ajax({
        url: "assets/php/ajax.php?unfollow",
        method: "POST",
        dataType: "json",
        data: { u_id: u_id_v },
        success: function (response) {
            if (response.status) {
                button.html('<i class="fas fa-check-circle text-white"></i> Unfollowed');
                button.removeClass("btn-primary").addClass("bg-danger text-white px-3 py-1 rounded border-0");
            }else{
                $(button).attr('disabled',false);
                alert('something is wrong, try again after sometime');
            }
        }
    });
});

//for like the post
$(".like_btn").click(function () {
    var post_id_v = $(this).data("postId");
    var button = $(this);

    $(button).prop("disabled", true);

    $.ajax({
        url: "assets/php/ajax.php?like",
        method: "POST",
        dataType: "json",
        data: { post_id: post_id_v },
        success: function (response) {
            console.log(response);

            if (response.status) {
                $(button).attr("disabled", false);
                $(button).hide();
                $(button).siblings('.unlike_btn').show();
                location.reload();
            } else {
                $(button).attr("disabled", false);
                alert("Something went wrong, please try again later.");
            }
        }
    });
});

// Handle Unlike Button Click
$(".unlike_btn").click(function () {
    var post_id_v = $(this).data("postId");
    var button = $(this);

    $(button).prop("disabled", true);

    $.ajax({
        url: "assets/php/ajax.php?unlike",
        method: "POST",
        dataType: "json",
        data: { post_id: post_id_v },
        success: function (response) {
            console.log(response);

            if (response.status) {
                $(button).attr("disabled", false);
                $(button).hide();
                $(button).siblings('.like_btn').show();
                location.reload();
            } else {
                $(button).attr("disabled", false);
                alert("Something went wrong, please try again later.");
            }
        }
    });
});






