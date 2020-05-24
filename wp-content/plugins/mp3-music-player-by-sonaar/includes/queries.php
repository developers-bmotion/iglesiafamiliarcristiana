<?php

/**
 * Get Artist List
 */
/*
    function sr_elementor_select_events_for(){
        $sr_artist_list = get_posts(array(
            'post_type' => 'artist',
            'showposts' => 999,
        ));
        $options = array();
       // $options[0] = esc_html__( '-- Select Artist --', 'sonaar-music' );
        if ( ! empty( $sr_artist_list ) && ! is_wp_error( $sr_artist_list ) ){
            foreach ( $sr_artist_list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        } else {
            $options[0] = esc_html__( 'Create an artist first', 'sonaar-music' );
        }
        return $options;
    }
*/

/**
 * Get Podcast Episode
 */
/*
    function sr_elementor_select_episode(){
        $sr_episode_list = get_posts(array(
            'post_type' => 'podcast',
            'showposts' => 999,
        ));
        $options = array();
        $options[0] = esc_html__( '-- Play Last Published Episode --', 'sonaar-music' );
        if ( ! empty( $sr_episode_list ) && ! is_wp_error( $sr_episode_list ) ){
            foreach ( $sr_episode_list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        } else {
            $options[0] = esc_html__( 'Create an Episode First', 'sonaar-music' );
        }
        return $options;
    }
*/
    /**
 * Get Podcast Episode from a elementor Button
 */
/*
    function sr_elementor_select_episode_from_button(){
        $sr_episode_list = get_posts(array(
            'post_type' => 'podcast',
            'showposts' => 999,
        ));
        $options = array();
        $options[0] = esc_html__( '-- Select an Episode --', 'sonaar-music' );
        if ( ! empty( $sr_episode_list ) && ! is_wp_error( $sr_episode_list ) ){
            foreach ( $sr_episode_list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        } else {
            $options[0] = esc_html__( 'Create an Episode First', 'sonaar-music' );
        }
        return $options;
    }
*/
/**
 * Get Artist
 */

    function sr_plugin_elementor_select_artist(){
        $sr_artist_list = get_posts(array(
            'post_type' => 'artist',
            'showposts' => 999,
        ));
        $options = array();

        if ( ! empty( $sr_artist_list ) && ! is_wp_error( $sr_artist_list ) ){
            foreach ( $sr_artist_list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        } else {
            $options[0] = esc_html__( 'Create an Artist First', 'sonaar-music' );
        }
        return $options;
    }
/**
 * Get Music Playlist
 */

    function sr_plugin_elementor_select_playlist(){
        $sr_playlist_list = get_posts(array(
            'post_type' => 'album',
            'showposts' => 999,
        ));
        $options = array();

        if ( ! empty( $sr_playlist_list ) && ! is_wp_error( $sr_playlist_list ) ){
            foreach ( $sr_playlist_list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        } else {
            $options[0] = esc_html__( 'Create a Playlist First', 'sonaar-music' );
        }
        return $options;
    }
/**
 * Get Sliders
 */
/*
    function sr_elementor_select_slider(){
        $slider = new RevSlider();
        $arrSliders = $slider->getArrSliders();
        $revsliders = array();
        if ( $arrSliders ) {
            foreach ( $arrSliders as $slider ) {
           
                $revsliders[ $slider->getAlias() ] = $slider->getTitle();
            }
        } else {
            $revsliders[0]= esc_html__( 'No Slider Exists. Please create one', 'sonaar-music' );
        }
        return $revsliders;
   }
/*
   /**
 * Get Ess Grid
 */
/*
    function sr_elementor_select_essgrid(){
        if ( class_exists('Essential_Grid')){
         $grids = Essential_Grid::get_grids_short_vc();
        }
        $essgrid = array();
        if(!empty($grids)){
            foreach($grids as $title => $alias){
                $essgrid[$alias] = $title;

            }

        } else {
            $essgrid[0]= esc_html__( 'No Grid Exists. Please create one', 'sonaar-music' );
        }

        return $essgrid;

   }
*/
/**
 * Get Contact Form 7 [ if exists ]
 */
/*
if ( function_exists( 'wpcf7' ) ) {
    function sr_elementor_select_wpcf7(){
        $wpcf7_form_list = get_posts(array(
            'post_type' => 'wpcf7_contact_form',
            'showposts' => 999,
        ));
        $options = array();
        $options[0] = esc_html__( 'Select a Contact Form', 'sonaar-music' );
        if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ){
            foreach ( $wpcf7_form_list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        } else {
            $options[0] = esc_html__( 'Create a Form First', 'sonaar-music' );
        }
        return $options;
    }
}
*/
