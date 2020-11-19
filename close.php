  <?php

  session_start();

  session_destroy();

  header("location: index.php ");
  echo "<script language='javascript'>window.location='index.php'</script>";
 exit();

  ?>

