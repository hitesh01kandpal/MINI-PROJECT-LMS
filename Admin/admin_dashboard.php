<?php
include "../includes/config.php";
// if (!isset($_SESSION['user_id']) || !isset($_SESSION['type']) || $_SESSION['user_id'] == Null || $_SESSION['type'] == Null ||  $_SESSION['type'] != 'admin') {
//   header("Location:../login.php");
// }
$pageName = basename($_SERVER['PHP_SELF']);
$id = $_SESSION['user_id'];
$role = $_SESSION['type'];
$isAdmin = mysqli_query($conn, "Select isAdmin from admin where id='$id'");
$isAdmin = mysqli_fetch_array($isAdmin);
$isAdmin = $isAdmin['isAdmin'];
?>
<html>

<head>
  <title>
    Admin Dashboard
  </title>
  <?php include '../includes/cdn.php'; ?>
  <link rel="stylesheet" href="../CSS/admin.css">
  <link rel="stylesheet" href="../CSS/sidebar.css">
  <link rel="stylesheet" href="../CSS/footer.css">
</head>

<body>
  <?php include '../includes/sidebar.php'; ?>
  <section class="home">
    <div class="container mt-4 ">
      <h1 class="text-center pt-2 pb-2 text">
        DASHBOARD
      </h1>
    </div>
    <div class="container border border-3 d-grid gap-3 pb-4 px-4 mt-4">
      <div class="container">
        <div class="row ">
          <div class="col-lg-4 mb-4 mt-4 ">
            <a href="manage_teacher.php" style="color:black">
              <div class="card">
                <img src="data:image/png;base64,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" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">Manage teacher</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 mb-4 mt-4">
            <a href="manage_student.php" style="color:black">
              <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgQ3yynOfiyZfNE0eC5YAcK91tK2QKyqinbQ&usqp=CAU" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">Manage Student</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 mb-4 mt-4">
            <a href="manage_course.php" style="color:black">
              <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/MOOC_poster_mathplourde.png/640px-MOOC_poster_mathplourde.png" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">Manage Courses</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <?php if ($isAdmin) : ?>
            <!-- <div class="col-lg-4 mt-4">
              <a href="manage_admin.php" style="color:black">
                <div class="card">
                  <img src="https://trackrover.com/wp-content/uploads/2019/07/Automatic-Attendance-and-Employee-Efficiency-Monitoring-Solution.jpg" alt="" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title text-center">Manage Admin</h5>
                  </div>
                </div>
              </a>
            </div> -->
          <?php endif; ?> 
          <div class="col-lg-4 mt-4">
            <a href="monitorAttendance.php" style="color:black">
              <div class="card">
                <img src="https://www.pngitem.com/pimgs/m/33-336727_attendance-tracking-icon-clipart-png-download-attendance-tracking.png" alt="" class="card-img-top" style="background-color:skyblue">
                <div class="card-body">
                  <h5 class="card-title text-center">Monitor Attendance</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 mt-4">
            <a href="manage_department.php" style="color:black">
              <div class="card">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALwAAAEMCAMAAABJKixYAAAAflBMVEXo6OkAAADt7e7a2tvr6+zx8fLv7/Dc3N2tra63t7jj4+MlJSWTk5SXl5gSEhGlpaVISElXV1iNjY57e3sMDAzDw8SCgoLU1NX39/ienp+0tLSVlZXKystPT0+CgoMaGhpwcHBkZGUzMzM5OTksLCxnZ2ghISF9fX5LS0s/Pz9lFswAAAAE2klEQVR4nO2Y2WLqKhRAAwYcWmuNNWprrdr5/3/w7B0gjd7Ec3tafVrrQSEQskKYswwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfodcOIzVFw6TsmYsP47UFxoJBwU1Igf/Bzd/k35P6Ge+ERNakrJMYqO2u9JNvZSrn9fX6zvDDSES0r/yNxK/xcgEisojjzEztFnmYngbVOxKw/FN7mKShlM+YwY2sw8aWMgt+VpDEynIDlIGJ5H7kK4XC5vlw/ruUavgSfmbeOuD75KPxr6Q4KMLt13FpJ07lh/HQGYn7fLDcFUvXvvwLj+Qvyo3t8bc2Ci/Kcty1os1uimn8lt9Uaehva/lyyqpJ3VYlJu9MbNyphVayY9tfNla/lFKLR9slH/1ST7rvW9mRh2Kb7ur/O3Su3381FLw0gtZlHd+uQsVmbnnRvVcmbuQdK+afinv0XdeSgjyIhdetpa/1mK1mEpePoFWucpn3knT/Vh63+l4Ut5lbmvMOsq7lKTyoSrVIMuezGd4xSCfVw1jbNNX6VUpQf5W5fdN+SK5Bfl1XstLxzbq8A8EeS9fbt4hL/10JQZ5z5j3kKuWH6TnH8vfjNJQ0CE/tpeVl8FjEoJ/k3/RXpIvpId0yk/dReXVYH2TJE7KS2RYNYtpp7zxF5X3MoCPnqXK/i5fqHMdaJF/kqf54SXlt+bJf5jnY/mWDru6MzMv+d9WHfKSu3BnkU9jWpT3cbRxt+Zz+WqeRg35VeoDh/LDF5nM3Kf5GBwNlXmUH+tsdxb560KwUd45HcKrwVyMlkVy1HHeLW+1cbfIT81LLiPrrCE/1WI1cyX/Ko3+LPL1VK3y2+1nnGHlCdvlKkwH1Qz7uruqJ61D+Xt5x5GMrJPJ0fJg54P8gyTM52eXr9c2OvKN9VNXs229tomPP5IXt7W4zbvkr6Ww4izy8+FwOE/NRnlPs/rEL9IDo/wwPvNQfiBTwkDERw35rRa7iM2mWIru+iwdNu0MVH6x6DmfpIa2n5aY0ub9a71YOJaXbA+FubLN0cbFYoO8rIrOUvMHQ6VNOxy/0aWXfYuPUflBWtn8R969me1U+nfXUFk4SSkvMM6niOi9brdPUp9RXj/DY2uzmSw/zMezeXfd8mHtcDH5feq+/Sife1kjN16tIe/Kak3WLe9ds7ufXb7ecYV2XsmXYcfVIr+qlr2d8qXOv5eT15Fyt7SqozNWJR802uT9vPpEvls+7BF/R/7EZiTKr6vn29RJq+VBJts31yovM5TZ2xPyWhm/I39iG5jkbVjK6zu8+yTvp2mwPJK3Mirpkn3VsQ2U7+Vufkf+qigeGxtwXdps0gY8yetuWtpLnkaYsDCrd4jH8rKKk7pO6dUGXEotx7aWrxr9L8gH2o8+avk4I43uzL6W1++wc23y/l3XEU35QDz62IQG+HP5WGzHoVOS13alY6S2B1333Mn8JbHURdxjLf+g7UsbzCK31x2HTjNfbYlNYZP88z/Jnz7u+zqCG8Vw/O+HI7t09SuQTvFCesdxn75+3k+JWtr3D5wCpw5am9kO/49zNE9dv+L/56D1+EEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8EP+ACsXTCEe+z0JAAAAAElFTkSuQmCC" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">Manage Department</h5>
                </div>
              </div>
            </a>
          </div>
         
        </div>
      </div>
    </div>
    <?php include '../includes/footer.php'; ?>
  </section>
  <script type="text/javascript" src="../js/sidebar.js"></script>
  <?php include '../includes/checkDarkTheme.php'; ?>
</body>

</html>