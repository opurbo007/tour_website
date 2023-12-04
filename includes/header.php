<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leisure Life</title>

  <link rel="stylesheet" href="./css/style.css">
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
  <!-- Add this line to include Font Awesome CSS (solid style) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-B4dIJIU9YqXyM5hZ8UZM2bTzRmRpg9FTbjY2iK97+oViA00g5WlGz2VlYU5dP1C" crossorigin="anonymous">



</head>

<body>

  <?php
  session_start();
  if (isset($_SESSION['login']) && $_SESSION['login']) {
    ?>

    <!-- <ul>
      <li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
      <li><a href="profile.php">My Profile</a></li>
      <li><a href="change-password.php">Change Password</a></li>
      <li><a href="tour-history.php">My Tour History</a></li>
      <li><a href="issuetickets.php">Issue Tickets</a></li>

      <li>Welcome:
        <?php echo htmlentities($_SESSION['login']); ?>
      </li>
      <li><a href="logout.php">/ Logout</a></li>
    </ul> -->


    <?php
  }
  ?>


  <header class="bg-cover bg-center h-screen flex flex-col items-center pt-10 relative"
    style="background: linear-gradient(to bottom, rgba(0, 0, 0, .1), rgba(255, 255, 255, 0)), url('./img/last.jpg'); background-size: cover; box-sizing: border-box;">


    <!-- Navbar -->
    <nav class="flex flex-col md:flex-row items-center justify-between bg-transparent w-5/6 ">
      <!-- Left side with logo and title -->
      <!-- Left side with logo and title -->
      <div class="flex flex-row   ">
        <div class=" flex flex-row py-6 px-6 ">
          <img src="./images/travel-your-way.png" alt="Logo" class="h-16">
          <h1 class="text-white text-3xl pl-4 lg:pt-4 pt-4  sm:pt-1  lg:font-semibold">Leisure Life</h1>
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
        <a href="page.php?type=contact"
          class="block md:inline-block text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">CONTACT</a>
        <a href="package-list.php"
          class="block md:inline-block text-2xl text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">PACKAGE</a>
        <a href="page.php?type=aboutus"
          class="block md:inline-block text-2xl text-white px-3 py-3 text-2xl md:border-none font-robot link-transition">ABOUT</a>
        <a href="index.php"
          class="block md:inline-block text-2xl text-white px-3 py-3 text-2xl md:border-none font-robot  link-transition hover:text-004d5c">HOME</a>
      </div>
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login']) { // Check if user is logged in
        ?>
        <button id="hamburger2"
          class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right border border-blue-100 hover:bg-gray-900 text-white rounded-lg text-2xl fontrobot">
          Profile
        </button>
        <ul id="profileDropdown" class="hidden bg-white border border-gray-300 absolute right-0 mt-16 z-10">
          <li class="px-4 py-2 text-gray-800"><span class="font-bold">Welcome:</span>
            <?php echo htmlentities($_SESSION['login']); ?>
          </li>
          <li class="hm"><a href="index.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i
                class="fa fa-home"></i> Home</a></li>
          <li><a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i class="fa fa-user"></i> My
              Profile</a></li>
          <li><a href="writeus.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i class="fa fa-ticket"></i>
              Write Us</a></li>
          <li><a href="change-password.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i
                class="fa fa-lock"></i> Change Password</a></li>
          <li><a href="tour-history.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i
                class="fa fa-history"></i> My Tour History</a></li>
          <li><a href="issuetickets.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i
                class="fa fa-ticket"></i> Issue Tickets</a></li>

          <li><a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i class="fa fa-sign-out"></i>
              Logout</a></li>
        </ul>

      <?php } else { ?>
        <!-- Display login link if not logged in -->
        <button
          class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right border border-blue-100 hover:bg-gray-900 text-white rounded-lg text-2xl fontrobot"
          id="loginButton" type="button" data-modal-toggle="authentication-modal">Login</button>
      <?php } ?>


    </nav>
    <div class="max-w-2xl mx-auto">

      <!-- Modal toggle -->

      <!-- Main modal -->
      <div id="authentication-modal" aria-hidden="true"
        class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
          <!-- Modal content -->
          <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
            <div class="flex justify-end p-2">
              <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="authentication-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
            <!-- Use JavaScript to toggle between login and registration forms -->
            <div id="loginForm" class="form-container">
              <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="login.php" method="post">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>

                <div>
                  <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                    email</label>
                  <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="name@company.com" required="">
                </div>
                <div>
                  <label for="password" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                    password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required="">
                </div>
                <div class="flex justify-between">


                </div>
                <button type="submit"
                  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                  to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                  Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500"
                    onclick="toggleForm('registrationForm')">Create account</a>
                </div>
              </form>
            </div>
            <div id="registrationForm" class="form-container hidden">
              <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="regis.php" method="post">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Create an account</h3>




                <div>
                  <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                    Name</label>
                  <input type="text" name="name" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="name@company.com" required="">
                </div>

                <div>
                  <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                    Mobile</label>
                  <input type="phone" name="mobile" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="name@company.com" required="">
                </div>

                <div>
                  <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                    email</label>
                  <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="name@company.com" required="">
                </div>
                <div>
                  <label for="password" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                    password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required="">
                </div>
                <div class="flex justify-between">


                </div>



                <button type="submit" name="submit"
                  class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create
                  account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                  Already have an account? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500"
                    onclick="toggleForm('loginForm')">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>



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
          ipsum dolor sit amet consectetur adipisicing elit. Cumque dolores eius quasi adipisci pariatur aspernatur?
        </p>
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
  <script>
    // Sample JavaScript to toggle between login button and profile icon
    const loginButton = document.getElementById('loginButton');
    const profileIcon = document.getElementById('profileIcon');

    // Simulate login, you can replace this with your actual login logic
    const isLoggedIn = false;

    // Check if the user is logged in
    if (isLoggedIn) {
      loginButton.classList.add('hidden');
      profileIcon.classList.remove('hidden');
    }

    // Add an event listener for the login button click
    loginButton.addEventListener('click', () => {
      // Implement your login logic here
      // After successful login, update the UI
      loginButton.classList.add('hidden');
      profileIcon.classList.remove('hidden');
    });
  </script>
  <script>
    function toggleForm(formId) {
      const loginForm = document.getElementById('loginForm');
      const registrationForm = document.getElementById('registrationForm');

      if (formId === 'registrationForm') {
        loginForm.classList.add('hidden');
        registrationForm.classList.remove('hidden');
      } else {
        registrationForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
      }
    }
  </script>
  <script>
    // Function to close the dropdown
    function closeDropdown() {
      var dropdown = document.getElementById("profileDropdown");
      if (!dropdown.classList.contains("hidden")) {
        dropdown.classList.add("hidden");
      }
    }

    // Event listener for "Profile" button click
    document.getElementById("hamburger2").addEventListener("click", function (event) {
      event.stopPropagation(); // Prevents the click event from propagating to the document
      var dropdown = document.getElementById("profileDropdown");
      dropdown.classList.toggle("hidden");
    });

    // Event listener for document click to close the dropdown
    document.addEventListener("click", function () {
      closeDropdown();
    });

    // Event listener to prevent closing when clicking inside the dropdown
    document.getElementById("profileDropdown").addEventListener("click", function (event) {
      event.stopPropagation(); // Prevents the click event from propagating to the document
    });
  </script>


  <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>