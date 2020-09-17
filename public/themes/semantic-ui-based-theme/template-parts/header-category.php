<div class="header-home">
    <div class="ui inverted vertical masthead center aligned segment header-home">
        <div class="page-title">
            <h4 class="header-page ">Catégorie :</h4>
            <h1 class="ui horizontal divider" style="color:white;">
                <?php
                    $category = get_the_category();
                    echo $category[0]->cat_name;
                ?>
            </h1>
        </div>
    </div>
</div>

