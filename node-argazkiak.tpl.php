<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  <?php print $picture; ?>

 

  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($submitted || $terms): ?>
    <div class="meta">
      <?php if ($submitted): ?>
           <div class="submitted">

            <?php
            $nodeUser->uid = $node->uid;
            profile_load_profile($nodeUser);
            $user = user_load($node->uid);
            ?>

        <span id="detail_albiste_img">
          <?php print theme_image($user->picture); ?>
        </span>
        <span id="detail_albiste_izen_abizenak">
              <?php print $user->name; ?>
        </span>
        <span id="detail_etiketak_non">
              <?php print aiaraldeacom_taxonomy_links($node, 9, "komunitatea/"); ?>
        </span>
        <span id="detail_etiketak_non_arloak">
              <?php print aiaraldeacom_taxonomy_links($node, 7, "komunitatea/"); ?>
        </span>
        <span id="detail_albiste_data" class="node_date">
              <?php print format_date($node->created, 'custom' , 'Y.M.d h:m'); ?>
        </span>
      </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>

   <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>

  <div class="content">
    <?php print $content; ?>
  </div>
  <div class="k-koment">
    <?php if(user_is_anonymous()): ?>
      <div id="comment-form" class="comentar-link"> <a href="/komunitatea-login">Sartu</a> edo <a href="/komunitatea-login/">erregistratu</a> iruzkina idazteko </div>
    <?php else: ?>
    <div id="comment-form" class="comentar-link"> <?php print l(t('Komentatu'), 'node/'.$node->nid, array('fragment' => 'comment-form')) ?></div>
    <?php endif ?>
  </div>
  

</div></div> <!-- /node-inner, /node -->
