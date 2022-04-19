@extends('layouts.web')

@section('content')
    <div id="order-prescription-page" class="container-fluid remove-padding upload-p-main padding-t-100 ">
        <div class="container">

            <div class="row">

                <div id="block-block-20" class="col-md-6 col-sm-12 col-xs-12 upload-steps-main block block-block">
                    <h1> 
                        <img src="{{ asset("images/web/prescription-icon.jpg") }}" alt="prescription-icon"> 
                        Order Prescriptions
                        <div class="underline-title-white"></div>
                    </h1>
                    <div class="step-main step1" style=" margin-left: -5px; ">
                        <span>1</span>
                        <p>Upload your prescription</p>

                    </div>

                    <div class="step-main step2">
                        <span>2</span>
                        <p>Items in the prescription will be saved in your profile</p>
                    </div>


                    <div class="step-main step3">
                        <span>3</span>
                        <p>Easly checkout form (My Prescription)</p>

                    </div>

                    <svg viewBox="0 0 1156 608" xmlns="http://www.w3.org/2000/svg">
                        <path class="path"
                            d="m560.30957,10.588011c0,0 438.0947,1.90476 439.04708,1.90476c0.95238,0 144.57857,-1.02912 143.80934,137.14269c-0.76923,138.17181 -116.81095,142.30859 -131.61967,143.8923c-14.80873,1.58372 -840.41472,-0.71429 -860.5941,0.71429c-20.17938,1.42858 -148.4991,6.80903 -146.83244,147.05973c1.66666,140.2507 129.52365,152.14266 129.33243,151.27321c0.19122,0.86945 815.268425,0 251.42748,0"
                            opacity="1" stroke-width="7" stroke="#fff" fill="none"></path>
                    </svg>
                    <br>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">


                    <br><br><br>
                    <form action="#" method="post">
                        <!-- Upload Area -->

                        <label for="prescription"> <i class="fa-solid fa-images"></i> Upload Your Prescription image </label>
                        <div id="uploadArea" class="upload-area mb-5">
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

                        <div class="form-group text-left  mb-5">
                            <label for="description" class="text-black"> <i class="fa-solid fa-align-left"></i> Prescription Description (optional) </label>
                            <textarea type="description" class="form-control" rows="5" id="description" placeholder="Type Description..."></textarea>
                        </div>




                        {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}


                        <div class="form-group text-left dynamic-inputs mb-5">
                            <label for="description" class="text-black">
                                <i class="fa-solid fa-capsules"></i> Prescription Medicine (optional)
                                <button id="addRow" type="button" class="btn btn-info add-medicine ">
                                    <i class="fa-solid fa-plus" style="color: #fff"></i>
                                </button>
                            </label>
                            
                            <div id="inputFormRow">
                                <div class="input-group">
                                    <input type="text" name="medicine[]" class="form-control m-input medicine-input" placeholder="Type Medicine..." autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="removeRow" type="button" class="btn btn-danger"> <i class="fa-solid fa-xmark"></i> </button>
                                    </div>
                                </div>
                            </div>

                            <div id="newRow"></div>

                        </div>
                    
                        
                        
                    




                        <button class="btn btn-primary profile-button mb-5 float-right" type="button"> 
                            <i class="fa-solid fa-cloud-arrow-up"></i> Upload
                        </button>

                    </form>

                </div>
            </div>


        </div>
    </div>
@endsection
