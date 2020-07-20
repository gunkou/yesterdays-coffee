<?php
/**
 * yesterdays-coffee Theme Customizer comment
 *
 * @package yesterdays-coffee
 */

function yesterdays_coffee_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? 'parent' : '', $comment ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                                /* translators: 1: Comment date, 2: Comment time. */
                                printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                            ?>
                        </time>
                    </a>
                    <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .comment-metadata -->
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <?php $fields = get_fields($comment); if( $fields ): ?>
                <ul>
                    <?php foreach( $fields as $name => $value ): ?>
                        <?php
                            $field = get_field_object($name, $comment);
                            $label = esc_html($field['label']);
                            $unit = esc_html($field['append']);
                            if ($field['type'] === 'select'){
                                $val = esc_html($field['choices'][ $field['value'] ]);
                            } else {
                                $val = esc_html($field['value']);
                            }
                        ?>
                        <li>
                            <span><?php echo $label; ?></span>
                            <span><?php echo $val; ?></span>
                            <span><?php echo $unit; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </article><!-- .comment-body -->
  <?php
}