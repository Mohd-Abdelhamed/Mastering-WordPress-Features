<?php get_header();?>

<div class="container home-page">
    <div class="row">
    <?php        
        if ( have_posts() ) {
            while ( have_posts() ) 
            {
                the_post(); ?>
                <div class="col-sm-6">
                    <div class="main-post">
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
                        <?php the_post_thumbnail('',['class'=>'img-responsive img-thumbnail','title'=>'Post Title']);?>
                            <p class="post-content">
                                <strong>
                                    <?php the_excerpt(); ?>
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
                    </div>
                    <?php
                } // end while
            }
             // end if 
        ?>
        <div class="clearfix"></div>
        <div class="post-pagination">
            <?php
            // if(get_previous_posts_link()){
            //     previous_posts_link('Prev');
            // }else{
            //     echo '<span>Prev</span>';
            // }
            // if(get_next_posts_link()){
            //     next_posts_link('Next');
            // }else{
            //     echo '<span>Next</span>';
            // }
            echo '<span>'.numbering_pagination().'</span>'; 
        ?>
        </div>
    </div>
</div>


<?php

get_footer(); 
?>

