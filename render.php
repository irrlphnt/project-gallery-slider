<?php
/**
 * Render callback for the Project Gallery Slider block.
 *
 * @param array $attributes Block attributes passed from Gutenberg.
 * @param string $content   Inner block content (unused).
 * @param WP_Block $block   Block instance.
 *
 * @return string HTML markup for the slider.
 */

if ( ! function_exists( 'pgs_render_callback' ) ) :
    function pgs_render_callback( $attributes, $content, $block ) {
        $height = isset( $attributes['height'] ) ? intval( $attributes['height'] ) : 0;
        $autoplay = isset( $attributes['autoplayDelay'] ) ? intval( $attributes['autoplayDelay'] ) : 0;
        $show_caption = ! empty( $attributes['showCaption'] );
        $show_nav = ! empty( $attributes['showNav'] );
        $caption_pos = isset( $attributes['captionPos'] ) ? $attributes['captionPos'] : 'bottom';
        $caption_bg = isset( $attributes['captionBg'] ) ? $attributes['captionBg'] : 'rgba(0,0,0,0.6)';
        $caption_text = isset( $attributes['captionText'] ) ? $attributes['captionText'] : '#ffffff';
        $caption_size = isset( $attributes['captionSize'] ) ? intval( $attributes['captionSize'] ) : 14;
        $caption_font = isset( $attributes['captionFont'] ) ? $attributes['captionFont'] : 'inherit';
        $field_key = isset( $attributes['fieldKey'] ) && $attributes['fieldKey'] ? $attributes['fieldKey'] : 'gallery';

        // Determine the current post ID.
        $post_id = 0;
        if ( isset( $block->context['postId'] ) ) {
            $post_id = (int) $block->context['postId'];
        } elseif ( get_the_ID() ) {
            $post_id = get_the_ID();
        }

        // Fetch the gallery field (expects Image Array return format).
        $images = [];
        if ( function_exists( 'get_field' ) ) {
            if ( $post_id ) {
                $images = get_field( $field_key, $post_id );
            }
            if ( empty( $images ) ) {
                // Fallback to global context (old ACF versions inside loops).
                $images = get_field( $field_key );
            }
        }

        if ( empty( $images ) || ! is_array( $images ) ) {
            return '<p class="pgs-no-images">No gallery images found.</p>';
        }

        // Begin output buffering.
        ob_start();
        ?>
        <div class="pgs-swiper swiper" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" style="<?php echo $height > 0 ? 'height:' . esc_attr( $height ) . 'px;' : ''; ?>">
            <div class="swiper-wrapper">
                <?php foreach ( $images as $img ) : ?>
                    <div class="swiper-slide">
                        <?php
                        $id = is_array( $img ) && isset( $img['ID'] ) ? $img['ID'] : $img;
                        echo wp_get_attachment_image( $id, 'large', false, [ 'class' => 'pgs-slide-img' ] );
                        if ( $show_caption ) {
                            $caption = wp_get_attachment_caption( $id );
                            $title   = get_the_title( $id );
                            $text    = $caption ? $caption : $title;
                            if ( $text ) {
                                echo '<span class="pgs-caption pgs-caption-' . esc_attr( $caption_pos ) . '" style="background-color:' . esc_attr( $caption_bg ) . ';color:' . esc_attr( $caption_text ) . ';font-size:' . esc_attr( $caption_size ) . 'px;font-family:' . esc_attr( $caption_font ) . ';">' . esc_html( $text ) . '</span>';
                            }
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ( $show_nav ) : ?>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        <?php endif; ?>
        <div class="swiper-pagination"></div>
        </div>
        <?php
        return ob_get_clean();
    }
endif;
