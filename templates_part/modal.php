<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
    <div class="modal-content">
        <span class="btn-close">&times;</span>
        <img src="<?= get_stylesheet_directory_uri() . '/img/contact-header.png' ?>" alt="Image contact header" class="contact-header">
        <?= do_shortcode('[contact-form-7 id="87b0e7e" title="Formulaire de contact"]'); ?>
    </div>

</div>