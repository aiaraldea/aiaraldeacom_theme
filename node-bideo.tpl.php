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
    <?php endif; ?>

    <div id="detail_meta" class="meta">
        <div class="herria_datak clearfix">
            <div class="herria">
                <?php print aiaraldeacom_taxonomy_links($node, 2, "aktualitatea/"); ?>
            </div>
            <span class="sortze_data"><?php print format_date($node->created, 'custom', 'Fk j, Y'); ?></span>
        </div>
    </div>
    <div class="content" id="detail_content">

      <div id="detail_bideo_koadro">
        <div id="detail_bideo_bideo">
        <?php print $node->field_bideo[0]['view']; ?>
        </div>
        <div id="detail_bideo_body">
        <?php print $node->content['body']['#value']; ?>
        </div>
        <div id="detail_bideo_deskarga">
        <?php print $node->field_deskarga[0]['view']; ?>
        </div>
      </div>

      <?php if (count($node->field_rererrers) > 0): ?>
        <div id="detail_bideo_referrers_title">Eduki erlazionatuak:</div>
        <div id="detail_bideo_referrers">
        <?php
        foreach ($node->field_rererrers as $referrer) {
          print $referrer['view'];
        }
        ?>
        </div>
      <?php endif ?>


    <div class="etiketak">
        <span class="field-label">Etiketak</span>
        <span class="etiketa_zerrenda">
            <?php print aiaraldeacom_taxonomy_links($node, 1, "aktualitatea/"); ?>
        </span>
    </div>
    </div>

    <div id="detail_share_links"></div>
    
    <?php if(user_is_anonymous()): ?>
    <div id="comment-form" class="comentar-link"> <a href="/komunitatea-login">Sartu</a> edo <a href="/komunitatea-login/">erregistratu</a> iruzkina idazteko </div>
    <?php endif ?>    
    <?php print $links; ?>

  </div></div> <!-- /node-inner, /node -->
