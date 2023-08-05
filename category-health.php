<?php get_header();?>

<div class="container home-page health-category">
    <div class="row">
        <div class="category-information text-center">
            <div class="col-md-4">
                <h1 class="category-title"><?php single_cat_title( );?></h1>
            </div>
            <div class="col-md-4">
                <div class="cetegory-description"><?php echo category_description( );?></div>
            </div>
            <div class="col-md-4">
                <div class="cat-stats">
                    <span>This is special layout</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class='col-md-9'>
    <?php        
        if ( have_posts() ) {
            while ( have_posts() ) 
            {
                the_post(); ?>
                    <div class="main-post">
                        <div class="row">
                        <div class="col-md-6">
                        <?php the_post_thumbnail('',['class'=>'img-responsive img-thumbnail','title'=>'Post Title']);?> 
                        </div>
                        <div class="col-md-6">
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
                            <?php the_date( "F j, Y ")?>
                        </span>
                        <span class="post-comments">
                        <i class="fa-regular fa-comment"></i>
                        <?php comments_popup_link('0 Comments',false,false,'','Disabled Comment'); ?> </span>
                            <p class="post-content">
                                <strong>
                                    <?php the_excerpt(); ?>
                                </strong>
                            </p>
                        </div>
                        
                        </div>
                        </div>
                    <?php
                } // end while
            }
             // end if 
               echo '<span>'.numbering_pagination().'</span>'; 
        ?>
         </div> <!--col-md-9 -->
         <div class='col-md-3 sidebar'>
            <?php 
            get_sidebar('health');
                // if(is_active_sidebar( 'main-sidebar' )){
                //     dynamic_sidebar( 'main-sidebar' );
                // }

            ?>
         </div>
        </div>
    </div>
</div>


<?php

get_footer(); 
?>

