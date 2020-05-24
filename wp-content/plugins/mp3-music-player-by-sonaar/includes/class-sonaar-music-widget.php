<?php
/**
* Radio Widget Class
*
* @since 1.6.0
* @todo  - Add options
*/

class Sonaar_Music_Widget extends WP_Widget{
    /**
    * Widget Defaults
    */
    
    public static $widget_defaults;
    
    /**
    * Register widget with WordPress.
    */
    
    function __construct (){
        
        
        $widget_ops = array(
        'classname'   => 'sonaar_music_widget',
        'description' => esc_html_x('A simple radio that plays a list of songs from selected albums.', 'Widget', 'sonaar-music')
        );
        
        self::$widget_defaults = array(
            'title'        => '',
            'store_title_text' => '',
            'albums'     	 => array(),
            'show_playlist' => 0,
            'hide_artwork' => 0,
            'sticky_player' => 0,
            'show_album_market' => 0,
            'show_track_market' => 0,
            'remove_player' => 0,
            
            
            );
            
            if ( isset($_GET['load']) && $_GET['load'] == 'playlist.json' ) {
                $this->print_playlist_json();
        }
        
        parent::__construct('sonaar-music', esc_html_x('Sonaar: Music Player', 'Widget', 'sonaar-music'), $widget_ops);
        
    }
    
    private function get_market($album_id = 0, $store_title_text){
        if( $album_id == 0 )
        return;
        
        $firstAlbum = explode(',', $album_id);
        $firstAlbum = $firstAlbum[0];
        
        $storeList = get_post_meta($firstAlbum, 'alb_store_list', true);
        
        if ( $storeList ){
            
            $output = '<div class="buttons-block"><div class="ctnButton-block">
            <div class="available-now">';
            if($store_title_text == NULL){
              $output .=  esc_html__("Available now on:", 'sonaar-music');
            }else{
              $output .=  esc_html__($store_title_text);
            }
            $output .=  '</div><ul class="store-list">';
            foreach ($storeList as $store ) {
                if(!isset($store['store-name'])){
                    $store['store-name']="";
                }
                if(!isset($store['store-link'])){
                    $store['store-link']="";
                }

                if(array_key_exists ( 'store-icon' , $store )){
                    $icon = ( $store['store-icon'] )? '<i class="' . $store['store-icon'] . '"></i>': '';
                }else{
                    $icon ='';
                }
                $output .= '<li><a class="button" href="' . esc_url( $store['store-link'] ) . '" target="_blank">'. $icon . $store['store-name'] . '</a></li>';
            }
            $output .= '</ul></div></div>';
            
            return $output;
        }
        
       
    }
    
    /**
    * Front-end display of widget.
    */
    public function widget ( $args, $instance ){
        $instance = wp_parse_args( (array) $instance, self::$widget_defaults );
            $elementor_widget = (bool)( isset( $instance['hide_artwork'] ) )? true: false; //Return true if the widget is set in the elementor editor 
            $args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
            $args['before_title'] = str_replace('h2','h3',$args['before_title']);
            $args['after_title'] = str_replace('h2','h3',$args['after_title']);
            /*$args['after_title'] = $args['after_title']."<span class='heading-b3'></span>";*/
            
            $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
            $albums = $instance['albums'];
            if( empty($albums) ) {
                // SHORTCODE IS DISPLAYED BUT NO ALBUMS ID ARE SET. EITHER GET INFO FROM CURRENT POST OR RETURN NO PLAYLIST SELECTED

                $albums = get_the_ID();
                $album_tracks =  get_post_meta( $albums, 'alb_tracklist', true);

                if (is_array($album_tracks)){
                    $fileOrStream =  $album_tracks[0]['FileOrStream'];
                       
                    switch ($fileOrStream) {
                        case 'mp3':
                            if ( isset( $album_tracks[0]["track_mp3"] ) ) {
                                $trackSet = true;
                            }
                            break;

                        case 'stream':
                            if ( isset( $album_tracks[0]["stream_link"] ) ) {
                                $trackSet = true;
                            }
                            break;
                    }
                }
        
                if ( $album_tracks == 0 || $trackSet!=true ){
                    echo esc_html__("No playlist selected", 'sonaar-music');
                    return;
                }  
            }

            $show_album_market = (bool) ( isset( $instance['show_album_market'] ) )? $instance['show_album_market']: 0;
            $show_track_market = (bool) ( isset( $instance['show_track_market'] ) )? $instance['show_track_market']: 0;
            $store_title_text = $instance['store_title_text'];
            $hide_artwork= (bool)( isset( $instance['hide_artwork'] ) )? $instance['hide_artwork']: false; 
            $remove_player = (bool) ( isset( $instance['remove_player'] ) )? $instance['remove_player']: false;
            $notrackskip = get_post_meta($albums, 'no_track_skip', true);
            $sticky_player = (bool)( isset( $instance['sticky_player'] ) )? $instance['sticky_player']: false;
            $wave_color = (bool)( isset( $instance['wave_color'] ) )? $instance['wave_color']: false;
            $wave_progress_color = (bool)( isset( $instance['wave_progress_color'] ) )? $instance['wave_progress_color']: false;
            $show_playlist = (bool)( isset( $instance['show_playlist'] ) )? $instance['show_playlist']: false;
            $title_html_tag_playlist = ( isset( $instance['titletag_playlist'] ) )? $instance['titletag_playlist']: 'h3';
            $title_html_tag_soundwave = ( isset( $instance['titletag_soundwave'] ) )? $instance['titletag_soundwave']: 'div';
            
            $title_html_tag_playlist = ($title_html_tag_playlist == '') ? 'div' : $title_html_tag_playlist;
            $title_html_tag_soundwave = ($title_html_tag_soundwave == '') ? 'div' : $title_html_tag_soundwave;


            
            if($sticky_player){
                $sticky_player = ($instance['sticky_player']=="true" || $instance['sticky_player']==1) ? : false;      
            }

            if($show_playlist){
                $show_playlist = ($instance['show_playlist']=="true" || $instance['show_playlist']==1) ? : false;      
            }
        
            if($show_track_market){
                $show_track_market = ($instance['show_track_market']=="true" || $instance['show_track_market']==1) ? : false;      
            }
            if($show_album_market){
                $show_album_market = ($instance['show_album_market']=="true" || $instance['show_album_market']==1) ? : false;      
            }
            if($hide_artwork){
                $hide_artwork = ($instance['hide_artwork']=="true" || $instance['hide_artwork']==1) ? : false;      
            }
            if($remove_player){
                $remove_player = ($instance['remove_player']=="true" || $instance['remove_player']==1) ? : false;      
            }
            $remove_player_style = ( $remove_player )? 'style="display: none;"': '' ;

            $store_buttons = array();
            $playlist = $this->get_playlist($albums, $title);
          
            if (isset($playlist['tracks'][0]['poster']) ==""){
                $hide_artwork = true;
            }

            if ( isset($playlist['tracks']) && ! empty($playlist['tracks']) )
                $player_message = esc_html_x('Loading tracks...', 'Widget', 'sonaar-music');
            else
                $player_message = esc_html_x('No tracks founds...', 'Widget', 'sonaar-music');
            
            /***/
            
            if ( ! $playlist )
                return;
            
            if($show_playlist) {
                $args['before_widget'] = str_replace("iron_widget_radio", "iron_widget_radio playlist_enabled", $args['before_widget']);
            }
        
		/* Enqueue Sonaar Music related CSS and Js file */
		wp_enqueue_style( 'sonaar-music' );
		wp_enqueue_style( 'sonaar-music-pro' );
		wp_enqueue_script( 'sonaar-music-mp3player' );
		wp_enqueue_script( 'sonaar-music-pro-mp3player' );
		wp_enqueue_script( 'sonaar_player' );
		if ( function_exists('sonaar_player') ) {
			add_action('wp_footer','sonaar_player', 12);
		}
		
        echo $args['before_widget'];
        
        if ( ! empty( $title ) )
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        
		/*
        if( empty($albums) ) {
            echo esc_html__("No playlist selected", 'sonaar-music');
            return;                        
        }*/
		
		if ( is_array($albums)) {
			$albums = implode(',', $albums);
		}
	   
        if ( FALSE === get_post_status( $albums ) || get_post_status ( $albums ) == 'trash') {
            echo esc_html__('Playlist has been deleted. ID: ' . $albums , 'sonaar-music');
            return;
        }
    
        $firstAlbum = explode(',', $albums);
        $firstAlbum = $firstAlbum[0];
        
        $classShowPlaylist = '';
        $classShowArtwork = '';
       if($show_playlist) {
            $classShowPlaylist = 'show-playlist';   
        }
        if($hide_artwork=="true") {
          $classShowArtwork = 'sonaar-no-artwork';
        }
        
        $show_market = ( $show_album_market )? $albums : 0 ;
        
        $format_playlist ='';

        if(Sonaar_Music::get_option('show_artist_name') ){
            $artistSeparator = (Sonaar_Music::get_option('artist_separator') && Sonaar_Music::get_option('artist_separator') != '' && Sonaar_Music::get_option('artist_separator') != 'by')?Sonaar_Music::get_option('artist_separator'): __('by', 'sonaar-music');
            $artistSeparator = ' ' . $artistSeparator . ' ';
        }else{
            $artistSeparator = '';
        }

        foreach( $playlist['tracks'] as $track){
            $trackUrl = $track['mp3'] ;
            $showLoading = $track['loading'] ;
            $song_store_list = '<span class="store-list">';

            if ( $show_track_market && is_array($track['song_store_list']) ){
                if ($track['has_song_store'] && isset($track['song_store_list'][0]['store-link'])){
                    $song_store_list .= '<div class="song-store-list-menu"><i class="fas fa-ellipsis-v"></i><div class="song-store-list-container">';
                    
                    foreach( $track['song_store_list'] as $store ){
                        if(isset($store['store-icon'])){
                            if(!isset($store['store-name'])){
                                $store['store-name']='';
                            }
                            
                            if(!isset($store['store-link'])){
                                $store['store-link']='#';
                            }

                            $download="";
                            if($store['store-icon'] == "fas fa-download"){
                                $download = ' download="' . $track['track_title'] . '"';
                            }

                            if(!isset($store['store-icon'])){
                                $store['store-icon']='';
                            }

                            if(!isset($store['store-target'])){
                                $store['store-target']='_blank';
                            }

                            $song_store_list .= '<a href="' . $store['store-link'] . '"' . $download . ' class="song-store" target="' . $store['store-target'] . '" title="' . $store['store-name'] . '"><i class="' . $store['store-icon'] . '"></i></a>';
                         }
                    }
                    $song_store_list .= '</div></div>';
                }
            }
           
            $song_store_list .= '</span>';
            
            $store_buttons = ( !empty($track["track_store"]) )? '<a class="button" target="_blank" href="'. esc_url( $track['track_store'] ) .'">'. esc_textarea( $track['track_buy_label'] ).'</a>' : '' ;
            $artistSeparator_string = ($track['track_artist'])?$artistSeparator:'';//remove separator if no track doesnt have artist
            $format_playlist .= '<li
            data-audiopath="' . esc_url( $trackUrl ) . '"
            data-showloading="' . $showLoading .'"
            data-albumTitle="' . esc_attr( $track['album_title'] ) . '"
            data-albumArt="' . esc_url( $track['poster'] ) . '"
            data-releasedate="' . esc_attr( $track['release_date'] ) . '"
            data-trackTitle="' . $track['track_title'] . $artistSeparator_string . $track['track_artist'] . '"
            data-trackID="' . $track['id'] . '"
            data-trackTime="' . $track['lenght'] . '"
            >' . $song_store_list . '</li>';
        }
        if( Sonaar_Music::get_option('waveformType') === 'wavesurfer' ) {
            $fakeWave = '';
        }else{
            $fakeWave = '<div class="sonaar_fake_wave">
            <audio src="" class="sonaar_media_element"></audio>
            <div class="sonaar_wave_base"><svg></svg></div>
            <div class="sonaar_wave_cut"><svg></svg></div>
            </div>';
        }

        echo
        '<div class="iron-audioplayer ' . $classShowPlaylist . ' ' . $classShowArtwork . '" id="'. esc_attr( $args["widget_id"] ) .'-' . bin2hex(random_bytes(5)) . '" data-albums="'. $albums .'"data-url-playlist="' . esc_url(home_url('?load=playlist.json&amp;title='.$title.'&amp;albums='.$albums.'')) . '" data-sticky-player="'. $sticky_player .'" data-wave-color="'. $wave_color .'" data-wave-progress-color="'. $wave_progress_color . '" data-no-track-skip="'. $notrackskip .'" data-no-wave="'. $remove_player .'" style="opacity:0;">
        <div class="sonaar-grid sonaar-grid-2 sonaar-grid-fullwidth-mobile">
        '.(!$hide_artwork || $hide_artwork!="true" ?
            '<div class="sonaar-Artwort-box">
                <div class="album">
                    <div class="album-art">
                        <img alt="album-art">
                    </div>
                </div>
            </div>'
        : '').'
        <div class="playlist">
            <'.$title_html_tag_playlist.' class="sr_it-playlist-title">'. get_the_title($firstAlbum) .'</'.$title_html_tag_playlist.'>
            <div class="sr_it-playlist-release-date"><span class="sr_it-date-value">'.
            ( ( get_post_meta( $firstAlbum, 'alb_release_date', true ) )? get_post_meta($firstAlbum, 'alb_release_date', true ): '' ) . '</span></div>
            <ul>' . $format_playlist . '</ul>
        </div>
        </div>
        <div class="album-store">' . $this->get_market( $show_market, $store_title_text ) . '</div>
        <div class="album-player" ' . $remove_player_style .'>
        <'.$title_html_tag_soundwave.' class="track-title"></'.$title_html_tag_soundwave.'>
        <div class="album-title"></div>
        
        <div class="player">
        <div class="currentTime"></div>
        <div id="'.esc_attr($args["widget_id"]). '-' . bin2hex(random_bytes(5)) . '-wave" class="wave">
        ' . $fakeWave . ' 
        </div>
        <div class="totalTime"></div>
        <div class="control">
        <a class="previous" style="opacity:0;">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
        <polygon points="10.2,0 1.4,5.3 1.4,0 0,0 0,11.7 1.4,11.7 1.4,6.2 10.2,11.7"/>
        </svg>
        </a>
        <a class="play" style="opacity:0;">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.5 21.2" style="enable-background:new 0 0 17.5 21.2;" xml:space="preserve">
        <path d="M0,0l17.5,10.9L0,21.2V0z"/>
        
        <rect width="6" height="21.2"/>
        <rect x="11.5" width="6" height="21.2"/>
        </svg>
        </a>
        <a class="next" style="opacity:0;">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
        <polygon points="0,11.7 8.8,6.4 8.8,11.7 10.2,11.7 10.2,0 8.8,0 8.8,5.6 0,0"/>
        </svg>
        </a>
        </div>
        </div>
        </div>
        </div>';
        
        
        //Temp. removed: Not required
        // echo $action;
        echo $args['after_widget'];
    }
    
    /**
    * Back-end widget form.
    */
    
    public function form ( $instance ){
        $instance = wp_parse_args( (array) $instance, self::$widget_defaults );
            
            $title = esc_attr( $instance['title'] );
            $albums = $instance['albums'];
            $show_playlist = (bool)$instance['show_playlist'];
            $sticky_player = (bool)$instance['sticky_player'];
            $hide_artwork = (bool)$instance['hide_artwork'];
            $show_album_market = (bool)$instance['show_album_market'];
            $show_track_market = (bool)$instance['show_track_market'];
            $remove_player = (bool)$instance['remove_player'];
            
            $all_albums = get_posts(array(
            'post_type' => 'album'
            , 'posts_per_page' => -1
            , 'no_found_rows'  => true
            ));
            
            if ( !empty( $all_albums ) ) :?>

  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
      <?php _ex('Title:', 'Widget', 'sonaar-music'); ?>
    </label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" placeholder="<?php _e('Popular Songs', 'sonaar-music'); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('albums'); ?>">
      <?php _ex('Album:', 'Widget', 'sonaar-music'); ?>
    </label>
    <select class="widefat" id="<?php echo $this->get_field_id('albums'); ?>" name="<?php echo $this->get_field_name('albums'); ?>[]" multiple="multiple">
      <?php foreach($all_albums as $a): ?>

        <option value="<?php echo $a->ID; ?>" <?php echo ( is_array($albums) && in_array($a->ID, $albums) ? ' selected="selected"' : ''); ?>>
          <?php echo esc_attr($a->post_title); ?>
        </option>

        <?php endforeach; ?>
    </select>
  </p>
<?php if ( function_exists( 'run_sonaar_music_pro' ) ): ?>
  <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('sticky_player'); ?>" name="<?php echo $this->get_field_name('sticky_player'); ?>" <?php checked( $sticky_player ); ?> />
    <label for="<?php echo $this->get_field_id('sticky_player'); ?>">
      <?php _e( 'Enable Sticky Audio Player', 'sonaar-music'); ?>
    </label>
    <br />
  </p>
<?php endif ?>
  <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_playlist'); ?>" name="<?php echo $this->get_field_name('show_playlist'); ?>" <?php checked( $show_playlist ); ?> />
    <label for="<?php echo $this->get_field_id('show_playlist'); ?>">
      <?php _e( 'Show Playlist', 'sonaar-music'); ?>
    </label>
    <br />
  </p>

  <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_album_market'); ?>" name="<?php echo $this->get_field_name('show_album_market'); ?>" <?php checked( $show_album_market ); ?> />
    <label for="<?php echo $this->get_field_id('show_album_market'); ?>">
      <?php _e( 'Show Album store', 'sonaar-music'); ?>
    </label>
    <br />
  </p>
  <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hide_artwork'); ?>" name="<?php echo $this->get_field_name('hide_artwork'); ?>" <?php checked( $hide_artwork ); ?> />
    <label for="<?php echo $this->get_field_id('hide_artwork'); ?>">
      <?php _e( 'Hide Album Cover', 'sonaar-music'); ?>
    </label>
    <br />
  </p>
  <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_track_market'); ?>" name="<?php echo $this->get_field_name('show_track_market'); ?>" <?php checked( $show_track_market ); ?> />
    <label for="<?php echo $this->get_field_id('show_track_market'); ?>">
      <?php _e( 'Show Track store', 'sonaar-music'); ?>
    </label>
    <br />
  </p>
  </p>
  <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('remove_player'); ?>" name="<?php echo $this->get_field_name('remove_player'); ?>" <?php checked( $remove_player ); ?> />
    <label for="<?php echo $this->get_field_id('remove_player'); ?>">
      <?php _e( 'Remove Visual Player', 'sonaar-music'); ?>
    </label>
    <br />
  </p>

  <?php
            else:
                
            echo wp_kses_post( '<p>'. sprintf( _x('No albums have been created yet. <a href="%s">Create some</a>.', 'Widget', 'sonaar-music'), esc_url(admin_url('edit.php?post_type=album')) ) .'</p>' );
            
            endif;
    }
    
    
    
    
    
    
    /**
    * Sanitize widget form values as they are saved.
    */
    
    public function update ( $new_instance, $old_instance )
    {
        $instance = wp_parse_args( $old_instance, self::$widget_defaults );
            
            $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
            $instance['albums'] = $new_instance['albums'];
            $instance['show_playlist']  = (bool)$new_instance['show_playlist'];
            $instance['hide_artwork']  = (bool)$new_instance['hide_artwork'];
            $instance['sticky_player']  = (bool)$new_instance['sticky_player'];
            $instance['show_album_market']  = (bool)$new_instance['show_album_market'];
            $instance['show_track_market']  = (bool)$new_instance['show_track_market'];
            $instance['remove_player']  = (bool)$new_instance['remove_player'];
            
            return $instance;
    }
    
    
    private function print_playlist_json() {
        $jsonData = array();
        
        $title = !empty($_GET["title"]) ? $_GET["title"] : null;
        $albums = !empty($_GET["albums"]) ? $_GET["albums"] : array();
        
        $playlist = $this->get_playlist($albums, $title);
        
        if(!is_array($playlist) || empty($playlist['tracks']))
        return;
        
        wp_send_json($playlist);
        
    }
    
    private function get_playlist($album_ids = array(), $title = null) {
        
        global $post;
        
        $playlist = array();
        if(!is_array($album_ids)) {
            $album_ids = explode(",", $album_ids);
        }
        
        
        $albums = get_posts(array(
            'numberposts' => -1,
            'post_type' => ( Sonaar_Music::get_option('srmp3_posttypes') != null ) ? Sonaar_Music::get_option('srmp3_posttypes') : 'album',//array('album', 'post', 'product'),
            'post__in' => $album_ids
        ));

        if(Sonaar_Music::get_option('show_artist_name') ){
            $artistSeparator = (Sonaar_Music::get_option('artist_separator') && Sonaar_Music::get_option('artist_separator') != '' && Sonaar_Music::get_option('artist_separator') != 'by' )?Sonaar_Music::get_option('artist_separator'): __('by', 'sonaar-music');
            $artistSeparator = ' ' . $artistSeparator . ' ';
        }else{
            $artistSeparator = '';
        }
        
        $tracks = array();
        foreach($albums as $a) {
    
            $album_tracks =  get_post_meta( $a->ID, 'alb_tracklist', true);
            if ($album_tracks!=''){ 
                for($i = 0 ; $i < count($album_tracks) ; $i++) {
                    
                    $fileOrStream =  $album_tracks[$i]['FileOrStream'];
                    $thumb_id = get_post_thumbnail_id($a->ID);
                    $thumb_url = ( $thumb_id )? wp_get_attachment_image_src($thumb_id, Sonaar_Music::get_option('music_player_coverSize'), true) : false ;
                    $track_title = false;
                    $album_title = false;
                    //$album_artist = false;
                    $mp3_id = false;
                    $audioSrc = '';
                    $song_store_list = isset($album_tracks[$i]["song_store_list"]) ? $album_tracks[$i]["song_store_list"] : '' ;
                    $has_song_store =false;
                    if (isset($song_store_list[0])){
                        $has_song_store = true; 
                    }
                    

                    $showLoading = false;
                    $album_tracks_lenght = false;

                    switch ($fileOrStream) {
                        case 'mp3':
                            
                            if ( isset( $album_tracks[$i]["track_mp3"] ) ) {
                                $mp3_id = $album_tracks[$i]["track_mp3_id"];
                                $mp3_metadata = wp_get_attachment_metadata( $mp3_id );
                                $track_title = ( isset( $mp3_metadata["title"] ) && $mp3_metadata["title"] !== '' )? $mp3_metadata["title"] : false ;
                                $track_title = ( get_the_title($mp3_id) !== '' && $track_title !== get_the_title($mp3_id))? get_the_title($mp3_id): $track_title;
                                $track_title = html_entity_decode($track_title, ENT_COMPAT, 'UTF-8');
                                $track_artist = ( isset( $mp3_metadata['artist'] ) && $mp3_metadata['artist'] !== '' && Sonaar_Music::get_option('show_artist_name') )? $mp3_metadata['artist'] : false;
                                $album_title = ( isset( $mp3_metadata['album'] ) && $mp3_metadata['album'] !== '' )? $mp3_metadata['album'] : false;
                                $album_tracks_lenght = ( isset( $mp3_metadata['length_formatted'] ) && $mp3_metadata['length_formatted'] !== '' )? $mp3_metadata['length_formatted'] : false;
                                $audioSrc = wp_get_attachment_url($mp3_id);
                                $showLoading = true;
                            }
                            break;

                        case 'stream':
                            
                            $audioSrc = ( $album_tracks[$i]["stream_link"] !== '' )? $album_tracks[$i]["stream_link"] : false;
                            $track_title = ( $album_tracks[$i]["stream_title"] !== '' )? $album_tracks[$i]["stream_title"] : false;
                            //$album_artist = ( isset ($album_tracks[$i]["stream_artist"]) && $album_tracks[$i]["stream_artist"] !== '' )? $album_tracks[$i]["stream_artist"] : false;
                            $album_title = ( isset ($album_tracks[$i]["stream_album"]) && $album_tracks[$i]["stream_album"] !== '' )? $album_tracks[$i]["stream_album"] : false;
                            $showLoading = true;
                            break;
                        
                        default:
                            $album_tracks[$i] = array();
                            break;
                    }
            
                    $album_tracks[$i] = array();
                    $album_tracks[$i]["id"] = ( $mp3_id )? $mp3_id : NULL ;
                    $album_tracks[$i]["mp3"] = $audioSrc;
                    $album_tracks[$i]["loading"] = $showLoading;
                    $album_tracks[$i]["track_title"] = ( $track_title )? $track_title : "Track title ". $i;
                    $album_tracks[$i]["track_artist"] = ( isset( $track_artist ) && $track_artist != '' )? $track_artist : '';
                    $album_tracks[$i]["lenght"] = $album_tracks_lenght;
                    $album_tracks[$i]["album_title"] = ( $album_title )? $album_title : $a->post_title;
                    $album_tracks[$i]["poster"] = $thumb_url[0];
                    $album_tracks[$i]["release_date"] = get_post_meta($a->ID, 'alb_release_date', true);
                    $album_tracks[$i]["song_store_list"] = $song_store_list;
                    $album_tracks[$i]["has_song_store"] = $has_song_store;
                    $album_tracks[$i]["no_track_skip"] = get_post_meta($a->ID, 'no_track_skip', true);
                }
        
                $tracks = array_merge($tracks, $album_tracks);
            }

}

$playlist['playlist_name'] = $title;
if ( empty($playlist['playlist_name']) ) $playlist['playlist_name'] = "";

$playlist['artist_separator'] = $artistSeparator;

$playlist['tracks'] = $tracks;
if ( empty($playlist['tracks']) ) $playlist['tracks'] = array();

return $playlist;
}



}