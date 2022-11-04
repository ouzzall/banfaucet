const countDown = setInterval(() => {
  if (typeof wait !== 'undefined') {
    if (wait == 0) {
      clearInterval(countDown);
      location.href = "";
    }
    let minutes = Math.floor(wait / 60);
    let seconds = wait % 60;
    $("#minute").text(minutes);
    $("#second").text(seconds);
    wait -= 1;
  }
}, 1000);

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