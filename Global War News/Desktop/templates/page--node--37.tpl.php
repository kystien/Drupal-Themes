<?php
$result = db_query("SELECT * FROM {node} WHERE promote IN (:promote)", array(':promote' => 1));
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
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2732738957419036",
    enable_page_level_ads: true
  });
</script>
<!-- ---------------Begin Marquee---------------  -->
<?php if($result !== false): ?>
	<div id="marquee" style="width:100%;">  
                <marquee behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">  
                <?php  
                     if($result !== false)  
                     {  
                          while($row = $result->fetchAssoc())  
                          {  
                               echo '<label><a href="https://globalwar.news/stories/?q=node/'.$row['nid'].'" target="_blank">'.$row['title'].'</a></label>';  
                          }  
                     }  
                ?>
                </marquee>  
           </div>  
<?php endif; ?>
<?php
	if (theme_get_setting('threat_level1')){
		$threatlev = "df1";
		$threattxt = "Nuclear war is imminent!";
		$threatlevnum ="1";
		}
	if (theme_get_setting('threat_level2')){
		$threatlev = "df2";
		$threattxt = "War!";
		$threatlevnum ="2";
		}
	if (theme_get_setting('threat_level3')){
		$threatlev = "df3";
		$threattxt = "War Imminent!";
		$threatlevnum ="3";
		}
	if (theme_get_setting('threat_level4')){
		$threatlev = "df4";
		$threattxt = "Average Day";
		$threatlevnum ="4";
		}
	if (theme_get_setting('threat_level5')){
		$threatlev = "df5";
		$threattxt = "General Peace";
		$threatlevnum ="5";
		}
	?>
<!-- ---------------End Marquee---------------  -->
<div id="wrapper">
  <header id="header" role="banner">
    <?php if ($logo): ?><div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div><?php endif; ?>
	<div id="time"> <h3><a id="UTCTime"></a> - ZULU TIME</h3>
	<h4 style="text-align:center;">DEFCON LEVEL <?php print $threatlevnum; ?></h4>
	<div id="defcon" role="DefCon" class="<?php print $threatlev; ?>" style="text-align:center;"><?php print $threattxt; ?><div>
	</div>
	</div></div>
    <?php if ($site_name): ?><h1 id="site-title"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1><?php endif; ?>
    <?php if ($site_slogan): ?><div id="site-description"><?php print $site_slogan; ?></div><?php endif; ?>
    <div class="clear"></div>
<!-- ---------------Begin Menu---------------  -->
    <?php
    // Disable Main menu if unchecked.
    if ($main_menu == TRUE):
      ?>
      <nav id="main-menu"  role="navigation">
        <a class="nav-toggle" href="#"><?php print t("Navigation"); ?></a>
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
  </header>
<!-- ---------------End Menu---------------  -->
   <?php if ($page['header']): ?>
   <div id="head">
    <?php print render($page['header']); ?>
   </div>
   <div class="clear"></div>
   <?php endif; ?>
   <div class="content-sidebar-wrap">
    <div id="content">
      <section id="post-content" role="main">
        <?php print $messages; ?>
        <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
        <?php print render($page['content']); ?>
      </section> <!-- /#main -->
    </div>
    <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar-first" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>
    </div>
    <?php if ($page['sidebar_second']): ?>
      <aside id="sidebar-second" role="complementary">
	  Regional Intelligence
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>
  <div class="clear"></div>
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