<?php
include('includes/navbar.php');
?>

<body class="bg-gray-100 h-screen">
  <div class="container mx-auto my-8 h-1/2">
    <div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-md shadow-md">

      <h2 class="text-2xl font-bold mb-4 text-center">Thank You!</h2>

      <p class="mb-4 text-center">
        <?php echo $_SESSION['msg']; ?> We appreciate your interaction.
      </p>

      <div class="flex justify-center">
        <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
          Return Home
        </a>
      </div>

    </div>
  </div>

  <?php
  include('includes/footer.php');
  ?>
</body>

</html>