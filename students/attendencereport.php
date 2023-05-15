<?php

session_start();
if (!isset($_SESSION['id'])){
  ?>
  <script>
    alert('Login to view dashboard');
    window.location='../login.php'
  </script>
  <?php

}
else {
  include "../conn.php";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Student Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dashboard1.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./studash.php">Vignan</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../index.html">Sign out</a>
        </li>
      </ul>
    </nav>
    <?php 
    $res=mysqli_query($link,"select * from students where id='$_SESSION[id]'");
    $value=mysqli_fetch_array($res);

    ?>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="./studash.php">
                  <span data-feather="home"></span>
                  Dashboard 
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  attendance login
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link active" href="attendencereport.php">
                  <span data-feather="file-text"></span>
                  View attendance report
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="editprofile.php">
                  <span data-feather="file-text"></span>
                  Edit profile
                </a>
              </li> -->
            </ul>
          </div>
        </nav>
        <br><br><br>
        <nav class="col-md-6 asidebar">
          <!-- <section style="background-color: #eee;"> -->
            <!-- <div class="container py-5"> -->
              <!-- <br><br><br><br> -->
              <div class="row">
              <center>
              <table class="table table-hover">
                  <thead class="thead-dark" >
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">First period</th>
                      <th scope="col">Secound period</th>
                      <th scope="col">Third period</th>
                      <th scope="col">Fourth period</th>
                      <!-- <th scope="col">First period</th> -->
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $res=mysqli_query($link,"select * from attendence where id='$_SESSION[id]'");
                      // $count=mysqli_num_rows($res);
                      while($row=mysqli_fetch_array($res)){
                          ?>
                          <tr>
                              <th scope="row"><?php echo $row['date'] ?></th>
                              <td><?php 
                              if ($row['first']=='P'){
                                echo 'Present';
                                }
                              else {
                                echo 'Absent';
                                }
                                ?></td>
                              <td><?php 
                              if ($row['secound']=='P'){
                                echo 'Present';
                                }
                              else {
                                echo 'Absent';
                                }
                                ?></td>
                              <td><?php 
                              if ($row['third']=='P'){
                                echo 'Present';
                                }
                              else {
                                echo 'Absent';
                                }
                                ?></td>
                              <td><?php 
                              if ($row['fourth']=='P'){
                                echo 'Present';
                                }
                              else {
                                echo 'Absent';
                                }
                                ?></td>
                              
                          </tr>
          
                          <?php
                      }
                      ?>
                  </tbody>
                </table>
                    </center>
              </div>
                    
            <!-- </div> -->
          <!-- </section> -->
        </nav>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
