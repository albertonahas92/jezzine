<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="cover">
        <div class="parallax-window" data-parallax="scroll" style="background-image:url('<?php echo base_url('/'); ?>/backend/<?php echo $article->cover ?>')"></div>
        <h2 class="title"><?php echo $article->article_title ?></h2>
    </div>
    <!-- .cd-hero -->
    <div class="container article-page">
        <ul class="current-page">
            <li><a href="<?php echo base_url(); ?>">HOME</a></li>

              <?php if ($article->type == 2) : ?>
  <li><a href="<?php echo base_url('section?type=2'); ?>">EXPLORE</a></li>
    <!-- .cd-hero -->
<?php endif ?>

    <?php if ($article->type == 3) : ?>
    <li><a href="<?php echo base_url('section?type=3'); ?>">EXPERIENCE</a></li>
    <!-- .cd-hero -->
<?php endif ?>

    <?php if ($article->type == 1) : ?>
   <li><a href="<?php echo base_url('section?type=1'); ?>">ESCAPE</a></li>
    <!-- .cd-hero -->
<?php endif ?>
           
            <li><a href="#"><?php echo $article->title ?></a></li>
        </ul>


        <div class="row">


            <h2><?php echo $article->article_subtitle ?></h2>

            <div class="col-md-7">
              <?php echo $article->text ?>

            </div>

            <div id="adsbar" class=" col-xs-8 col-sm-8 col-md-4 col-md-offset-1">

<?php 
$index = 0;
foreach ($ads as $ad) : ?>

                <div class="ad">
  <img src="<?php echo base_url(); ?>/backend/<?php echo $ad['image'] ?>" />
                    <legend><?php echo $ad['title'] ?></legend>

                    <h2><?php echo $ad['subtitle'] ?></h2>
                    <p><?php echo $ad['text'] ?></p>
                   <a href="<?php echo $ad['link'] ?>"> <span class="">Explore</span></a>




                  

                </div>

<?php $index++;
endforeach ?>
                <div class="upcoming">

                    <h3>UPCOMING EVENTS</h3>

                    <!-- <ol> -->
<?php 
$index = 0;
foreach ($upcomings as $upcoming) : ?>


 <div class="ad">



  <img src="<?php echo base_url(); ?>/backend/<?php echo $upcoming['image'] ?>" />
                    <legend><?php echo $upcoming['title'] ?></legend>

                    <h2><?php $originalDate = $upcoming['date'];
$newDate = date("d-m-Y", strtotime($originalDate));
 echo $newDate ?></h2>
                    <!-- <p><?php echo $ad['description'] ?></p> -->
                   <a href="<?php echo $upcoming['link'] ?>"> <span class="">Explore</span></a>   

                </div>

                        <!-- <li>

                            <h2><?php echo $ad['title'] ?></h2>
                            <legend><?php echo $ad['date'] ?></legend>


                            <a href="<?php echo $ad['link'] ?>" class="arrow">BOOK TOUR </a>

                        </li> -->

<?php $index++;
endforeach ?>

                   

                    <!-- </ol> -->

                </div>

            </div>


        </div>
