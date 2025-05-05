<?php
/**
 * Template part for displaying page content in page-filter-menus-recipes.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $bella_url;
global $post_type;
global $tax;
global $from_tax;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-filter full-width-wrapper"); ?>>
    <?php $filter_terms = null;
    $queried_object = get_queried_object();
    if(isset($_GET['filter'])):
        $filter_terms = explode(",",str_replace("%2C",",",$_GET['filter']));
    endif;?>
    <aside class="column-1">
        <?php $bella_url = is_a($queried_object,'WP_Term') ? get_term_link($queried_object) : get_the_permalink();
        get_template_part( 'template-parts/content', 'terms-hidden' );?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header>
            <h1><?php echo is_a($queried_object,'WP_Term') ? $queried_object->name: get_the_title();?></h1>
            <?php get_template_part('template-parts/content', 'search-form');?>
        </header>
        <div class="sub-menu">
            <?php $terms = null;
            if($tax):
                $terms = get_terms(array(
                    'taxonomy'=>$tax,
                    'hide_empty'=>false,
                ));
            endif;
            if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
                <div class="sub-terms terms">
                    <?php foreach($terms as $term):?>
                        <div class="term">
                            <div class="name">
                                <a href="<?php $link = get_term_link($term); 
                                if(!is_wp_error($link)) echo $link;?>">
                                    <?php echo $term->name;?>      
                                </a>
                            </div><!--.name-->
                        </div><!--.term-->
                    <?php endforeach;?>
                </div><!--.from-terms-->
            <?php endif;?>
        </div><!--.sub-menu-->
        <?php $args = null;
        if($post_type && !empty($post_type)):
            if(!isset($_POST['search'])):
                $args = array(
                    'posts_per_page'=> -1,
                    'paged'=>$paged,
                    'post_type'=>$post_type,
                );
                $tax_params = array(
                    'relation' => 'AND',
                );
                $taxes = array();
                if($filter_terms):
                    foreach($filter_terms as $term):
                        $split = explode(";",$term);
                        if(count($split)===2):
                            $taxes[$split[0]][] = $split[1];    
                        endif;
                    endforeach;
                endif;
                foreach($taxes as $key=>$value):
                    $tax_params[] = array(
                        'taxonomy'=>$key,
                        'field'=>'term_id',
                        'terms'=>$value,
                    );
                endforeach;
                if(is_a($queried_object,'WP_Term')&&$tax):
                    $tax_params[] = array(
                        'taxonomy'=>$tax,
                        'field'=>'slug',
                        'terms'=>get_query_var( 'term' )
                    );
                endif;
                if(count($tax_params)>1):
                    $args['tax_query'] = $tax_params;
                endif;
            else: 
                $prepare_args = $post_type;
                $prepare_string = "SELECT ID FROM $wpdb->posts WHERE post_title LIKE '%%%s%%' AND (";
                $max = count($post_type);
                for($i = 1;$i<=$max;$i++):
                    $prepare_string .= " post_type = %s";
                    if($i<$max):
                        $prepare_string.=" OR ";
                    else:
                        $prepare_string.=" ";
                    endif;
                endfor;
                $prepare_string .= ") UNION SELECT object_id FROM $wpdb->term_relationships as r INNER JOIN $wpdb->terms as t ON t.term_id = r.term_taxonomy_id WHERE t.name LIKE '%%%s%%'";
                $prepare_args[] = $_POST['search'];
                array_unshift($prepare_args,$_POST['search']);
                array_unshift($prepare_args,$prepare_string);
                $results = $wpdb->get_results(  call_user_func_array(array($wpdb, "prepare"),$prepare_args));
                if($results):
                    $in = array();
                    foreach($results as $result):
                        $in[] = $result->ID;
                    endforeach;
                    $args = array(
                        'posts_per_page'=>12,
                        'paged'=>$paged,
                        'post_type'=>$post_type,
                        'post__in'=>$in
                    );
                    $tax_params = array(
                        'relation' => 'AND',
                    );
                    $taxes = array();
                    if($filter_terms):
                        foreach($filter_terms as $term):
                            $split = explode("-",$term);
                            if(count($split)===2):
                                $taxes[$split[0]][] = $split[1];    
                            endif;
                        endforeach;
                    endif;
                    foreach($taxes as $key=>$value):
                        $tax_params[] = array(
                            'taxonomy'=>$key,
                            'field'=>'term_id',
                            'terms'=>$value,
                        );
                    endforeach;
                    if(is_a($queried_object,'WP_Term')&&$tax):
                        $tax_params[] = array(
                            'taxonomy'=>$tax,
                            'field'=>'slug',
                            'terms'=>get_query_var( 'term' )
                        );
                    endif;
                    if(count($tax_params)>1):
                        $args['tax_query'] = $tax_params;
                    endif;
                endif;
            endif;
        endif;
        if($args):
            $query = new WP_Query($args);
            if($query->have_posts()):?>
                <div class="container">    
                    <?php while($query->have_posts()):$query->the_post();?>
                        <div class="item js-blocks">
                            <?php $website_link = get_field("website_link");
                            $pdf_link = get_field("pdf_link");
                            if($pdf_link||$website_link):?>
                                <a href="<?php if($pdf_link):
                                    echo $pdf_link['url'];
                                else:
                                    echo $website_link;
                                endif;?>" target="_blank">
                            <?php endif;?>
                                <?php $image = get_field("search_image");
                                if($image):?>
                                    <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                <?php endif;?>
                                <?php $company = get_field("company");
                                $product_title = get_field("product_title");
                                if($product_title||$company):?>
                                    <header>
                                        <?php if($company):?>
                                            <h2><?php echo $company;?></h2>
                                        <?php endif;
                                        if($product_title):?>
                                            <h3><?php echo $product_title;?></h3>
                                        <?php endif;?>
                                    </header>
                                <?php endif;?>
                            <?php if($pdf_link||$website_link):?>
                                </a>
                            <?php endif;?>
                        </div><!--.item-->
                    <?php endwhile;?>
                </div><!--#container-->
                <?php //pagi_posts_nav($query);
                wp_reset_postdata();
            endif;
        endif;?>
    </section><!--.column-2-->
</article><!-- #post-## -->
