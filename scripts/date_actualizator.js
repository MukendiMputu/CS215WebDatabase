
var fullDate = new Date();

var shortMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

var shortDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

var date = document.getElementById("date");
date.innerHTML = fullDate.getDate();

var month = document.getElementById("month");
month.innerHTML = shortMonths[fullDate.getMonth()];

var year = document.getElementById("year");
year.innerHTML = fullDate.getFullYear();

adjustDate(date);

var leftArrow = document.getElementById("dp_left").addEventListener("click", backward, true);

var rightArrow = document.getElementById("dp_right").addEventListener("click", forward, true);

function backward(event) {
    var dateElement = document.getElementById("date");
    var actualDate = dateElement.innerHTML;
    dateElement.innerHTML = (actualDate % 31) - 1;
    adjustDate(date);
}

function forward(event) {
    var dateElement = document.getElementById("date");
    var actualDate = dateElement.innerHTML;
    dateElement.innerHTML = (parseInt(actualDate)  % 31) + 1;
    adjustDate(date);
}

function adjustDate(actDate) {
    var date = actDate;

    if (date.innerHTML == 1 || date.innerHTML == 21 || date.innerHTML == 31) {

        document.getElementById("ordinal").innerHTML = "st";

    } else if (date.innerHTML == 2 || date.innerHTML == 22) {

        document.getElementById("ordinal").innerHTML = "nd";

    } else if (date.innerHTML == 3 || date.innerHTML == 23) {

        document.getElementById("ordinal").innerHTML = "rd";
    }else{
        document.getElementById("ordinal").innerHTML = "th";
    }
}