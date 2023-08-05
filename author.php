<?php get_header();?>
<div class="container author-page">
    <h1 class="profile-header text-center">
        <?php the_author_meta( 'nickname' )?> Page 
    </h1>
    <div class="author-page-info">
        <!-- start_row -->
        <div class="row">
            <div class="col-md-3">
                <?php
                    $avatar_argument=array
                    (
                        'class'=>'img-responsive img-thumbnail center-block'
                    );
                    echo get_avatar(get_the_author_meta( 'ID' ),138,'','user_avatar',$avatar_argument)
                ?>
            </div>
            <div class="col-md-9">
                <ul class="list-unstyled">
                    <li>First Name <?php  the_author_meta( 'first_name' )?></li>
                    <li>Last Name <?php  the_author_meta( 'last_name' )?></li>
                    <li>Nickname Name <?php  the_author_meta( 'nickname' )?></li>
                </ul>
                <hr>
                <?php
                    if(get_the_author_description()){?>
                         <p><?php the_author_description()?></p>
                    <?php
                    }else{
                        echo "There is no Biography";
                    }
                ?>
            </div>
        </div>
    </div> 
    <!-- End_Row -->
    <!-- Start_Row -->
    <div class="row author-stats">
        <div class="col-md-3">
            <div class="stats">
            Post Count
            </div>
            <div class="span"><?php
            $author_post_count= count_user_posts( get_the_author_meta('ID'));
            echo $author_post_count?></div>
        </div>
        <div class="col-md-3">
            <div class="stats">
            Comments Count
            </div>
            <div class="span">
                <?php
                    $commentsCount_arguments=array(
                        'user_id'=> get_the_author_meta('ID'),
                        'count'=>true
                    );
                    echo get_comments( $commentsCount_arguments );
                ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats">
            Total Post View
            </div>
            <div class="span">
               0
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats">
            Post Count
            </div>
            <div class="span">0</div>
        </div>
    </div>
    <div class="row">
        <?php
        $author_per_page    =   20 ;
        $author_posts_arguments=array(
            'author'            =>  get_the_author_meta('ID'),
            'posts_per_page'    =>  $author_per_page
        );

        $author_posts=new WP_Query($author_posts_arguments);
        if ($author_posts->have_posts()) {
            if($author_post_count>$author_per_page){?>
                 <h3 class="author-post-title">Latest [ <?php echo $author_per_page;?> ] Posts of <?php the_author_meta('nickname');?></h3>
            <?php
            }else{
                ?>
                 <h3 class="author-post-title">Latest Posts Of <?php the_author_meta( 'nickname');?></h3>
            <?php
            }

    
    while ($author_posts->have_posts() ) 
    {
        $author_posts->the_post(); ?>
        <div class="author-posts">
            <div class="row">
                <div class="col-sm-3">
                    <?php the_post_thumbnail('',['class'=>'img-responsive img-thumbnail','title'=>'Post Title']);?>
                </div>
                <div class="col-sm-9">
                    <h3 class="post-title">
                        <a href="<?php the_permalink();?>">
                        <?php the_title(); ?>
                        </a>
                    </h3>
                    <span class="post-date">
                        <i class="fa-regular fa-calendar-days"></i>
                            <?php the_date( "F j, Y ")?>  at <?php the_time('g:i a');?>
                    </span>
                    <span class="post-comments">
                        <?php comments_popup_link('0 Comments',false,false,'','Disabled Comment'); ?> 
                    </span>
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
    wp_reset_query(  );
    $comment_per_page=2;
    $comment_arguments=array(
        'user_id'       =>  get_the_author_meta('ID'),
        'status'        =>  'approve',
        'number'        =>  $comment_per_page,
        'post_status'   =>  'publish',
        'post_type'     =>  'post',
    );
    $comments=get_comments( $comment_arguments );
    echo"<div class='author-post-title'>Comments</div>";
    if($comments){
        foreach($comments as $comment){?>
            <div class='author-posts'>
                <a href="<?php echo get_permalink($comment->comment_post_ID);?>">
                    <?php echo get_the_title($comment->comment_post_ID);?>
                </a>
                <br>
                <?php echo 'Added On:- '.mysql2date( 'l, F j, Y', $comment->comment_date) ;?>
                <br>
                <?php echo 'Content:- '.$comment->comment_content;?>
            </div>
            <?php
        }
    }else{
        echo '<div class="author-posts"> This author Has not Have Any Comment</div>';
    }

    ?>
    </div>
</div>



<?php get_footer();?>