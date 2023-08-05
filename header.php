<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset')?>"/>
        <title><?php
        wp_title( '|','true','right' );
         bloginfo("name");
          ?></title>
        <link rel="pingback" href="<?php bloginfo("pingback_url")?>"/>
        <script src="https://kit.fontawesome.com/271410b8eb.js" crossorigin="anonymous"></script>   
        <?php wp_head();?>
    </head>

<body>
    
<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php bloginfo( "url" )?>"><?php bloginfo( 'name' )?></a>
        <?php
            abdo_bootstrap_menu();
        ?>
    </div>
</nav>
