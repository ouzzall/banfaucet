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
});
