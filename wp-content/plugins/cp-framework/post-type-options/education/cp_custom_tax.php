<?php
class cp_custom_tax_class {
    var $taxonomy = 'courses-category';

    function __construct() {
        // Add extra field(s) to the taxonomy
        add_action( $this->taxonomy . '_edit_form_fields', array( $this, 'extra_edit_tax_fields' ), 10, 1 );
        add_action( $this->taxonomy . '_add_form_fields', array( $this, 'extra_add_tax_fields' ), 10, 1 );
        add_action( 'add_' . $this->taxonomy, array( $this, 'save_extra_taxonomy_fields' ), 10, 1 );
        add_action( 'edit_' . $this->taxonomy, array( $this, 'save_extra_taxonomy_fields' ), 10, 1 );
    }

    function extra_edit_tax_fields( $tag ) {
        if ( isset( $tag ) && is_object( $tag ) ) {
            $t_id = $tag->term_id;
            $term_meta = get_option( "taxonomy_$t_id" );
        }
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="custom_field"><?php _e('Category Icon'); ?></label></th>
            <td>
                <input type="text" name="term_meta[custom_field]" id="term_meta[custom_field]" value="<?php echo isset($term_meta) && esc_attr($term_meta['custom_field']) ? esc_attr($term_meta['custom_field']) : ''; ?>">
                <p class="description"><?php _e( 'Please enter font awesome icon class name eg: fa fa-lock','crunchpress' ); ?></p>
            </td>
        </tr>
        <?php
    }

    function extra_add_tax_fields($tag) {
        if (isset($tag) && is_object($tag)) {
            $t_id = $tag->term_id;
            $term_meta = get_option("taxonomy_$t_id");
        }
        ?>
        <div class="form-field">
            <label for="custom_field"><?php _e('Category Icon'); ?></label>
            <input type="text" name="term_meta[custom_field]" id="term_meta[custom_field]" value="<?php echo isset($term_meta) && esc_attr($term_meta['custom_field']) ? esc_attr($term_meta['custom_field']) : ''; ?>">
            <p class="description"><?php _e( 'Please enter font awesome icon class name eg: fa fa-lock','crunchpress' ); ?></p>
        </div>
        <?php
    }

    function save_extra_taxonomy_fields($term_id) {
        if (isset($_POST['term_meta'])) {
            $t_id = $term_id;
            $term_meta = get_option("taxonomy_$t_id");
            $cat_keys = array_keys($_POST['term_meta']);
            foreach ($cat_keys as $key) {
                if (isset($_POST['term_meta'][$key])) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            update_option("taxonomy_$t_id", $term_meta);
        }
    }
}
$cp_custom_tax_class = new cp_custom_tax_class;