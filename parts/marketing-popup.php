<?php
$np = get_field('newsletter_popup','option');
$np_visibility = (isset($np['visibility']) && $np['visibility']) ? $np['visibility'] : '';
$np_content = (isset($np['text']) && $np['text']) ? $np['text'] : '';
$np_image = (isset($np['image']) && $np['image']) ? $np['image'] : '';
$np_layout = ($np_image && $np_content) ? 'half' : 'full';
if($np_visibility && ($np_content || $np_image) ) { ?>
<div class="marketing-popup-container">
  <div class="marketing-pop-content">
    <div class="flexwrap <?php echo $np_layout ?>">
      <?php if ($np_image) { ?>
        <div class="imageCol">
          <figure><img src="<?php echo $np_image['url'] ?>" alt="<?php echo $np_image['title'] ?>"></figure>
        </div>
      <?php } ?>
      <?php if ($np_content) { ?>
        <div class="textCol"><div class="text"><?php echo anti_email_spam($np_content); ?></div></div>
      <?php } ?>
    </div>
    <button class="mpopCloseBtn" title="Dismiss this popup"><span class="sr-only">Dismiss this popup</span></button>
  </div>
</div>
<?php } ?>