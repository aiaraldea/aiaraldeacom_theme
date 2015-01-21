<?php
// $Id: page.tpl.php,v 1.14.2.10 2009/11/05 14:26:26 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#3d3e06">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
  
  <meta property="twitter:account_id" content="1512917237" />
  <?php if ($is_front): ?>
<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "WebSite",
   "url": "http://www.aiaraldea.eus/",
   "potentialAction": {
     "@type": "SearchAction",
     "target": "http://www.aiaraldea.eus/search/apachesolr_search/{search_term_string}",
     "query-input": "required name=search_term_string"
   }
}
</script>
  <?php endif; ?>
</head>
<body class="<?php print $body_classes; ?>">

  <div id="page"><div id="page-inner">

    <a name="navigation-top" id="navigation-top"></a>
    <?php if ($primary_links || $secondary_links || $navbar): ?>
      <div id="skip-to-nav"><a href="#navigation"><?php print t('Skip to Navigation'); ?></a></div>
    <?php endif; ?>

      <?php if ($absolute_top): ?>
        <div id="top-blocks" class="region region-header clearfix">
          <?php print $absolute_top; ?>
        </div> <!-- /#header-blocks -->
      <?php endif; ?>
    <div id="header"><div id="header-inner" class="clear-block">

      <?php if ($logo || $site_name || $site_slogan): ?>
        <div id="logo-title" class="container_12">
          <div class="grid_6">
            <?php if ($logo): ?>
              <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo-image" /></a></div>
            <?php endif; ?>

            <?php if ($site_name): ?>
              <?php if ($title): ?>
                <div id="site-name"><strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                  <?php print $site_name; ?>
                  </a>
                </strong></div>
              <?php else: ?>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                  <?php print $site_name; ?>
                  </a>
                </h1>
              <?php endif; ?>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div>
            <div id="search-box-a">
              <?php print $search_box; ?>
            </div> <!-- /#search-box -->
          <div id="header-social-networks-c">
            <ul id="header-social-networks">
              <li class="sprite-rss"><a href="<?php print $base_path ?>rss-jarioak" title="Aiaraldearen RSS jarioak"></a></li>
              <li class="sprite-facebook"><a href="http://www.facebook.com/aiaraldea" title="Aiaraldea Facebook-en"></a></li>
              <li class="sprite-twitter"><a href="http://twitter.com/aiaraldea" title="Jarraitu Aiaraldea Twitter-ren"></a></li>
              <li class="sprite-youtube"><a href="http://www.youtube.com/user/aiaraldeacom" title="Ikusi Aiaraldeko bideoak Youtuben"></a></li>
              <li class="sprite-livestream"><a href="http://www.livestream.com/aiaraldea" title="Aiaraldea zuzenean Livestream-en"></a></li>
              <li class="sprite-flickr"><a href="http://www.flickr.com/photos/aiaraldea/" title="Aiaraldeko argazkiak Flickr-en"></a></li>
              <li class="sprite-komunitatea"><a href="/komunitatea" title="Aiaraldea Komunitatea"></a></li>
            </ul>
          </div>
        </div> <!-- /#logo-title -->
      <?php endif; ?>

      <?php if ($header): ?>
        <div id="header-blocks" class="region region-header">
          <?php print $header; ?>
        </div> <!-- /#header-blocks -->
      <?php endif; ?>

    </div></div> <!-- /#header-inner, /#header -->

    <div id="main"><div id="main-inner" class="clear-block<?php if ($primary_links || $secondary_links || $navbar) { print ' with-navbar'; } ?>">

      <div id="content"><div id="content-inner">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php if ($content_top): ?>
          <div id="content-top" class="region region-content_top">
            <?php print $content_top; ?>
          </div> <!-- /#content-top -->
        <?php endif; ?>

        <?php if ($breadcrumb || $title || $tabs || $help || $messages): ?>
          <div id="content-header">
            <?php print $breadcrumb; ?>
            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>
          </div> <!-- /#content-header -->
        <?php endif; ?>

        <div id="content-area">
          <?php print $content; ?>
        </div>

        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div> <!-- /#content-bottom -->
        <?php endif; ?>

      </div></div> <!-- /#content-inner, /#content -->

      <?php if ($primary_links || $secondary_links || $navbar): ?>
        <div id="navbar"><div id="navbar-inner" class="clear-block region region-navbar">

          <a name="navigation" id="navigation"></a>

          <?php if ($primary_links): ?>
            <div id="primary" class="clear-block">
              <?php print theme('links', $primary_links); ?>
            </div> <!-- /#primary -->
          <?php endif; ?>

          <?php if ($secondary_links): ?>
            <div id="secondary" class="clear-block">
              <?php print theme('links', $secondary_links); ?>
            </div> <!-- /#secondary -->
          <?php endif; ?>

          <?php print $navbar; ?>

        </div></div> <!-- /#navbar-inner, /#navbar -->
      <?php endif; ?>

      <?php if ($left): ?>
        <div id="sidebar-left"><div id="sidebar-left-inner" class="region region-left">
          <?php print $left; ?>
        </div></div> <!-- /#sidebar-left-inner, /#sidebar-left -->
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div> <!-- /#sidebar-right-inner, /#sidebar-right -->
      <?php endif; ?>

    </div></div> <!-- /#main-inner, /#main -->

    <?php if ($footer || $footer_message): ?>
      <div id="footer"><div id="footer-inner" class="region region-footer">

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <?php print $footer; ?>

      </div></div> <!-- /#footer-inner, /#footer -->
    <?php endif; ?>

  </div></div> <!-- /#page-inner, /#page -->

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?>
        <div class="udalak">
            <p class="babesten">Ondorengo instituzioek web-gune hau babesten dute:</p>
            <ul>
                <li class="kuadrila"><a href="http://www.cuadrilladeayala.com/index.php/eu/hasiera.html"><span>Aiarako Eskualdea</span></a></li>
                <li class="orozko"><a href="http://www.orozkoudala.com/eu-ES/Orrialdeak/default.aspx"><span>Orozkoko Udala</span></a></li>
                <li class="arrankudiaga"><a href="http://www.arrankudiaga.org/eu-ES/Orrialdeak/default.aspx"><span>Arrankudiaga-Zolloko Udala</span></a></li>
                <li class="arakaldo"><a href="http://www.arakaldo.org/eu-ES/Orrialdeak/default.aspx"><span>Arakaldoko Udala</span></a></li>
                <li class="aiara"><a href="http://www.aiarakoudala.com/index.php?option=com_k2&view=itemlist&layout=category&task=category&id=11&Itemid=2&lang=eu"><span>Aiarako Udala</span></a></li>
                <li class="laudio"><a href="http://www.laudiokoudala.net/general/index_e.shtml"><span>Laudioko Udala</span></a></li>
                <li class="artziniega"><a href="http://www.artziniegakoudala.com/index.php?option=com_k2&view=itemlist&layout=category&task=category&id=11&Itemid=2&lang=eu"><span>Artziniegako Udala</span></a></li>
                <li class="okondo"><a href="http://www.okondokoudala.com/index.php?option=com_k2&view=itemlist&layout=category&task=category&id=11&Itemid=1&lang=eu"><span>Okondoko Udala</span></a></li>
                <li class="amurrio"><a href="http://www.amurrio.org/eu/"><span>Amurrioko Udala</span></a></li>
                <li class="urduña"><a href="http://www.urduna.com/euskera/08/intro.html"><span>Urduñako Udala</span></a></li>
            </ul>
        </div>
        <div id="ej_logo" style="text-align: right"><a href="http://euskadi.net"></a></div>
<div style="padding:10px; text-align:center;">
<span><a href="/aiaraldea/lege-oharra">Lege oharra</a></span> | 
<span><a href="/aiaraldea/cookiak">Cookie-ak</a></span> | 
<span><a href="/aiaraldea/nor-gara">Nor gara</a></span>
</div>
    </div>
  <?php endif; ?>

  <?php print $closure; ?>
</body>
</html>
