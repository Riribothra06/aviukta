document.addEventListener("DOMContentLoaded", function () {
    function loadHTML(id, url, callback) {
        var el = document.getElementById(id);
        if (!el) return; // Only load if the element exists
        fetch(url)
            .then(response => response.text())
            .then(data => {
                el.innerHTML = data;
                if (callback) callback();
            });
    }

    loadHTML("header", "header.html");
    loadHTML("footer", "footer.html");
    loadHTML("blogsection", "blog-section.html");
    loadHTML("servicesidebar", "service-sidebar.html");
});
