<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action('admin_footer','posts_status_color');
function posts_status_color(){
?>
<style>
.status-draft{background: #f7eb68!important;}
.status-pending{background: #87C5D6 !important;}
.status-future{background: #C6EBF5 !important;}
.status-private{background:#F2D46F;}
.status-publish{background:#caffab;}
.post-password-required{background:#fc9797;}
</style>
<?php
}

?>