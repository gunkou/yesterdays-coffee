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

           <ul>
            <?php
            if ( get_field('amount-beans', $comment) ):
              $amount_beans = get_field_object('amount-beans', $comment);
            ?>
              <li>
              <span><?php echo $amount_beans['label']; ?></span>
              <span><?php echo $amount_beans['value']; ?></span>
              </li>
            <?php endif; ?>
            <?php
            if ( get_field('grind-size', $comment) ):
              $grind_size = get_field_object('grind-size', $comment);
            ?>
              <li>
              <span><?php echo $grind_size['label']; ?></span>
              <span><?php echo $grind_size['choices'][ $grind_size['value'] ]; ?></span>
              </li>
            <?php endif; ?>
            <?php
            if ( get_field('temperature', $comment) ):
              $temperature = get_field_object('temperature', $comment);
            ?>
              <li>
              <span><?php echo $temperature['label']; ?></span>
              <span><?php echo $temperature['value']; ?></span>
              </li>
            <?php endif; ?>
            <?php
            if ( get_field('extraction-time', $comment) ):
              $extraction_time = get_field_object('extraction-time', $comment);
            ?>
              <li>
              <span><?php echo $extraction_time['label']; ?></span>
              <span><?php echo $extraction_time['value']; ?></span>
              </li>
            <?php endif; ?>
            <?php
            if ( get_field('extraction-amount', $comment) ):
              $extraction_amount = get_field_object('extraction-amount', $comment);
            ?>
              <li>
              <span><?php echo $extraction_amount['label']; ?></span>
              <span><?php echo $extraction_amount['value']; ?></span>
              </li>
            <?php endif; ?>
            <?php
            if ( get_field('input-amount', $comment) ):
              $input_amount = get_field_object('input-amount', $comment);
            ?>
              <li>
              <span><?php echo $input_amount['label']; ?></span>
              <span><?php echo $input_amount['value']; ?></span>
              </li>
            <?php endif; ?>
            <?php
            if ( get_field('steaming-time', $comment) ):
              $steaming_time = get_field_object('steaming-time', $comment);
            ?>
              <li>
              <span><?php echo $steaming_time['label']; ?></span>
              <span><?php echo $steaming_time['value']; ?></span>
              </li>
            <?php endif; ?>
            </ul>

        </article><!-- .comment-body -->
  <?php
}