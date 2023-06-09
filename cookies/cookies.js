// Funksjon for å sjekke om brukeren er innlogget
function isUserLoggedIn() {
    var loggedInCookie = getCookie("isLoggedIn");
  
    if (loggedInCookie && loggedInCookie === "true") {
      return true;
    } else {
      return false;
    }
  }
  
  // Setter innloggingsstatusen til true i cookien
  function setLoggedInStatus() {
    document.cookie = "isLoggedIn=true; path=/";
  }
  
  // Setter innloggingsstatusen til false i cookien
  function setLoggedOutStatus() {
    document.cookie = "isLoggedIn=false; path=/";
  }
  
  // Funksjon for å hente verdien av en cookie
  function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
  
    for (var i = 0; i < cookieArray.length; i++) {
      var cookie = cookieArray[i];
      while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) === 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }
  
    return null;
  }
  
  // Funksjon for å generere en tilfeldig session ID
  function generateSessionID() {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var sessionID = '';
  
    for (var i = 0; i < 16; i++) {
      sessionID += characters.charAt(Math.floor(Math.random() * characters.length));
    }
  
    return sessionID;
  }
  
  // Setter en sessions cookie med navnet "SessionID"
  function setSessionID() {
    var sessionID = generateSessionID();
    document.cookie = "SessionID=" + sessionID + "; path=/";
  }
  
  // Lytter etter når nettleseren lukkes
  window.addEventListener("beforeunload", function () {
    setLoggedOutStatus();
  });
  
  // Starter en timer ved inaktivitet
  var inactivityTimer;
  
  function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    inactivityTimer = setTimeout(function () {
      setLoggedOutStatus();
    }, 20 * 60 * 1000); // 20 minutter
  }
  
  // Lytter etter musebevegelser og tastetrykk for å nullstille inaktivitetstimeren
  window.addEventListener("mousemove", resetInactivityTimer);
  window.addEventListener("keydown", resetInactivityTimer);
  
  // Sjekker om en session cookie allerede eksisterer
  var existingSessionID = getCookie("SessionID");
  
  if (existingSessionID) {
    // Hvis en session cookie allerede eksisterer, kan du bruke den
    console.log("Eksisterende SessionID: " + existingSessionID);
  } else {
    // Hvis ingen session cookie eksisterer, generer en ny og sett den
    setSessionID();
  }
  