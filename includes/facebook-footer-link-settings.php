<?php 
	
	// Create menu link
	function ffl_options_menu_link()
	{
		add_options_page(
			'Facebook Footer Link Options', // Title of the section
			'Facebook Footer Link', // Title
			'manage_options', // Who can manage
			'ffl_options', // Slug
			'ffl_options_content' // Function to display content
		);
	}


	// Create options page content
	function ffl_options_content()
	{
		ob_start();

		// global
		global $ffl_options;
	?>
		
		<div class="wrap">
			<h2><strong> <?php _e("Facebook Footer Link</strong> Settings", "ffl_domain") ?></h2>
			<p><?php _e("Settings for the Facebook Footer Link plugin", "ffl_domain") ?></p>
			<form action="options.php" method="POST">
				<?php settings_fields('ffl_settings_group'); ?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="ffl_settings[enable]"><?php _e("Enable", "ffl_domain") ?></label>
							</th>
							<td>
								<input type="checkbox" name="ffl_settings[enable]" id="ffl_settings[enable]" value="1" <?php checked('1', $ffl_options['enable'])?>>
								<p class="description"><?php echo _e("Weather you want it to show on front-end", "ffl_domain"); ?></p>
							</td>
						</tr>

						<tr>
							<th scope="row">
								<label for="ffl_settings[facebook_url]"><?php _e("Facebook URL", "ffl_domain") ?></label>
							</th>
							<td>
								<input type="url" name="ffl_settings[facebook_url]" id="ffl_settings[facebook_url]" value="<?php echo $ffl_options['facebook_url'] ?>" class="regular-text">
								<p class="description"><?php echo _e("Link to your Facebook profile", "ffl_domain") ?></p>
							</td>
						</tr>

						<tr>
							<th scope="row">
								<label for="ffl_settings[link_color]"><?php _e("Facebook Link Color") ?></label>
							</th>
							<td>
								<input type="text" name="ffl_settings[link_color]" id="ffl_settings[link_color]" value="<?php echo $ffl_options['link_color'] ?>">
								<p class="description"><?php echo _e("Color of the link. Enter only HEX value") ?></p>
							</td>
						</tr>

						<tr>
							<th scope="ffl_settings[text_color]">
								<label for="ffl_settings[text_color]"><?php _e("Text Color") ?></label>
							</th>
							<td>
								<input type="text" name="ffl_settings[text_color]" id="ffl_settings[text_color]" value="<?php echo $ffl_options['text_color'] ?>">
								<p class="description"><?php echo _e("Color of the text. Enter only HEX value") ?></p>
							</td>
						</tr>

						
					</tbody>
				</table>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'ffl_domain') ?>">
				</p>
			</form>
		</div>
		
	<?php 
		echo ob_get_clean();
	}
	add_action("admin_menu", "ffl_options_menu_link");


	// Register settings
	function ffl_register_settings()
	{
		register_setting("ffl_settings_group", "ffl_settings");
	}
	add_action("admin_init", "ffl_register_settings");