<?php
/*
    Template Name: Engagements
    */

$rse_engagements = get_field('rse_engagements');
$rse_engagements_content = $rse_engagements['engagement_content'];

get_header();
?>

<style>
:root {

    <?php $index=1;
    foreach ($rse_engagements_content as $rse_engagement_content): ?> --my-word-to-call-<?php echo $index ?>: '<?php echo $rse_engagement_content['engagement_title'] ?>';
    <?php $index++;
    endforeach;
    ?>
}
</style>

<main id="main-content">
    <?php get_template_part('/components/hero', 'hero-component'); ?>
    <div class="container engagements">
        <div class="row">
            <div class="col-12 col-lg-11 offset-lg-1">
                <?php get_template_part('/components/main-title', 'main-title'); ?>
            </div>
            <?php
            $index = 1;
            foreach ($rse_engagements_content as $rse_engagement_content): ?>
            <div
                class="col-12 col-lg-8 engagements-col <?php if ($index%2):?>offset-lg-3<?php endif; ?> engagements-col-<?php echo $index ?>"  <?php if ($index%2){ echo 'data-aos="fade-right"'; } else { echo 'data-aos="fade-left"'; } ?>>
                <div class="engagements-item">
                    <h2 class="engagements-item-title"><?php echo $rse_engagement_content['engagement_title'] ?></h2>
                    <div class="engagements-item-content">
                        <?php $rse_engagement_logos = $rse_engagement_content['logos_engagement'];?>
                        <div class="engagements-item_list">
                            <ul>
                                <?php foreach($rse_engagement_logos as $rse_engagement_logo): ?>
                                <li>
                                    <img src="<?php echo $rse_engagement_logo['logo_engagement']['url']?>"
                                        alt="<?php echo $rse_engagement_logo['logo_engagement']['alt']?>"
                                        width='<?php echo $rse_engagement_logo['logo_width']?>'>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="engagements-item_description">
                            <?php echo $rse_engagement_content['engagement_description'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $index++;
            endforeach; ?>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="<?php echo $rse_engagements['engagement_button_link']['url'] ?>" class="cta-button uppercase">
                    <?php echo $rse_engagements['engagement_button_label'] ?>
                </a>
            </div>
        </div>
</main>

<?php get_footer() ?>