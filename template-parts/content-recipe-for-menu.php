<?php
/**
 * Template part for displaying page content in single-recipe.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-recipe full-width-wrapper"); ?>>
    <?php $saved_post = $post;
    $post = get_post(549);
    setup_postdata($post);
    $ingredients_title = get_field("ingredients_title");
    $directions_title = get_field("directions_title");
    $notes_title = get_field("notes_title");
    $quote_title = get_field("quote_title");
    $post = $saved_post;
    setup_postdata($post);?>
    <section class="column-2">
        <header>
            <h1><?php the_title();?></h1>
            <?php $serving_size = get_field("serving_size");
            $adapted_from = get_field("adapted_from");
            if($serving_size):?>
                <div class="serving-size">
                    <?php echo $serving_size;?>
                </div><!--.serving-size-->
            <?php endif;
            if($adapted_from):?>
                <div class="adapted-from">
                    <?php echo $adapted_from;?>
                </div><!--.adapted-from-->
            <?php endif;?>
        </header>
        <?php $notes = get_field("notes");
        $directions = get_field("instructions");
        $quote = get_field("quote"); 
        if($directions):?>
            <div class="directions">
                <?php if($directions_title):?>
                    <header><h2><?php echo $directions_title;?></h2></header>
                <?php endif;?>
                <div class="copy">
                    <?php echo $directions;?>    
                </div><!--.copy-->    
            </div><!--.directions-->
        <?php endif;?>
        <?php if($notes):?>
            <div class="notes">
                <?php if($notes_title):?>
                    <header><h2><?php echo $notes_title;?></h2></header>
                <?php endif;?>
                <div class="notes copy">
                    <?php echo $notes;?>    
                </div><!--.copy-->
            </div><!--.notes-->
        <?php endif;?>
        <?php if($quote):?>
            <div class="quote">
                <?php if($quote_title):?>
                    <header><h2><?php echo $quote_title;?></h2></header>
                <?php endif;?>
                <blockquote class="copy">
                    <?php echo $quote;?>        
                </blockquote><!--.copy-->
            </div><!--.quote-->
        <?php endif;?>
    </section><!--.column-2-->
    <aside class="column-3">
        <?php $pdf = get_field("pdf");
        $pdf_text = get_field("pdf_text");
        if($pdf):?>
            <a class="pdf" href="<?php echo $pdf['url'];?>" target="_blank"><?php if($pdf_text) echo $pdf_text; else echo "Print Recipe";?></a>
        <?php endif;
        //insert search
        $ingredients = get_field("ingredients");
        if($ingredients):?>
            <?php if($ingredients_title):?>
                <header><h2><?php echo $ingredients_title;?></h2></header>
            <?php endif;?>
            <div class="ingredients">
                <?php foreach($ingredients as $row):?>
                    <div class="ingredient">
                        <?php echo $row['ingredient'];?>
                    </div><!--.ingredient-->
                <?php endforeach;?>
            </div><!--.ingredients-->
        <?php endif;?>
    </aside><!--.column-3-->
</article><!-- #post-## -->
