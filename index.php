<?php
get_header();
?>

<?php
$hero = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' => 'rand',
]);

$photos = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => -1,
]);
?>

<?php if($hero->have_posts()): ?>
    <div class="hero">
        <?php while($hero->have_posts()) : $hero->the_post(); ?>
            <?= the_post_thumbnail(); ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php if($photos->have_posts()): ?>
    <div class="liste-photos">
        <?php while($photos->have_posts()) : $photos->the_post(); ?>
            <?= get_template_part('templates_part/photo_block'); ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php
get_footer();
?>