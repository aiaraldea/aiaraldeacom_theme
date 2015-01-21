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


    <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
    <?php endif; ?>

    <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
    <?php endif; ?>

    <div id="detail_albiste_meta" class="meta">
        <div class="herria_datak clearfix">
            <div class="herria">
                <?php print aiaraldeacom_taxonomy_links($node, 2, "aktualitatea/"); ?>
            </div>
            <span class="sortze_data"><?php print format_date($node->created, 'custom', 'Fk j, Y, h:i'); ?></span>
            <span class="eguneratze_data">
                <?php $eguneratzeData = $node->field_eguneratze_data[0]['value']; ?>
                <?php if (isset($eguneratzeData) && $eguneratzeData > $node->created + 300): ?>
                <span class="label">Eguneratua</span> 
                <span><?php print format_date($node->changed, 'custom', 'Fk j, Y, h:i'); ?></span>
                <?php endif; ?>
            </span>
        </div>
        <div class="egilea">
            <span class="">
                <?php
                $nodeUser->uid = $node->uid;
                profile_load_profile($nodeUser);
                $user = user_load($uid);
                $profileImage = theme('imagecache', 'albistea_egilea', $user->picture);
                print l($profileImage, 'user/' . $user->uid, array('html' => TRUE));
                print l($nodeUser->profile_izen_abizenak, 'user/' . $user->uid);
                ?>
            </span>
        </div>
    </div>

    <div id="detail_albiste_content" class="content">

        <?php if (!empty($node->field_embeddedimages)): ?>
            <div class="irudi_nagusia">
                <?php
                $imageField = $node->field_embeddedimages[0];
                print theme('imagecache', 'albistea_nagusia', $imageField['filepath'], $imageField['data']['description']);
                //print l($image, $imageField['filepath'], array('attributes'=>array('class'=>'ttt'),'html'=>TRUE));
                ?>
                <div class="deskripzioa"><?php print $imageField['data']['description']; ?></div>
            </div>
        <?php endif ?>
        <?php if (count($node->field_embeddedimages) > 1): ?>
            <div class="irudi_txikiak">
            <?php foreach ($node->field_embeddedimages as $imageField): ?>
                <div class="irudi_txikia">
                    <?php 
                    $image = theme('imagecache', 'albistea_irudi_txikia', $imageField['filepath'], $imageField['data']['description']);
                    $target = imagecache_create_url('albistea_nagusia', $imageField['filepath']);
                    print l($image, $target, array('html' => TRUE));
                    ?>
                    <div class="deskripzioa"><?php print $imageField['data']['description']; ?></div>
                </div>
            <?php endforeach ?>
            </div>
        <?php endif ?>

        <div id="detail_albiste_body">
            <?php print $node->content['body']['#value']; ?>
        </div>
        <?php print $node->content['field_erantsi']['#children'] ?>
        <div class="etiketak">
            <span class="field-label">Etiketak</span>
            <span class="etiketa_zerrenda">
                <?php print aiaraldeacom_taxonomy_links($node, 1, "aktualitatea/"); ?>
            </span>
        </div>
      <?php // print $content; ?>
    </div>
    <div id="detail_albiste_erlazionatuak">
      <?php print $node->content['field_bideo_erlazionatuak']['#children'] ?>
    </div>
    
    <div id="detail_share_links">
    </div>
    
    <?php if(user_is_anonymous()): ?>
    <div id="comment-form" class="comentar-link"> <a href="/komunitatea-login">Sartu</a> edo <a href="/komunitatea-login/">erregistratu</a> iruzkina idazteko </div>
    <?php endif ?>

    <?php print $links; ?>

  </div></div> <!-- /node-inner, /node -->
