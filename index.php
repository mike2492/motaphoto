<?php
get_header();
?>

<?php
$hero = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' => 'rand',
]);
?>

<?php if($hero->have_posts()): ?>
    <div class="hero">
        <?php while($hero->have_posts()) : $hero->the_post(); ?>
            <?= the_post_thumbnail(); ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php
get_footer();
?>