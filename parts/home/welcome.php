<?php 
$welcome = get_field('welcome');
$welcomeImage = ( isset($welcome['image']) ) ? $welcome['image'] : '';
$welcomeText = (isset($welcome['details'])) ? $welcome['details'] : '';
if($welcomeImage || $welcomeText) { ?>
<section class="welcomeText">
  <div class="wrapper">
    <div class="flexwrap">
      <?php if($welcomeImage) { ?>
      <figure class="imageCol">
        <img src="<?php echo $welcomeImage['url'] ?>" alt="<?php echo $welcomeImage['title'] ?>" />
      </figure>
      <?php } ?>
      <?php if($welcomeText) { ?>
      <div class="textCol">
        <?php echo anti_email_spam($welcomeText); ?>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>