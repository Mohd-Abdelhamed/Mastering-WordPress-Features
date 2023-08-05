<?php
    $comment_arguments=array(
        'status'    =>  'approve'
    );
    $comment_count  =   0;
    $all_comments=get_comments( $comment_arguments );

    foreach($all_comments as $comment){
        $post_id = $comment->comment_post_ID;
        if(! in_category('Health' , $post_id )){
            continue;
        }
        $comment_count ++;
    }

    $cat=get_queried_object('description'); // get full object 
    // echo '<pre>';
    // print_r($cat);
    // echo '</pre>';
?>

<div class='sidebar-health'>
    <div class='widget'>
        <h3 class='widget-title'><?php single_cat_title( );?> Statistics</h3>
        <div class='widget-content'>
            <ul>
                <li>
                    <span>Comments Count </span><?php echo $comment_count; ?>
                </li>
                <li>    
                    <span>Article Count </span> <?php echo $cat->count; ?>
                </li>
            </ul>
        </div>
    </div>
    <div class='widget'>
        <h3 class='widget-title'>Latest Posts</h3>
        <div class='widget-content'>
            <?php

            $post_arguments=array(
                'posts_per_page'    =>  4,
                'category_name'     => 'fashion' 
            );
            $query = new WP_Query($post_arguments);
            if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post(  );?>
                    <li>
                        <a target='_blank' href='<?php the_permalink();?>'><?php the_title( )?></a>
                    </li>
                    <?php
                }
            }

            ?>
        </div>
    </div>
    <div class='widget'>
        <h3 class='widget-title'>Hot Posts By Comment</h3>
        <div class='widget-content'>
        <?php
        wp_reset_query(  );

            $hot_post_arguments=array(
                'posts_per_page'    =>  1,
                'orderby'          => 'comment_count' 
            );
            $hot_post_query = new WP_Query($hot_post_arguments);
            if($hot_post_query->have_posts()){
                while($hot_post_query->have_posts()){
                    $hot_post_query->the_post(  );?>
                    <li>
                        <a target='_blank' href='<?php the_permalink();?>'><?php the_title( )?></a>
                    </li>
                        This Post Has 
                        <?php comments_popup_link( '0 Comments', '1 Comment', '% Comments', 'comment-url', 'Comment Disabled' )?>
                        <hr>
                    <?php
                }
            }

        ?>
        </div>
    </div>
</div>