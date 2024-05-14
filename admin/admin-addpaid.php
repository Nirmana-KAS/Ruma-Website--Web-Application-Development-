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
<title>Ads add</title>
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
                                    <form class="addplace" action="../php/addpaid.php" method="post" enctype="multipart/form-data">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Ads Discrption</label>
                                                <input type="text" name="description" class="form-control " placeholder="Title"
                                                    aria-label="First name">
                                            </div>
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Contact Number</label>
                                                <input type="text" name="mobile" class="form-control " placeholder="Title"
                                                    aria-label="First name">
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
                                                <label for="inputEmail4" class="form-label">Districts</label>
                                                <select class="form-select form-select-lg mb-3" name ="district"  aria-label=".form-select-lg ">
                                                    <option value="" selected disabled>Districts</option>
                                                    <option value="1">Ampara</option>
                                                    <option value="2">Anuradhapura</option>
                                                    <option value="3">Badulla</option>
                                                    <option value="4">Batticaloa</option>
                                                    <option value="5">Colombo</option>
                                                    <option value="6">Galle</option>
                                                    <option value="7">Gampaha</option>
                                                    <option value="8">Hambantota</option>
                                                    <option value="9">Jaffna</option>
                                                    <option value="10">Kalutara</option>
                                                    <option value="11">Kandy</option>
                                                    <option value="12">Kegalle</option>
                                                    <option value="13">Kilinochchi</option>
                                                    <option value="14">Kurunegala</option>
                                                    <option value="15">Mannar</option>
                                                    <option value="16">Matale</option>
                                                    <option value="17">Matara</option>
                                                    <option value="18">Monaragala</option>
                                                    <option value="19">Mullaitivu</option>
                                                    <option value="20">Nuwara Eliya</option>
                                                    <option value="21">Polonnaruwa</option>
                                                    <option value="22">Puttalam</option>
                                                    <option value="23">Ratnapura</option>
                                                    <option value="24">Trincomalee</option>
                                                    <option value="25">Vavuniya</option>
                                                
                                                  </select>
                                                  
                                            </div>
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Type</label>
                                                <select class="form-select form-select-lg mb-3" name ="category"  aria-label=".form-select-lg ">
                                                    <option value="" selected disabled>Type</option>
                                                    <option value="1">BookShop</option>
                                                    <option value="2">Transport</option>
                                                    <option value="3">Foods</option>
                                                
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

       


    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <div class="card container shadow">
        <div class="card-body">
            <div class="table-style container">
                <table class="table table-striped table-hover border-danger">
                    <thead class="table-danger">
                        <tr>
                            <th data-toggle="true" data-sort="id">ID</th>
                            <th data-toggle="true" data-sort="ip">Title</th>
                            <th data-toggle="true" data-sort="date">Contact Number</th>
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
function createTableRow(id, description, mobile) {
  const tr = document.createElement('tr');

  tr.innerHTML = `
    <td>${id}</td>
    <td>${description}</td>
    <td>${mobile}</td>
    <td>
              <button class="btn btn-primary  " onclick="editAd(${id})">
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
        // Make a DELETE request to delete the ad with the given ID
        fetch(`../api/ads.php?ad_id=${id}`, { method: 'DELETE' })
            .then(response => response.json())
            .then(data => {
                console.log(data.message); // Display the response message, e.g., "Ad deleted successfully."
                // Refresh the table after deletion
                displayData();
            })
            .catch(error => console.error('Error deleting ad:', error));
    }


function displayData() {
  const apiUrl = `http://localhost/api/ads.php`;

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      const adsTableBody = document.getElementById('adsTableBody');
      adsTableBody.innerHTML = ''; // Clear previous table rows

      // Loop through the data and create a table row for each ad
      data.forEach(item => {
        const tr = createTableRow(item.id, item.description, item.mobile);
        adsTableBody.appendChild(tr);
      });
    })
    .catch(error => console.error('Error fetching data:', error));
}

// Call displayData initially to populate the table with data
displayData();

    </script>
</body>

</html>