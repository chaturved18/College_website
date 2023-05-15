<?php
include '../conn.php';

if (isset($_POST['SUBMIT'])){

    $totalStudents=mysqli_query($link,"select * from students");
    $samedate=mysqli_query($link,"select * from attendence where date='$_POST[date]'");
    $num=mysqli_num_rows($samedate);

    if ($num==0){
        while($name=mysqli_fetch_array($totalStudents)){
            $no=$name['id'];
            if(isset($_POST[$no])){
                $postatt=mysqli_query($link,"insert into attendence(id,date,$_POST[period]) values('$name[id]','$_POST[date]','P')");
            }else {
                $postatt=mysqli_query($link,"insert into attendence(id,date,$_POST[period]) values('$name[id]','$_POST[date]','A')");
            }
        }
    }
    else {
        while($name=mysqli_fetch_array($totalStudents)){
            $no=$name['id'];
            if(isset($_POST[$no])){
                $postatt=mysqli_query($link,"update attendence set $_POST[period]='P' where id='$name[id]' and date='$_POST[date]'" );
            }else {
                $postatt=mysqli_query($link,"update attendence set $_POST[period]='A' where id='$name[id]' and date='$_POST[date]'");
            }
        }
    
    }

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

    <style>
        .abc{
            padding:5px;
            width:146px;
            height:34px;
            border-radius:4px;
            border: 1px solid #ccc;
            -webkit-transition: 0.5s;
            
        }
        
    </style>

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./facultydash.php">Vignan</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../login.php">Sign out</a>
        </li>
      </ul>
    </nav>
    <?php 
    // $res=mysqli_query($link,"select * from students where id='$_SESSION[id]'");
    // $value=mysqli_fetch_array($res);

    ?>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="./facultydash.php">
                  <span data-feather="home"></span>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Postattendence.php">
                  <span data-feather="file-text"></span>
                  Post attendance
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="allattendence.php">
                  <span data-feather="file-text"></span>
                  view attendance
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="allstudents.php">
                  <span data-feather="file-text"></span>
                  view students 
                </a>
              </li>
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
              

              <!-- <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
  <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
</div> -->

<?php
        $res=mysqli_query($link,"select * from students");
        
    ?>
    <form action="" method="post">
              <input type="date" name="date" placeholder="Select date" class="abc"required><br><br>
              <select name="period" class="form-select" aria-label="Default select example" style="width:147px;" required>
                <option selected>Select Period</option>
                <option value="first">First</option>
                <option value="secound">Secound</option>
                <option value="third">Third</option>
                <option value="fourth">Fourth</option>
                </select>
                <br><br><br>
    <!-- <input type="date" name="date" id="" required><br><br><br>
    <select name="period" id="" required>
        <option value="first">1</option>
        <option value="secound">2</option>
        <option value="third">3</option>
        <option value="fourth">4</option>
    </select> -->
        <?php
        while($values=mysqli_fetch_array($res)){
        ?>
                <input type="hidden" name="id" id="" value="<?php echo $values['id'] ?>">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="<?php echo $values['id']; ?>" >
                <label class="form-check-label" for="inlineCheckbox3"><?php echo $values['id']; ?></label>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
        }
        ?>
        <br><br><br><br><br><br>
        <button type="submit" value="submit" name="SUBMIT" class="btn btn-dark">Submit</button>
        <!-- <input type="submit" value="submit" name="SUBMIT"> -->
    </form>
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
