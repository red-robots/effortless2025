<?php global $bella_url;?>
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
    wp_reset_postdata();
    if($filter_title):?>
        <header><h2><?php echo $filter_title;?></h2></header>
    <?php endif;?>
    <?php $terms = get_terms(array(
        'taxonomy'=>'from',
        'hide_empty'=>false,
    ));
    if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
        <div class="from-terms terms">
            <?php foreach($terms as $term):?>
                <div class="filter-term term value-from-<?php echo $term->term_id;?>">
                    <div class="name">
                        <?php echo $term->name;?>      
                    </div><!--.name-->
                    <?php if($filter_terms&&in_array("from-".$term->term_id,$filter_terms)):?>
                        <i class="fa fa-check-square-o"></i>
                    <?php else:?>
                        <i class="fa fa-square-o"></i>
                    <?php endif;?>
                </div><!--.filter-term-->
            <?php endforeach;?>
        </div><!--.from-terms-->
    <?php endif;?>
    <?php $terms = get_terms(array(
        'taxonomy'=>'season',
        'hide_empty'=>false,
    ));
    if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
        <div class="terms-wrapper">
            <?php if($seasons_title):?>
                <header>
                    <h2><?php echo $seasons_title;?></h2>
                    <i class="fa fa-caret-up"></i>
                    <i class="fa fa-caret-down"></i>
                </header>
            <?php endif;?>
            <div class="season-terms terms">
                <?php foreach($terms as $term):?>
                <div class="filter-term term value-season-<?php echo $term->term_id;?>">
                    <div class="name">
                        <?php echo $term->name;?>      
                    </div><!--.name-->
                    <?php if($filter_terms&&in_array("season-".$term->term_id,$filter_terms)):?>
                        <i class="fa fa-check-square-o"></i>
                    <?php else:?>
                        <i class="fa fa-square-o"></i>
                    <?php endif;?>
                </div><!--.filter-term-->
            <?php endforeach;?>
            </div><!--.season-terms-->
    </div><!--.terms-wrapper-->
    <?php endif;?>
    <?php $terms = get_terms(array(
        'taxonomy'=>'year',
        'hide_empty'=>false,
    ));
    if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
        <div class="terms-wrapper">
            <?php if($year_title):?>
                <header>
                    <h2><?php echo $year_title;?></h2>
                    <i class="fa fa-caret-up"></i>
                    <i class="fa fa-caret-down"></i>
                </header>
            <?php endif;?>
            <div class="year-terms terms">
                <?php foreach($terms as $term):?>
                    <div class="filter-term term value-year-<?php echo $term->term_id;?>">
                        <div class="name">
                            <?php echo $term->name;?>      
                        </div><!--.name-->
                        <?php if($filter_terms&&in_array("year-".$term->term_id,$filter_terms)):?>
                            <i class="fa fa-check-square-o"></i>
                        <?php else:?>
                            <i class="fa fa-square-o"></i>
                        <?php endif;?>
                    </div><!--.filter-term-->
                <?php endforeach;?>
            </div><!--.year-terms-->
    </div><!--.terms-wrapper-->
    <?php endif;?>
    <?php $terms = get_terms(array(
        'taxonomy'=>'other',
        'hide_empty'=>false,
    ));
    if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
        <div class="terms-wrapper">
            <?php if($other_title):?>
                <header>
                    <h2><?php echo $other_title;?></h2>
                    <i class="fa fa-caret-up"></i>
                    <i class="fa fa-caret-down"></i>
                </header>
            <?php endif;?>
            <div class="other-terms terms">
                <?php foreach($terms as $term):?>
                    <div class="filter-term term value-other-<?php echo $term->term_id;?>">
                        <div class="name">
                            <?php echo $term->name;?>      
                        </div><!--.name-->
                        <?php if($filter_terms&&in_array("other-".$term->term_id,$filter_terms)):?>
                            <i class="fa fa-check-square-o"></i>
                        <?php else:?>
                            <i class="fa fa-square-o"></i>
                        <?php endif;?>
                    </div><!--.filter-term-->
                <?php endforeach;?>
            </div><!--.other-terms-->
    </div><!--.terms-wrapper-->
    <?php endif;?>
</div><!--.terms-section-->