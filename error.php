<?php

include('includes/config.php');

include('includes/navbar.php'); ?>

<body>
  <div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-md shadow">
      <h2 class="text-2xl font-bold mb-4">Error</h2>

      <?php
      // Check if the error session variable is set
      if (isset($_SESSION['error'])) {
        $error_message = $_SESSION['error'];
        // Display the error message
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-4">';
        echo '<strong>Error:</strong> ' . htmlentities($error_message);
        echo '</div>';
        ?>
        <a href="index.php">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Return Home
          </button>
        </a>
        <?php

        unset($_SESSION['error']);


      } else {

        header("Location: index.php");
        exit();
      }
      ?>


    </div>

  </div>

  <!-- Include your scripts or any other necessary resources here -->
</body>

</html>