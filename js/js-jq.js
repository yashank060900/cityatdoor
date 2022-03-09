
$(document).ready(function(){
  $("#open-dropdown").hover(function(){
    $("#dropdown-opened").css("display", "flex");
    }, function(){
    // $("#dropdown-opened").css("display", "none");
  });
});

$(document).ready(function(){
  $("#dropdown-opened").hover(function(){
    $(this).css("display", "flex");
    }, function(){
    $(this).css("display", "none");
  });
});