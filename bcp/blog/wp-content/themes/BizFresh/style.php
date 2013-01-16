<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");

global $options;

foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }

/*Everything should be below this*/
?>

body{
color:#<?php echo $pt_body_color; ?>;
font: <?php echo $pt_body_font_size; ?>px <?php echo $pt_body_font_family; ?>;
}
 
body, .post-author, .commentmetadata, #sidebar2, .newslettertext     {
    color:#<?php echo $pt_body_color; ?>;
}
h3, #content .post h2, #content h3, #content .post h4, #content h4 , #sidebar1 h2, #sidebar2 h2    {
    color:#<?php echo $pt_body_secondary_color; ?>;
}

<?php
//BLOG ALIGNMENT
if ( 'center' == $pt_blog_alignment) //IF center
{ ?>

<?php } elseif ( 'left' == $pt_blog_alignment) //IF RIGHT 
{ ?>
#header, #post-width   { float:left;}
#content-width, #footer { float:left; padding:0 0 0 8px;}
 
   
<?php } elseif ( 'right' == $pt_blog_alignment) //IF RIGHT 
{ ?>
#header, #post-width   { float:right;}
#content-width, #footer { float:right; padding:0 8px 0 0;}
<?php
}
?>

<?php
 //SIDEBAR LEFT / RIGHT?
if ( 'left' == $pt_sidebar_position) //IF Left
{ ?>
#content {
	float: right;
}
#sidebar1 {
	float: right;
	margin:0 12px 0 0;
}
#sidebar2 {
	float: left;
}
#ctop {
	background:url(images/cbg_top2.png) no-repeat;
}
#cCenter {
	background:url(images/cbg_center2.png) repeat-y;
}
#cbottom {
	background:url(images/cbg_bottom2.png) no-repeat;
}
<?php } elseif ( 'right' == $pt_sidebar_position ) //IF RIGHT 
{ ?>
 #content {
	float: left;
}
#sidebar1 {
	float: left;
	margin:0 0 0 12px;
}
#sidebar2 {
	float: right;
}

<?php
}
?> 