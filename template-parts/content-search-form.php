<?php global $tax;
$placeholder = get_field("search_placeholder");?>
<form class="bella-search" action="<?php $queried_object = get_queried_object();
if(is_a($queried_object,'WP_Term')&&$tax):
    $link = get_term_link(get_query_var( 'term' ),$tax);
    if(!is_wp_error($link)):
        if(isset($_GET['filter'])):
            echo add_query_arg('filter',$_GET['filter'],$link);
        else:
            echo $link;
        endif;
    endif;
else:
    if(isset($_GET['filter'])):
        echo add_query_arg('filter',$_GET['filter'],get_the_permalink());
    else:
        the_permalink();
    endif;
endif;?>" method="POST">
    <input type="text" name="search" <?php if($placeholder) echo 'placeholder="'.$placeholder.'"';?> <?php if(isset($_POST['search'])) echo 'value="'.$_POST['search'].'"';?>>
</form>