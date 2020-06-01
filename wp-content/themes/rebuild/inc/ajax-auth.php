<?php $id='-'.rand(0,1000); ?>
<form id="login" class="jx-rebuild-auth" action="login" method="post">
    <h3><?php esc_html_e('New to site?','rebuild');?> <a class="login_button show_signup" id="show_signup_button" href=""><?php esc_html_e('Create an Account','rebuild');?></a></h3>
    <hr />
    <h1><?php esc_html_e('Login','rebuild');?></h1>
    <p class="status"></p>  
    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>  
    <label for="username<?php echo esc_attr( $id ); ?>"><?php esc_html_e('Username','rebuild');?></label>
    <input id="username<?php echo esc_attr( $id ); ?>" type="text" class="required" name="username" data-validation="required">
    <label for="password<?php echo esc_attr( $id ); ?>"><?php esc_html_e('Password','rebuild');?></label>
    <input id="password<?php echo esc_attr( $id ); ?>" type="password" class="required" name="password" data-validation="required">
    <a class="text-link" href="<?php
echo wp_lostpassword_url(); ?>"><?php esc_html_e('Lost password?','rebuild');?></a>
    <input class="submit_button" type="submit" value="<?php esc_html_e('LOGIN','rebuild');?>">
	<a class="close" href="">(<?php esc_html_e('close','rebuild');?>)</a>    
</form>
 
<form id="register" class="jx-rebuild-auth"  action="register" method="post">
	<h3><?php esc_html_e('Already have an account?','rebuild');?> <a class="login_button show_login" id="show_login"  href=""><?php esc_html_e('Login','rebuild');?></a></h3>
    <hr />
    <h1><?php esc_html_e('Signup','rebuild');?></h1>
    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
    <label for="signonname<?php echo esc_attr( $id ); ?>"><?php esc_html_e('Username','rebuild');?></label>
    <input id="signonname<?php echo esc_attr( $id ); ?>" type="text" name="signonname" class="required" data-validation="required">
    <label for="email<?php echo esc_attr( $id ); ?>"><?php esc_html_e('Email','rebuild');?></label>
    <input id="email<?php echo esc_attr( $id ); ?>" type="text" class="required email" name="email" data-validation="required" data-validation="email">
    <label for="signonpassword<?php echo esc_attr( $id ); ?>"><?php esc_html_e('Password','rebuild');?></label>
    <input id="signonpassword<?php echo esc_attr( $id ); ?>" type="password" class="required" name="signonpassword" data-validation="required">
    <label for="password2<?php echo esc_attr( $id ); ?>"><?php esc_html_e('Confirm Password','rebuild');?></label>
    <input type="password" id="password2<?php echo esc_attr( $id ); ?>" class="required" name="password2" data-validation="required">
    <input class="submit_button" type="submit" value="<?php esc_html_e('SIGNUP','rebuild');?>">
    <a class="close" href="">(<?php esc_html_e('close','rebuild');?>)</a>    
</form>
