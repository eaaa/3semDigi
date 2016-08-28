<!DOCTYPE html>
<html>
<?php
//  Brors lær_så_de_navne_spil og tilstedeværelse registrering (ingen DB connection p.t.)

//  Gæt på navnet og hover for at se om du havde ret.
//  Kan også bruges til at danne tilfældige grupper med -
//  tryk shuffle og juster bredden på browser efter gruppestørrelsen
//
//  Use, modify, and let me know how you improved the product
//
//  Sprog, title og andre tilpasninger kan gøres i de filer der includeres herunder
//
require "settings.php";
require "buttons.php";
?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title><?php echo $title ?></title>

	</head>
    <body>
		<h1 id="titleH1"><?php echo $absent ; ?></h1>
		<button id="shuffle" type="button"><?php echo $shuffle ; ?></button>
        <button id="doInverse" type="button"><?php echo $present ; ?></button>
        <button id="nocover" type="button"><?php echo $shownames ; ?></button>
        <button id="docover" type="button"><?php echo $hidenames ; ?></button>

        <div id="article_list">
			<?php
      //if image Directory can't be found, throws an error.
      if (file_exists($sti) == false)
        {
          echo 'Directory "', $sti, '" wasent found';
        }
        // if $sti could be found
        else {
      			// Declare variable for scanning directionary and only grabbing files with given extensions.
            $images = glob("$sti\*.{jpg,png,gif,jpeg}", GLOB_BRACE);
            // For each image in the Images array, echo them out as html
            foreach ( $images as $image) {
                  echo "
                    <article class='show' onClick=\" swop(this) \">
                      <img src=\"$image\" />
                      <div class='cover' onClick=\" swop2(this) \"></div>
                    </article>	";
                  }
              }
			?>
        </div>


        <script src ="script.js.php"></script>

    </body>
</html>