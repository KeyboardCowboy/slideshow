<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lullabot Gala Photos</title>
  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <div id="slideshow-wrapper">
  <?php
    // Define vars.
    $folder_path = 'images';
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $photos = [];

    // Read files
    if (is_dir($folder_path)) {
      $pattern = '#\.(' . implode('|', $allowed_extensions) . ')$#';
      foreach (glob("$folder_path/*.*") as $filename) {
        if (preg_match($pattern, strtolower($filename))) {
          $photos[] = $filename;
        }
      }
    }
    else {
      echo "$folder_path is not a directory.  Try again, slick.";
    }

    // Randomize images.
    shuffle($photos);

    // Render images into markup.
    foreach ($photos as $filepath) {
      echo '<div class="slideshow-image-wrapper"><img src="' . str_replace(' ', '%20', $filepath) . '" alt="" class="slideshow-image" /></div>' . PHP_EOL;
    }
  ?>
  </div>
  <script src="js/slideshow.jquery-min.js"></script>
</body>
</html>
