<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2732738957419036",
    enable_page_level_ads: true
  });
</script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
<?php print $head; ?> <title><?php print $head_title; 
?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> 
<?php print $styles; ?> <?php print $scripts; ?> <script 
src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script> </head> 
<body class="<?php print $classes; ?>"<?php print $attributes; ?>> 
<?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
