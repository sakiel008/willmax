<?php
function jc_recatcha_settings_page() {
	?>
	<div class="wrap">
		<h2>Global configuration</h2>
		<p>Registra tu dominio en la pagina oficial de google recaptcha</p>
		<a href="https://www.google.com/recaptcha">Register domain</a>
		<p>Una vez registrado el dominio pega la clave de sitio que te provee Google Recaptcha.</p>
		<form method="post" action="options.php">
			<?php settings_fields( 'jc-settings-re' ); ?>
			<?php do_settings_sections( 'jc-settings-re' ); ?>
			<table class="form-table">
				<tr valign="top">
					<td>
						<label for=""><b>Clave del sitio:</b> </label>
						<input type="text" name="public-key" value="<?php echo esc_attr( get_option('public-key') ); ?>" />
					</td>
					
				</tr>
				<tr>
					<td>
						<label for=""><b>Clave secreta:</b> </label>
						<input type="text" name="private-key" value="<?php echo esc_attr( get_option('private-key') ); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<h2>Form configuration</h2>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<label for=""><b> Seleccionar formularios:</b></label><br>
						<?php
						if(get_option('comment_form') !== ""){$checked1 = "checked=\"checked\""; }else{ $checked = "";}					
						if(get_option('login_form') !== ""){ $checked2 = "checked=\"checked\""; }else{ $checked = "";}
						if(get_option('register_form') !== ""){ $checked3 = "checked=\"checked\""; }else{ $checked = "";}
						if(get_option('ninja_form') !== ""){ $checked4 = "checked=\"checked\""; }else{ $checked = "";}
						if(get_option('cf7_form') !== ""){ $checked5 = "checked=\"checked\""; }else{ $checked = "";}
						if(get_option('is_user_logged') !== ""){ $checked6 = "checked=\"checked\""; }else{ $checked = "";}
						?>
						<input type="checkbox" name="comment_form" id="<?php echo get_option('comment_form'); ?>" value="comment" <?php echo $checked1; ?> />Comment <br>
						<input type="checkbox" name="login_form" id="<?php echo get_option('login_form'); ?>" value="login" <?php echo $checked2; ?> />Login<br>
						<input type="checkbox" name="register_form" id="<?php echo get_option('register_form'); ?>" value="register" <?php echo $checked3; ?> />Register<br>
						<h4>Other Plugin form</h4>
						<input type="checkbox" name="ninja_form" id="<?php echo get_option('ninja_form'); ?>" value="ninja" <?php echo $checked4; ?> />Ninja Form<br>
						<input type="checkbox" name="cf7_form" id="<?php echo get_option('cf7_form'); ?>" value="cf7" <?php echo $checked5; ?> />Contact Form 7<br>
						<h4>Disable users logged in</h4>
						<input type="checkbox" name="is_user_logged" id="<?php echo get_option('is_user_logged'); ?>" value="lgus" <?php echo $checked6; ?> />Disable<br>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
		<div>
			<a href="http://webdesignjc.com/recaptchawp/index.html">Mas detalles</a>
		</div>
	</div>
	<?php } ?>