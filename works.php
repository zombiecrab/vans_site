<?php 
include 'phplib/common.inc.php'; 
include 'phplib/config.inc.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="shortcut icon" href="favicon.ico" >
		<title>Vanessa M</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.nailthumb.js"></script>
        <script type="text/javascript">
            function nextPage()
            {
                document.getElementById("direction").value = "next";
                document.getElementById("navForm").submit();
            }
            
            function prevPage()
            {
                document.getElementById("direction").value = "prev";
                document.getElementById("navForm").submit();
            }
        
            jQuery(document).ready(function() {
                jQuery('.nailthumb-container').nailthumb({method:'crop',fitDirection:'top left'});
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
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
            <tr>
                <td class="topContentSpacer"></td>
            </tr>
			<tr>
                <td class="content" colspan="6">
                    <?php
                    // work out how many pictures to skip depending on which direction and page the
                    // user is on.
                    $imageLocations = getImageLocationArray('gallery');
                    if($_GET["direction"] == "next"){
                        $imageIndex = $_GET["skip"];
                    }else if($_GET["direction"] == "prev"){
                        // divide the previous image index (stored in 'skip') by the ammount of images
                        // there can be on a page. If the remainder is 0 then we know that the page we
                        // came from was full and we just need to substract the max ammount of images
                        // you can have on a page twice (once for the page the user WAS on and once
                        // more to get the index back to the first image on the previous page).

                        // if there is a remainder then we need to subtract the remainder from the current
                        // image index ('skip') and also subtract the max ammount of images you can have
                        // on a page as well, for the same reason outlined in the above paragraph.
                        if (($_GET["skip"] % ($rows*$cols)) == 0 ){
                            $imageIndex = $_GET["skip"] - ($rows*$cols)*2;
                        } else {
                            $imageIndex = ($_GET["skip"] - ($_GET["skip"] % ($rows*$cols))) - ($rows*$cols);
                        }
                    }else{
                        $imageIndex = 0;
                    }
                    
                    // add rows
                    for ($i=0;$i<$rows;$i++){
                        // don't add a row if there are no more pics
                        if($imageLocations[$imageIndex] != "") {
                            print("<div class=\"tilerow\">");
                                // add cols
                                for ($j=0;$j<$cols;$j++){
                                    // add a blank col if there is no image to add. The blank col
                                    // has the same class as the viewable col to allow for the correct styles
                                    // to be applied. Meaning the pics are evenly spaced.
                                    if($imageLocations[$imageIndex] != "") {
                                        printf("<div class=\"nailthumb-container tile\"><a href=\"viewer/index.php?index=%s\" ><img src=\"%s\" /> /></div>", $imageIndex,$imageLocations[$imageIndex]);
                                        $imageIndex++;
                                    } else {

                                        printf("<div class=\"nailthumb-container tile\"></div>");
                                    }
                                    
                                }
                                
                            print("</div>");
                        }
                    }
                    ?>
                    <div class="pageNav">
                        <form id="navForm" action="works.php" method="get">
                            <input type="hidden" name="skip" value="<?php printf("%s", $imageIndex) ?>"/>
                            <input id="direction" type="hidden" name="direction" />
                            
                            <?php
                            ($imageIndex > ($cols*$rows) ? printf("<a onClick=\"prevPage()\"> < Prev </a>"):""); 
                            (count($imageLocations) -1 != $imageIndex ? printf("<a onClick=\"nextPage()\"> Next > </a>"):"");
                            ?>
                        </form>
                    </div>
                    
                    
                </td>
			</tr>
		</table>
</body>
</html>