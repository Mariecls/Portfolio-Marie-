<?php
/*
    Template Name: Clients 
    */

$clients = get_field('clients');
get_header();
?>

<main id="main-content">

    <?php get_template_part('/components/hero', 'hero-component'); ?>

    <div class="container clients">
        <div class="row w-100 mx-0">
            <div class="col-lg-12 p-0">
                <?php get_template_part('/components/main-title', 'main-title'); ?>

                <div class="row w-100 mx-0">
                    <?php foreach( $clients as $item ) { ?>
                    <div class="col-6 col-lg-4 col-xl-3 clients-item" data-aos="fade-down">
                        <div class="clients-item_content">
                            <img class="clients-item_image" src="<?php echo $item['logo_client']['url']; ?>" alt="<?php echo $item['logo_client']['alt']; ?>">
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
</main>
<?php get_footer() ?>