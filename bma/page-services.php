<?php
/*
Template Name: Services
*/

get_header();
?>
<?php 
    get_template_part('/components/hero', 'hero-component');
?>

<?php
$services_group = get_field('services_group');
$services = $services_group['services'];
?>

<main id="main-content">
    <div class="container services">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <?php get_template_part('/components/main-title', 'main-title'); ?>
                <div class="services-items">

                    <?php foreach ($services as $service): ?>
                    <div class="services-item">
                        <div class="services-item_description" data-aos="fade-left">
                            <h2 class="services-item_description-title">
                                <?php echo $service['service_title'] ?>
                                <svg class="title-icon" viewBox="0 0 29 16" width="29" height="16">
                                    <use xlink:href="#green-leaf" />
                                </svg>
                            </h2>
                            <?php echo $service['service_description'] ?>
                        </div>
                        <div class="services-item_icon" data-aos="fade-right">
                            <img src="<?php echo $service['service_icon']['url'] ?>" alt="">
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="services-catch">
                    <h2 class="services-catch_title" data-aos="fade-up"><?php echo $services_group['services_end_question'] ?></h2>
                    <a href="<?php echo $services_group['service_button_link']['url'] ?>"
                        class="cta-button uppercase" data-aos="fade-up"><?php echo $services_group['service_button_label'] ?></a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>