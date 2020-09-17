<div class="header-home">
    <div class="ui inverted vertical masthead center aligned segment header-home">
        <div class="page-title">
            <h4>Résultat de la recherche pour :</h4>
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( '%s', 'semantic_ui_based_theme' ), '<h1>' . get_search_query() . '</h1>' );
            ?>
        </div>
    </div>
</div>