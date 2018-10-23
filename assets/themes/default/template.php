<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Default Public Template
 */

 
?>
<script type="text/javascript">
    base_url = '<?= base_url() ?>';
</script>
<!doctype html>
<html ng-app="jezzineApp" lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120447884-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120447884-1');
</script>


  <?php // CSS files ?>
    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if (!is_null($css)) : ?>
                <?php $separator = (strstr($css, '?')) ? '&' : '?'; ?>
                <link rel="stylesheet" href="<?php echo $css; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

   <?php if (isset($custom_css) && is_array($custom_css)) : ?>
        <?php foreach ($custom_css as $css) : ?>
            <?php if (!is_null($css)) : ?>
                <?php $separator = (strstr($css, '?')) ? '&' : '?'; ?>
                <link rel="stylesheet" href="<?php echo $css; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
 

    <title>Jezzine</title>
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo site_url('article?id=21'); ?>"> Jezzine Region</a>
        <a href="<?php echo site_url('article?id=23'); ?>">Tours & Packages</a>
      <!-- <a href="<?php echo site_url('booking'); ?>">Booking</a> -->
        <a href="<?php echo site_url('maps'); ?>">Maps</a>
         <a href="<?php echo site_url('article?id=7'); ?>">Hiking Trails</a>
          <!-- <a href="<?php echo site_url('maps?type=hikingTrails'); ?>">Hiking Trails</a> -->
        <a class="contact-link" href="#">Contact us</a>
        <div class="white">
            <a href="<?php echo site_url('section?type=1'); ?>">ESCAPE</a>
           <a href="<?php echo site_url('section?type=2'); ?>">EXPLORE</a>
            <a href="<?php echo site_url('section?type=3'); ?>">EXPERIENCE</a>
        </div>
    </div>

    <!-- Use any element to open the sidenav -->
    <span id="opanMenu" onclick="openNav()"><img src="<?php echo base_url('/'); ?>/assets/themes/default/assets/menu.png" alt=""></span>


      <a href="<?php echo site_url(); ?>">
    <img class="logo" src="<?php echo base_url('/'); ?>/assets/themes/default/assets/logo.png" alt=""></a>
   
  <?php // Main content ?>
        <?php echo $content; ?>


        
    <footer class="wow fadeInDown">

        <div class=" container ">
            <div class="row ">

                <div class="col-md-4 ">
                    <ul>
                        <li class="arrow ">
                          <a href="<?php echo site_url('section?type=1'); ?>">ESCAPE</a>
                        </li>
                        <li class="arrow ">
                           <a href="<?php echo site_url('section?type=2'); ?>">EXPLORE</a>
                        </li>
                        <li class="arrow ">
                         <a href="<?php echo site_url('section?type=3'); ?>">EXPERIENCE</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('article?id=21'); ?>">JEZZINE REGION</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('article?id=23'); ?>">TOURS & PACKAGES</a>
                        </li>
                        <!-- <li>
                           <a href="<?php echo site_url('booking'); ?>">BOOK NOW</a>
                        </li> -->
                    </ul>

                </div>
                <div class="col-md-4 ">
                    <ul>
                       <li>
                            <a href="<?php echo site_url('calendar'); ?>">   UPCOMING EVENTS </a>
                            <p class="underline "> <a href="<?php echo site_url('calendar'); ?>"> View our Calendar</a> </p>
                        </li>
                        <li class="arrow ">
                            <a href="<?php echo site_url('maps'); ?>">
                                JEZZINE ON THE MAP
                            </a>
                        </li>
                        <li>
                            <!-- <a id="newsletterLink" href="javascirpt::void(0)">
                                <h5 class="underline ">SUBSCRIBE TO OUR NEWSLETTER</h5>
                            </a> -->
                            <div  class="newsletterModal" id="modal-newsletter">
                                <h5>SUBSCRIBE TO OUR NEWSLETTER</h5>
<input placeholder="First Name"  id="subscribe-name" type="text">
<input placeholder="Last Name"  id="subscribe-lname" type="text">
<input placeholder="Email" id="subscribe-email"  type="text">
<a  id="subscribe-send" class="btn black btn-default">Subscribe</a>

</div>
                            <p>Monthly giveaways, engaging stories, videos, & special offers.</p>
                        </li>

                    </ul>

                </div>
                <div class="col-md-4 ">
                    <ul>
                        <li>
                            <a href=" "> NEED HELP? GET IN TOUCH!</a>
                            <p class="underline "> <a  href="mailto::<?php echo $this->settings->site_email; ?>"> <?php echo $this->settings->site_email; ?>
</a> </p>
                            <p class="underline "> <a href=" "><?php echo $this->settings->phone; ?>
</a> </p>
                        </li>
                        <li>
                            <a href="<?php echo site_url('article?id=22'); ?>">
                              TOURISM DIRECTORIES

                            </a>
                        </li>
                        <!-- <li>
                            <a id="terms-link" href="#">
                                TERMS & CONDITIONS
                            </a>
                        <div  class="termsModal" >
                                <h5> TERMS & CONDITIONS</h5>
<p><?php echo $this->settings->terms; ?></p>
</div>
                        </li> -->
                        <li>
                            <a class="contact-link" href="#">
                               CONNECT WITH US
                            </a>
                            <div  class="contactModal" id="modal-contact">
                                <h5>CONNECT WITH US</h5>
<input placeholder="Name" id="contact-name" type="text">
<input placeholder="Email" id="contact-email" type="text">
<textarea name="" placeholder="Message" style="min-height:120px;" id="contact-text" cols="30" rows="50"></textarea>
<a href="#" id="contact-send" class="btn black btn-default">Send</a>

</div>

                            <ul class="social ">
                                <li>
                                    <a href="<?php echo $this->settings->facebook; ?>"><img src="<?php echo base_url('/'); ?>/assets/themes/default/assets/fb.png " alt=" "></a>
                                </li>
                               
                               
                                <li>
                                    <a href="<?php echo $this->settings->instagram; ?>"><img src="<?php echo base_url('/'); ?>/assets/themes/default/assets/insta.png " alt=" "></a>
                                </li>
                            </ul>

                        </li>
                      
                    </ul>

                </div>
<div class="row"><a href="http://blackink.me">concept & design by blackink.me</a></div>
            </div>
        </div>

    </footer>

 <?php // Javascript files ?>
    <?php if (isset($js_files) && is_array($js_files)) : ?>
        <?php foreach ($js_files as $js) : ?>
            <?php if (!is_null($js)) : ?>
                <?php $separator = (strstr($js, '?')) ? '&' : '?'; ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
        <?php foreach ($js_files_i18n as $js) : ?>
            <?php if (!is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($custom_js) && is_array($custom_js)) : ?>
        <?php foreach ($custom_js as $js) : ?>
            <?php if (!is_null($js)) : ?>
                <?php $separator = (strstr($js, '?')) ? '&' : '?'; ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?><?php echo $separator; ?>v=<?php echo $this->settings->site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- .cd-main-content -->
 
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function(box) {
                console.log("WOW: animating < " + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();
    </script>
    <!-- Resource JavaScrip -->
</body>

</html>