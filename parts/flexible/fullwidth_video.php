<?php if( get_row_layout() == 'fullwidth_video' ) {
  $videoURL = get_sub_field('fullwidth_video_url');
  if( $videoURL ) { ?>
  <section data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    
    <?php if ( (strpos( strtolower($videoURL), 'youtube.com') !== false) || (strpos( strtolower($videoURL), 'youtu.b') !== false)  ) { 
    $youtubeId = extractYoutubeId($videoURL);
    $embed_url = 'https://www.youtube.com/embed/'.$youtubeId.'?version=3&rel=0&loop=0'; 
    $mainImage = 'https://i.ytimg.com/vi/'.$youtubeId.'/maxresdefault.jpg'; ?>
    <div class="video-content">
      <div class="videoWrapper iframe-youtube">
        <iframe class="videoIframe" data-vid="youtube" src="<?php echo $embed_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <?php } ?>

    <?php if( strpos( strtolower($videoURL), 'vimeo.com') !== false ) { 
    $vimeo_parts = explode("/",$videoURL);
    $parts = ($vimeo_parts && array_filter($vimeo_parts) ) ? array_filter($vimeo_parts) : '';
    $vimeoId = ($parts) ?  preg_replace('/\s+/', '', end($parts)) : '';
    $vimeoData = ($vimeoId) ? get_vimeo_data($vimeoId) : '';
    $data = json_decode( file_get_contents( 'https://vimeo.com/api/oembed.json?url=' . $videoURL ) );
    $vimeoImage = ($data) ? $data->thumbnail_url : '';  ?>
    <div class="video-content">
      <div class="videoWrapper iframe-vimeo">
        <iframe class="videoIframe" data-vid="vimeo" src="https://player.vimeo.com/video/<?php echo $vimeoId?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>
    </div>
    <?php } ?>

  </section>
  <?php } ?>
<?php } ?>