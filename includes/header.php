<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leisure Life</title>

  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/owl.carousel.min.css">
  <link rel="stylesheet" href="path/to/owl.theme.default.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha384-VVl5N+po6aCrjFewL2oUpGO9kQ2IV5Q8R6FFQwUyRRqRGxGCfo9x6kT5ofBWz6g7" crossorigin="anonymous">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>

<body>


  <?php if ($_SESSION['login']) { ?>
    <div class="top-header">
      <div class="container">
        <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
          <li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
          <li class="prnt"><a href="profile.php">My Profile</a></li>
          <li class="prnt"><a href="change-password.php">Change Password</a></li>
          <li class="prnt"><a href="tour-history.php">My Tour History</a></li>
          <li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li>
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
          <li class="tol">Welcome :</li>
          <li class="sig">
            <?php echo htmlentities($_SESSION['login']); ?>
          </li>
          <li class="sigi"><a href="logout.php">/ Logout</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
  <?php } else { ?>
    <!-- <div class="top-header">
    <div class="container">
      <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
        <li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li class="hm"><a href="admin/index.php">Admin Login</a></li>
      </ul>
      <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
        <li class="tol">Mobile : +8801764489806</li>
        <li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
        <li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">/ Sign In</a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
  </div> -->
  <?php } ?>
  <!--- /top-header ---->
  <!--- header ---->

  <!--- /header ---->
  <!--- footer-btm ---->
  <header class="bg-cover bg-center h-screen flex flex-col items-center pt-10 relative"
    style="background: linear-gradient(to bottom, rgba(0, 0, 0, .1), rgba(255, 255, 255, 0)), url('./img/last.jpg'); background-size: cover; box-sizing: border-box;">


    <!-- Navbar -->
    <nav class="flex flex-col md:flex-row items-center justify-between bg-transparent w-5/6 ">
      <!-- Left side with logo and title -->
      <!-- Left side with logo and title -->
      <div class="flex flex-row   ">
        <div class=" flex flex-row py-6 px-6 ">
          <img src="./images/travel-your-way.png" alt="Logo" class="h-16">
          <h1 class="text-white text-3xl   font2 pl-4 lg:pt-4 pt-4  sm:pt-1  lg:font-semibold">Leisure Life</h1>
        </div>

        <!-- Hamburger button for mobile -->
        <div class="md:hidden pt-10 ">
          <button id="hamburger">
            <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
              width="40" height="40" />
            <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
              width="40" height="40" />
          </button>
        </div>
      </div>

      <!-- Right side navigation links -->
      <div
        class="toggle hidden w-full md:w-auto md:flex flex-row-reverse text-right text-bold mt-5 md:mt-0 border-b-2 border-blue-900 md:border-none border border-blue-500">
        <a href="enquiry.php"
          class="block md:inline-block text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">ENQUIRY</a>
        <a href="contact.php"
          class="block md:inline-block text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">CONTACT</a>
        <a href="package-list.php"
          class="block md:inline-block text-2xl text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">PACKAGE</a>
        <a href="about.php"
          class="block md:inline-block text-2xl text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">ABOUT</a>
        <a href="index.php"
          class="block md:inline-block text-2xl text-white px-3 py-3 text-2xl md:border-none font-robot  link-transition hover:text-004d5c">HOME</a>
      </div>

      <!-- Login button on the right side -->
      <a href="#"
        class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right border border-blue-100 hover:bg-gray-900 text-white rounded-lg text-2xl fontrobot">Login</a>
    </nav>





    <div class="flex flex-col lg:flex-row items-center justify-start text-left pt-20">

      <!-- Text Section -->
      <div class="darkBlue w-full lg:w-1/2 px-6 lg:px-44 text-center lg:text-left">
        <p class="py-2 font-bold ">The Leisure Life</p>
        <h1
          class="text-2xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl upper fontrobot font-bold mb-4">
          Never stop exploring the world</h1>
        <p class="text-sm font-medium fontrobot sm:text-base lg:text-lg">Discover amazing destinations and create
          unforgettable
          memories. Lorem
          ipsum dolor sit amet consectetur adipisicing elit. Cumque dolores eius quasi adipisci pariatur aspernatur?</p>
        <button class="buttoncol hover:bg-gray-700 text-white py-1 px-6 sm:px-8 rounded-full mt-6">
          SEE MORE
        </button>
      </div>
      <!-- Cards Section -->
      <!-- Cards Section -->
      <div class="w-full lg:w-1/2 flex lg:flex-row items-center justify-center">
        <div class="w-full sm:w-64 h-48 sm:h-64 lg:h-96 rounded-2xl my-10 md:my-10 md:mx-4 mx-2 sm:my-4 lg:mx-4">
          <img id="cardImage1" src="./img/bg1.jpg" alt="Card Image" class="w-full h-full object-cover rounded-2xl">
        </div>
        <div class="w-full sm:w-64 h-48 sm:h-64 lg:h-96 rounded-2xl my-10 md:my-10 md:mx-4 mx-2 sm:my-4 lg:mx-4">
          <img id="cardImage2" src="./img/bg13.jpg" alt="Card Image" class="w-full h-full object-cover rounded-2xl">
        </div>
        <div class="w-full sm:w-64 h-48 sm:h-64 lg:h-96 rounded-2xl my-10 md:my-10 mx-2 md:mx-4 sm:my-4 lg:mx-4">
          <img id="cardImage3" src="./img/bg2.jpg" alt="Card Image" class="w-full h-full object-cover rounded-2xl">
        </div>
      </div>
      <!-- 
    <nav class="cl-effect-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="page.php?type=aboutus">About</a></li>
        <li><a href="package-list.php">Tour Packages</a></li>
        <li><a href="page.php?type=privacy">Privacy Policy</a></li>
        <li><a href="page.php?type=terms">Terms of Use</a></li>
        <li><a href="page.php?type=contact">Contact Us</a></li>
        <?php if ($_SESSION['login']) { ?>
          <li>Need Help?<a href="#" data-toggle="modal" data-target="#myModal3"> / Write Us </a> </li>
        <?php } else { ?>
          <li><a href="enquiry.php"> Enquiry </a> </li>
        <?php } ?>
        <div class="clearfix"></div>

      </ul>
    </nav> -->


    </div>
  </header>
  <script>
    // Gets the Mobile Nav icon by its ID
    let bars = document.getElementById('bars');

    // Gets the Mobile Nav container
    let mobileMenu = document.getElementById('mobileMenu');

    // Displays the Mobile Nav when clicked and changes the Nav Icon from three bars to an 'X'
    bars.addEventListener('click', function () {
      mobileMenu.classList.toggle('show');
      bars.classList.toggle('fa-times');
    });
  </script>
  <script>
    document.getElementById("hamburger").onclick = function toggleMenu() {
      const navToggle = document.getElementsByClassName("toggle");
      for (let i = 0; i < navToggle.length; i++) {
        navToggle.item(i).classList.toggle("hidden");
      }
    };
  </script>