<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
	<script type="text/javascript" language="javascript">
    function renderTime() {
      var currentTime = new Date();
      var h = currentTime.getUTCHours();
      var m = currentTime.getUTCMinutes();
      var s = currentTime.getUTCSeconds();
      setTimeout('renderTime()',1000);
      if (h == 0) {
          h = 12;
      } 
      if (h < 10) {
          h = "0" + h;
      }
      if (m < 10) {
          m = "0" + m;
      }
      if (s < 10) {
          s = "0" + s;
      }
      var myClock = document.getElementById('UTCTime');
      myClock.textContent = h + ":" + m + ":" + s + " ";
      myClock.innerText = h + ":" + m + ":" + s + " ";
    }
    renderTime();
  </script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
