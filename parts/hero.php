<?php 
$hero_type = get_field('hero_type');
$hero_image = get_field('hero_image');
$videoURL = get_field('hero_video_url');
//$has_hero_text = get_field('has_hero_text');
$hero_text = get_field('hero_text');
if($hero_type=='image') {
  if($hero_image) { ?>
  <section id="hero" class="hero-image">
    <div class="hero-content">
      <div class="heroImage" style="background-image:url('<?php echo $hero_image['url'] ?>')"></div>
      <?php if ($hero_text) { ?>
        <div class="heroText">
          <div class="textwrap">
            <?php echo anti_email_spam($hero_text); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <?php } ?>
<?php } else if( $hero_type=='video' ) { ?>
  <?php if ($videoURL) { ?>
  <section id="hero" class="hero-video">
    <?php if ( (strpos( strtolower($videoURL), 'youtube.com') !== false) || (strpos( strtolower($videoURL), 'youtu.b') !== false)  ) { 
    $youtubeId = extractYoutubeId($videoURL);
    $embed_url = 'https://www.youtube.com/embed/'.$youtubeId.'?version=3&rel=0&loop=0'; 
    $mainImage = 'https://i.ytimg.com/vi/'.$youtubeId.'/maxresdefault.jpg'; ?>
    <div class="hero-content">
      <div class="videoWrapper iframe-youtube">
        <iframe class="videoIframe" data-vid="youtube" src="<?php echo $embed_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <?php if ($hero_text) { ?>
        <div class="heroText">
          <div class="textwrap">
            <?php echo anti_email_spam($hero_text); ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php } ?>


    <?php if( strpos( strtolower($videoURL), 'vimeo.com') !== false ) { 
    $vimeo_parts = explode("/",$videoURL);
    $parts = ($vimeo_parts && array_filter($vimeo_parts) ) ? array_filter($vimeo_parts) : '';
    $vimeoId = ($parts) ?  preg_replace('/\s+/', '', end($parts)) : '';
    $vimeoData = ($vimeoId) ? get_vimeo_data($vimeoId) : '';
    $data = json_decode( file_get_contents( 'https://vimeo.com/api/oembed.json?url=' . $videoURL ) );
    $vimeoImage = ($data) ? $data->thumbnail_url : '';  ?>
    <div class="hero-content">
      <div class="videoWrapper iframe-vimeo">
        <iframe class="videoIframe" data-vid="vimeo" src="https://player.vimeo.com/video/<?php echo $vimeoId?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </div>
      <?php if ($hero_text) { ?>
      <div class="heroText">
        <div class="textwrap">
          <?php echo anti_email_spam($hero_text); ?>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
  </section>
  <?php } ?>
<?php } ?>