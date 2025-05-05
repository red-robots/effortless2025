<?php global $bella_url;
global $from_tax;
if($from_tax):?>
    <div class="terms-section <?php if($bella_url): 
        echo 'redirect-url redirect-value-'. $bella_url;
    endif;?>">
        <?php $filter_terms = null;
        if(isset($_GET['filter'])):
            $filter_terms = explode(",",$_GET['filter']);
        endif;
        $post = get_post(549);
        setup_postdata($post);
        $filter_title = get_field("filter_title");
        $seasons_title = get_field("seasons_title");
        $year_title = get_field("year_title");
        $other_title = get_field("other_title");
        wp_reset_postdata();?>
        <?php $terms = get_terms(array(
            'taxonomy'=>$from_tax,
            'hide_empty'=>false,
        ));
        if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
            <?php if($filter_title):?>
                <header><h2><?php echo $filter_title;?></h2></header>
            <?php endif;?>
            <div class="from-terms terms">
                <?php foreach($terms as $term):?>
                    <div class="filter-term term value-<?php echo $from_tax.";".$term->term_id;?>">
                        <div class="name">
                            <?php echo $term->name;?>      
                        </div><!--.name-->
                        <?php if($filter_terms&&in_array($from_tax.";".$term->term_id,$filter_terms)):?>
                            <i class="fa fa-check-square-o"></i>
                        <?php else:?>
                            <i class="fa fa-square-o"></i>
                        <?php endif;?>
                    </div><!--.filter-term-->
                <?php endforeach;?>
            </div><!--.from-terms-->
        <?php endif;?>
    </div><!--.terms-section-->
<?php endif;?>