<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header.php'; ?>
</head>
<title>View Bodim</title>
<body>
  <?php include 'navbar.php'; ?>
  <section class="slide container-fluid" style="background-image:url(img/bg-3.jpg); height:100%; background-size:cover; background-repeat: no-repeat;">
    <div class="row slider-img">
      <div class="col-lg-6 slider-ads">
        <div class="header-content">
          <h1 class="main-header-ads fade-in-text">Place Your Bodim Places</h1>
          <br>
          <button type="button" class="btn slider-button fade-in-btn">Call Us&nbsp;<svg width="15" height="15" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_18_105)">
                <path d="M17.4166 17.4167L15.8333 15.8333M9.10408 16.625C10.0917 16.625 11.0697 16.4305 11.9822 16.0525C12.8947 15.6746 13.7237 15.1206 14.4221 14.4222C15.1205 13.7238 15.6745 12.8947 16.0524 11.9823C16.4304 11.0698 16.6249 10.0918 16.6249 9.10418C16.6249 8.11653 16.4304 7.13855 16.0524 6.22608C15.6745 5.31361 15.1205 4.48452 14.4221 3.78614C13.7237 3.08777 12.8947 2.53379 11.9822 2.15583C11.0697 1.77788 10.0917 1.58334 9.10408 1.58334C7.10944 1.58334 5.19648 2.37571 3.78605 3.78614C2.37562 5.19657 1.58325 7.10953 1.58325 9.10418C1.58325 11.0988 2.37562 13.0118 3.78605 14.4222C5.19648 15.8326 7.10944 16.625 9.10408 16.625Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </g>
              <defs>
                <clipPath id="clip0_18_105">
                  <rect width="19" height="19" fill="white" />
                </clipPath>
              </defs>
            </svg></button>
        </div>
      </div>
    </div>
  </section>

  <div style="background-color:#7c0c0c">
    <div class="row about-header">
      <form style="display: flex; justify-content: center;">
        <div class="col-lg-3">
          <div class="card cards">
            <div class="card-body">
              <div class="row">
                <!-- Add content here if needed -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card cards">
            <div class="card-body">
              <div class="row">
                <button type="button" class="btn btn-lg btn-primary" id="getLivePlacesBtn">Get Live Places</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card cards">
            <div class="card-body">
              <div class="row">
                <!-- Add content here if needed -->
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="space-area"></div>
  <section class="container viewloc">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="cardContainer">
    <p id="addressElem"></p>

    </div>
  </section>
  <div class="space-area"></div>

<footer class="footer ">
  <div class=" container ">


    <div class="row " style="align-items: center;">

      <div class="col-lg-3">
        <img src="img/a.png" width="100%">
        <p style="margin-top: -50px;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

      </div>

      <div class="col-lg-3 items-footer">
        <h5>Quick Links</h5>
        <ul>
          <li>Home</li>
          <li>About Us</li>
          <li>Contact Us</li>
          <li>Ads</li>
          <li>Find Place</li>
        </ul>

      </div>
      <div class="col-lg-3 items-footer">
        <h5>More Links</h5>
        <ul>
          <li>Home</li>
          <li>About Us</li>
          <li>Contact Us</li>
          <li>Ads</li>
          <li>Find Place</li>
        </ul>
      </div>
      <div class="col-lg-3 items-footer">
        <h5>Contact Us</h5>
        <ul>
          <li>Home</li>
          <li>About Us</li>
          <li>Contact Us</li>
          <li>Ads</li>
          <li>Find Place</li>
        </ul>
      </div>
    </div>

  </div>
<div class="top-footer ">
<div class="container">
  <div class="row ">
    <div class="col-lg ">
      <p class="footer-text">CopyRight @Group 65 </p>
    </div>
    
    </div>


</div>


</div>

</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
  <script src="js/map.js"></script>


</body>
</html>
