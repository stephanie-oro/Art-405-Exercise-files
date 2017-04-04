<?php
  // Load the functions
  require_once('functions.php');

  // Create coffee array with prices
  $theFlavors = array(
    'vanilla'=>2.25,
    'chocolate'=>3.5,
    'strawberry'=>3.25

  );

  // Process the form request
  if( isset($_POST['submit']) )
  {
      $theName = htmlentities($_POST['name']);
      $theIceCream = htmlentities($_POST['icecream']);
      $theIceCream= strtolower($theIceCream); // Lowercase form submission
      $theQuantity = htmlentities($_POST['quantity']);
      $icecream = makeIceCream($theName, $theFlavors, $theIceCream, $theQuantity);
  } else {
    // User hasn't entered a value
    $theIceCream = '';
    $icecream = '';
    $theName = '';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Functional Ice Cream</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body class="bg-faded">
    <main class="container py-4">
      <h1 class="pb-4 font-weight-bold text-center">What Will You Scoop?</h1>
      <form class="form-inline justify-content-center" action="" method="post">
        <label for="name" class="sr-only">Name</label>
        <input class="form-control mr-2" type="text" value="<?php echo ( $theName ? $theName : '' );?>" placeholder="Name" name="name" id="name"> <span class="mr-2">wants </span>
        <select class="custom-select mr-2" name="icecream" id="icecream">
          <?php echo '<option value="'.( $theIceCream ? $theIceCream : 'nothing' ).'">'.( $theIceCream ? capfirst($theIceCream) : 'Select a Flavor' ).'</option>'; ?>
          <?php foreach ($theFlavors as $flavor => $price) {
            echo '<option value="'.$flavor.'">'.capfirst($flavor).'</option>';
          }; ?>
        </select> <span class="mr-2">for</span>
        <input class="form-control mr-2" type="number" value="<?php echo ( $theQuantity ? $theQuantity : '' );?>" placeholder="Quantity" name="quantity" id="quantity">
        <button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
      </form>
      <?php 
        if($icecream){
           echo $icecream;
        }
      ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>