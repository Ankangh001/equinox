!(function () {
    "use strict";
    let e = (e, t = !1) => (((e = e.trim()), t) ? [...document.querySelectorAll(e)] : document.querySelector(e)),
        t = (t, s, l, a = !1) => {
            let o = e(s, a);
            o && (a ? o.forEach((e) => e.addEventListener(t, l)) : o.addEventListener(t, l));
        },
        s = (e, t) => {
            e.addEventListener("scroll", t);
        },
        l = e("#navbar .scrollto", !0),
        a = () => {
            let t = window.scrollY + 200;
            l.forEach((s) => {
                if (!s.hash) return;
                let l = e(s.hash);
                l && (t >= l.offsetTop && t <= l.offsetTop + l.offsetHeight ? s.classList.add("active") : s.classList.remove("active"));
            });
        };
    window.addEventListener("load", a), s(document, a);
    let o = (t) => {
        let s = e("#header").offsetHeight,
            l = e(t).offsetTop;
        window.scrollTo({ top: l - s, behavior: "smooth" });
    };
    $("a.color-000").click(function (t) {
        alert();
    })

    //on clicking evaluation process
    $('#evp').click(()=>{       
        $('.mobile-nav-toggle').removeClass("bi-x");
        if($("#navbar").hasClass("navbar-mobile")){
            $('ul').removeClass("dropdown-active");
        }
        $("#navbar").removeClass("navbar-mobile");
        $('.navbar-mobile').fadeOut('100');
    });

    //on clicking pricing
    $('#pricing-nav').click(()=>{       
        $('.mobile-nav-toggle').removeClass("bi-x");
        if($("#navbar").hasClass("navbar-mobile")){
            $('ul').removeClass("dropdown-active");
        }
        $("#navbar").removeClass("navbar-mobile");
        $('.navbar-mobile').fadeOut('100');
    });

    $("#eqLogoWhite").css("display", "none");
    let i = e("#header"),
        r = e("#topbar"),
        n = e("#navbar");
    if (i) {
        let c = () => {
            window.scrollY > 80
                ? (n.classList.add("whites"),
                  n.classList.remove("black"),
                  i.classList.add("header-scrolled"),
                  $("#eqLogoblack").css("display", "none"),
                  $("#eqLogoWhite").css("display", "block"),
                  $(".mobile-nav-toggle").css("color", "#fff"),
                  r && r.classList.add("topbar-scrolled"))
                : (i.classList.remove("header-scrolled"),
                  n.classList.remove("whites"),
                  n.classList.add("black"),
                  $("#eqLogoblack").css("display", "block"),
                  $("#eqLogoWhite").css("display", "none"),
                  $("select.goog-te-combo").css("color", "#000000 !important"),
                  $(".mobile-nav-toggle").css("color", "#000"),
                  r && r.classList.remove("topbar-scrolled"));
        };
        window.addEventListener("load", c), s(document, c);
    }
    let d = e(".back-to-top");
    if (d) {
        let v = () => {
            window.scrollY > 100 ? d.classList.add("active") : d.classList.remove("active");
        };
        window.addEventListener("load", v), s(document, v);
    }
    t("click", ".mobile-nav-toggle", function (t) {
        e("#navbar").classList.toggle("navbar-mobile"), 
        e(".mobile-nav-toggle").classList.toggle("color-fff"), 
        // e("body").classList.toggle("overflow-hidden"), 
        // this.classList.toggle("bi-list"), 
        this.classList.toggle("bi-x");
        $(".navbar-mobile a").addClass("color-000");
    }),
        t(
            "click",
            ".navbar .dropdown > a",
            function (t) {
                $('ul').removeClass("dropdown-active");
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
                    let s = e("#navbar");
                    if (s.classList.contains("navbar-mobile")) {
                        s.classList.remove("navbar-mobile");
                        let l = e(".mobile-nav-toggle");
                        l.classList.toggle("bi-list"), l.classList.toggle("bi-x");
                    }
                    o(this.hash);
                }
            },
            !0
        ),
        window.addEventListener("load", () => {
            window.location.hash && e(window.location.hash) && o(window.location.hash);
        });
    let b = e("#preloader");
    b &&
        window.addEventListener("load", () => {
            b.remove();
        }),
        window.addEventListener("load", () => {
            let s = e(".menu-container");
            if (s) {
                let l = new Isotope(s, { itemSelector: ".menu-item", layoutMode: "fitRows" }),
                    a = e("#menu-flters li", !0);
                t(
                    "click",
                    "#menu-flters li",
                    function (e) {
                        e.preventDefault(),
                            a.forEach(function (e) {
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
        GLightbox({ selector: ".glightbox" }),
        new Swiper(".events-slider", { speed: 600, loop: !0, autoplay: { delay: 5e3, disableOnInteraction: !1 }, slidesPerView: "auto", pagination: { el: ".swiper-pagination", type: "bullets", clickable: !0 } }),
        new Swiper(".testimonials-slider", { effect: "coverflow", grabCursor: !0 }),
        new Swiper(".mySwiper", {
            effect: "cards",
            grabCursor: !0,
            cardsEffect: { rotate: 0, perSlideOffset: 9 },
            pagination: { el: ".swiper-pagination" },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            scrollbar: { el: ".swiper-scrollbar" },
        }),
        GLightbox({ selector: ".gallery-lightbox" }),
        window.addEventListener("load", () => {
            AOS.init({ duration: 1e3, easing: "ease-in-out", once: !0, mirror: !1 });
        });
})();
