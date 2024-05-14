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
<title>Add Place</title>
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
                                    <form class="addplace" action="../php/addplace.php" method="post" enctype="multipart/form-data">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control " placeholder="Title"
                                                    aria-label="First name">
                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control " placeholder="Address"
                                                    aria-label="title">
                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Latitude</label>
                                                <input type="text" name="latitude"  class="form-control " placeholder="Latitude"
                                                    aria-label="First name">
                                            </div>
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Longitude</label>
                                                <input type="text"  name="longitude" class="form-control " placeholder="Longitude"
                                                    aria-label="Last name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label ">Image</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="image"  accept="image/*">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Price</label>
                                                <input type="text" name ="price" class="form-control  " placeholder="Price"
                                                    aria-label="First name">
                                            </div>
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Contact Whatpp</label>
                                                <input type="text" name="contactInformation" class="form-control " placeholder="Mobile"
                                                    aria-label="Last name">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Contact call</label>
                                                <input type="text" name="call" class="form-control " placeholder="Mobile"
                                                    aria-label="Last name">
                                            </div>
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Gender</label>
                                                <select class="form-select form-select-lg mb-3" name ="roomType"  aria-label=".form-select-lg ">
                                                    <option value="" selected disabled>Room Type</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                
                                                  </select>
                                                  
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 110px;">
                                            <div class="col">

                                                <button type="submit" class="btn btn-add">Add Place</button>

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

        <div class="modal fade" id="#exampleModal" tabindex="-1" aria-labelledby="#exampleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Are Sure Delete This Poster ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn "
                            style="background-color: #7c0c0c; color: white;">Delete</button>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <div class="card container shadow">
        <div class="card-body">
            <div class="table-style container">
                <table class="table table-striped table-hover border-danger">
                    <thead class="table-danger">
                        <tr>
                            <th data-toggle="true" data-sort="id">ID</th>
                            <th data-toggle="true" data-sort="ip">Title</th>
                            <th data-toggle="true" data-sort="ip">Address</th>
                            <th data-toggle="true" data-sort="ip">Price</th>
                            <th data-toggle="true" data-sort="date">Contact Number</th>
                            <th data-toggle="true" data-sort="date">Gender</th>
                            <th data-toggle="true" data-sort="date">Action</th>
                        </tr>
                    </thead>
                    <tbody id="adsTableBody">
           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script>
        function createTableRow(id, title, address, price, contact_information,gender) {
          const tr = document.createElement('tr');
        
          tr.innerHTML = `
            <td>${id}</td>
            <td>${title}</td>
            <td>${address}</td>
            <td>${price}</td>
            <td>${contact_information}</td>
            <td>${gender}</td>
            <td>
              <button class="btn btn-primary  " onclick="deleteAd(${id})">
            Edit
              </button>
              <button class="btn btn-danger" onclick="deleteAd(${id})">
                Delete
              </button>
            </td>
          `;
        
          return tr;
        }
        
        function deleteAd(id) {
  
          fetch(`http://localhost/api/ads.php?ad_id=${id}`, { method: 'DELETE' })
            .then(response => response.json())
            .then(data => {
              console.log(data.message); 
              displayData();
            })
            .catch(error => console.error('Error deleting ad:', error));
        }
        
        function displayData() {
          const apiUrl = `http://localhost/api/view.php`;
        
          fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
              const adsTableBody = document.getElementById('adsTableBody');
              adsTableBody.innerHTML = ''; 
        
              
              data.forEach(item => {
                const tr = createTableRow(item.id, item.title, item.address,item.price,item.contact_information,item.gender);
                adsTableBody.appendChild(tr);
              });
            })
            .catch(error => console.error('Error fetching data:', error));
        }
        
      
        displayData();
        
            </script>
</body>

</html>