$(function() {
  $("#tab-note").click(function(){
    $("#content-result").removeClass("tab-content-checked");
    $("#content-info").removeClass("tab-content-checked");
    $("#content-note").addClass("tab-content-checked");
    $("#tab-result").removeClass("tab-checked");
    $("#tab-info").removeClass("tab-checked");
    $("#tab-note").addClass("tab-checked");
    console.log("note");
  });
  $("#tab-result").click(function(){
    $("#content-note").removeClass("tab-content-checked");
    $("#content-info").removeClass("tab-content-checked");
    $("#content-result").addClass("tab-content-checked");
    $("#tab-note").removeClass("tab-checked");
    $("#tab-result").addClass("tab-checked");
    $("#tab-info").removeClass("tab-checked");
    console.log("result");
  });
  $("#tab-info").click(function(){
    $("#content-note").removeClass("tab-content-checked");
    $("#content-result").removeClass("tab-content-checked");
    $("#content-info").addClass("tab-content-checked");
    $("#tab-note").removeClass("tab-checked");
    $("#tab-info").addClass("tab-checked");
    $("#tab-result").removeClass("tab-checked");
    console.log("info");
  });







});
