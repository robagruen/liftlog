window.onload = function () {
    let subheadings = document.getElementsByClassName("liftlog-list-subheading");
    for (let i = 0; i < subheadings.length; i++) {
        if (subheadings[i].innerText == "|") {
            subheadings[i].innerText = "| Uncategorized |";
        }
    }

    document.getElementById("category_count").value = document.getElementsByClassName("category_checkboxes").length;
}
