<?php
get_header();
include(get_template_directory().'/includes/breadcrumb.php' );
?>
<div class="container post-page">
    <?php

    if ( have_posts() ) 
    {   
        while ( have_posts() ) 
        {               

            the_post(); ?>
            <div class="main-post single-post">
                <?php
                edit_post_link( "Edit" );?>
                <h3 class="post-title">
                    <a href="<?php the_permalink();?>">
                    <?php

                    the_title();
                    ?>
                    </a>
                </h3>
                <span class="post-author">
                    <i class="fa-regular fa-user"></i></i>
                    <?php the_author_posts_link(); ?>
                </span>
                <span class="post-date">
                    <i class="fa-regular fa-calendar-days"></i>
                    <?php the_date( "F j, Y ")?>  at <?php the_time('g:i a');?>
                </span>
                <span class="post-comments">
                <i class="fa-regular fa-comment"></i>
                <?php comments_popup_link('0 Comments',false,false,'','Disabled Comment'); ?> </span>
                <?php the_post_thumbnail('medium_large',['class'=>'img-responsive img-thumbnail','title'=>'Post Title']);?>
                <p class="post-content">
                <strong>
                    <?php the_content(); ?>
                </strong>
                </p>
                <p class="post-categories">
                <i class="fa-solid fa-ticket"></i>
                 <?php the_category(', ' );?> </p>
                <p class="post-tags">
                <i class="fa-solid fa-tag"></i>
                    <?php
                    if(has_tag()){
                        the_tags();
                    }else{
                        echo "Tags: There\'s No Tags";
                    }
                    ?>
                </p>
            </div>
                <?php
            } // end while
        }// end if
        wp_reset_query(  );
        $random_posts_arguments=array(
            'post_per_page'     =>  3,
            'orderby'           =>  'rand',
            'category__in'      =>  wp_get_post_categories(get_queried_object_id()),
            'post__not_in'      =>  array(get_queried_object_id(  ))
        );

        $random_posts=new WP_Query($random_posts_arguments);
        if ($random_posts->have_posts()) 
        {
        ?>
             <h3 class='author-post-title'>
             <i class="fa-regular fa-newspaper"></i>
             Random Articles
            </h3>
            <?php
            while ($random_posts->have_posts() ) 
            {
                $random_posts->the_post(); ?>
                <div class="author-posts">
                    
                    <h3 class="post-title">
                        <a href="<?php the_permalink();?>">
                        <?php the_title(); ?>
                        </a>
                    </h3>
                </div>
                <?php
            }
        }
    wp_reset_query();
        ?>

        <div class="clearfix"></div>
        <div class='row author-data'>
            <div class='col-md-1 author-data'>
                <?php
                $avatar_argument=array(
                    'class'=>'img-responsive img-thumbnail center-block'
                );
                echo get_avatar(get_the_author_meta('ID'),128,'','user_avatar',$avatar_argument)?>
            </div>
                <div class='col-md-10 author-data'>
                    <h4>
                        
                    <?php echo get_the_author_meta( 'ID' )?>
                    <?php  the_author_meta( 'first_name' )?>
                    <?php  the_author_meta( 'last_name' )?>
                    (<?php  the_author_meta( 'nickname' )?>)
                    </h4>
                    <p><?php  the_author_meta( 'description' )?></p>
                
                </div>
                
        </div>

        <hr class="comment-seperator">
        <div class="post-pagination">
            <?php
            if(get_previous_post_link()){
                previous_post_link('%link','Previous Article:-  %title');
            }else{
                echo '<span>Previous Article:- None</span>';
            }
            if(get_next_post_link()){
                next_post_link('%link','Next Article:-  %title');
            }else{
                echo '<span>Next Article:- None</span>';
            }
            ?>
            <hr class="comment-seperator">
            <?php
            // Post_Comment
            comments_template( );?>
        </div>
    </div>


<?php get_footer(); ?>

