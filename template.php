<?php
// $Id: template.php,v 1.17.2.1 2009/02/13 06:47:44 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to aiaraldeacom_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: aiaraldeacom_breadcrumb()
 *
 *   where aiaraldeacom is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/*
 * Add any conditional stylesheets you will need for this sub-theme.
 *
 * To add stylesheets that ALWAYS need to be included, you should add them to
 * your .info file instead. Only use this section if you are including
 * stylesheets based on certain conditions.
*/
/* -- Delete this line if you want to use and modify this code
// Example: optionally add a fixed width CSS file.
if (theme_get_setting('aiaraldeacom_fixed')) {
  drupal_add_css(path_to_theme() . '/layout-fixed.css', 'theme', 'all');
}
// */


/**
 * Implementation of HOOK_theme().
 */
function aiaraldeacom_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function aiaraldeacom_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function aiaraldeacom_preprocess_page(&$vars, $hook) {
  // Add page template suggestions based on node type, if we aren't editing the node.
  if (array_key_exists('node', $vars) && arg(2) != 'edit') {
    $vars['template_files'][] = 'page-nodetype-'. $vars['node']->type;
  }

drupal_add_feed(url('feed'), t('Aiaraldea Komunikazio Leihoa'));
drupal_add_feed(url('feed/albiste'), t('Aiaraldea - Albisteak'));
drupal_add_feed(url('feed/deialdi'), t('Aiaraldea - Agenda'));
drupal_add_feed(url('feed/proposamena'), t('Aiaraldea - Kultur Leihoa'));
drupal_add_feed(url('feed/bideo'), t('Aiaraldea - Bideoak'));
drupal_add_feed(url('feed/flickr_image_set'), t('Aiaraldea - Argazki bildumak'));

  $vars['head'] = drupal_get_html_head();
$vars['head'] .= '<link '. drupal_attributes(array(
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'href' => '//fonts.googleapis.com/css?family=Open+Sans:400italic,400,700|Exo:700,400,200')
  ) ." />\n";
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function aiaraldeacom_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function aiaraldeacom_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function aiaraldeacom_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

function aiaraldeacom_taxonomy_links($node, $vid, $path) {
  if (count($node->taxonomy)) {
    $tags = array();
    foreach ($node->taxonomy as $term) {
      if ($term->vid == $vid) {
        if($path === null) {
          $tags[] = array('title' => $term->name, 'href' => taxonomy_term_path($term), 'attributes' => array('rel' => 'tag'));
        } else {
          $tags[] = array('title' => $term->name, 'href' => $path.$term->name, 'attributes' => array('rel' => 'tag'));
        }
      }
    }
    if ($tags) {
      return theme_links($tags, array('class'=>'links inline'));
    }
  }
}
/**
 * Format the "Submitted by username on date/time" for each node
 *
 * @ingroup themeable
 */
function aiaraldeacom_node_submitted($node) {
  return t('Submitted by !username on @datetime',
    array(
    '!username' => theme('username', $node),
    '@datetime' => format_date($node->created),
  ));
}

/**
 * Theme a "Submitted by ..." notice.
 *
 * @param $comment
 *   The comment.
 * @ingroup themeable
 */
function aiaraldeacom_comment_submitted($comment) {
  return t('<span class="comment_username">!username</span> &nbsp; <span class="comment_datetime">@datetime</span>',
    array(
    '!username' => theme('username', $comment),
    '@datetime' => format_date($comment->timestamp, 'custom' , 'y.M.d H:i')
  ));
}

/**
 * Format a username.
 *
 * @param $object
 *   The user object to format, usually returned from user_load().
 * @return
 *   A string containing an HTML link to the user's page if the passed object
 *   suggests that this is a site user. Otherwise, only the username is returned.
 */
function aiaraldeacom_username($object) {

  if ($object->uid && $object->name) {
    // Shorten the name when it is too long or it will break many tables.
    if (drupal_strlen($object->name) > 20) {
      $name = drupal_substr($object->name, 0, 15) .'...';
    }
    else {
      $name = $object->name;
    }

    if (user_access('access user profiles')) {
      $output = l($name, 'user/'. $object->uid, array('attributes' => array('title' => t('View user profile.'))));
    }
    else {
      $output = check_plain($name);
    }
  }
  else if ($object->name) {
    // Sometimes modules display content composed by people who are
    // not registered members of the site (e.g. mailing list or news
    // aggregator modules). This clause enables modules to display
    // the true author of the content.
    if (!empty($object->homepage)) {
      $output = l($object->name, $object->homepage, array('attributes' => array('rel' => 'nofollow')));
    }
    else {
      $output = check_plain($object->name);
    }

//    $output .= ' ('. t('not verified') .')';
  }
  else {
    $output = check_plain(variable_get('anonymous', t('Anonymous')));
  }

  return $output;
}

// Gainidazten dugu span etika bat sartzeko loturei
function aiaraldeacom_views_mini_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 9) {
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  $li_previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('<span>‹‹</span>')), $limit, $element, 1, $parameters);
  if (empty($li_previous)) {
    $li_previous = "&nbsp;";
  }

  $li_next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('<span>››</span>')), $limit, $element, 1, $parameters);
  if (empty($li_next)) {
    $li_next = "&nbsp;";
  }

  if ($pager_total[$element] > 1) {
    $items[] = array(
      'class' => 'pager-previous',
      'data' => $li_previous,
    );

    $items[] = array(
      'class' => 'pager-current',
      'data' => t('@current of @max', array('@current' => $pager_current, '@max' => $pager_max)),
    );

    $items[] = array(
      'class' => 'pager-next',
      'data' => $li_next,
    );
    return theme('item_list', $items, NULL, 'ul', array('class' => 'pager'));
  }
}

// From pager.inc
// Gainidazten dugu goiko funtzioan html erabili ahal izateko
function aiaraldeacom_pager_link($text, $page_new, $element, $parameters = array(), $attributes = array()) {
  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query[] = drupal_query_string_encode($parameters, array());
  }
  $querystring = pager_get_querystring();
  if ($querystring != '') {
    $query[] = $querystring;
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('« first') => t('Go to first page'),
        t('‹ previous') => t('Go to previous page'),
        t('next ›') => t('Go to next page'),
        t('last »') => t('Go to last page'),
      );
    }
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    else if (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }

  return l($text, $_GET['q'], array('html' => TRUE, 'attributes' => $attributes, 'query' => count($query) ? implode('&', $query) : NULL));
}

function aiaraldeacom_dynamic_persistent_menu_menu_item($link, $extra_class = NULL, $id = NULL) {
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }

  if ($link['in_active_trail']) {
    $link['localized_options']['attributes']['class'] = 'active';
    $class .= ' active-trail';
  } else {
    // Get the link's URL (sadly, this function doesn't include the link object)
//     $url_pattern = '/<a\s[^>]*href=\"([^\"]*)\"[^>]*>.*<\/a>/siU';
//     preg_match($url_pattern, $link['link_path'], $matches);
//     $link_path = substr_replace($matches[1], '', 0, 1); // remove first slash
$link_path = $link['link_path'];
 
    $contexts = context_get();
    if(!empty($contexts)) {
        $active_paths = array();
        foreach ($contexts['context'] as $context) {
          if (array_key_exists('menu', $context->reactions)) {
            $active_paths[$context->reactions['menu']] = $context->reactions['menu'];
          }
        }
       
        $link_path = str_replace(base_path(), '', '/'.$link_path);
var_dump($link_path);
        if (in_array(drupal_lookup_path('source', $link_path), $active_paths) or (in_array('<front>', $active_paths) and  $link_path =='') or in_array($link_path, $active_paths)) {
          $class .= ' active-trail';
        }
    }
  }

return '<li class="'. $class .'" id="'.$id.'">'. theme('menu_item_link', $link) ."</li>\n";
} 


function aiaraldeacom_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {

  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  } else {
    // Get the link's URL (sadly, this function doesn't include the link object)
    $url_pattern = '/<a\s[^>]*href=\"([^\"]*)\"[^>]*>.*<\/a>/siU';
    preg_match($url_pattern, $link, $matches);
    $link_path = substr_replace($matches[1], '', 0, 1); // remove first slash
 
    $contexts = context_get();
    if(!empty($contexts)) {
        $active_paths = array();
        foreach ($contexts['context'] as $context) {
          if (array_key_exists('menu', $context->reactions)) {
            $active_paths[$context->reactions['menu']] = $context->reactions['menu'];
          }
        }
       
        $link_path = str_replace(base_path(), '', '/'.$link_path);
        if (in_array(drupal_lookup_path('source', $link_path), $active_paths) or (in_array('<front>', $active_paths) and  $link_path =='') or in_array($link_path, $active_paths)) {
          $class .= ' active-trail';
        }
    }
  }

  return '<li class="'. $class .'">'. $link . $menu ."</li>\n";
}

//sobre escribimos el theme del twitter para que no devualva nada y no aparezca el enlace
function aiaraldeacom_twitter_signin_button() {
  $img_path = drupal_get_path('module', 'twitter_signin') . '/images/';
  $img = $img_path . variable_get('twitter_signin_button', 'Sign-in-with-Twitter-lighter-small.png');

  //return l(theme('image', $img, t('Sign in with Twitter')), 'twitter/redirect/ddd', array('html' => TRUE));
}

