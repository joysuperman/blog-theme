<?php get_header(); ?>
    <!--Navbar-->
<?php get_template_part('navbar'); ?>
    <!--Navbar-->
    <main>
        <section class="section">
            <div class="container">
                <div class="row no-gutters-lg">
                    <div class="col-12">
                        <h2 class="section-title">Latest Articles</h2>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <article>
                            <?php
                            if (have_posts()){
                                while (have_posts()) : the_post();
                                    ?>

                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', array('loading' => 'lazy', 'decoding' => 'async', 'class' => 'w-100', 'alt' => 'Post Thumbnail'));
                                    }
                                    ?>
                                    <ul class="post-meta mb-2 mt-4">
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
                                                <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"></path>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"></path>
                                                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"></path>
                                            </svg> <span><?php the_time('d M Y'); ?></span>
                                        </li>
                                    </ul>
                                    <h1 class="my-3"><?php the_title(); ?></h1>
                                    <ul class="post-meta mb-4">
                                        <?php
                                        foreach((get_the_category()) as $category) {
                                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->cat_name . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                    <div class="content text-left">
                                        <?php the_content(); ?>
                                    </div>
                                <?php
                                endwhile;
                            }
                            else{
                                echo "<h3>No Post Found</h3>";
                            }
                            ?>
                        </article>
                    </div>

                    <!-- sidebar-->
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
    </main>


<?php get_footer(); ?>