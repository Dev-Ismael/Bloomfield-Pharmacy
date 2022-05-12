
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
    const scrollBtn = document.getElementById("button-scroll-up");
    
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
   

    /*==================================================
    ================ input Check
    =====================================================*/
    const mainChecker = document.getElementById("main-checker");
    const checkItems = document.querySelectorAll(".check-item");

    mainChecker.addEventListener('click', event => {
        if (mainChecker.checked == true) {
            for (var i = 0; i < checkItems.length; i++) {
                checkItems[i].setAttribute("checked", "checked");
            }
        } else {
            for (var i = 0; i < checkItems.length; i++) {
                checkItems[i].removeAttribute('checked');
            }
        }
    });

