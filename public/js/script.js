window.onload = function () {
    document.getElementById("hamburger").onclick = function() {
        let isExpanded = this.getAttribute("aria-expanded");
        if (isExpanded == "true") {
            this.classList.remove("is-active");
        }
        else {
            this.classList.add("is-active");
        }
    }

    let subheadings = document.getElementsByClassName("liftlog-list-subheading");
    for (let i = 0; i < subheadings.length; i++) {
        if (subheadings[i].innerText == "|") {
            subheadings[i].innerText = "| Uncategorized |";
        }
    }

    document.getElementById("category_count").value = document.getElementsByClassName("category_checkboxes").length;
}
