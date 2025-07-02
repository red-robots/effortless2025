<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

$image = get_field("template_header_image");
?>
<?php if ( $image ) { ?>
<section id="hero" class="hero-image">
  <div class="wrapper">
    <div class="hero-content">
      <div class="heroImage" style="background-image:url('<?php echo $image['url'] ?>')"></div>
      <div class="heroText">
        <div class="textwrap">
          <h1 class="post-title"><?php echo get_the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single full-width-wrapper"); ?>>
  <section class="content-block">
    <?php if (get_the_content()): ?>
    <div class="copy"><?php the_content(); ?></div>
    <?php endif; ?>
  </section>
  <?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
</article>
