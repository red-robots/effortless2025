<?php $image = get_field("template_header_image");
if ($image):?>
    <header class="template-header row-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        <h1><?php echo get_the_title(); ?></h1>
    </header><!--.template-header-->
<?php endif; ?>