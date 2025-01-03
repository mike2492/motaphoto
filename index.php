<?php
get_header();
?>

<?php
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' => 'rand',
);
$hero = new WP_Query($args);
$args2 = array(
    'post_type' => 'photo',
    'posts_per_page' => 8,
);
$photos = new WP_Query($args2);
?>

<?php if($hero->have_posts()): ?>
    <div class="hero">
        <?php while($hero->have_posts()) : $hero->the_post(); ?>
            <?= the_post_thumbnail(); ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php if($photos->have_posts()): ?>
    <div class="liste-hero">
        <?php while($photos->have_posts()) : $photos->the_post(); ?>
            <?= get_template_part('templates_part/photo_block'); ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php
get_footer();
?>