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
include "settings.php";
include "buttons.php";
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title ?></title>
        <!-- Styles moved and linked to style.css -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
    <body>
		<h1 id="titleH1"><?php echo $absent ; ?></h1>
		<button id="shuffle" type="button"><?php echo $shuffle ; ?></button>
        <button id="doInverse" type="button"><?php echo $present ; ?></button>
        <button id="nocover" type="button"><?php echo $shownames ; ?></button>
        <button id="docover" type="button"><?php echo $hidenames ; ?></button>

        <div id="article_list">
			<?php
      // Find images with defined file extensions, sort them alphabetically, and show them
      foreach(glob("$dir/*.{jpg,png,gif,jpeg,JPG,JPEG,PNG,GIF}", GLOB_BRACE) as $file){
      //				<article class='gametile' onClick=\" this.innerHTML='' \">
				echo "
				<article class='show' onClick=\" swop(this) \">
					<img src=\"$file\" />
					<div class='cover' onClick=\" swop2(this) \"></div>
				</article>	";
    }
			?>
        </div>


        <script src ="script.js.php"></script>

    </body>
</html>
