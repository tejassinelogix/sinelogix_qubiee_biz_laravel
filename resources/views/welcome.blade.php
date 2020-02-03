<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if (exist){
    alert(msg);
    }
</script>
<?php
//        echo "<pre>";
//        print_r($getBannerslider);
//        die;
?>
<!--    {{ __('message.view details') }}
   {{ $language }} -->
<!-- bannerSection -->
<div class="bannerSection">
    <div class="bannerContainer">
        <div id="banner-slider" class="owl-carousel bannerSlider">
            <?php
            foreach ($getBannersectionProduct as $sn) {
                $banner_name = $sn->name;
                //echo $language;
                ?> 

                <div class="item">
                    <a href="{{ $sn->url }}" class="replaceImg" style="background: url('public/images/{{ $sn->image }}') no-repeat center;">
                        <div class="bannerCaption">
                            <h2>{{ $banner_name[$language] }}</h2>
                             <!--<a href="<?php //echo url('/productdetails');    ?>/{{ $sn->url }}"><h2>{{ $sn->short_description }}</h2></a>-->
                        </div>
                    </a>
                </div>

            <?php } ?>            
        </div>
    </div>
</div><!-- End of bannerSection -->

<!-- productColSection -->
<div class="productColSection" id="intro">
    <div class="containerWrapper">
        <div class="row featColRow">
            <?php
            foreach ($getAddsectionProduct as $addvertise) {
                $urladdname = $addvertise->name;
                $newaddfullname = str_replace(' ', '-', $urladdname);

                $pro_name = $addvertise->name;
                $shortdescription = $addvertise->short_description;
                ?>
                <div class="col-md-6 col-sm-6 featCol">
                    <div class="featProductBlock">
                        <div class="featProductBlockInner">
                            <!--<h3>{{ __('message.Gift Items') }}</h3>-->
                            <h3><?php echo $addvertise->name[$language]; ?></h3>
                                <!--<p>{{ __('message.dummy_short_txt') }}</p>-->
                            <p> </p>
                            <a href="{{$addvertise->url }}" class="btn btn-primary btn-lg btn-rounded">{{ __('message.view details') }} <i class="fa fa-shopping-cart"></i></a>
                        </div>
                        <img src="{{ asset('/') }}public/images/{{ $addvertise->image }}" alt="">
                    </div>
                </div>
            <?php } ?>
            <!--                <div class="col-md-6 col-sm-6 featCol">
                                <div class="featProductBlock">
                                    <div class="featProductBlockInner">
                                        <h3>{{ __('message.Featuring Polos') }}</h3>
                                        <p>{{ __('message.dummy_short_txt') }}</p>
                                        <a href="#" class="btn btn-primary btn-lg btn-rounded">{{ __('message.Buy Now') }}! <i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    <img src="public/assets/images/featProduct2.jpg" alt="">
                                </div>
                            </div>-->
        </div>
    </div>
</div>
@include('carousel-products')

<!-- parallaxSection1 -->
<div class="parallaxSection1">
    <div class="container text-center">
        <h2>{{ __('message.Quality Customisation') }}</h2>
        <h4>{{ __('message.dummy_txt') }}</h4>
    </div>
</div>



<div class="thanksVideoBlock" 	style='display:none;'>
    <div class="closeThanksVideo"><i class="fa fa-close"></i></div>
    <div class="thanksVideoBlockInner">
        <video width="100%" autoplay="autoplay" loop="true" muted="true">
            <source src="https://demosoftwares.biz/Qubiee-E-Commerce/Preview-video.mov" type="video/mp4">
        </video>
        <!--<div id="player"></div>-->
        <!--<div>
            <iframe frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" width="640" height="390" src="https://www.youtube.com/embed/Le5DMs_BrNA?autoplay=1&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;loop=1&amp;fs=0&amp;cc_load_policy=0&amp;iv_load_policy=3&amp;autohide=0&amp;rel=0&amp;enablejsapi=1&amp;widgetid=1"></iframe>
        </div>-->
    </div>
</div>

<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
    height: '390',
            width: '640',
            videoId: 'Le5DMs_BrNA',
            events: {
            'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
            },
            playerVars: {
            autoplay: 1, // Auto-play the video on load
                    controls: 0, // Show pause/play buttons in player
                    showinfo: 0, // Hide the video title
                    modestbranding: 1, // Hide the Youtube Logo
                    loop: 1, // Run the video in a loop
                    fs: 0, // Hide the full screen button
                    cc_load_policy: 0, // Hide closed captions
                    iv_load_policy: 3, // Hide the Video Annotations
                    autohide: 0, // Hide video controls when playing
                    rel: 0
                    /*start: 25,
                     end: 28*/
            }
    });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
    event.target.playVideo();
    player.mute();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.ENDED) {
    //setTimeout(stopVideo, 6000);
    player.playVideo();
    done = false;
    }
    }
    function stopVideo() {
    player.stopVideo();
    }
</script>
