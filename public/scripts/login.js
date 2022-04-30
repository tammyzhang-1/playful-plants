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

if ($(".confirmation")) {
    setTimeout(function() {
        $(".confirmation").fadeOut(8000);
    });
};

$(".center").click(function() {
    $("#add-plant-form").slideToggle('slow');
    if ($("#add-plant-form").hasClass("hidden")) {
        $("#add-plant-form").removeClass("hidden");
        $("#toggle-add-form").attr("src","public/images/up.png");
    } else {
        $("#toggle-add-form").attr("src","public/images/add-image.png");
        $("#add-plant-form").addClass("hidden");
    };
});

$(".filter-toggle").click(function() {
    $(".filter-sort-form").slideToggle('slow');
    if ($(".filter-sort-form").hasClass("hidden")) {
        $(".filter-sort-form").removeClass("hidden");
        $("#toggle-filter-form").attr("src","public/images/down.png");
    } else {
        $("#toggle-filter-form").attr("src","public/images/up.png");
        $(".filter-sort-form").addClass("hidden");
    };
});

$("#edit-submit").click(function() {
    setTimeout(function() {
        $(".confirmation").fadeOut(8000);
    });
});
