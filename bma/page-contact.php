<?php
/*
Template Name: Contact
*/

get_header();
?>
<?php 
    get_template_part('/components/hero', 'hero-component');
?>

<?php
$bloc_contact = get_field('bloc_contact');
$localisations = get_field('localisations');
?>

<main id="main-content">
    <div class="container contact">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <?php get_template_part('/components/main-title', 'main-title'); ?>
                <div class="contact-blocks">
                    <?php 
                    $index = 1;
                    foreach ($bloc_contact as $contact_bloc): ?>

                    <div class="contact-block" 
                    <?php if ($index%2){ echo 'data-aos="fade-right"'; } else { echo 'data-aos="fade-left"'; }?>>
                        <?php if($contact_bloc['contact_block_icon']['url']): ?>
                        <span class="contact-block_icon">
                            <img src="<?php echo $contact_bloc['contact_block_icon']['url'] ?>" alt="">
                        </span>
                        <?php endif; ?>
                        <div class="contact-block_description">
                            <?php echo $contact_bloc['contact_block_content'] ?>
                        </div>
                        <button type="button" data-bs-toggle="modal"
                            data-bs-target="#<?php echo $contact_bloc['modal_id']?>-modal"
                            class="<?php echo $contact_bloc['modal_id'] === 'call' ? 'dark' : '' ?> cta-button">
                            <?php echo $contact_bloc['contact_block_button_label']; ?>
                        </button>
                    </div>
                    <?php 
                    $index++;
                    endforeach; ?>
                </div>

                <div class="contact-localisation">
                    <h2 class="contact-localisation_title">
                        <?php the_field('localisation_title');?>
                    </h2>
                </div>
                <div class="contact-localisations">
                    <?php foreach ($localisations as $localisation): ?>
                    <div class="contact-localisation" data-aos="fade-up">
                        <h3 class="contact-localisation-description_title">
                            <?php echo $localisation['nom_localisation'] ; ?>
                        </h3>
                        <div class="contact-localisation-description_adress">
                            <?php echo $localisation['adresse_localisation'] ; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</main>

<?php get_footer() ?>