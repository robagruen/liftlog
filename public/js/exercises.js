window.onload = function () {
    let subheadings = document.getElementsByClassName("liftlog-list-subheading");
    for (let i = 0; i < subheadings.length; i++) {
        if (subheadings[i].innerText == "|") {
            subheadings[i].innerText = "| Uncategorized |";
        }
    }
}
