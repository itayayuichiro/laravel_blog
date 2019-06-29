$(function () {
  $('#hamburger').click(function () {
    if ($('.nav_phone').css('display') == 'block') {
      $('.nav_phone').hide(1000);
    } else {
      $('.nav_phone').show(1000);
    }
  })
});


$(function () {
  $('#button').bind("click", function () {
    var re = new RegExp($('#search').val());
    $('#result tbody tr').each(function () {
      var txt = $(this).find("td:eq(0)").html();
      if (txt.match(re) != null) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  $('#button2').bind("click", function () {
    $('#search').val('');
    $('#result tr').show();
  });
});