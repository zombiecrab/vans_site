<?php 
// +----------------------------------------------------------------------------+
// | (E)2 Photo Gallery                                                         |
// +----------------------------------------------------------------------------+
// | Copyright (c) 2007 Evan Ehat, http://www.e2interactive.com             	  |
// | Version       0.9 Beta	                                                  |
// | Last modified 2/19/2007                                               	  |
// | Email         e2gallery@e2interactive.com                                  |
// | Web           http://www.e2interactive.com                             	  |
// +----------------------------------------------------------------------------+
// | MIT License											  |
// | Permission is hereby granted, free of charge, to any person obtaining 	  |
// | a copy of this software and associated documentation files 			  |
// | (the "Software"), to deal in the Software without restriction, 		  |
// | including without limitation the rights to use, copy, modify, 		  |
// | merge, publish, distribute, sublicense, and/or sell copies of 		  |
// | the Software, and to permit persons to whom the Software is furnished 	  |
// | to do so, subject to the following conditions:					  |
// | 													  |
// | The above copyright notice and this permission notice shall be included 	  |
// | in all copies or substantial portions of the Software.				  |
// | 													  |
// | THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 	  |
// | OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,| 
// | FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 	  |
// | THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR 	  |
// | OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, 	  |
// | ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 	  |
// | OTHER DEALINGS IN THE SOFTWARE.                     				  |
// +----------------------------------------------------------------------------+
//
// +----------------------------------------------------------------------------+
// | (E)2 Photo Gallery Credits and Inspiration                                 |
// +----------------------------------------------------------------------------+
// | Mootools - Making the magic happen - http://www.mootools.net               |
// | Inspired from Mooshow - Stuart Eaton - http://www.eatpixels.com            |
// | Image Uploader class.upload.php - Colin Verot   -http://www.verot.net	  |
// | Scott Schiller's - Basic Rounded Corner CSS - http://www.schillmania.com/  |
// | styleswitcher.js - http://idontsmoke.co.uk/2002/ss/ - Paul Sowden		  |
// +----------------------------------------------------------------------------+
// 	 Mootools and class.upload.php are covered by their own respective license terms.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>(e)2 interactive Photo Gallery</title>

<link rel="alternate stylesheet" type="text/css" href="css/e2.css" title="none">
<?php
	require_once "config.php";
	require_once "getfolders.php";
?>

<script type="text/javascript" src="js/mootools.v1.11.js"></script>
<script type="text/javascript">
var transspeed=<?php echo $transitionspeed;?>;
var fadespeed=<?php echo $fadespeed;?>;
</script>

<script type="text/javascript" src="js/e2photo.js"></script>
<script type="text/javascript" src="js/styleswitcher.js"></script>

<script type="text/JavaScript">	
<?php getImages($gallerypath, 'tempgallery'); ?>
var firstimagewidth=currentwidth;
var firstimageheight=currentheight;

</script>
<script type="text/javascript" src="js/e2photo2.js"></script>

</head>

<body>

<div>

<div class="e2_photo_gallery">
  <div class="hd"><div class="c"></div></div>
 <div class="bd">
  <div class="c">
   <div class="s">

    <!-- Gallery -->

		  <div id="gallery" align="center">
		  <!--Main Image Here-->
		  <div id="main_image_wrapper">
			
			<div id="iptc_btn"></a></div>
			  <?php getfirstimage($gallerypath, "tempgallery"); ?>
			 <div id="pn_overlay">
				<a href='javascript:previmage(current_imgid);' id='prev' class=".toolTip" tooltitle="Previous Image" ></a>
				<a href='javascript:nextimage(current_imgid);' id='next' tooltitle="Next Image"></a>			 </div>
		  </div>
		  <div align="center" class="spacing"> </div>
		  <!--End Main Image-->
		  <div id="thumbdisplay">
			  <div align="center" id="photocount"> <script type="text/javascript">document.write("1 of "+tempgallery.length+" Photos");</script> </div>
			  <div class="clear"></div>
		  </div>
		  <div align="center" class="spacing"> </div>
		  <div id="thumbhide">
		   <div id="thumbbox">
			<div id="thumb_container">
			  <div id="thumbgall">
				<div id="thumbs">
				  <div id="widthbox"><?php getthumbnailimages($gallerypath, 'tempgallery', $thumbpath); ?></div>
				</div>
			  </div>
			</div>
			<div id="back">
			  <script type="text/javascript">if(thumbnailnum>maxthumbvisible){document.write("<div id='leftmore'><ul><li><a href=\"javascript:checkbutton(addposition('minus'));movethumbs('plus');\"><img src='rsrc/buttonblank.gif' width='15' height='115' border='0' /></a></li></ul></div>");}</script>
			</div>
			<div id="more">
			  <script type="text/javascript">if(thumbnailnum>maxthumbvisible){document.write("<div id='rightmore'><ul><li><a href=\"javascript:checkbutton(addposition('plus'));movethumbs('minus');\"><img src='rsrc/buttonblank.gif' width='15' height='115' border='0' /></a></li></ul></div>");}</script>
			</div>
			</div>
		  </div>
			<div align="center" class="spacing"> </div>
			<div id="imgtitle"></div>	
		</div>

    <!-- end Gallery -->

   </div>
  </div>
 </div>
</div>
</body>
</html>