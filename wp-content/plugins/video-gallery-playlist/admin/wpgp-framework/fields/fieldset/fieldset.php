<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: fieldset
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! class_exists( 'WPGP_Field_fieldset' ) ) {
  class WPGP_Field_fieldset extends WPGP_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      echo $this->field_before();

      echo '<div class="wpgp-fieldset-content">';

      foreach ( $this->field['fields'] as $field ) {

        $field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
        $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
        $field_value   = ( isset( $this->value[$field_id] ) ) ? $this->value[$field_id] : $field_default;
        $unique_id     = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .']' : $this->field['id'];

        WPGP::field( $field, $field_value, $unique_id, 'field/fieldset' );

      }

      echo '</div>';

      echo $this->field_after();

    }

  }
}
