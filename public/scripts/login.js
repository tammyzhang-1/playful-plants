$(".login-button").click(function() {
    $(".modal").removeClass("hidden");
    $(".login-box").removeClass("hidden");
});

$("#modal-close").click(function() {
    $(".modal").addClass("hidden");
    $(".login-box").addClass("hidden");
});

if ($(".login-feedback").length > 0) {
    $(".modal").removeClass("hidden");
    $(".login-box").removeClass("hidden");
};

// $("#delete-entry").submit(function(event) {
//     event.preventDefault();
//     $(".modal").removeClass("hidden");
//     $(".delete-confirm-popup").removeClass("hidden");
// });

// give user confirmation message that they have logged out; set to fade in several seconds
if (window.location.toString().includes("logout=")) {
    $(".logout-confirm").removeClass("hidden");
    setTimeout(function() {
        $(".logout-confirm").fadeOut(8000);
    });
};
