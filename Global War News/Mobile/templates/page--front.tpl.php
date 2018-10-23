<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="wrapper">
  <header id="header" role="banner">
    <div>
	<?php if ($logo): ?><div id="node-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="https://globalwar.news/sites/all/themes/global_war_mobile/node-logo.png"/></a></div><?php endif; ?>
	<?php if ($site_name): ?><div id="site-title"><h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1></div><?php endif; ?>
    <?php if ($site_slogan): ?><div id="site-description"><?php print $site_slogan; ?></div><?php endif; ?>
    </div>
    	<!-- ---------------Begin Menu---------------  -->
    <?php
    // Disable Main menu if unchecked.
    if ($main_menu == TRUE):
      ?>
      <nav id="main-menu"  role="navigation"> 
      	<a class="nav-toggle" href="#"><center><i class="fa fa-bars"></i></center></a>
        <div class="menu-navigation-container">
          <?php
          if (module_exists('i18n_menu')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
          ?>
        </div>
        <div class="clear"></div>
      </nav>
    <?php endif;?><!-- end main-menu -->
    <div class="clear"></div>
  </header>
  </div>
<!-- ---------------End Menu---------------  -->
<!-- ---------------Begin Slide---------------  -->		   
  <div id="container">
    <?php if ($is_front || theme_get_setting('slideshow_all')): ?>
      <?php if (theme_get_setting('slideshow_display')): ?>
        <!-- Slides -->
        <?php
        $slide1_head = check_plain(theme_get_setting('slide1_head'));
        $slide1_desc = filter_xss_admin(theme_get_setting('slide1_desc'));
        $slide1_url = check_plain(theme_get_setting('slide1_url'));
        $slide1_img = check_plain(theme_get_setting('slide1_image_url'));
        $slide_alt = check_plain(theme_get_setting('slide_alt'));

        $slide2_head = check_plain(theme_get_setting('slide2_head'));
        $slide2_desc = filter_xss_admin(theme_get_setting('slide2_desc'));
        $slide2_url = check_plain(theme_get_setting('slide2_url'));
        $slide2_img = check_plain(theme_get_setting('slide2_image_url'));
        $slide2_alt = check_plain(theme_get_setting('slide2_alt'));

        $slide3_head = check_plain(theme_get_setting('slide3_head'));
        $slide3_desc = filter_xss_admin(theme_get_setting('slide3_desc'));
        $slide3_url = check_plain(theme_get_setting('slide3_url'));
        $slide3_img = check_plain(theme_get_setting('slide3_image_url'));
        $slide3_alt = check_plain(theme_get_setting('slide3_alt'));
		
        $slide4_head = check_plain(theme_get_setting('slide4_head'));
        $slide4_desc = filter_xss_admin(theme_get_setting('slide4_desc'));
        $slide4_url = check_plain(theme_get_setting('slide4_url'));
        $slide4_img = check_plain(theme_get_setting('slide4_image_url'));
        $slide4_alt = check_plain(theme_get_setting('slide4_alt'));

        $slide5_head = check_plain(theme_get_setting('slide5_head'));
        $slide5_desc = filter_xss_admin(theme_get_setting('slide5_desc'));
        $slide5_url = check_plain(theme_get_setting('slide5_url'));
        $slide5_img = check_plain(theme_get_setting('slide5_image_url'));
        $slide5_alt = check_plain(theme_get_setting('slide5_alt'));

        // Default values in case the alt text is not populated.
        if ($slide_alt == ""):
          $slide_alt = "slider image 1";
        endif;
        if ($slide2_alt == ""):
          $slide2_alt = "slider image 2";
        endif;
        if ($slide3_alt == ""):
          $slide3_alt = "slider image 3";
        endif;
		if ($slide4_alt == ""):
          $slide4_alt = "slider image 4";
        endif;
		if ($slide5_alt == ""):
          $slide5_alt = "slider image 5";
        endif;
        ?>
    <section id="slider">
    <ul class="slides">
      <li>
        <article class="post">
          <div class="entry-container">
            <header class="entry-header">
              <h2 class="entry-title"><a href="<?php print url($slide1_url); ?>"><?php print $slide1_head; ?></a></h2>
            </header><!-- .entry-header -->
            <div class="entry-summary">
              <?php print $slide1_desc; ?>
            </div><!-- .entry-summary -->
            <div class="clear"></div>
          </div><!-- .entry-container -->
          <a href="<?php print url($slide1_url); ?>">
            <?php if ($slide1_img != ''): ?>
              <img src="<?php print $slide1_img; ?>" class="slide-image" alt="<?php print $slide_alt; ?>" /> </a>
            <?php else: ?>
              <img src="<?php print base_path() . drupal_get_path('theme', 'global_war') . '/images/slide-image-1.jpg'; ?>" class="slide-image" alt="<?php print $slide_alt; ?>" /></a>
            <?php endif; ?>
          <div class="clear"></div>
        </article>
      </li>
      <li>
        <article class="post">
          <div class="entry-container">
            <header class="entry-header">
              <h2 class="entry-title"><a href="<?php print url($slide2_url); ?>"><?php print $slide2_head; ?></a></h2>
            </header><!-- .entry-header -->
            <div class="entry-summary">
              <?php print $slide2_desc; ?>
            </div><!-- .entry-summary -->
            <div class="clear"></div>
          </div><!-- .entry-container -->
          <a href="<?php print url($slide2_url); ?>">
            <?php if($slide2_img != ''): ?>
              <img src="<?php print $slide2_img; ?>" class="slide-image" alt="<?php print $slide2_alt; ?>" /></a>
            <?php else: ?>
              <img src="<?php print base_path() . drupal_get_path('theme', 'global_war') . '/images/slide-image-2.jpg'; ?>" class="slide-image" alt="<?php print $slide2_alt; ?>" /></a>
            <?php endif; ?>
          <div class="clear"></div>
        </article>
      </li>
      <li>
        <article class="post">
          <div class="entry-container">
            <header class="entry-header">
              <h2 class="entry-title"><a href="<?php print url($slide3_url); ?>"><?php print $slide3_head; ?></a></h2>
            </header><!-- .entry-header -->
            <div class="entry-summary">
              <?php print $slide3_desc; ?>
            </div><!-- .entry-summary -->
            <div class="clear"></div>
          </div><!-- .entry-container -->
          <a href="<?php print url($slide3_url); ?>">
            <?php if ($slide3_img != ''): ?>
              <img src="<?php print $slide3_img; ?>" class="slide-image" alt="<?php print $slide3_alt; ?>" /> </a>
            <?php else: ?>
              <img src="<?php print base_path() . drupal_get_path('theme', 'global_war') . '/images/slide-image-3.jpg'; ?>" class="slide-image" alt="<?php print $slide3_alt; ?>" /></a>
            <?php endif; ?>
          <div class="clear"></div>
        </article>
      </li>
	  <li>
        <article class="post">
          <div class="entry-container">
            <header class="entry-header">
              <h2 class="entry-title"><a href="<?php print url($slide4_url); ?>"><?php print $slide4_head; ?></a></h2>
            </header><!-- .entry-header -->
            <div class="entry-summary">
              <?php print $slide4_desc; ?>
            </div><!-- .entry-summary -->
            <div class="clear"></div>
          </div><!-- .entry-container -->
          <a href="<?php print url($slide4_url); ?>">
            <?php if ($slide4_img != ''): ?>
              <img src="<?php print $slide4_img; ?>" class="slide-image" alt="<?php print $slide4_alt; ?>" /> </a>
            <?php else: ?>
              <img src="<?php print base_path() . drupal_get_path('theme', 'global_war') . '/images/slide-image-4.jpg'; ?>" class="slide-image" alt="<?php print $slide3_alt; ?>" /></a>
            <?php endif; ?>
          <div class="clear"></div>
        </article>
      </li>
      <li>
        <article class="post">
          <div class="entry-container">
            <header class="entry-header">
              <h2 class="entry-title"><a href="<?php print url($slide5_url); ?>"><?php print $slide5_head; ?></a></h2>
            </header><!-- .entry-header -->
            <div class="entry-summary">
              <?php print $slide5_desc; ?>
            </div><!-- .entry-summary -->
            <div class="clear"></div>
          </div><!-- .entry-container -->
          <a href="<?php print url($slide5_url); ?>">
            <?php if ($slide5_img != ''): ?>
              <img src="<?php print $slide5_img; ?>" class="slide-image" alt="<?php print $slide5_alt; ?>" /> </a>
            <?php else: ?>
              <img src="<?php print base_path() . drupal_get_path('theme', 'global_war') . '/images/slide-image-5.jpg'; ?>" class="slide-image" alt="<?php print $slide3_alt; ?>" /></a>
            <?php endif; ?>
          <div class="clear"></div>
        </article>
      </li>
    </ul>
    </section>
       <?php endif; ?>
    <?php endif; ?>
</div>
<!-- ---------------End Slide---------------  -->
	<div id="frontfeed">
	<?php if ($page['sidebar_second']): ?>
      <aside role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>
	</div>

		<!-- ~~~~~ Front Page Blocks ~~~~~ -->
		<div id="fblocks">
       <!-- ~~~~~ Analysis & Opinions of World Events Section Blocks ~~~~~ -->
			<div id="anoblock">
					<div id="ano-heading">
						<h1 class="ano-heading">World Events</h1>
					</div>
		<!-- ~~~~~ Analysis Block ~~~~~ -->		
					<div class="analyses-block">
						<div id="analyses-heading">
							<h1 class="analyses-heading">Analyses</h1>
							<center><hr class="blue-divider_third"></center>
						</div>
		<?php  if ($page['fourth_first_top'] || $page['fourth_second_top']): ?>
 						<div class="fourth_first_top"><center>
 			<?php if ($page['fourth_first_top']):
 					print render($page['fourth_first_top']); 
 				endif; ?>
						</center></div>
						<div class="fourth_second_top">
			<?php if ($page['fourth_second_top']): 
					print render($page['fourth_second_top']);
				endif; ?> 
 						</div>
		<?php endif; ?>
						<br>
						<div class="analysis_footer"><a href="/Analysis" title="View Analyses of world events">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
					</div>
			<!-- ~~~~~End Analysis Block ~~~~~ -->
			<!-- ~~~~~ Opinion Block ~~~~~ -->
					<div class="opinion-block">
						<div id="opinion-heading">
							<h1 class="opinion-heading">Opinions</h1>
							<center><hr class="blue-divider_third"></center>
						</div>
						<br>
		<?php if ($page['fifth_first_top'] || $page['fifth_second_top']): ?>
 						<div class="fifth_first_top">
 			<?php if ($page['fifth_first_top']):
 					print render($page['fifth_first_top']); 
 				endif; ?>
						</div>
						<br>
						<div class="fifth_second_top">
			<?php if ($page['fifth_second_top']): 
					print render($page['fifth_second_top']);
				endif; ?> 
 						</div>
		<?php endif; ?>
					<br>
						<div class="opinion_footer"><a href="/Opinion" title="View Individual Opinions of world events">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a>
						</div>
						<hr class="anal-section-break">
					</div>
				</div>
       	<!-- ~~~~~ End Analysis & Opinions of World Events Section Blocks ~~~~~ -->
			
		<!-- ~~~~~ Battlefield Section Blocks ~~~~~ -->
        		<div id="first_whole">
					<div id="battlefield-heading">
						<h1 class="bhead">battlefield Updates</h1>
					</div>
        		<!-- ~~~~~ Top Battlefield Block ~~~~~ -->
        		<div id="first_top_block">
			<?php  if ($page['first_top'] || $page['second_top'] || $page['third_top'] || $page['fourth_top']): ?>
 				<!-- ~~~~~ Middle East Block ~~~~~ -->
 					<div id="middle-east_block">
 						<div class="middle-east_header">Middle East<center><hr class="middle-east"></center></div>
 						<div class="middle-east_first_top">
 				<?php if ($page['first_top']):
 						print render($page['first_top']); 
 					endif; ?>
						</div>
						<div class="middle-east_second_top">
				<?php if ($page['second_top']): 
						print render($page['second_top']);
					endif; ?> 
 						</div>
						<div class="middle-east_footer"><a href="/AO/ME" title="View All Middle East Battlefields">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
 					</div>
 				<!-- ~~~~~ End Middle East Block ~~~~~ -->
 				
 				<!-- ~~~~~ Asia Block ~~~~~ -->
 					<div id="asia_block">
 						<div class="asia_header">Asia<center><hr class="asia"></center></div>
 						<div class="asia_third_top">
 				<?php if ($page['third_top']):
 						print render($page['third_top']); 
 					endif; ?>
						</div>
						<div class="asia_fourth_top">
				<?php if ($page['fourth_top']): 
						print render($page['fourth_top']);
					endif; ?>
 						</div>
						<div class="asia_footer"><a href="/AO/ME" title="View All Asia Battlefields">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
 					</div> 
 				<!-- ~~~~~ End Asia Block ~~~~~ -->
			<?php endif; ?>
				</div>
			<!-- ~~~~~ End Top Battlefield Block ~~~~~ -->
				<br>
			<!-- ~~~~~ Mid Battlefield Block ~~~~~ -->
				<div id="second_top_block">
			<?php if ($page['first_mid'] || $page['second_mid'] || $page['third_mid'] || $page['fourth_mid']): ?>
 				<!-- ~~~~~ European Block ~~~~~ -->
 					<div id="europe_block">
 						<div class="europe_header">Europe<center><hr class="europe"></center></div>
 						<div class="europe_first_mid">
 				<?php if ($page['first_mid']):
 						print render($page['first_mid']); 
 					endif; ?>
						</div>
						<div class="europe_second_mid">
				<?php if ($page['second_mid']): 
						print render($page['second_mid']);
					endif; ?> 
 						</div>
 						<div class="europe_footer"><a href="/AO/EUROPE" title="View All European Battlefields">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
 					</div>
 				<!-- ~~~~~ End European Block ~~~~~ -->
 				<!-- ~~~~~ Africa Block ~~~~~ -->
 					<div id="africa_block">
 						<div class="africa_header">Africa<center><hr class="africa"></center></div>
 						<div class="africa_third_mid">
 				<?php if ($page['third_mid']):
 						print render($page['third_mid']); 
 					endif; ?>
						</div>
						<div class="africa_fourth_mid">
				<?php if ($page['fourth_mid']): 
						print render($page['fourth_mid']);
					endif; ?> 
 						</div>
 						<div class="africa_footer"><a href="/AO/AFRICA" title="View All African Battlefields">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
 					</div>
 				<!-- ~~~~~ End Africa Block ~~~~~ -->
			<?php endif; ?>
				</div>
			<!-- ~~~~~ End Mid Battlefield Block ~~~~~ -->
				<br>
			<!-- ~~~~~ Bottom Battlefield Block ~~~~~ -->
				<div id="third_top_block">
			<?php  if ($page['first_bottom'] || $page['second_bottom'] || $page['third_bottom'] || $page['fourth_bottom']): ?>
 				<!-- ~~~~~ Americas Block ~~~~~ -->
 					<div id="americas_block">
 						<div class="americas_header">Americas<center><hr class="americas"></center></div>
 						<div class="americas_first_bottom">
 				<?php if ($page['first_bottom']):
 						print render($page['first_bottom']); 
 					endif; ?>
						</div>
						<div class="americas_second_bottom">
				<?php if ($page['second_bottom']): 
						print render($page['second_bottom']);
					endif; ?> 
 						</div>
 						<div class="americas_footer"><a href="/AO/AMERICAS" title="View All Battlefields In The Americas">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
 					</div>
 				<!-- ~~~~~ End Americas Block ~~~~~ -->
 				<!-- ~~~~~ Cyber Block ~~~~~ -->
 					<div id="cyber_block">
 						<div class="cyber_header">Cyber<center><hr class="cyber"></center></div>
 						<div class="cyber_third_bottom">
 				<?php if ($page['third_bottom']):
 						print render($page['third_bottom']); 
 					endif; ?>
						</div>
						<div class="cyber_fourth_bottom">
				<?php if ($page['fourth_bottom']): 
						print render($page['fourth_bottom']);
					endif; ?> 
 						</div>
 						<div class="cyber_footer"><a href="/AO/CYBERWAR" title="View All Cyberwar Battlefield News">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a>
 						</div>
 					</div>
 				<!-- ~~~~~ End Cyber Block ~~~~~ -->
			<?php endif; ?>
				</div>
				<hr class="section-break">
			</div>
			<!-- ~~~~~ End Bottom Battlefield Block ~~~~~ -->
			<!-- ~~~~~ End Battlefield Section Blocks ~~~~~ -->
			<!-- ~~~~~ Geopolitical News Section Block ~~~~~ -->
			<div id="second_whole">
				<div id="second_block">
					<div id="second_half_block">
						<div id="politics-heading">
							<h1 class="politics-heading">Geopoliticals</h1>
						</div>
        	<?php  if ($page['second_first_top'] || $page['second_second_top']): ?>
 						<div class="second_first_top">
 				<?php if ($page['second_first_top']):
 						print render($page['second_first_top']); 
 					endif; ?>
						</div>
						<div class="second_second_top">
				<?php if ($page['second_second_top']): 
						print render($page['second_second_top']);
					endif; ?> 
 						</div>
			<?php endif; ?>
						<div class="politics-footer"><a href="/GEOPOLITICS" title="View All Political News">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
					</div>
       <!-- ~~~~~ End Geopolitical News Section Block ~~~~~ -->

       <!-- ~~~~~ Business News Section Block ~~~~~ -->
       <hr class="section-break">
       				<div id="second_half2_block">
						<div id="business-heading">
							<h1 class="business-heading">Business</h1>
						</div>
			<?php  if ($page['third_first_top'] || $page['third_second_top']): ?>
 						<div class="third_first_top">
 				<?php if ($page['third_first_top']):
 						print render($page['third_first_top']); 
 					endif; ?>
						</div>
						<div class="third_second_top">
				<?php if ($page['third_second_top']): 
						print render($page['third_second_top']);
					endif; ?> 
 						</div>
			<?php endif; ?>
						<div class="business-footer"><a class="view-all_second" href="/BUSINESS" title="View All Business News">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
       				</div>
       			</div>
       			<hr class="section-break">
			</div>
       <!-- ~~~~~ End Business News Section Block ~~~~~ -->
		<!-- ~~~~~ History Special Section Blocks ~~~~~ -->
   			<div id="fourth_whole">
   				<hr class="blue-divider"><br>
				<div id="history-heading">
					<h1 class="history-heading"><center>History Specials</center></h1>
				</div>
			<?php if ($page['sixth_first_top'] || $page['sixth_second_top']): ?>
 				<div class="sixth_first_top">
 				<?php if ($page['sixth_first_top']):
						print render($page['sixth_first_top']); 
 					endif; ?>
				</div>
				<div class="sixth_second_top">
				<?php if ($page['sixth_second_top']): 
						print render($page['sixth_second_top']);
					endif; ?> 
 				</div>
			<?php endif; ?>
				<div class="history-footer"><a class="view-all" href="/CHRONICLE" title="View All History Specials">more&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i></a></div>
			</div>
       <!-- ~~~~~ End History Special Section Blocks ~~~~~ -->
      </div>
       <!-- ~~~~~ Front Page Blocks ~~~~~ -->
  <?php if ($page['footer']): ?>
   <div id="foot">
     <?php print render($page['footer']) ?>
   </div>
   <?php endif; ?>
  </div>
  <div id="footer">
    <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
      <div id="footer-area" class="clearfix">
        <?php if ($page['footer_first']): ?>
        <div class="column"><?php print render($page['footer_first']); ?></div>
        <?php endif; ?>
        <?php if ($page['footer_second']): ?>
        <div class="column"><?php print render($page['footer_second']); ?></div>
        <?php endif; ?>
        <?php if ($page['footer_third']): ?>
        <div class="column"><?php print render($page['footer_third']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <div id="copyright">
    <!--Remove  -->
    <?php if (!theme_get_setting('remove_copyright')): ?>
     <?php if (!theme_get_setting('copyright_override')): ?>
       <p class="copyright"><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <?php print check_plain(theme_get_setting('copyright_holder')) ?></p>
     <?php else: ?>
        <?php echo check_plain(theme_get_setting('copyright_override'));?>
    	<?php endif; ?>
	    <?php endif; ?>
    <!--Remove Theme Credit by Setting -->
    <?php if (!theme_get_setting('display_theme_credit')): ?>
      <p class="credits"> <?php print t('Theme Originally Created by'); ?>  <a href="http://www.devsaran.com">Devsaran</a></p>
    <?php endif; ?>
    <div class="clear"></div>
    </div>
  </div>
</div>