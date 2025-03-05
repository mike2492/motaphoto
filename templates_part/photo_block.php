<?php $c = get_the_terms(get_the_ID(), 'categorie'); ?>

<div class="bloc-photo">
    <?= the_post_thumbnail(); ?>
    <div class="overlay">
        <p class="overlay-title"><?= the_title(); ?></p>
        <p class="overlay-categorie"><?= $c[0]->name; ?></p>
        <a href="<?= get_permalink(); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/eye-icon.png' ?>" alt="" class="eye-icon"></a>
        <a href="<?= get_the_post_thumbnail_url(); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/full-screen.png' ?>" alt="" class="full-screen"></a>
    </div>
</div>