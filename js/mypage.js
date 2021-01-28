$(function() {
  $("#tab-note").click(function(){
    $("#content-info").removeClass("tab-content-checked");
    $("#content-note").addClass("tab-content-checked");
    $("#tab-info").removeClass("tab-checked");
    $("#tab-note").addClass("tab-checked");
    console.log("note");
  });

  $("#tab-info").click(function(){
    $("#content-note").removeClass("tab-content-checked");
    $("#content-info").addClass("tab-content-checked");
    $("#tab-note").removeClass("tab-checked");
    $("#tab-info").addClass("tab-checked");
    console.log("info");
  });


});
