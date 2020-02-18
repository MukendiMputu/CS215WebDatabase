
var todaysDate = new Date();

const SHORTMONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const SHORTDAYS = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

var dayOfWeek = document.querySelector("#day");
var date = document.querySelector("#date");
var month = document.querySelector("#month");
var year = document.querySelector("#year");

var leftArrow = document.querySelector("#dp_left").addEventListener("click", backward, true);

var rightArrow = document.querySelector("#dp_right").addEventListener("click", forward, true);

function backward(event) {
    // Fetch the date in Milliseconds since Midnight Jan 1. 1970
    var newDate = new Date(document.querySelector("#date").innerText, SHORTMONTHS.indexOf(document.querySelector("#month").innerText), document.querySelector("#date").innerText).valueOf() * -1;

    var dayInMillisec = 1000 * 60 * 60 * 24;
    newDate -= dayInMillisec ;

    var d = new Date();
    d.setTime(newDate);

    adjustSup();
    setDateElement(d);
}

function forward(event) {
    var newDate = new Date(document.querySelector("#date").innerText, SHORTMONTHS.indexOf(document.querySelector("#month").innerText), document.querySelector("#date").innerText).valueOf() * -1;

    var dayInMillisec = 1000 * 60 * 60 * 24;
    newDate += dayInMillisec ;

    var d = new Date();
    d.setTime(newDate);

    adjustSup();
    setDateElement(d);
}

function adjustSup() {
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
    dayOfWeek.innerHTML = full_date == Date()? "Today " + SHORTDAYS[full_date.getDay()-1] + "," : SHORTDAYS[full_date.getDay()-1] + ",";
    date.innerHTML = full_date.getDate();
    month.innerHTML = SHORTMONTHS[full_date.getMonth()];
    year.innerHTML = full_date.getFullYear();

}
setDateElement(todaysDate);
adjustSup();