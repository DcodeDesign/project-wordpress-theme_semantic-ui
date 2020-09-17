<div class="container-ui-grid content-navigation-posts">
    <div class="ui grid">
        <?php
        the_posts_navigation(
            array(
                'screen_reader_text' => ' ',
                'prev_text' =>
                '<div class="left floated right aligned six wide column ui animated button" tabindex="0">
                    <div class="visible content"> ' . esc_html__('', 'semantic_ui_based_theme') . 'Articles plus ancien</div>
                        <div class="hidden content">
                            <i class="left arrow icon"></i>
                        </div>
                </div>',
                'next_text' => '
                    <div class="right floated left aligned six wide column ui animated button" tabindex="0">
                        <div class="visible content">'  . esc_html__('', 'semantic_ui_based_theme') . 'Articles plus récent</div>
                        <div class="hidden content">
                            <i class="right arrow icon"></i>
                        </div>
                    </div>'
            )
        );
        ?>
    </div>
</div>