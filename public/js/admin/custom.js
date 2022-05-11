
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
