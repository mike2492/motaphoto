<?php get_header(); ?>

<?php
$post = get_post();
$next_post = get_next_post();
$prev_post = get_previous_post();
$photo = new WP_Query([
    'post_type' => 'photo',
    'p' => $post->ID,
]);
$fields = get_field_objects($post->ID);
$categorie = get_the_terms($post->ID, 'categorie');
$format = get_the_terms($post->ID, 'format');
$next = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'order' => 'ASC',
]);
$prev = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'order' => 'DESC',
]);
?>

<?php if($photo->have_posts()): ?>
    <?php while($photo->have_posts()) : $photo->the_post(); ?>
        <div class="single">
            <div class="photo-infos">
                <h2><?= the_title(); ?></h2>
                <p><?= $fields['reference']['label']; ?> : <span class="reference"><?= $fields['reference']['value']; ?></span></p>
                <p><?= $categorie[0]->taxonomy; ?> : <?= $categorie[0]->name; ?><p>
                <p><?= $format[0]->taxonomy; ?> : <?= $format[0]->name; ?></p>
                <p><?= $fields['type']['label']; ?> : <?= $fields['type']['value']; ?></p>
                <p>Année : <?= get_the_date('Y'); ?></p>
            </div>
            <div class="photo">
                <?= the_post_thumbnail(); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<div class="bottom-bar">
    <div class="bottom-contact">
        <p>Cette photo vous intéresse</p>
        <button class="btn-contact-2">Contact</button>
    </div>
    <div class="bottom-navigation">
        <div class="images">
            <?php if(empty($prev_post)): ?>
                <?php if($prev->have_posts()): ?>
                    <?php while($prev->have_posts()) : $prev->the_post(); ?>
                        <img class="prevImg" src="<?= get_the_post_thumbnail_url($prev->ID); ?>" alt="">
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <img class="prevImg" src="<?= get_the_post_thumbnail_url($prev_post); ?>" alt="">
            <?php endif; ?>

            <?php if(empty($next_post)): ?>
                <?php if($next->have_posts()): ?>
                    <?php while($next->have_posts()) : $next->the_post(); ?>
                        <img class="nextImg" src="<?= get_the_post_thumbnail_url($next->ID); ?>" alt="">
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <img class="nextImg" src="<?= get_the_post_thumbnail_url($next_post); ?>" alt="">
            <?php endif; ?>

            <img src="" alt="" class="currentImg">
        </div>
        <div class="arrows">
            <?php if(empty($prev_post)): ?>
                <?php if($prev->have_posts()): ?>
                    <?php while($prev->have_posts()) : $prev->the_post(); ?>
                        <a class="prev" href="<?= get_permalink($prev->ID); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/back.png' ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <a class="prev" href="<?= get_permalink($prev_post); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/back.png' ?>" alt=""></a>
            <?php endif; ?>

            <?php if(empty($next_post)): ?>
                <?php if($next->have_posts()): ?>
                    <?php while($next->have_posts()) : $next->the_post(); ?>
                        <a class="next" href="<?= get_permalink($next->ID); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/next.png' ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
               <a class="next" href="<?= get_permalink($next_post); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/next.png' ?>" alt=""></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>