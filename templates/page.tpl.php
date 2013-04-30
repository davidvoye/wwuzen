<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
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
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
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
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>
<div id="top-stripe"></div> <!-- stripe goes full browser page width -->
<div id="page">
      <!--Retrieve our images for use in the header -->
    <?php
    //Desktops get this image
      $wwuLogo = drupal_get_path('theme', 'wwuzen') . '/images/wwu.png';
      $wwuSearchIcon = drupal_get_path('theme', 'wwuzen') . '/images/icons/search.png';
    //Mobile devices get these images
      $wwuHorizontalLogo = drupal_get_path('theme', 'wwuzen') . '/images/wwuhorizlogo.png';
      $wwuMobileMenuIcon = drupal_get_path('theme', 'wwuzen') . '/images/icons/toolbar-links.png';
      $wwuMobileSearchIcon = drupal_get_path('theme', 'wwuzen') . '/images/icons/search-gray.png';
      $wwuMobileMainMenuIcon = drupal_get_path('theme', 'wwuzen') . '/images/icons/main-menu.png';
    ?>
    <header id="wwuheader">
      <a href="http://www.wwu.edu" class="wwuLogo"><h1>Western Washington University</h1></a>

      <div id="menu-icons">
        <div class="quick-links" id="mobileWWUmenu">
          <img src="<?php print $wwuMobileMenuIcon;?>" alt="Quick links" class="quick-links-toggle icon-size">

          <ul id="wwumenu">
            <li><a href="http://www.wwu.edu/academic_calendar" title="Calendar"><span aria-hidden="true">c</span> <span>Calendar</span></a></li>
            <li><a href="http://www.wwu.edu/directory" title="Directory"><span aria-hidden="true">d</span> <span>Directory</span></a></li>
            <li><a href="http://www.wwu.edu/index" title="Index"><span aria-hidden="true">i</span> <span>Index</span></a></li>
            <li><a href="http://www.wwu.edu/campusmaps" title="Map"><span aria-hidden="true">l</span> <span>Map</span></a></li>
            <li><a href="http://mywestern.wwu.edu" title="myWestern"><span aria-hidden="true">w</span> <span>myWestern</span></a></li>
          </ul>
        </div>

        <div class="wwusearch">
          <div class="icon-size" id="s-toggle">Search</div>

            <div id="search" style="display:none;">
              <!-- Display the search box as rendered in template.php wwuzen_preprocess_page() -->
              <?php print $search_box; ?>
            </div>
        </div>

        <div class="main-navigation" id="mobileNavTrigger">
          <img src="<?php print $wwuMobileMainMenuIcon;?>" alt="Main menu links" class="main-menu-toggle icon-size">
        </div>
      </div>

  </nav>


    </header> <!-- end #wwuheader -->

  <header id="header" role="banner">
    <div id="collegeheader">
    <!-- Group Logo (banner) and Site Name and Main Menu for Group -->
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logoImage"/></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <hgroup id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup><!-- /#name-and-slogan -->
    <?php endif; ?>
    <div id="navigation">
      <nav id="main-menu" role="navigation">
            <?php print render($page['navigation']); ?>
      </nav>
    </div><!-- /#navigation -->
    <?php print render($page['header']); ?>
  </header>

  <div id="main">
    <header id="department">
    <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
    <?php print $breadcrumb; ?>
    </header>
    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>

      <a id="main-content"></a>

      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div><!-- /#content -->
<!--add in secondary menu here in first sidebar -->
        <?php if ($secondary_menu ): ?>
        <nav id="secondary-menu" role="navigation">
          <?php print theme('links__system_secondary_menu', array(
            'links' => $secondary_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>
<!-- end of secondary menu -->


    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">

        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside><!-- /.sidebars -->
    <?php endif; ?>

  </div><!-- /#main -->
  </div><!-- /#max-wrapper  -->
    <div id="footer">
      <div id="footer-wrapper">
      <div id="footer-left">
        <?php print render($page['footer_left']); ?>
      </div>
      <div id="footer-center">
        <?php print render($page['footer_center']); ?>
      </div>
      <div id="footer-right">
        <!-- //Retrieve our icon images -->
        <?php
          $addressIcon = drupal_get_path('theme', 'wwuzen') . '/images/AddressIcon.png';
          $phoneIcon = drupal_get_path('theme', 'wwuzen') . '/images/PhoneIcon.png';
          $emailIcon = drupal_get_path('theme', 'wwuzen') . '/images/EmailIcon.png';
          $facebookIcon = drupal_get_path('theme', 'wwuzen') . '/images/FacebookIcon.png';
          $flickrIcon = drupal_get_path('theme', 'wwuzen') . '/images/FlickrIcon.png';
          $twitterIcon = drupal_get_path('theme', 'wwuzen') . '/images/TwitterIcon.png';
          $youTubeIcon = drupal_get_path('theme', 'wwuzen') . '/images/YouTubeIcon.png';
          $googlePlusIcon = drupal_get_path('theme', 'wwuzen') . '/images/GooglePlusIcon.png';
          $rssIcon = drupal_get_path('theme', 'wwuzen') . '/images/RSSicon.png';
         ?>
          <div id="footer-right-heading">
            <h3>Western Washington University</h3>
          </div>
          <div id="footer-right-contact-info">
            <img src="<?php print $addressIcon;?>" width="14px" height="12px" /><p>516 High Street</p><p class="second-address-line">Bellingham, WA 98225</p>
            <img src="<?php print $phoneIcon;?>" width="12px" height="11px"/><p>(360) 650-3000</p>
            <img src="<?php print $emailIcon;?>" width="12px" height="8px" /><p><a href="http://www.wwu.edu/wwucontact/">Contact Western</a></p>
          </div>
          <div id="footer-right-social-media-icons">
              <a href="http://www.facebook.com/westernwashingtonuniversity"><img src="<?php print $facebookIcon;?>" width="24px" height="24px" /></a>
              <a href="http://www.flickr.com/wwu"><img src="<?php print $flickrIcon;?>" width="24px" height="24px" /></a>
              <a href="https://twitter.com/#!/WWU"><img src="<?php print $twitterIcon;?>" width="24px" height="24px" /></a>
              <a href="http://www.youtube.com/wwu"><img src="<?php print $youTubeIcon;?>" width="24px" height="24px" /></a>
              <a href="https://plus.google.com/+wwu/posts"><img src="<?php print $googlePlusIcon;?>" width="24px" height="24px" /></a>
              <a href="http://news.wwu.edu/go/feed/1538/ru/atom/"><img src="<?php print $rssIcon;?>" width="24px" height="24px" /></a>
            </div>

        <?php print render($page['footer_right']); ?>
      </div>
      <!-- <div id="wwufooter">
        <p>WWU Footer</p>
      </div> -->
    </div><!-- /#footer-wrapper -->
  </div><!-- /#footer -->

</div><!-- /#page -->

<?php print render($page['bottom']); ?>
