
var todaysDate = new Date();

const SHORTMONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const SHORTDAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

var dayOfWeek = document.querySelector("#day");
var date = document.querySelector("#date");
var month = document.querySelector("#month");
var year = document.querySelector("#year");

var leftArrow = document.querySelector("#dp_left").addEventListener("click", backward, true);

var rightArrow = document.querySelector("#dp_right").addEventListener("click", forward, true);

function backward(event) {
    // Fetch the date shown on the page
    let day = document.querySelector("#date").innerText;
    let month = SHORTMONTHS.indexOf(document.querySelector("#month").innerText);
    let year = document.querySelector("#year").innerText;

    let shownDate = new Date(year, month, day);

    shownDate.setDate(shownDate.getDate() -1);

    setDateElement(shownDate);
    adjustOrdinal();
}

function forward(event) {
    let day = document.querySelector("#date").innerText;
    let month = SHORTMONTHS.indexOf(document.querySelector("#month").innerText);
    let year = document.querySelector("#year").innerText;

    let shownDate = new Date(year, month, day);

    shownDate.setDate(shownDate.getDate() + 1);

    setDateElement(shownDate);
    adjustOrdinal();
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


function myMap() {
    var map;
    var mapProp= {
      center:new google.maps.LatLng(50.419279,-104.591305),
      zoom:17,
    };
    map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
