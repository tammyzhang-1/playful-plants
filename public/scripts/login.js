$(".login-button").click(function() {
    $(".modal").removeClass("hidden");
    $(".login-box").removeClass("hidden");
    $(".login-feedback").addClass("hidden");
});

$("#login-close").click(function() {
    $(".modal").addClass("hidden");
    $(".login-box").addClass("hidden");
});

if ($(".login-feedback").length > 0) {
    $(".modal").removeClass("hidden");
    $(".login-box").removeClass("hidden");
};

// php code removes delete modal from html code, but this is necessary to make sure the modal is displayed upon next click on another delete button
$("#delete-confirmed").click(function() {
    $(".modal").removeClass("hidden");
    $(".delete-confirm-popup").removeClass("hidden");
});

$("#delete-cancel").click(function() {
    $(".modal").addClass("hidden");
    $(".delete-confirm-popup").addClass("hidden");
});

$("#delete-close").click(function() {
    $(".modal").addClass("hidden");
    $(".delete-confirm-popup").addClass("hidden");
});

// give user confirmation message that they have logged out; set to fade in several seconds
if (window.location.toString().includes("logout=")) {
    $(".logout-confirm").removeClass("hidden");
    setTimeout(function() {
        $(".logout-confirm").fadeOut(8000);
    });
};
