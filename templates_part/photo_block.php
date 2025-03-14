<?php $cat = get_the_terms($post->ID, 'categorie'); ?>

<div class="bloc-photo">
    <?= the_post_thumbnail(); ?>
    <div class="overlay">
        <p class="overlay-title"><?= the_title(); ?></p>
        <p class="overlay-categorie"><?= $cat[0]->name; ?></p>
        <a href="<?= get_permalink(); ?>"><img class="eye-icon" src="<?= get_stylesheet_directory_uri() . '/img/eye-icon.png' ?>" alt=""></a>
        <a href="<?= get_the_post_thumbnail_url(); ?>"><img class="full-screen" src="<?= get_stylesheet_directory_uri() . '/img/full-screen.png' ?>" alt=""></a>
    </div>
</div>