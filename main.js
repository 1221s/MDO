// Burgermenu
var burgermenu = document.getElementById("nav-icon");

burgermenu.addEventListener("click", function() {
  burgermenu.classList.toggle("open");
  if (burgermenu.classList.contains("open")) {
    document.getElementById("mySidenav").style.width = "100%";
    burgermenu.style.zIndex = 10;
    burgermenu.style.left = null;
    burgermenu.style.right = "50px";
    document.getElementsByClassName("menuSpan")[0].style.background = "#cccc66";
    document.getElementsByClassName("menuSpan")[2].style.background = "#cccc66";
  } else {
    document.getElementById("mySidenav").style.width = "0px";
    document.getElementsByClassName("menuSpan")[0].style.background = "#000000";
    document.getElementsByClassName("menuSpan")[2].style.background = "#000000";
    burgermenu.style.right = null;
    burgermenu.style.left = "10px";
  }
});

/* ENVELOPE THINGY */

// variable for the event listener so we know what we're targeting
var envelopeOprettelse = document.getElementById("envelopeOprettelse");
var initialPaperText = document.getElementById("initialPaperContent");
var loginPaper = document.getElementById("loginPaper");
var paperContent = document.getElementById("paperContent");
var imageScroller = document.getElementById("paperImageScroller");

if (envelopeOprettelse != null) {
  envelopeOprettelse.addEventListener("click", clickOnEnvelope);
}
// When envelope is clicked, initiate keyframe animations:
// function for when the envelope is clicked
function clickOnEnvelope() {
  envelopeOprettelse.removeEventListener("click", clickOnEnvelope);

  var envelopePaper = document.getElementById("envelopePaper");

  envelopeOprettelse.classList.add("openEnvelope");
  envelopePaper.classList.add("openEnvelopePaper");

  setTimeout(function() {
    initialPaperText.style.opacity = "0";
    loginPaper.style.opacity = "0";
    setTimeout(function() {
      initialPaperText.style.display = "none";
      loginPaper.style.display = "none";
      paperContent.style.display = "block";
      imageScroller.style.display = "block";
      setTimeout(function() {
        $(window).trigger("resize");
        paperContent.style.opacity = "1";
        imageScroller.style.left = "0";
      }, 1500);
    }, 500);
  }, 1000);
}

// END of openeing the oprettelsesbrev

// QR reader:
function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if (res instanceof Error) {
        alert(
          "No QR code found. Please make sure the QR code is within the camera's frame and try again."
        );
        console.log("No code found");
      } else {
        console.log("qr-code found!");
        console.log(res);
        location.href = "localhost/magikerensrejse/badge-received/?bid=" + res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

function showQRIntro() {
  return confirm("Use your camera to take a picture of a QR code.");
}

// LEAFLET MAP

// linking the map to the div, and setting the initial view:
var mymap = L.map(document.getElementById("leafletMap")).setView(
  [55.398191, 10.384884],
  13
);

// The inclusion of the leaflet map layer:
L.tileLayer(
  "https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}",
  {
    // attribution:
    //   'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',

    maxZoom: 18,
    id: "mapbox.streets",
    accessToken:
      "pk.eyJ1IjoibmFubjkxMzUiLCJhIjoiY2p6M3UxaHhoMDZwNDNpcXRiMmR6MGpucCJ9.6yVU_616B3pSxPSyjXw_yw"
  }
).addTo(mymap);

//  markers :
var urlParams = new URLSearchParams(window.location.search);
var bid = urlParams.get("bid");
console.log(bid);

if (bid != null) {
  mymap.locate({ setView: false, maxZoom: 13 });
} else {
  // The user's location:
  mymap.locate({ setView: true, maxZoom: 15 });
}

function onLocationFound(e) {
  if (bid != null) {
    L.marker(e.latlng)
      .addTo(mymap)
      .bindPopup("Her står du");
  } else {
    L.marker(e.latlng)
      .addTo(mymap)
      .bindPopup("Her står du")
      .openPopup();
  }
}

function onLocationError(e) {
  alert(e.message);
}

mymap.on("locationfound", onLocationFound);
mymap.on("locationerror", onLocationError);

// event markers:
var eventlat = document.getElementsByClassName("eventlat");
var eventlng = document.getElementsByClassName("eventlng");
var eventTitles = document.getElementsByClassName("mainEventTitles");
var theTitleOfTheEvent = document.getElementsByClassName("standaloneTitle");
var eventId = document.getElementsByClassName("standaloneId");
var events = document.getElementsByClassName("eventTitle");

for (let i = 0; i < eventTitles.length; i++) {
  console.log(i);

  if (bid == i) {
    mymap.closePopup();
    var marker = L.marker([eventlat[i].innerHTML, eventlng[i].innerHTML])
      .addTo(mymap)
      .bindPopup(theTitleOfTheEvent[i].innerHTML)
      .openPopup();

    mymap.flyTo([eventlat[i].innerHTML, eventlng[i].innerHTML], 18);
  } else {
    var marker = L.marker([eventlat[i].innerHTML, eventlng[i].innerHTML])
      .addTo(mymap)
      .bindPopup(theTitleOfTheEvent[i].innerHTML);
  }

  window.history.pushState({}, document.title, "/magikerensRejse/kort/");
}

// PEEKABOO ON MAP PAGE
var peekaboo = document.getElementById("peekaboo");
var peekabooArrow = document.getElementById("peekabooArrow");
peekaboo.onclick = function() {
  switch (this.style.top) {
    case "65%":
      peekaboo.style.top = "10%";
      peekabooArrow.classList.remove = "fa-arrow-up";
      peekabooArrow.classList.add = "fa-arrow-down";

      break;

    case "10%":
      peekaboo.style.top = "65%";
      peekabooArrow.classList.remove = "fa-arrow-down";
      peekabooArrow.classList.add = "fa-arrow-up";
      break;

    default:
      peekaboo.style.top = "10%";
      peekabooArrow.classList.remove = "fa-arrow-up";
      peekabooArrow.classList.add = "fa-arrow-down";
  }
};
