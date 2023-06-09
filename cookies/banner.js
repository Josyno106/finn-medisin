function acceptAllCookies() {
  setCookie("cookiesAccepted", "true", 365);
  setCookie("allCookiesAccepted", "true", 365);
  removeCookieBanner();
}

function acceptNecessaryCookies() {
  setCookie("cookiesAccepted", "true", 365);
  removeCookieBanner();
}

function setCookie(name, value, days) {
  var date = new Date();
  date.setDate(date.getDate() + days);
  var expires = "expires=" + date.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function removeCookieBanner() {
  var cookieBanner = document.getElementById("cookie-banner");
  if (cookieBanner) {
    cookieBanner.parentNode.removeChild(cookieBanner);
  }
}

window.onload = function() {
  if (getCookie("cookiesAccepted") && getCookie("allCookiesAccepted")) {
    removeCookieBanner();
  }
};

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) === " ") {
      c = c.substring(1, c.length);
    }
    if (c.indexOf(nameEQ) === 0) {
      return c.substring(nameEQ.length, c.length);
    }
  }
  return null;
} 