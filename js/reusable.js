document.addEventListener("DOMContentLoaded", function () {
    function loadHTML(id, url, callback) {
  fetch(url)
    .then(response => response.text())
    .then(data => {
      document.getElementById(id).innerHTML = data;
      if (callback) callback();
    });
}

  loadHTML("header", "header.html");
  loadHTML("testimonial", "testimonial-section.html", function() {
        // Initialize Swiper (if you have a Swiper slider in testimonial)
        if (typeof Swiper !== "undefined") {
            new Swiper('.testimonial-slider .swiper', {
                navigation: {
                    nextEl: '.testimonial-button-next',
                    prevEl: '.testimonial-button-prev',
                },
                loop: true,
                slidesPerView: 1,
                spaceBetween: 30,
            });
        }
        // Initialize CounterUp
        if (typeof jQuery !== "undefined" && typeof jQuery.fn.counterUp !== "undefined") {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        }
        // Initialize WOW.js (if needed)
        if (typeof WOW !== "undefined") {
            new WOW().init();
        }
    });
  loadHTML("footer", "footer.html");
  loadHTML("blogsection", "blog-section.html");
  loadHTML("servicesidebar", "service-sidebar.html");
  });
        // <div id="testimonial"></div>
