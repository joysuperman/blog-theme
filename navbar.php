<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="<?php home_url();?>">
                <img loading="prelaod" decoding="async" class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Reporter Hugo">
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
                        data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
                <input id="search-query" name="s" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">

                    <?php
                    $args = array(
                        'theme_location' => 'primary-menu', // Replace with your menu location
                        'container'      => false,
                        'items_wrap'     => '%3$s', // This removes the surrounding <ul> container
                        'fallback_cb'    => false, // Don't display anything if the menu doesn't exist
                        'menu_class'     => 'nav-item', // Add your custom class here
                        'walker'         => new Custom_Nav_Walker(), // Replace with your custom walker if needed
                    );
                    wp_nav_menu($args);
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
