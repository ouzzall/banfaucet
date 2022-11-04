(function ($) {
  "use strict";

  var language = localStorage.getItem("language");
  // Default Language
  var default_lang = "eng";

  function setLanguage(lang) {
    if (lang == "eng") {
      document.getElementById("header-lang-img").src =
        "assets/images/flags/us.jpg";
    } else if (lang == "sp") {
      document.getElementById("header-lang-img").src =
        "assets/images/flags/spain.jpg";
    } else if (lang == "gr") {
      document.getElementById("header-lang-img").src =
        "assets/images/flags/germany.jpg";
    } else if (lang == "it") {
      document.getElementById("header-lang-img").src =
        "assets/images/flags/italy.jpg";
    } else if (lang == "ru") {
      document.getElementById("header-lang-img").src =
        "assets/images/flags/russia.jpg";
    }
    localStorage.setItem("language", lang);
    language = localStorage.getItem("language");
    getLanguage();
  }

  // Multi language setting
  function getLanguage() {
    language == null ? setLanguage(default_lang) : false;
    $.getJSON("assets/lang/" + language + ".json", function (lang) {
      $("html").attr("lang", language);
      $.each(lang, function (index, val) {
        index === "head" ? $(document).attr("title", val["title"]) : false;
        $("[key='" + index + "']").text(val);
      });
    });
  }

  function initMetisMenu() {
    //metis menu
    $("#side-menu").metisMenu();
  }

  function initLeftMenuCollapse() {
    $("#vertical-menu-btn").on("click", function (event) {
      event.preventDefault();
      $("body").toggleClass("sidebar-enable");
      if ($(window).width() >= 992) {
        $("body").toggleClass("vertical-collpsed");
      } else {
        $("body").removeClass("vertical-collpsed");
      }
    });
  }

  function initActiveMenu() {
    // === following js will activate the menu in left side bar based on url ====
    $("#sidebar-menu a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("mm-active"); // add active to li of the current link
        $(this).parent().parent().addClass("mm-show");
        $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
        $(this).parent().parent().parent().addClass("mm-active");
        $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
        $(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass("mm-active");
      }
    });
  }

  function initMenuItemScroll() {
    // focus active menu in left sidebar
    $(document).ready(function () {
      if (
        $("#sidebar-menu").length > 0 &&
        $("#sidebar-menu .mm-active .active").length > 0
      ) {
        var activeMenu = $("#sidebar-menu .mm-active .active").offset().top;
        if (activeMenu > 300) {
          activeMenu = activeMenu - 300;
          $(".simplebar-content-wrapper").animate(
            { scrollTop: activeMenu },
            "slow"
          );
        }
      }
    });
  }

  function initHoriMenuActive() {
    $(".navbar-nav a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("active");
        $(this).parent().parent().addClass("active");
        $(this).parent().parent().parent().addClass("active");
        $(this).parent().parent().parent().parent().addClass("active");
        $(this).parent().parent().parent().parent().parent().addClass("active");
      }
    });
  }

  function initFullScreen() {
    $('[data-toggle="fullscreen"]').on("click", function (e) {
      e.preventDefault();
      $("body").toggleClass("fullscreen-enable");
      if (
        !document.fullscreenElement &&
        /* alternative standard method */ !document.mozFullScreenElement &&
        !document.webkitFullscreenElement
      ) {
        // current working methods
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen(
            Element.ALLOW_KEYBOARD_INPUT
          );
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        }
      }
    });
    document.addEventListener("fullscreenchange", exitHandler);
    document.addEventListener("webkitfullscreenchange", exitHandler);
    document.addEventListener("mozfullscreenchange", exitHandler);
    function exitHandler() {
      if (
        !document.webkitIsFullScreen &&
        !document.mozFullScreen &&
        !document.msFullscreenElement
      ) {
        console.log("pressed");
        $("body").removeClass("fullscreen-enable");
      }
    }
  }

  function initRightSidebar() {
    // right side-bar toggle
    $(".right-bar-toggle").on("click", function (e) {
      $("body").toggleClass("right-bar-enabled");
    });

    $(document).on("click", "body", function (e) {
      if ($(e.target).closest(".right-bar-toggle, .right-bar").length > 0) {
        return;
      }

      $("body").removeClass("right-bar-enabled");
      return;
    });
  }

  function initDropdownMenu() {
    $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
      if (!$(this).next().hasClass("show")) {
        $(this)
          .parents(".dropdown-menu")
          .first()
          .find(".show")
          .removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass("show");

      return false;
    });
  }

  function initComponents() {
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });

    $(function () {
      $('[data-toggle="popover"]').popover();
    });
  }

  function initPreloader() {
    $(window).on("load", function () {
      $("#status").fadeOut();
      $("#preloader").delay(350).fadeOut("slow");
    });
  }

  function initSettings() {
    if (window.sessionStorage) {
      var alreadyVisited = sessionStorage.getItem("is_visited");
      if (!alreadyVisited) {
        sessionStorage.setItem("is_visited", "light-mode-switch");
      } else {
        $(".right-bar input:checkbox").prop("checked", false);
        $("#" + alreadyVisited).prop("checked", true);
        updateThemeSetting(alreadyVisited);
      }
    }
    $("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on(
      "change",
      function (e) {
        updateThemeSetting(e.target.id);
      }
    );
  }

  function updateThemeSetting(id) {
    if (
      $("#light-mode-switch").prop("checked") == true &&
      id === "light-mode-switch"
    ) {
      $("#dark-mode-switch").prop("checked", false);
      $("#rtl-mode-switch").prop("checked", false);
      $("#bootstrap-style").attr("href", "assets/css/bootstrap.min.css");
      $("#app-style").attr("href", "assets/css/app.min.css");
      sessionStorage.setItem("is_visited", "light-mode-switch");
    } else if (
      $("#dark-mode-switch").prop("checked") == true &&
      id === "dark-mode-switch"
    ) {
      $("#light-mode-switch").prop("checked", false);
      $("#rtl-mode-switch").prop("checked", false);
      $("#bootstrap-style").attr("href", "assets/css/bootstrap-dark.min.css");
      $("#app-style").attr("href", "assets/css/app-dark.min.css");
      sessionStorage.setItem("is_visited", "dark-mode-switch");
    } else if (
      $("#rtl-mode-switch").prop("checked") == true &&
      id === "rtl-mode-switch"
    ) {
      $("#light-mode-switch").prop("checked", false);
      $("#dark-mode-switch").prop("checked", false);
      $("#bootstrap-style").attr("href", "assets/css/bootstrap.min.css");
      $("#app-style").attr("href", "assets/css/app-rtl.min.css");
      sessionStorage.setItem("is_visited", "rtl-mode-switch");
    }
  }

  // function initLanguage() {
  //   // Auto Loader
  //   if (language != null && language !== default_lang)
  //     console.log("lang", language);
  //   setLanguage(language);
  //   $(".language").on("click", function (e) {
  //     setLanguage($(this).attr("data-lang"));
  //   });
  // }

  function convert() {
    if (typeof currencies !== "undefined") {
      setTimeout(() => {
        let currencyId = $("[name='method']:checked").val();
        let converted = parseFloat(
          (parseFloat($("#tokenBalance").val()) * rate) /
            currencies[currencyId]["price"]
        ).toFixed(8);
        $("#converted").val(converted);
        $("#targetCurrency").text(currencies[currencyId]["code"]);
      }, 50);
    }
  }

  function updateMinWithdrawals() {
    if (typeof currencies !== "undefined") {
      let currencyId = $("[name='method']:checked").val();
      $("#minimumWithdrawal").html(
        `Minimum withdrawal is ${(
          currencies[currencyId]["minimumWithdrawal"] / rate
        ).toFixed(0)} tokens`
      );
      $("#tokenBalance").attr(
        "min",
        currencies[currencyId]["minimumWithdrawal"]
      );
    }
  }

  function converter() {
    $("#tokenBalance").keypress(() => {
      convert();
    });

    $("[name='method']").click(() => {
      if ($("#tokenBalance").val() !== "") {
        convert();
      }
      updateMinWithdrawals();
    });
  }

  function lottery() {
    $("#lotteryAmount").keypress(() => {
      setTimeout(() => {
        const amount = parseInt($("#lotteryAmount").val());
        const total = amount * lotteryPrice;
        const tungaqhd = amount < 2 ? "ticket" : "tickets";
        const unit = total <= 1 ? "token" : "tokens";
        $("#buyButton").html(`Buy ${amount} ${tungaqhd} with ${total} ${unit}`);
      }, 50);
    });
  }

  function readNotification() {
    $("#page-header-notifications-dropdown").click(function () {
      $.get(site_url + "dashboard/read_notifications", function (data) {});
    });
  }

  function faucetCountDown() {
    $(".counter").each(function () {
      const counter = setInterval(() => {
        const wait = +$(this).attr("wait");
        if (wait === 0) {
          clearInterval(counter);
        }
        let hours = Math.floor(wait / 3600);
        let minutes = Math.floor((wait % 3600) / 60);
        let seconds = wait - 3600 * hours - 60 * minutes;
        $(this).attr("wait", wait - 1);

        if (hours < 10) {
          hours = `0${hours}`;
        }
        if (minutes < 10) {
          minutes = `0${minutes}`;
        }
        if (seconds < 10) {
          seconds = `0${seconds}`;
        }
        let result = "";
        if (+hours > 0) {
          result = `${hours}:`;
        }
        result += `${minutes}:${seconds}`;
        $(this).text(result);
      }, 1000);
    });

    const faucetCounter = setInterval(() => {
      const minutes = parseInt(
        $(".faucet-counter").children(".faucet-minutes").text()
      );
      const seconds = parseInt(
        $(".faucet-counter").children(".faucet-seconds").text()
      );
      const totalSeconds = minutes * 60 + seconds - 1;
      if (totalSeconds > 0) {
        $(".faucet-counter")
          .children(".faucet-minutes")
          .text(Math.floor(totalSeconds / 60));
        $(".faucet-counter")
          .children(".faucet-seconds")
          .text(Math.floor(totalSeconds % 60));
      } else {
        $(".faucet-counter").parent().html("<i class='fa fa-check'></i>");
        clearInterval(faucetCounter);
      }
    }, 1000);
    const madCounter = setInterval(() => {
      const minutes = parseInt(
        $(".mad-counter").children(".faucet-minutes").text()
      );
      const seconds = parseInt(
        $(".mad-counter").children(".faucet-seconds").text()
      );
      const totalSeconds = minutes * 60 + seconds - 1;
      if (totalSeconds > 0) {
        $(".mad-counter")
          .children(".faucet-minutes")
          .text(Math.floor(totalSeconds / 60));
        $(".mad-counter")
          .children(".faucet-seconds")
          .text(Math.floor(totalSeconds % 60));
      } else {
        $(".mad-counter").parent().html("<i class='fa fa-check'></i>");
        clearInterval(madCounter);
      }
    }, 1000);
  }

  function init() {
    initMetisMenu();
    initLeftMenuCollapse();
    initActiveMenu();
    initMenuItemScroll();
    initHoriMenuActive();
    initFullScreen();
    initRightSidebar();
    initDropdownMenu();
    initComponents();
    initSettings();
    // initLanguage();
    initPreloader();
    convert();
    converter();
    lottery();
    updateMinWithdrawals();
    readNotification();
    faucetCountDown();
    Waves.init();
  }

  init();
})(jQuery);
