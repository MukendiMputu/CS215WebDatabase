var hamburgerMenu = document.getElementById("hamburger").addEventListener("click", toggle, true);

function toggle(event) {
    var dropDown = document.getElementById("dropDownLinks");

    if (dropDown.style.display === "block") {
        dropDown.style.display = "none";
    } else {
        dropDown.style.display = "block";
    }
}