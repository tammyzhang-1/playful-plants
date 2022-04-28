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
}
