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

    <h2 class="title" id="detail_deialdi_title">
      <?php print $node->title; ?>
    </h2>
    <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
    <?php endif; ?>

    <?php if ($submitted || $terms): ?>
    <?php endif; ?>
    <span id="deialdi_etiketak">
      <?php
      $etiketak_vocabulary_id = 1;
      $etiketak_terms = taxonomy_node_get_terms_by_vocabulary($node, $etiketak_vocabulary_id);
      ?>
      <?php if (!empty($etiketak_terms)): ?>
        <?php print aiaraldeacom_taxonomy_links($node, $etiketak_vocabulary_id, "albisteak/"); ?>
      <?php endif; ?>
    </span>
    <div id="detail_service_links">
      <?php print $node->service_links_rendered; ?>
    </div>
    <div class="content" id="detail_deialdi_content">

      <div id="detail_non_etiketa">Non:</div>
      <div id="detail_deialdi_non">
        <?php
        $etiketak_vocabulary_id = 2;
        $etiketak_terms = taxonomy_node_get_terms_by_vocabulary($node, $etiketak_vocabulary_id);
        ?>
        <?php if (!empty($etiketak_terms)): ?>
          <?php print aiaraldeacom_taxonomy_links($node, $etiketak_vocabulary_id, "agenda/"); ?>
        <?php endif; ?>
      </div>
      <div id="detail_lekua_etiketa">Lekua:</div>
      <div id="detail_deialdi_lekua">
        <?php print $node->field_lekua[0]['view']; ?>
      </div>

      <div id="detail_mota_etiketa">Deialdi mota:</div>
      <div id="detail_deialdi_mota">
        <?php
        $etiketak_vocabulary_id = 3;
        $etiketak_terms = taxonomy_node_get_terms_by_vocabulary($node, $etiketak_vocabulary_id);
        ?>
        <?php if (!empty($etiketak_terms)): ?>
          <?php print aiaraldeacom_taxonomy_links($node, $etiketak_vocabulary_id, "agenda/"); ?>
        <?php endif; ?>
      </div>
      <div id="detail_noiz_etiketa">Noiz:</div>
      <div id="detail_deialdi_noiz">
        <?php print $node->field_noiz[0]['view']; ?>
        <?php //print $field_noiz_rendered; ?>
      </div>

      <div id="detail_deialdi_body">
        <?php print $node->content['body']['#value']; ?>
      </div>

      <div id="detail_deialdi_irudia">
        <?php print $node->field_embeddedimages[0]['view']; ?>
      </div>


      <?php if (count($node->field_erantsi) > 0): ?>
      <div id="detail_erantsiak_etiketa">Erantsiak:</div>
      <div id="detail_erantsiak">
          <?php
          foreach ($node->field_erantsi as $erantsi) {
            print $erantsi['view'];
          }
          ?>
      </div>
      <?php endif ?>
      <div id="detail_deialdi_audio">
        <?php print $node->field_audio[0]['view']; ?>
      </div>

    </div>

  <div class="k-koment">
    <?php if(user_is_anonymous()): ?>
      <div id="comment-form" class="comentar-link"> <a href="/komunitatea-login">Sartu</a> edo <a href="/komunitatea-login/">erregistratu</a> iruzkina idazteko </div>
    <?php else: ?>
    <div id="comment-form" class="comentar-link"> <?php print l(t('Komentatu'), 'node/'.$node->nid, array('fragment' => 'comment-form')) ?></div>
    <?php endif ?>
 </div>

    <?php print $links; ?>

  </div></div> <!-- /node-inner, /node -->
