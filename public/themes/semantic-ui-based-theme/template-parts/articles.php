<div class="ui container-cards">
    <div class="ui link cards stackable centered container">
        <?php
        if (have_posts()) :
            /* Start the Loop */
            while (have_posts()) :
                the_post();
        ?>
                <div class="ui card cards-<?php the_ID(); ?>">
                    <div class="image">
                        <img style="width:100%;" src="<?php the_post_thumbnail_url(); ?>" />
                    </div>
                    <?php
                    if (has_post_thumbnail()) {
                    ?>
                        <div class="title header">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title('<h2 class="entry-title"><i class="linkify icon"></i>', '</h2>'); ?>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="content">
                        <?php
                        if (!has_post_thumbnail()) {
                        ?>
                            <div class="header">
                                <?php the_title('<h2 class="entry-title"><i class="linkify icon"></i>', '</h2>'); ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="meta">
                            <span class="date">
                                <?php
                                semantic_ui_based_theme_posted_on();
                                ?>
                            </span>
                            
                        </div>
                        <h4 class="ui horizontal divider">
                            Description
                        </h4>
                        <div class="description">
                            <?php the_excerpt() ?>
                        </div>
                        <h4 class="ui horizontal divider">
                            Catégories
                    </h4>
                    
                        <?php
                        $post_cat = wp_get_post_categories(get_the_ID());
                        foreach ($post_cat as $key => $category) {
                            $b = '<a class="ui label" href="' . get_category_link($category) . '">' . get_category($category)->name . '</a>';
                            echo $b;
                        }
                        ?>
                    </div>
                   
                    
                </div>
        <?php
            endwhile;

            get_template_part('template-parts/posts', 'navigation');

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </div>
</div>