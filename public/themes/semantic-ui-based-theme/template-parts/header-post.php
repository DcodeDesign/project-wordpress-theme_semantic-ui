<header class="entry-header" style="border-top:1px solid white;">
    <div class="header-post">
        <div class="ui inverted vertical masthead segment">
                <?php
                if (has_post_thumbnail()) {
                ?>
                <div class="ui grid">
                    <div class="six wide column" style="margin:0;">
                        <div class="thumbnail-post">
                            <div class="gradient-post-effect">
                            </div>
                            <div class="bg-image-post" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                            </div>
                        </div>
                    </div>
                    <div class="ten wide column" style="margin:0;">
                        <div class="title header">
                            <!-- title -->
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                            <!-- posted on -->
                            <?php
                            if ('post' === get_post_type()) :
                            ?>
                                <div class="entry-meta">
                                    <?php
                                    semantic_ui_based_theme_posted_on();
                                    //semantic_ui_based_theme_posted_by();
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            }
                            ?>

                            <!-- label -->
                            <div class="label-post">
                                <?php
                                $post_cat = wp_get_post_categories(get_the_ID());
                                foreach ($post_cat as $key => $category) {
                                    $b = '<a class="ui label" href="' . get_category_link($category) . '">' . get_category($category)->name . '</a>';
                                    echo $b;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</header>