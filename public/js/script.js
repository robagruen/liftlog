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

    document.getElementById("category_count").value = document.getElementsByClassName("category_checkboxes").length;
}
