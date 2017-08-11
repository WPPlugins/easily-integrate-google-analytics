<?php
add_action('admin_init', 'amk_ga_options_init' );
add_action('admin_menu', 'amk_ga_options_page');

// Init plugin options to white list our options
function amk_ga_options_init(){
	register_setting( 'amk_gaoptions_options', 'amk_ga', 'amk_ga_options_validate' );
}

// Add menu page
function amk_ga_options_page() {
	add_options_page('Google Analytics by AMKapps', 'Google Analytics', 'manage_options', 'amk_ga_options', 'amk_ga_options_do_page');
}

// Draw the menu page itself
function amk_ga_options_do_page() {
	?>
	<div class="wrap">
		<h2>Google Analytics Tracking Code</h2>
		<form method="post" action="options.php">
			<?php settings_fields('amk_gaoptions_options'); ?>
			<?php $options = get_option('amk_ga'); ?>
			<table class="form-table">
				<tr valign="top"><th scope="row">Google Analytics ID</br>(Ex: UA-********-*) </th>
					<td><input type="text" name="amk_ga[ua_id]" value="<?php echo $options['ua_id']; ?>" /></td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		<div id="postbox-container-1" class="postbox-container">
			<div class="postbox">
			    <h3 class="hndle"><span style="margin-left: 10px">Spread The Word</span></h3>
			    <div class="inside">
			    	<p>Want to help make this plugin even better? All donations are used to improve this plugin, so donate $10, $20 or $50 now!</p>
			    	<p><a href="http://amkapps.com" target="_blank">Find out more.</a>
			    	<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=RK3BGVNS5L4ZW" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" alt="Donate to AMKapps"></a></p>
			    </div>
			</div>		
    	</div>
	</div>
	<?php	
}
function amk_ga_options_validate($input) {
	$input['ua_id'] =  wp_filter_nohtml_kses($input['ua_id']);	
	return $input;
}

add_action('wp_head','hook_amk_ga');
function hook_amk_ga() {
	$options = get_option('amk_ga');
	$output="<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', '".$options['ua_id']."', 'auto');
  ga('send', 'pageview');
</script>";
	echo $output;
}