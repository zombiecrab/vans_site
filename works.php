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
        <script type="text/javascript" src="js/jquery.nailthumb.1.1.js"></script>
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
        
            $(window).load(function() {
                jQuery('.nailthumb-container').nailthumb({method:'crop',fitDirection:'top left'});                document.getElementById("tile").style.display="inline";
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
                    $imageLocations = getImageLocationArray('gallery');										if(isset($_GET["direction"]) && isset($_GET["skip"])){
	                    if($_GET["direction"] == "next"){	
	                        $imageIndex = $_GET["skip"];
	                    }else if($_GET["direction"] == "prev"){	
	                        $imageIndex = $_GET["skip"] - ($rows*$cols)*2;						}
                    }else{
                        $imageIndex = 0;
                    }
                    
                    for ($i=0;$i<$rows;$i++){
                        print("<div class=\"tilerow\">");
                            for ($j=0;$j<$cols;$j++){                            	if(isset($imageLocations[++$imageIndex])){
                                	printf("<div class=\"nailthumb-container tile\"><a href=\"viewer/index.php?index=%s\" ><img src=\"%s\" /> /></div>", $imageIndex,$imageLocations[$imageIndex]);																	}
                            }
                            
                        print("</div>");
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