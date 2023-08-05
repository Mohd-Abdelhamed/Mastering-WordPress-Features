<?php if(comments_open()){ ?>
    <h3 class="comemnt-count"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> </h3>
    
<?php
    $comments_arguments=array();
    
    wp_list_comments($comments_arguments);
    echo "<hr class='comment-seperator'>";

    // $comment_form_arguments=array
    // (
    //     'fields'=>array
    //     (
    //         'author ' => '<div class=""form-group"><label>Name</label> This is Name Field</div>',
    //         'email' => '<div class=""form-group"><label>Name</label> This is Email Field</div>',
    //         'url' => '<div class=""form-group"><label>Name</label> This is Url Field</div>',    
    //     ),
    //     'comment_field'=>'<div class="form-group">Textarea</div>',
    //     'label_submit' => '3B7AMEED POST'
    // );
    // comment_form($comment_form_arguments);
    comment_form();

}else{
    echo "Comments are close";
}
?>