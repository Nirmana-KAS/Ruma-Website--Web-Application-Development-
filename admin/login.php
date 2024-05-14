<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php'; ?>
</head>
<title>Login</title>
<body style="background-color: brown;">



    <section class="content">
        <div class="accountbg">

            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-muted text-center font-18"><b>Welcome Admin Login</b></h4>
                                        <h3 class="text-center mt-0 m-b-15">
                                            <img src="img/ds.png" height="200" alt="logo">
                                        </h3>



                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" action="../php/login.php" method="POST">
                                                <div class="form-group row input-username ">
                                                    <div class="col-12 input-group-lg">
                                                        <input class="form-control border-danger" type="text" name="username" required="" placeholder="Username">
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row input-username">
                                                    <div class="col-12 input-group-lg">
                                                        <input class="form-control border-danger" type="password" name="password" required="" placeholder="Password">
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light btn-login" type="submit">Log In</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>