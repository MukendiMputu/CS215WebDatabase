
var todaysDate = new Date();

const SHORTMONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const SHORTDAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

var dayOfWeek = document.querySelector("#day");
var date = document.querySelector("#date");
var month = document.querySelector("#month");
var year = document.querySelector("#year");
var bookingsCards = document.querySelectorAll(".card, .room");

bookingsCards.forEach(card => card.addEventListener("mouseover", displayInfo, true));
bookingsCards.forEach(card => card.addEventListener("mouseout", hideInfo, true));

function displayInfo(event) {
    room_description = document.querySelector(".room_description");
    room_description.style.display = "inline-block";
    room_description.style.position = "absolute";
    room_description.style.left = (event.clientX + 10) + "px";
    room_description.style.top = (event.clientY + 200) + "px";
}

function hideInfo(event) {
    room_description = document.querySelector(".room_description");
    room_description.style.display = "none";
}

function adjustOrdinal() {
    if (date.innerHTML == 1 || date.innerHTML == 21 || date.innerHTML == 31) {

        document.querySelector("#ordinal").innerHTML = "st";

    } else if (date.innerHTML == 2 || date.innerHTML == 22) {

        document.querySelector("#ordinal").innerHTML = "nd";

    } else if (date.innerHTML == 3 || date.innerHTML == 23) {

        document.querySelector("#ordinal").innerHTML = "rd";
    }else{
        document.querySelector("#ordinal").innerHTML = "th";
    }
}

function setDateElement (dateToSet) {
    var full_date = dateToSet
    dayOfWeek.innerHTML = full_date == Date()?
    "Today " + SHORTDAYS[full_date.getDay()] + "," :
    SHORTDAYS[full_date.getDay()] + ",";

    date.innerHTML = full_date.getDate();
    month.innerHTML = SHORTMONTHS[full_date.getMonth()];
    year.innerHTML = full_date.getFullYear();
}

setDateElement(todaysDate);
adjustOrdinal();

//==================================== AJAX ========================================//

var roomSelector = document.querySelector("select#ip_search").addEventListener("change", getBookings, true);


function getBookings(event) {
    var roomID = event.currentTarget.value;
    let queryDate = document.querySelector("input#booking_date").value;
    let queryStartTime = document.querySelector("input#start_time").value;
    let queryEndTime = document.querySelector("input#end_time").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
                if (xhttp.readyState == 4 && xhttp.status == 200){
                    var jsonRsp = JSON.parse(xhttp.responseText);
                    console.log(jsonRsp);
                    dispatchBookingData(jsonRsp);
                }
    }

    var url = 'http://www2.cs.uregina.ca/~mmx458/assignment/ajaxBooking.php?rid=' + encodeURIComponent(roomID);
    url += '&date=' + encodeURIComponent(queryDate);
    url += '&start=' + encodeURIComponent(queryStartTime);
    url += '&end=' + encodeURIComponent(queryEndTime);
    console.log(url);
    xhttp.open('GET', url, true);
    xhttp.send();
}

function dispatchBookingData(jsonObject) {
  let bookingsPanorama = document.querySelector("div#booking_panorama");
  bookingsPanorama.innerHTML = '';
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

  for (var i = 0; i < jsonObject.bookings.length; i++) {
    let bookingCard = document.createElement("div");
    bookingCard.classList.add("card", "room");
      let innerText  = "<div> ";
          innerText += "<img alt='Picture for a conference room' class='img-small' src='.." + jsonObject.rooms.picture +  "'/> ";
          innerText += "<a href='#'>" + jsonObject.rooms.number +  "</a>  ";
          innerText += "</div> ";
          innerText += "<p class='room_description'>" + jsonObject.bookings[i].purpose +  "<br /></p> ";
          innerText += "" + (new Date(jsonObject.bookings[i].date)).toLocaleDateString('en-EN', options) +  "<br /></p> ";
          innerText += "" + jsonObject.bookings[i].start_time + " - " + jsonObject.bookings[i].end_time + "<br /></p> ";
          innerText += "<p><span  class=''> (User)</span><br /></p>";
      bookingCard.innerHTML = innerText;
      bookingsPanorama.appendChild(bookingCard);
  }
}



function myMap() {
    var map;
    var mapProp= {
      center:new google.maps.LatLng(50.419279,-104.591305),
      zoom:17,
    };
    map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
