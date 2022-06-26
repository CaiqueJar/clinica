var pswd = $("#passwordId");
var eye = $("#eyeId");

eye.mouseenter(function() {
    pswd.attr("type", "text");
    eye.attr("class", "fa-regular fa-eye-slash")
});

eye.mouseout(function() {
    pswd.attr("type", "password");
    eye.attr("class", "fa-regular fa-eye")
});

$("#eyeId").mouseout(function() {
    $("#passwordId").attr("type", "password");
});