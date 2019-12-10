<?php
/**
 * The template for displaying all pages.
 *
 * @package brick
 */

 get_header(); ?>

 <style>
  #masthead {
    display:none;
  }
</style>

 <div id="main" class="site-main">

 	<article class="page type-page status-publish hentry front-page" style="margin-top:0rem;">
 		<!-- <header class="entry-header">
 		<h1 class="entry-title">Accelerate innovation in the world.</h1>
 		</header> -->
 		<div class="entry-content" style="margin-top:0rem;">
      <!-- start image-->
 			<div style="height:100vh" id="start-back" class="front-content main-back" >
        <img class="back-image first-image" src="<?php bloginfo('template_directory'); ?>/images/artwork/laocon_skelton.png" alt="logo" />
      </div>

      <div style="height:100vh" id="main-back" class="front-content main-back op50" >
        <img class="back-image" src="<?php bloginfo('template_directory'); ?>/images/artwork/laocon_skelton.png" alt="logo" />
      </div>
 			<div style="height:100vh" id="start-div" class="front-content">
        <!-- logo load -->
        <div class="front-logo ">
          <img class="front-logo-image" src="<?php bloginfo('template_directory'); ?>/images/brick_logo.png" alt="logo" style="filter: brightness(2) invert(0);"/>
        </div>
        <!-- fixed page contents -->
        <div class="fixed-page-contents">

          <?php
          // $page_id = 72;    //Sasaki Local 固定ページID
          $page_id = 409;    //固定ページID
          $content = get_page($page_id);
          echo $content->post_content;
          ?>
        </div>
        <div class="front-navi">
          <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav class="site-header__menu primary-menu" role="navigation">
              <button class="primary-menu__toggle menu-toggle" aria-haspopup="true" aria-expanded="false" aria-label="<?php esc_html_e( 'Menu', 'brick' ); ?>">
                <?php
                  echo brick_get_svg( // wpcs: xss ok.
                    array(
                      'icon' => 'menu',
                      'class' => 'menu-toggle__icon menu-toggle__icon--menu',
                    )
                  );

                  echo brick_get_svg( // wpcs: xss ok.
                    array(
                      'icon' => 'close',
                      'class' => 'menu-toggle__icon menu-toggle__icon--close',
                    )
                  );
                ?>
                <span class="menu-toggle__text"><?php esc_html_e( 'Menu', 'brick' ); ?></span>
              </button>
              <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu__list',
                    'container' => false,
                  )
                );
              ?>
            </nav>

          <?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>

            <p class="no-main-navigation">
              <span><?php esc_html_e( 'No menu assigned.', 'brick' ); ?> </span>
              <a href="<?php echo esc_url( get_admin_url( null, '/customize.php?autofocus[panel]=nav_menus' ) ); ?>"><?php esc_html_e( 'Add now.', 'brick' ); ?></a>
            </p>

          <?php endif; ?>
        </div>

      </div>
			 <!-- Services -->
 			<a id="services"></a>
 			<div style="height:100vh" id="services-div" class="front-content">
        <!-- logo load -->
        <div class="front-logo op33 mobile-disp-logo">
          <img class="front-logo-image" src="<?php bloginfo('template_directory'); ?>/images/brick_logo.png" alt="logo" />
        </div>
        <!-- fixed page contents -->
        <div class="fixed-page-contents">
          <?php
          // $page_id = 63;    //Sasaki Local 固定ページID
          $page_id = 47;    //固定ページID
          $content = get_page($page_id);
          echo $content->post_content;
          ?>
        </div>
      </div>
			<!-- News -->
			<a id="news"></a>
 			<div style="height:100vh" id="news-div" class="front-content">
        <!-- logo load -->
        <div class="front-logo op66 mobile-undisp-logo">
          <img class="front-logo-image" src="<?php bloginfo('template_directory'); ?>/images/brick_logo.png" alt="logo" />
        </div>
        <!-- fixed page contents -->
        <div class="fixed-page-contents">
          <?php
          // $page_id = 69;    //Sasaki Local 固定ページID
          $page_id = 34;    //固定ページID
          $content = get_page($page_id);
          echo $content->post_content;
          ?>
        </div>
      </div>

			<!-- About us -->
			<a id="aboutus"></a>
 			<div style="height:100vh" id="aboutus-div" class="front-content">
        <!-- logo load -->
        <div class="front-logo mobile-undisp-logo">
          <img class="front-logo-image" src="<?php bloginfo('template_directory'); ?>/images/brick_logo.png" alt="logo" />
        </div>
        <!-- fixed page contents -->
        <div class="fixed-page-contents">
          <?php
          // $page_id = 24;    //Sasaki Local 固定ページID
          $page_id = 84;    //固定ページID
          $content = get_page($page_id);
          echo $content->post_content;
          ?>
        </div>
      </div>
 		</div>
 	</article>

 </div>

 <?php get_sidebar(); ?>

 <?php get_footer(); ?>
