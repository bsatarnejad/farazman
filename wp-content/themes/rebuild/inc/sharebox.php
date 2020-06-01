<?php $rebuild_data =  rebuild_globals(); ?>
<!-- BOF Share Box  -->
<div class="jx-rebuild-share-box-icon">
    <div class="share-title"><?php esc_html_e('Share this Story : ', 'rebuild'); ?></div>
    <div class="sharebox">
        <ul>						
        <?php if($rebuild_data['sharebox_twitter']): ?>  
        <li class="twitter-share">
        <a class="tooltip tooltip-effect-4" href="http://twitter.com/home?status=<?php the_title(); ?> <?php esc_url(the_permalink());; ?>" title="<?php esc_html__( 'Twitter', 'rebuild' ) ?>" target="_blank"><i class="fa fa-twitter social"></i><span class="tooltip-content"><?php esc_html_e( 'Twitter', 'rebuild' ) ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_facebook']): ?>
        <li class="facebook-share">
        <a class="tooltip tooltip-effect-4" href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink());;?>&t=<?php the_title(); ?>" title="<?php esc_html__( 'Facebook', 'rebuild' ) ?>" target="_blank"><i class="fa fa-facebook social"></i><span class="tooltip-content"><?php esc_html_e( 'Facebook', 'rebuild' ) ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_googleplus']): ?>
        <li class="googleplus-share">
        <a class="tooltip tooltip-effect-4" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php esc_html__( 'Google+', 'rebuild' ) ?>" target="_blank"><i class="fa fa-google-plus social"></i><span class="tooltip-content"><?php esc_html_e( 'Google+', 'rebuild' ) ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_linkedin']): ?>
        <li class="linkedin-share">
        <a class="tooltip tooltip-effect-4" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink());;?>&amp;title=<?php the_title();?>" title="<?php esc_html__( 'Linkedin', 'rebuild' ) ?>" target="_blank"><i class="fa fa-linkedin social"></i><span class="tooltip-content"><?php esc_html_e( 'Linkedin', 'rebuild' ) ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_delicious']): ?>
        <li class="delicious-share">
        <a class="tooltip tooltip-effect-4" href="http://www.delicious.com/post?v=2&amp;url=<?php esc_url(the_permalink()); ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php esc_html__( 'Delicious', 'rebuild' ) ?>" target="_blank"><i class="fa fa-delicious social"></i><span class="tooltip-content"><?php esc_html_e( 'Delicious', 'rebuild' ) ?></span></a></li>
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_digg']): ?>
        <li class="digg-share">
        <a class="tooltip tooltip-effect-4" href="http://digg.com/submit?phase=2&amp;url=<?php esc_url(the_permalink()); ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank" title="<?php esc_html__( 'Digg', 'rebuild' ) ?>"><i class="fa fa-digg social"></i><span class="tooltip-content"><?php esc_html_e( 'Digg', 'rebuild' ) ?></span></a>
        </li>
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_reddit']): ?>			
        <li class="reddit-share">
        <a class="tooltip tooltip-effect-4" href="http://www.reddit.com/submit?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php esc_html__( 'Reddit', 'rebuild' ) ?>" target="_blank"><i class="fa fa-reddit social"></i><span class="tooltip-content"><?php esc_html_e( 'Reddit', 'rebuild' ) ?></span></a>
        </li>	
        <?php endif; ?>
        <?php if($rebuild_data['sharebox_email']): ?>
        <li class="email-share">
        <a class="tooltip tooltip-effect-4" href="mailto:?subject=<?php the_title();?>&amp;body=<?php esc_url(the_permalink()); ?>" title="<?php esc_html__( 'E-Mail', 'rebuild' ) ?>" target="_blank"><i class="fa fa-envelope social"></i><span class="tooltip-content"><?php esc_html_e( 'E-Mail', 'rebuild' ) ?></span></a>
        </li>
        <?php endif; ?>
        </ul>
    </div>    
</div>
<!-- EOF Share Box  -->