<?php
get_header();
?>

<?php
$post = get_post();
$prev_post = get_previous_post();
$next_post = get_next_post();
$categorie = get_the_terms($post->ID, 'categorie');
$format = get_the_terms($post->ID, 'format');
$fields = get_field_objects($post->ID);
$args = array(
    'post_type' => 'photo',
    'p' => $post->ID,
);
$single = new WP_Query($args);
$args2 = array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'order' => 'DESC',
);
$q2 = new WP_Query($args2);
$args3 = array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'order' => 'ASC',
);
$q3 = new WP_Query($args3);
$args4 = array(
    'post_type' => 'photo',
    'posts_per_page' => 2,
    'post__not_in' => array($post->ID),
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => $categorie[0]->taxonomy,
            'field' => 'slug',
            'terms' => $categorie[0]->name,
        ),
    ),
);
$photos = new WP_Query($args4);
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
                <?php if($q2->have_posts()): ?>
                    <?php while($q2->have_posts()) : $q2->the_post(); ?>
                        <img src="<?= get_the_post_thumbnail_url();  ?>" alt="" class="prevImg">
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <img src="<?= get_the_post_thumbnail_url($prev_post->ID); ?>" alt="" class="prevImg">
            <?php endif; ?>

            <?php if(empty($next_post)): ?>
                <?php if($q3->have_posts()): ?>
                    <?php while($q3->have_posts()) : $q3->the_post(); ?>
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
                <?php if($q2->have_posts()): ?>
                    <?php while($q2->have_posts()) : $q2->the_post(); ?>
                        <a class="prev" href="<?= get_permalink(); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/back.png' ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <a class="prev" href="<?= get_permalink($prev_post->ID); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/back.png' ?>" alt=""></a>
            <?php endif; ?>

            <?php if(empty($next_post)): ?>
                <?php if($q3->have_posts()): ?>
                    <?php while($q3->have_posts()) : $q3->the_post(); ?>
                        <a class="next" href="<?= get_permalink(); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/next.png' ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else: ?>
                <a class="next" href="<?= get_permalink($next_post->ID); ?>"><img src="<?= get_stylesheet_directory_uri() . '/img/next.png' ?>" alt=""></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<h3 class="third-title">Vous aimerez aussi</h3>

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