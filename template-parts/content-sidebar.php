<?php
/*== Widget 1 ==*/
$sidebarWidgets = array();
$widgets = get_field('sidebar_widgets', 'option');

//WIDGET 1
$w1_visibility = (isset($widgets['widget_visibility1']) && $widgets['widget_visibility1']=='show') ? true : false;
$w1_image = (isset($widgets['widget_image1']) && $widgets['widget_image1']) ? $widgets['widget_image1'] : '';
$w1_text = (isset($widgets['widget_text1']) && $widgets['widget_text1']) ? $widgets['widget_text1'] : '';
$w1_btn = (isset($widgets['widget_button1']) && $widgets['widget_button1']) ? $widgets['widget_button1'] : '';
$w1_btnLink = (isset($w1_btn['url'])) ? $w1_btn['url'] : '';
$w1_btnName = (isset($w1_btn['title'])) ? $w1_btn['title'] : '';
$w1_btnTarget = (isset($w1_btn['target'])) ? ' target="'.$w1_btn['target'].'" ' : '';
if($w1_image || $w1_text) {
  $sidebarWidgets[] = 'widget1';
}

//WIDGET 2
$post_categories = array();
$w2_visibility = (isset($widgets['widget_visibility2']) && $widgets['widget_visibility2']=='show') ? true : false;
$w2_title = (isset($widgets['widget_title2']) && $widgets['widget_title2']) ? $widgets['widget_title2'] : '';
$w2_catnum = (isset($widgets['widget_category_number']) && $widgets['widget_category_number']) ? $widgets['widget_category_number'] : 6;
$w2_taxonomy = (isset($widgets['widget_taxonomy']) && $widgets['widget_taxonomy']) ? $widgets['widget_taxonomy'] : '';
$w2_blog = (isset($widgets['widget_blog_page']) && $widgets['widget_blog_page']) ? $widgets['widget_blog_page'] : '';
if($w2_taxonomy) {
  $post_categories = get_terms([
    'taxonomy'    => $w2_taxonomy,
    'post_type'   => 'post',
    'hide_empty'  => true,
    'exclude'     => 1
  ]);
  if($post_categories) {
    $sidebarWidgets[] = 'post_categories';
  }
}


//WIDGET 3
$w3_visibility = (isset($widgets['widget_visibility3']) && $widgets['widget_visibility3']=='show') ? true : false;
$w3_image = (isset($widgets['widget_image3']) && $widgets['widget_image3']) ? $widgets['widget_image3'] : '';
$w3_text = (isset($widgets['widget_text3']) && $widgets['widget_text3']) ? $widgets['widget_text3'] : '';

if( $sidebarWidgets ) { ?>
<aside class="sidebar-content">
  
  <?php /*== WIDGET 1 ==*/ ?>
  <?php if ($w1_visibility) { ?>
    <?php if ($w1_image || $w1_text) { ?>
    <div class="widget widget-text-block widget-featured-information">
      <?php if ($w1_image) { ?>
      <figure class="widgetImage">
        <img src="<?php echo $w1_image['url'] ?>" alt="" />
      </figure>  
      <?php } ?>
      <?php if ($w1_text) { ?>
      <div class="widgetText">
        <?php echo anti_email_spam($w1_text); ?>
        <?php if ($w1_btnLink && $w1_btnName) { ?>
          <div class="button-wrap">
            <a href="<?php echo $w1_btnLink ?>"<?php echo $w1_btnTarget ?>class="button button-green"><?php echo $w1_btnName ?></a>
          </div>
        <?php } ?>
      </div>  
      <?php } ?>
    </div>
    <?php } ?>
  <?php } ?>


  <?php /*== WIDGET 2 ==*/ ?>
  <?php if ($w2_visibility) { ?>
    <?php if ($post_categories) { ?>
    <div class="widget widget-categories">
      <?php if ($w2_title) { ?>
      <h2 class="widgetTitle"><?php echo $w2_title ?></h2>
      <?php } ?>
      
      <ul class="archives">
      <?php
      $max=$w2_catnum; $i=1; 
      $count_categories = count($post_categories);
      foreach ($post_categories as $cat) { 
        //$termLink = get_site_url().'/archives/?posttype=post&term='.$cat->term_id;
        //$termLink = get_site_url().'/the-dish/?termid='.$cat->term_id.'#main';
        $termLink = 'javascript:void(0)';
        if($w2_blog) {
          $blogLink = get_permalink($w2_blog->ID);
          $termLink = $blogLink.'?termid='.$cat->term_id.'#main';
        }
        
        ?>
        <?php if ($i<=$max) { ?>
        <li><a href="<?php echo $termLink ?>"><?php echo $cat->name ?></a></li>  
        <?php } ?>
      <?php $i++; } ?>
      </ul>

      <?php if ($count_categories > $max) { ?>
      <div class="button-wrap">
        <a href="#" class="button button-green">View All</a>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
  <?php } ?>


  <?php /*== WIDGET 3 ==*/ ?>
  <?php if ($w3_visibility) { ?>
    <?php if ($w3_image || $w3_text) { ?>
    <div class="widget widget-text-block widget-subscribe widget-featured-information">
      <?php if ($w3_image) { ?>
      <figure class="widgetImage">
        <img src="<?php echo $w3_image['url'] ?>" alt="" />
      </figure>  
      <?php } ?>
      <?php if ($w3_text) { ?>
      <div class="widgetText">
        <?php echo anti_email_spam($w3_text); ?>
      </div>  
      <?php } ?>
    </div>
    <?php } ?>
  <?php } ?>
</aside>
<?php } ?>