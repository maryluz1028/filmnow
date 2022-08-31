<?php
/*
Template Name:Generos
Template Post Type: post, page, event
*/
get_header();
?>
<div class="genders-list w-full bg-color-black">
    <div class="container">
        <div class="genders grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $genderslst=get_terms('genero',array('hide_empty'=>0,'parent'=>0));
            foreach ($genderslst as $gender) {
                ?>
                <article class="gender">
                    <div class="gender-container">
                        <a href="<?=  get_term_link($gender->term_id) ?>">
                            <div class="gender-name">
                                <h2 class="md:text-xl"><?= $gender->name; ?></h2>
                            </div>
                        </a>
                        <?php if(z_taxonomy_image_url($gender->term_id)){
                            ?>
                            <img class="gender-img" src="<?=z_taxonomy_image_url($gender->term_id) ;?>" alt="">
                            <?php
                        } 
                        else{
                            echo "Image";
                        }
                        ?>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
