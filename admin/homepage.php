<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
 
    header('Location: login.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php'; ?>
</head>
<title>edit home</title>
<body class="bd-da">
    <?php include 'admin-navbar.php'; ?>

    <section class="ip-content">

        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form class="addplace" id="sliderForm" action="edithome.php" method="post" enctype="multipart/form-data">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <H4>Slider Settings</H4>
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Home Title</label>
                                                <input type="text" class="form-control " placeholder="Title"
                                                    aria-label="Home Title" name="home_title">
                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                        
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Slider Image</label>
                                                <div class="input-group">
                                                    <input type="file"  name= "image" class="form-control" "
                                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="inputGroupFileAddon04">Button</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Do You Want Add Button ?</label>
                                                <div class="row">
                                              <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" value ="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                   Yes
                                                    </label>
                                                    
                                                  </div>


                                              </div>
                                              <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" value ="2" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                   No
                                                    </label>
                                                    
                                                  </div>


                                              </div>


                                                </div>
                                               
                                                 
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label ">Button Text </label>

                                                <input type="text" name="btn_text" class="form-control  " placeholder="Button Text"
                                                    aria-label="Button Text">
                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Button Link</label>
                                                <input type="text" name="btn_link" class="form-control  " placeholder="Button Link"
                                                    aria-label="Button Link">
                                            </div>
                            
                                        </div>
                                       
                                        <button id="submitButton" type="submit" class="btn btn-add">Update</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
                <div id="loadingIndicator" style="display: none;">
                    <p>Loading...</p>
                </div>
             <div class="col-lg">

                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form class="addplace" id="otherForm" action="edithome.php" method="post" enctype="multipart/form-data">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <H4>Other Settings</H4>
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">About Title</label>
                                            <input type="text" name="about_title" class="form-control " placeholder="Title"
                                                aria-label="First name">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">About Discrption</label>
                                            <input type="text" name="about_dis" class="form-control " placeholder="Discrption"
                                                aria-label="Discrption">
                                        </div>

                                    </div>
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">Background Color</label>
                                            <input type="text" name="background_color" class="form-control " placeholder="Background Color"
                                                aria-label="Background Color">
                                        </div>
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">Text Color</label>
                                            <input type="text" name="text_color" class="form-control " placeholder="Text Color"
                                                aria-label="Text Color">
                                        </div>
                                    </div>
                                   
                                    <div class="row" style="margin-bottom: 100px;">
                                        <div class="col">

                                            <button id="submitButton" type="submit" class="btn btn-add">Update</button>

                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>


             </div>

            </div>

        </div>

     

    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script>


function handleFormSubmission() {
        // Get references to the forms
        const sliderForm = document.getElementById('sliderForm');
        const otherForm = document.getElementById('otherForm');

        // Submit both forms programmatically
        sliderForm.submit();
        otherForm.submit();
    }

    // Attach the click event handler to the button
    const submitButton = document.getElementById('submitButton');
    submitButton.addEventListener('click', handleFormSubmission);
    </script>
</body>

</html>