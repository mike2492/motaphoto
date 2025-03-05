<?php
get_header();
?>

<?php
$post = get_post();
$prev_post = get_previous_post();
$next_post = get_next_post();
$fields = get_field_objects($post->ID);
$categorie = get_the_terms($post->ID, 'categorie');
$format = get_the_terms($post->ID, 'format');
$single = new WP_Query([
    'post_type' => 'photo',
    'p' => $post->ID,
]);
$prev = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'order' => 'DESC',
]);
$next = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'order' => 'ASC',
]);
?>

<?php if($single->have_posts()): ?>
    <div class="single">
        <?php while($single->have_posts()) : $single->the_post(); ?>
            <div class="photo-infos">
                <h2><?= the_title(); ?></h2>
                <p><?= $fields['reference']['label']; ?> : <span class="reference"><?= $fields['reference']['value']; ?></span></p>
                <p><?= $categorie[0]->taxonomy; ?> : <?= $categorie[0]->name; ?></p>
                <p><?= $format[0]->taxonomy; ?> : <?= $format[0]->name; ?></p>
                <p><?= $fields['type']['label']; ?> : <?= $fields['type']['value']; ?></p>
                <p>Année : <?= get_the_date('Y'); ?></p>
            </div>
            <div class="photo">
                <?= the_post_thumbnail(); ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<div class="bottom-bar">
    <div class="bottom-contact">
        <p>Cette photo vous intéresse ?</p>
        <button class="btn-contact-2">Contact</button>
    </div>
    <div class="bottom-navigation">
        <div class="images">
            <?php if(empty($prev_post)): ?>
                <?php if($prev->have_posts()): ?>
                    <?php while($prev->have_posts()) : $prev->the_post(); ?>
                        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" class="prevImg">
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <img src="<?= get_the_post_thumbnail_url($prev_post->ID); ?>" alt="" class="prevImg">
            <?php endif; ?>

            <?php if(empty($next_post)): ?>
                <?php if($next->have_posts()): ?>
                    <?php while($next->have_posts()) : $next->the_post(); ?>
                        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="" class="nextImg">
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <img src="<?= get_the_post_thumbnail_url($next_post->ID); ?>" alt="" class="nextImg">
            <?php endif; ?>

            <img src="" alt="" class="currentImg">
        </div>
        <div class="arrows">
            <?php if(empty($prev_post)): ?>
                <?php if($prev->have_posts()): ?>
                    <?php while($prev->have_posts()) : $prev->the_post(); ?>
                        <a class="prev" href="<?= get_permalink(); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/back.png' ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <a class="prev" href="<?= get_permalink($prev_post->ID); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/back.png' ?>" alt=""></a>
            <?php endif; ?>

            <?php if(empty($next_post)): ?>
                <?php if($next->have_posts()): ?>
                    <?php while($next->have_posts()) : $next->the_post(); ?>
                        <a class="next" href="<?= get_permalink(); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/next.png' ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <a class="next" href="<?= get_permalink($next_post->ID); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/next.png' ?>" alt=""></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>