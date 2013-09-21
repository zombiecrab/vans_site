<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="shortcut icon" href="favicon.ico">
        <title>Vanessa M</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="alternate stylesheet" type="text/css" href="css/e2photo.css"
        title="none">
        <?php require_once "phplib/config.php"; require_once "phplib/getfolders.php"; ?>
        <script type="text/javascript" src="js/mootools.v1.11.js"></script>
        <script type="text/javascript">
            var transspeed = <?php echo $transitionspeed; ?> ;
            var fadespeed = <?php echo $fadespeed; ?> ;
        </script>
        <script type="text/javascript" src="js/e2photo.js"></script>
        <script type="text/javascript" src="js/styleswitcher.js"></script>
        <script type="text/JavaScript">
            <?php getImages($gallerypath, 'tempgallery'); ?>
            var firstimagewidth = currentwidth;
            var firstimageheight = currentheight;
        </script>
        <script type="text/javascript" src="js/e2photo2.js"></script>
    </head>
    <body>
        <table class="frame">
    		<tr>
				<td class="topspacer"></td>
			</tr>
			<tr>
                <td class="navLeftSpacer"></td>
				<td class="vm"><a class="vm" href="index.html"></a></td>
                <td class="navWorks"><a class="worksRollover" href="works.php"></a></td>
    			<td class="navBio"><a class="bioRollover" href="bio.html"></a></td>
				<td class="navContact"><a class="contactRollover" href="contact.html"></a></td>
                <td class="navRightSpacer"></td>

			</tr>
			<tr class="content">
                
			</tr>
		</table>
        
    </body>
</html>
    