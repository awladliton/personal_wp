<?php
/**
 * Template Name: Reviews
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                    $args = ['post_type' => 'game'];
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) : while( $the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $date = get_field('date', false, false);
                        // make date object
                        $date = new DateTime($date);
                        ?>
                        Date- <em><?php echo $date->format('j M Y'); ?></em>
                        <h2><a href="<?php the_permalink()?>"><?php the_title();?> </a></h2>
                        <h4><?php the_field('developer'); ?></h4>
                        <?php the_post_thumbnail();?>
                        <?php the_excerpt();?>
                    <?php
                    endwhile; // End of the loop.
                    endif;
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();?>