
<!DOCTYPE html>
<html <?php language_attributes();?>>>

<head>
    <meta charset="<?php bloginfo('charset');?>>">
    <title><?php bloginfo('name');?>></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="joySuperman">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" type="image/x-icon">

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head();?>
</head>

<body <?php body_class(); ?> >