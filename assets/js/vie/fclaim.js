$(document).ready(function () {
  let timer = 10;
  const counter = setInterval(() => {
    if (timer == 0) {
      $(".bonus-button").html(
        '<i class="far fa-check-circle"></i> Collect'
      );
      $(".bonus-button").removeAttr("disabled");
      clearInterval(counter);
    } else {
      if (timer === 1) {
        $(".bonus-button").text(`${timer}`);
      } else {
        $(".bonus-button").text(`${timer}`);
      }
      --timer;
    }
  }, 1000);
});