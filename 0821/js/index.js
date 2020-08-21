$(function () {
  $("#carousel-example-generic").carousel({
    interval: 3000,
    pause: "hover",
    wrap: true,
    keyboard: true,
  });
  /* 캐러셀 속도조절 */
  $("#toggle_event_editing button").click(function () {
    if (
      $(this).hasClass("locked_active") ||
      $(this).hasClass("unlocked_inactive")
    ) {
      /* code to do when unlocking */
      $("#switch_status");
    } else {
      /* code to do when locking */
      $("#switch_status").html("Switched off.");
    }

    /* reverse locking status */
    $("#toggle_event_editing button")
      .eq(0)
      .toggleClass("locked_inactive locked_active btn-default btn-info");
    $("#toggle_event_editing button")
      .eq(1)
      .toggleClass("unlocked_inactive unlocked_active btn-info btn-default");
  });
  /* 토글 이벤트 */

  $(".dropdown").on("show.bs.dropdown", function (e) {
    $(this).find(".dropdown-menu").first().stop(true, true).slideDown(300);
  });

  $(".dropdown").on("hide.bs.dropdown", function (e) {
    $(this).find(".dropdown-menu").first().stop(true, true).slideUp(0);
  });
  /*드롭다운 이벤트*/
});
