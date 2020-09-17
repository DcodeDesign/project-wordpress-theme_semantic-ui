<div class="header-home">
    <div class="ui inverted vertical masthead center aligned segment header-home">
        <?php
        the_custom_logo();

        if (is_front_page() && is_home()) :
        ?>
            <div class="ui text container labels-home">
                <!--
            <h1 class="ui inverted header">
                <?php bloginfo('name'); ?>
            </h1>
            <h2>
                <?php bloginfo('description'); ?>
            </h2>
            -->
                <h2> Catégories : </h2>
                <div class="ui blue labels">
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ));

                    foreach ($categories as $key => $category) {
                        $b = '<a class="ui  label" href="' . get_category_link($category) . '">' . $category->name . '</a>';
                        echo $b;
                    }
                    ?>
                </div>
            </div>
        <?php
        else :
        ?>
        <?php
        endif;
        ?>
    </div>
</div>