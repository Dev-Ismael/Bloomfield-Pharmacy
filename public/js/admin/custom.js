

    /*==================================================
    ================ Remove invalid class
    =====================================================*/
    const inputs = document.querySelectorAll(".form-control");

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('click', function(event) {
            this.classList.remove("is-invalid");
            var textDanger = this.parentElement.querySelector(".text-danger");
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

    if(mainChecker){

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
    }


    /*==================================================
    ================ Danger Alert
    =====================================================*/
    const dangerBtns = document.querySelectorAll(".delete-record");

    for (var i = 0; i < dangerBtns.length; i++) {

        const dangerBtn = dangerBtns[i];
        dangerBtn.addEventListener('click', event => {

            event.preventDefault();
            Swal.fire({
                
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    setTimeout(function () {
                        window.location = dangerBtn.getAttribute('href');
                    }, 1000); 
                }
            })
            
        });

    }

    /*==================================================
    ================ Multible btn Confimation
    =====================================================*/
    const multiAlertBtn = document.getElementById("multi-alert-btn");
    const multiActionForm = document.getElementById("multi-action-form");

    if(multiAlertBtn){

        multiAlertBtn.addEventListener('click', event => {

            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to back again!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    multiActionForm.submit();
                }
            })
            
        });

    }

    /*==================================================
    ================ if Isset Multible option
    =====================================================*/
    const selectAction = document.getElementById('select-action');
    
    if(selectAction){
        selectAction.addEventListener('change', function handleChange(event) {
            multiAlertBtn.removeAttribute("disabled");
        });
    }

    
    /*========================================================================
    ===================  Daynamic input Order Prescription ====================
    =========================================================================*/
    // Jquery Code
    $(document).ready(function(){
        // remove field
        $(document).on("click", "button.add-field" , function() {
            var html = `
                <div id="inputFormRow">
                <div class="input-group">
                    <!---------- Input ----------->
                    <input type="text" name="medicine[]" id="medicine"
                        class="form-control"
                        aria-describedby="emailHelp"
                        placeholder="Type Medicine Title..." autocomplete="nope"/>
                    <!---------- Buttons ----------->
                    <div class="input-group-append position-relative">
                        <button type="button" class="btn btn-primary add-field">
                            <i class="fa-solid fa-plus" style="color: #fff"></i>
                        </button>
                        <button type="button" class="btn btn-primary remove-field">
                            <i class="fa-solid fa-trash" style="color: #fff"></i>
                        </button>
                    </div>
                </div>
            </div>
            `;

            $('#newRowsContainer').append(html);
        });

        // remove field
        $(document).on('click', 'button.remove-field', function () {
            $(this).closest('#inputFormRow').remove();
        });

    });