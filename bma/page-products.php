<?php
/*
Template Name: Products
*/

get_header();
?>
<?php 
    get_template_part('/components/hero', 'hero-component');
?>

<?php 
$products_group = get_field('products_group');
$products_group_products = $products_group['products'];
$products_group_buttons = $products_group['products_buttons'];
?>
<main id="main-content">
    <div class="products-global">
        <div class="products-sticky" data-aos="fade-right">
            <ul class="products-sticky-list">
                <?php foreach ($products_group_products as $products_group_product): ?>
                <li class="products-sticky-list_item">
                    <a href="#<?php echo sanitize_title($products_group_product['product_name']); ?>">
                        <?php echo $products_group_product['product_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 offset-lg-2">
                    <?php get_template_part('/components/main-title', 'main-title'); ?>
                    <div class="products">
                        <?php foreach ($products_group_products as $products_group_product): ?>
                        <div class="products-item"
                            id="<?php echo sanitize_title($products_group_product['product_name']); ?>" data-aos="fade-up">
                            <figure
                                class="products-item-image-container <?php echo $products_group_product['product_image'] ? '' : 'empty' ?>">

                                <?php if($products_group_product['product_image']['url']): ?>
                                <img src="<?php echo $products_group_product['product_image']['sizes']['medium_large'] ?>"
                                    alt="<?php echo $products_group_product['product_image']['alt'] ?>"
                                    class="products-item-image">
                                <?php endif;?>
                            </figure>
                            <h2 class="products-item-title"><?php echo $products_group_product['product_name']; ?></h2>
                        </div>
                        <?php endforeach; ?>
                    </div>
    
                    <div class="cta-buttons-container" data-aos="fade-up">
                        <?php
                            foreach($products_group_buttons as $products_group_button):
                            if ($products_group_button['button_link']):
                        ?>
                        <a href="<?php echo $products_group_button['button_link']['url'] ?>" class="cta-button inline uppercase">
                            <?php echo $products_group_button['button_label'] ?>
                        </a>
                        <?php
                            endif;
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer()
?>