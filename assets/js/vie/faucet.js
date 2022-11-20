const countDown3 = setInterval(() => {
  if (typeof wait !== 'undefined') {
    if (wait == 0) {
      clearInterval(countDown3);
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
      $(".claim-button").html(
        '<i class="far fa-check-circle"></i> Collect'
      );
      $(".claim-button").removeAttr("disabled");
      clearInterval(counter);
    } else {
      if (timer === 1) {
        $(".claim-button").text(`${timer}`);
      } else {
        $(".claim-button").text(`${timer}`);
      }
      --timer;
    }
  }, 1000);
});
