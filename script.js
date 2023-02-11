function validateRadioButtons() {
    var radioButtons = document.getElementsByName("type");
    var selected = false;


    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            selected = true;
            break;
        }
    }
    if (!selected) {
        alert("Bi-monthly or monthly");
        return false;
    }
    return true;
}
