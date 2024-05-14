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

    <section class="container" style="padding:50px">

        <div class="row ">

            <div class="col-lg">
                <div class="card" style="width: 18rem; border:solid 2px #7c0c0c">
                    <div class="card-body">
                        <h5 class="card-title">Daily Visitors</h5>


                        <h5 class="card-title font-das" id="dailyVisitors">43</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card" style="width: 18rem; border:solid 2px #7c0c0c">
                    <div class="card-body">
                        <h5 class="card-title">Total Amount</h5>
                        <h5 class="card-title font-das" id="amount">1000.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card" style="width: 18rem; border:solid 2px #7c0c0c">
                    <div class="card-body">
                        <h5 class="card-title">Total Adverstiment</h5>
                        <h5 class="card-title font-das" id="dailyVisit">20</h5>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="container" style="padding:50px">

        <div class="row ">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-style container">
                            <h6>Daily Visit</h6>
                            <table class="table table-striped table-hover border-danger">

                                <thead class="table-danger">
                                    <tr>
                                        <th data-toggle="true" data-sort="id">ID</th>
                                        <th data-toggle="true" data-sort="ip">IP List</th>
                                        <th data-toggle="true" data-sort="date">Date</th>
                                        <th data-toggle="true" data-sort="date">Country</th>
                                    </tr>
                                </thead>
                                <tbody id="tb">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">

                    <div class="card-body">

                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script>
        // Sample data for the chart (you can fetch this data dynamically from the server)
        const chartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Sample Data',
                data: [10, 15, 7, 12, 20, 9, 18],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: true,
            }]
        };

        // Chart configuration options
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Create the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: chartOptions
        });
    </script>
    <script>
        // Sample data for the pie chart (you can fetch this data dynamically from the server)
        const chartData = {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'red',
                    'blue',
                    'yellow',
                    'green',
                    'purple',
                    'orange'
                ],
                borderColor: 'white',
                borderWidth: 1
            }]
        };

        // Chart configuration options
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false
        };

        // Create the pie chart
        const ctx = document.getElementById('mypie').getContext('2d');
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: chartOptions
        });
    </script>
    <script>
        fetch("https://dnstest99.000webhostapp.com/displayip.php")
            .then((response) => response.json())

            .then((data) => {
                let tabledata = "";
                let count = "";
                data.forEach((entry) => {
                    tabledata += `<tr>
                                <td>${entry.id}</td>
                                <td>${entry.ip_address}</td>
                                <td>${entry.visit_date}</td>
                    
                                <td>${entry.country}</td>
                              </tr>`;
                });


                document.getElementById("tb").innerHTML += tabledata;
                document.getElementById("dailyVisitors").textContent = data.length;
            })
            .catch((error) => {
                console.error("Error fetching data: ", error);
            });
    </script>
    <script>
        fetch("../api/view.php")
            .then((response) => response.json())

            .then((data) => {
                let tabledata = "";
                let count = "";
                data.forEach((entry) => {
                    tabledata += ``;
                });



                document.getElementById("dailyVisit").textContent = data.length;
                document.getElementById("amount").textContent = data.length * 500;
            })
            .catch((error) => {
                console.error("Error fetching data: ", error);
            });
    </script>
</body>