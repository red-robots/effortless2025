<?php  
$intro_text = get_field('intro_text');
if($intro_text) { ?>
  <section class="introText">
    <div class="wrapper">
      <?php echo anti_email_spam($intro_text); ?>
    </div>
  </section>
<?php } ?>