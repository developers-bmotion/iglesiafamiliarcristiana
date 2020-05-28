<?php

$wpgpyt_subscribe_id     = wpgp_get_options( 'wpgpyt_subscribe_id' );
$wpgpyt_subscribe_layout = wpgp_get_options( 'wpgpyt_subscribe_layout' );
$wpgpyt_subscribe_count  = wpgp_get_options( 'wpgpyt_subscribe_count' );

wp_enqueue_script( 'wpgpyt--google-apis-platform', 'https://apis.google.com/js/platform.js', array(), $this->version, false );

echo '<div id="wpgpyt--ytsubscribe">
        <div class="g-ytsubscribe" data-channelid="' . esc_attr( $wpgpyt_subscribe_id ) . '" data-layout="' . esc_attr( $wpgpyt_subscribe_layout ) . '" data-count="' . esc_attr( $wpgpyt_subscribe_count ) . '">
        </div>
    </div>';
