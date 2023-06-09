!(function () {
    "use strict";
    let e = (e, t = !1) => (((e = e.trim()), t) ? [...document.querySelectorAll(e)] : document.querySelector(e)),
        t = (t, i, l, s = !1) => {
            let a = e(i, s);
            a && (s ? a.forEach((e) => e.addEventListener(t, l)) : a.addEventListener(t, l));
        },
        i = (e, t) => {
            e.addEventListener("scroll", t);
        },
        l = (t) => {
            let i = e("#header").offsetHeight,
                l = e(t).offsetTop;
            window.scrollTo({ top: l - i, behavior: "smooth" });
        },
        s = e("#header");
    if (s) {
        let a = () => {
            window.scrollY > 100 ? s.classList.add("header-scrolled") : s.classList.remove("header-scrolled");
        };
        window.addEventListener("load", a), i(document, a);
    }
    let o = e(".back-to-top");
    if (o) {
        let n = () => {
            window.scrollY > 100 ? o.classList.add("active") : o.classList.remove("active");
        };
        window.addEventListener("load", n), i(document, n);
    }
    t("click", ".mobile-nav-toggle", function (t) {
        e("#navbar").classList.toggle("navbar-mobile"), this.classList.toggle("bi-list"), this.classList.toggle("bi-x");
    }),
        t(
            "click",
            ".navbar .dropdown > a",
            function (t) {
                // $(".navbar .dropdown > ul").removeClass("dropdown-active");
                e("#navbar").classList.contains("navbar-mobile") && (t.preventDefault(), this.nextElementSibling.classList.toggle("dropdown-active"));
            },
            !0
        ),
        t(
            "click",
            ".scrollto",
            function (t) {
                if (e(this.hash)) {
                    t.preventDefault();
                    let i = e("#navbar");
                    if (i.classList.contains("navbar-mobile")) {
                        i.classList.remove("navbar-mobile");
                        let s = e(".mobile-nav-toggle");
                        s.classList.toggle("bi-list"), s.classList.toggle("bi-x");
                    }
                    l(this.hash);
                }
            },
            !0
        ),
        window.addEventListener("load", () => {
            window.location.hash && e(window.location.hash) && l(window.location.hash);
        }),
        GLightbox({ selector: ".glightbox" });
    let r = e(".skills-content");
    r &&
        new Waypoint({
            element: r,
            offset: "80%",
            handler: function (t) {
                e(".progress .progress-bar", !0).forEach((e) => {
                    e.style.width = e.getAttribute("aria-valuenow") + "%";
                });
            },
        }),
        new Swiper(".clients-slider", {
            speed: 400,
            loop: !0,
            autoplay: { delay: 5e3, disableOnInteraction: !1 },
            slidesPerView: "auto",
            pagination: { el: ".swiper-pagination", type: "bullets", clickable: !0 },
            breakpoints: { 320: { slidesPerView: 2, spaceBetween: 40 }, 480: { slidesPerView: 3, spaceBetween: 60 }, 640: { slidesPerView: 4, spaceBetween: 80 }, 992: { slidesPerView: 6, spaceBetween: 120 } },
        }),
        new Swiper(".slides-1", {
            speed: 600,
            loop: !0,
            autoplay: { delay: 5e3, disableOnInteraction: !1 },
            slidesPerView: "auto",
            pagination: { el: ".swiper-pagination", type: "bullets", clickable: !0 },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        }),
        window.addEventListener("load", () => {
            let i = e(".portfolio-container");
            if (i) {
                let l = new Isotope(i, { itemSelector: ".portfolio-item", layoutMode: "fitRows" }),
                    s = e("#portfolio-flters li", !0);
                t(
                    "click",
                    "#portfolio-flters li",
                    function (e) {
                        e.preventDefault(),
                            s.forEach(function (e) {
                                e.classList.remove("filter-active");
                            }),
                            this.classList.add("filter-active"),
                            l.arrange({ filter: this.getAttribute("data-filter") }),
                            l.on("arrangeComplete", function () {
                                AOS.refresh();
                            });
                    },
                    !0
                );
            }
        }),
        GLightbox({ selector: ".portfolio-lightbox" }),
        new Swiper(".portfolio-details-slider", { speed: 400, loop: !0, autoplay: { delay: 5e3, disableOnInteraction: !1 }, pagination: { el: ".swiper-pagination", type: "bullets", clickable: !0 } }),
        window.addEventListener("load", () => {
            AOS.init({ duration: 1e3, easing: "ease-in-out", once: !0, mirror: !1 });
        }),
        new PureCounter();


       
})();
