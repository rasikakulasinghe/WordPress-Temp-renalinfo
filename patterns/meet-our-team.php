<?php
/**
 * Title: Section: Meet Our Team
 * Slug: renalinfolk/section-meet-team
 * Categories: renalinfolk_medical_pages
 * Description: A grid of medical specialists with photos and bios.
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"background-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    
    <!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
    <div class="wp-block-group">

        <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.5px","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"bottom":"10px"}}},"textColor":"green-blue","fontSize":"small"} -->
        <h2 class="wp-block-heading has-text-align-center has-green-blue-color has-text-color has-small-font-size" style="font-style:normal;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:10px">
            <?php echo esc_html_x( 'World-Class Care', 'Section subtitle', 'renalinfolk' ); ?>
        </h2>
        <!-- /wp:heading -->

        <!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"top":"0px","bottom":"20px"}},"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"xx-large"} -->
        <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="font-style:normal;font-weight:800;margin-top:0px;margin-bottom:20px">
            <?php echo esc_html_x( 'Meet Our Specialists', 'Section title', 'renalinfolk' ); ?>
        </h2>
        <!-- /wp:heading -->

        <!-- wp:separator {"align":"center","style":{"layout":{"selfStretch":"fixed","flexSize":"60px"}},"backgroundColor":"green-blue","className":"is-style-default"} -->
        <hr class="wp-block-separator aligncenter is-style-default has-green-blue-background-color has-background" style="width:60px"/>
        <!-- /wp:separator -->

        <!-- wp:spacer {"height":"var:preset|spacing|50"} -->
        <div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:columns {"style":{"spacing":{"blockGap":"30px"}}} -->
        <div class="wp-block-columns">
            
            <!-- Doctor 1 -->
            <!-- wp:column {"style":{"border":{"radius":"16px","width":"1px"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"base","borderColor":"background-light"} -->
            <div class="wp-block-column has-border-color has-background-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&q=80&w=600&h=700" alt="Dr. Sarah Jenkins" style="aspect-ratio:1;object-fit:cover"/>
                </figure>
                <!-- /wp:image -->
                
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px","bottom":"24px","top":"24px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px">
                    <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"0px","top":"0px"}}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem;font-weight:700;margin-top:0px;margin-bottom:0px"><?php echo esc_html__( 'Dr. Sarah Jenkins', 'renalinfolk' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}},"textColor":"green-blue"} -->
                    <p class="has-text-align-center has-green-blue-color has-text-color" style="font-size:0.9rem;font-weight:600;margin-top:0"><?php echo esc_html__( 'Chief Cardiologist', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"20px"}}},"textColor":"text-light"} -->
                    <p class="has-text-align-center has-text-light-color has-text-color" style="font-size:0.95rem;line-height:1.6;margin-bottom:20px"><?php echo esc_html__( 'Dr. Jenkins leads our heart center with over 15 years of experience in complex cardiac procedures.', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"textColor":"green-blue","style":{"border":{"radius":"50px","width":"1px"}},"borderColor":"green-blue","className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-green-blue-color has-text-color has-border-color has-green-blue-border-color" style="border-width:1px;border-radius:50px"><?php echo esc_html__( 'View Profile', 'renalinfolk' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- Doctor 2 -->
            <!-- wp:column {"style":{"border":{"radius":"16px","width":"1px"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"base","borderColor":"background-light"} -->
            <div class="wp-block-column has-border-color has-background-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=600&h=700" alt="Dr. James Wilson" style="aspect-ratio:1;object-fit:cover"/>
                </figure>
                <!-- /wp:image -->
                
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px","bottom":"24px","top":"24px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px">
                    <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"0px","top":"0px"}}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem;font-weight:700;margin-top:0px;margin-bottom:0px"><?php echo esc_html__( 'Dr. James Wilson', 'renalinfolk' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}},"textColor":"green-blue"} -->
                    <p class="has-text-align-center has-green-blue-color has-text-color" style="font-size:0.9rem;font-weight:600;margin-top:0"><?php echo esc_html__( 'Senior Neurologist', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"20px"}}},"textColor":"text-light"} -->
                    <p class="has-text-align-center has-text-light-color has-text-color" style="font-size:0.95rem;line-height:1.6;margin-bottom:20px"><?php echo esc_html__( 'Specializing in advanced brain mapping and minimally invasive neurological treatments.', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"textColor":"green-blue","style":{"border":{"radius":"50px","width":"1px"}},"borderColor":"green-blue","className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-green-blue-color has-text-color has-border-color has-green-blue-border-color" style="border-width:1px;border-radius:50px"><?php echo esc_html__( 'View Profile', 'renalinfolk' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

             <!-- Doctor 3 -->
            <!-- wp:column {"style":{"border":{"radius":"16px","width":"1px"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"base","borderColor":"background-light"} -->
            <div class="wp-block-column has-border-color has-background-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large">
                    <img src="https://images.unsplash.com/photo-1594824476969-516f01d63b76?auto=format&fit=crop&q=80&w=600&h=700" alt="Dr. Emily Chen" style="aspect-ratio:1;object-fit:cover"/>
                </figure>
                <!-- /wp:image -->
                
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px","bottom":"24px","top":"24px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px">
                    <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"0px","top":"0px"}}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem;font-weight:700;margin-top:0px;margin-bottom:0px"><?php echo esc_html__( 'Dr. Emily Chen', 'renalinfolk' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}},"textColor":"green-blue"} -->
                    <p class="has-text-align-center has-green-blue-color has-text-color" style="font-size:0.9rem;font-weight:600;margin-top:0"><?php echo esc_html__( 'Head of Pediatrics', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"20px"}}},"textColor":"text-light"} -->
                    <p class="has-text-align-center has-text-light-color has-text-color" style="font-size:0.95rem;line-height:1.6;margin-bottom:20px"><?php echo esc_html__( 'Dedicated to providing compassionate, family-centered care for our youngest patients.', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"textColor":"green-blue","style":{"border":{"radius":"50px","width":"1px"}},"borderColor":"green-blue","className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-green-blue-color has-text-color has-border-color has-green-blue-border-color" style="border-width:1px;border-radius:50px"><?php echo esc_html__( 'View Profile', 'renalinfolk' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

             <!-- Doctor 4 -->
            <!-- wp:column {"style":{"border":{"radius":"16px","width":"1px"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"base","borderColor":"background-light"} -->
            <div class="wp-block-column has-border-color has-background-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large">
                    <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&q=80&w=600&h=700" alt="Dr. Michael Ross" style="aspect-ratio:1;object-fit:cover"/>
                </figure>
                <!-- /wp:image -->
                
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px","bottom":"24px","top":"24px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px">
                    <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"0px","top":"0px"}}}} -->
                    <h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem;font-weight:700;margin-top:0px;margin-bottom:0px"><?php echo esc_html__( 'Dr. Michael Ross', 'renalinfolk' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}},"textColor":"green-blue"} -->
                    <p class="has-text-align-center has-green-blue-color has-text-color" style="font-size:0.9rem;font-weight:600;margin-top:0"><?php echo esc_html__( 'Orthopedic Surgeon', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"20px"}}},"textColor":"text-light"} -->
                    <p class="has-text-align-center has-text-light-color has-text-color" style="font-size:0.95rem;line-height:1.6;margin-bottom:20px"><?php echo esc_html__( 'Expert in joint replacement and helping athletes recover peak performance.', 'renalinfolk' ); ?></p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"textColor":"green-blue","style":{"border":{"radius":"50px","width":"1px"}},"borderColor":"green-blue","className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-green-blue-color has-text-color has-border-color has-green-blue-border-color" style="border-width:1px;border-radius:50px"><?php echo esc_html__( 'View Profile', 'renalinfolk' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

        </div>
        <!-- /wp:columns -->

    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->