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
                    <div class="row">
                        <div class="col-12 mb-4">
                            <article class="card article-card">
                                <a href="article.html">
                                    <div class="card-image">
                                        <div class="post-info"> <span class="text-uppercase">04 Jun 2021</span>
                                            <span class="text-uppercase">3 minutes read</span>
                                        </div>
                                        <img loading="lazy" decoding="async" src=" <?php echo get_template_directory_uri();?>/images/post/post-1.jpg" alt="Post Thumbnail" class="w-100">
                                    </div>
                                </a>
                                <div class="card-body px-0 pb-1">
                                    <ul class="post-meta mb-2">
                                        <li> <a href="#!">travel</a>
                                            <a href="#!">news</a>
                                        </li>
                                    </ul>
                                    <h2 class="h1"><a class="post-title" href="article.html">Is it Ethical to Travel Now?
                                            With that Freedom Comes Responsibility.</a></h2>
                                    <p class="card-text">Heading Here is example of hedings. You can use this heading by following markdownify rules. For example: use # for heading 1 and use ###### for heading 6.</p>
                                    <div class="content"> <a class="read-more-btn" href="article.html">Read Full Article</a>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <?php
                        if (have_posts()){
                            while (have_posts()) : the_post();
                        ?>
                        <div class="col-md-6 mb-4">
                            <article class="card article-card article-card-sm h-100">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="card-image">
                                        <div class="post-info">
                                            <span class="text-uppercase"><?php the_time('d M Y'); ?></span>
<!--                                            <span class="text-uppercase">--><?php //echo estimated_reading_time(get_the_content()); ?><!--</span>-->
                                        </div>
                                        <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('full', array('loading' => 'lazy', 'decoding' => 'async', 'class' => 'w-100', 'alt' => 'Post Thumbnail'));
                                            }
                                        ?>
                                    </div>
                                </a>
                                <div class="card-body px-0 pb-0">
                                    <ul class="post-meta mb-2">
                                        <?php
                                        foreach((get_the_category()) as $category) {
                                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->cat_name . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                    <h2><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <div class="content"><a class="read-more-btn" href="<?php the_permalink(); ?>">Read Full Article</a></div>
                                </div>
                            </article>
                        </div>
                        <?php
                                endwhile;
                            }
                        else{
                            echo "<h3>No Post Found</h3>";
                        }
                        ?>
                    </div>
                </div>

                <!-- sidebar-->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>