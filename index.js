$(document).ready(function() {

  $('input').each(function() {

    $(this).on('focus', function() {
      $(this).parent('.search').addClass('active');
    });

    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('.search').removeClass('active');
      }
    });

    if ($(this).val() != '') $(this).parent('.search').addClass('active');

  });
});

$(function () {
  $(".item-name > i").click(function(){
    $(this).parent().parent().toggleClass("unfold")
    $(this).parent().parent().find("ul:first").slideToggle(500);
    $(this).toggleClass("unfold");
    $(this).parent().children(".filename").toggleClass("filename-open");
  });
});
$(function () {
  $(".checkbox").click(function (){
    $(this).toggleClass("c-selected");
  });
});

(function ($) {
  $(function () {
    $('.table-expandable').each(function () {
      var table = $(this);
      table.children('thead').children('tr').append('<th></th>');
      table.children('tbody').children('tr').filter(':odd').hide();
      table.children('tbody').children('tr').filter(':even').click(function () {
        var element = $(this);
        element.next('tr').toggle('slow');
        element.find(".table-expandable-arrow").toggleClass("up");
      });
      table.children('tbody').children('tr').filter(':even').each(function () {
        var element = $(this);
        element.append('<td><div class="table-expandable-arrow"></div></td>');
      });
    });
  });
})(jQuery);
