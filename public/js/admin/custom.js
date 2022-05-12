
    /*==================================================
    ================ Remove invalid class
    =====================================================*/
    const inputs = document.querySelectorAll(".form-control");

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('click', function(event) {
            this.classList.remove("is-invalid");
            var textDanger = this.nextElementSibling;
            textDanger.style.display = "none";
        });
    }
    /*==================================================
    ================ Scroll To Top
    =====================================================*/
    var scrollBtn = document.getElementById("button-scroll-up");
    
    // visibility function
    const btnVisibility = () => {
        if (window.scrollY > 400) {
            scrollBtn.classList.add("show");
        } else {
            scrollBtn.classList.remove("show");
        }
    };

    // scrollToTop function
    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    document.addEventListener("scroll", () => {
        btnVisibility();
    });

    scrollBtn.addEventListener('click', event => {
        scrollToTop();
    });
   



