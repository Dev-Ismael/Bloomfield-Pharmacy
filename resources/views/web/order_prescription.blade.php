@extends('layouts.web')

@section('content')
    <div id="order-prescription-page" class="container-fluid remove-padding  padding-t-100">
        <h1 class="title text-bloder text-center mt-3"> <i class="fa-solid fa-file-prescription"></i> Order Prescriptions  </h1>

        
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-5 mb-5">
                    <div class="prescription-valid-img">
                        <img src="{{ asset('images/web/validate_rx.jpg') }}" alt="validate_rx">
                        <div class="validation-desc pt-5">
                            <ul class="list-unstyled pl-4">
                                <li> <i class="fa-solid fa-circle"></i> Don’t crop out any part of the image </li>
                                <li> <i class="fa-solid fa-circle"></i> Avoid blurred image </li>
                                <li> <i class="fa-solid fa-circle"></i> Medicines will be dispensed as per prescription </li>
                                <li> <i class="fa-solid fa-circle"></i> Supported files type: jpeg , jpg , png , pdf </li>
                                <li> <i class="fa-solid fa-circle"></i> Maximum allowed file size: 5MB </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 mt-5">


                    <form action="#" method="post">
                        <!-- Upload Area -->

                        <label for="prescription"> <i class="fa-solid fa-images"></i> Upload Your Prescription image
                        </label>
                        <div id="uploadArea" class="upload-area mb-4">
                            <!-- Header -->
                            <div class="upload-area__header">
                                <p class="upload-area__paragraph">
                                    File should be an image
                                    <strong class="upload-area__tooltip">
                                        Like
                                        <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                    </strong>
                                </p>
                            </div>
                            <!-- End Header -->

                            <!-- Drop Zoon -->
                            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                <span class="drop-zoon__icon">
                                    <i class="fa-solid fa-file-image"></i>
                                </span>
                                <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
                                <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                                <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image"
                                    draggable="false">
                                <input type="file" id="prescriptionFile" class="drop-zoon__file-input" accept="image/*">
                            </div>
                            <!-- End Drop Zoon -->

                            <!-- File Details -->
                            <div id="fileDetails" class="upload-area__file-details file-details">
                                <h3 class="file-details__title pt-3">Uploaded File</h3>

                                <div id="uploadedFile" class="uploaded-file">
                                    <div class="uploaded-file__icon-container">
                                        <i class="fa-solid fa-file-image"></i>
                                        <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                    </div>
                                    <br>
                                    <div id="uploadedFileInfo" class="uploaded-file__info">
                                        <span class="uploaded-file__name">Proejct 1</span>
                                        <span class="uploaded-file__counter">0%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End File Details -->
                        </div>

                        <!-- End Upload Area -->


                        <!------------ Alert Text ----------------->
                        <p class="mb-3 font-weight-bold">
                            <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #e2ab07"></i>
                            Note!... You can support us with some info about patient.
                        </p>


                        <!------------ patient Age ----------------->
                        <div class="form-group text-left">
                            <label for="age" class="text-black"> <i class="fa-solid fa-user"></i> Patient Age (optional)
                            </label>
                            <input type="text" class="form-control" id="age" placeholder="Type Patient Age...">
                        </div>


                        <!------------ patient gender ----------------->
                        <div class="form-group text-left">
                            <label for="gender" class="text-black"> <i class="fa-solid fa-venus-mars"></i> Patient
                                gender (optional) </label>
                            <input type="text" class="form-control" id="gender" placeholder="Type Patient gender...">
                        </div>


                        <!------------ Additional Details ----------------->
                        <div class="form-group text-left">
                            <label for="details" class="text-black"> <i class="fa-solid fa-align-left"></i> Additional
                                Details (optional) </label>
                            <textarea type="text" class="form-control" rows="5" id="details" placeholder="Type Additional Details..."></textarea>
                        </div>


                        <!------------ Prescription Medicine ----------------->
                        <div class="form-group text-left dynamic-inputs">
                            <label for="description" class="text-black">
                                <i class="fa-solid fa-capsules"></i> Prescription Medicine (optional)
                                <button type="button" class="btn btn-green add-field">
                                    <i class="fa-solid fa-plus" style="color: #fff"></i>
                                </button>
                            </label>

                            <div id="inputFormRow">
                                <div class="input-group">
                                    <input type="text" name="medicine[]" class="form-control m-input medicine-input"
                                        placeholder="Type Medicine..." autocomplete="off">
                                    <div class="input-group-append position-relative">
                                        <button type="button" class="btn btn-green add-field">
                                            <i class="fa-solid fa-plus" style="color: #fff"></i>
                                        </button>
                                        <button type="button" class="btn btn-green remove-field">
                                            <i class="fa-solid fa-trash" style="color: #fff"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="newRow"></div>

                        </div>








                        <button class="btn btn-green profile-button mb-5 mt-5 float-right" type="button">
                            <i class="fa-solid fa-cloud-arrow-up"></i> Upload
                        </button>

                    </form>

                </div>
            </div>


        </div>
    </div>
@endsection
