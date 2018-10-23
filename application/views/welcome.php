<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <section class="cd-hero js-cd-hero js-cd-autoplay wow fadeInDown">
        <ul class="cd-hero__slider">


<?php 
$index=0;
foreach ($sliders as $slide ) : ?>


    <li style="background-image: url('<?php echo base_url('/'); ?>/backend/<?php echo $slide['image'] ?>');" class="cd-hero__slide  <?php if($index==0){ echo "cd-hero__slide--selected"; }  ?> js-cd-slide">

                <!-- .cd-hero__content -->
                <div class="cd-hero__content cd-hero__content--half-width">
                    <h2><?php echo $slide['title'] ?></h2>
                    <p><?php echo $slide['description'] ?>
                    </p>


                </div>
                <!-- .cd-hero__content -->
            </li>

  <?php $index++; endforeach  ?>

        
        


        </ul>
        <!-- .cd-hero__slider -->

        <div class="cd-hero__nav js-cd-nav">
            <nav>
                <span class="cd-hero__marker cd-hero__marker--item-1 js-cd-marker"></span>

                <ul>


<?php 



$index=0;
foreach ($sliders as $slide) : ?>

 <li class="<?php if ($index == 0) {echo "cd-selected";} ?>">
                        <a href="#0"></a>
                    </li>

<?php $index++; endforeach ?>
                   

                </ul>
            </nav>
        </div>
        <!-- .cd-hero__nav -->
    </section>
    <!-- .cd-hero -->

    <div class="container-fluid guide">
        <div class="row ">

            <div class="col-md-4 col-sm-12  escape wow fadeIn">
                <div>
                    <figure>
                        <img alt="escape" title="escape" src="<?php echo base_url('/'); ?>/assets/themes/default/assets/escape.png" />
                        <span class="hoverable">
  <a href="<?php echo site_url('section?type=1'); ?>">ESCAPE <small>Hike - Camp - Climb - Ride </small> </a>
</span>
                    </figure>

                </div>
            </div>
            <div class="col-md-4 col-sm-12 explore wow fadeIn">
                <div>
                    <figure>
                        <img alt="explore" title="explore" src="<?php echo base_url('/'); ?>/assets/themes/default/assets/explore.png" />
                        <span class="hoverable">
    <a href="<?php echo site_url('section?type=2'); ?>">EXPLORE <small>History - Nature - Culture - Religion  </small></a>
</span>
                    </figure>

                </div>
            </div>



            <div class="col-md-4 col-sm-12 expirience wow fadeIn">
                <div>
                    <figure>
                        <img alt="experience" title="experience" src="<?php echo base_url('/'); ?>/assets/themes/default/assets/expirience.png" />
                        <span>
  <a href="<?php echo site_url('section?type=3'); ?>">EXPERIENCE <small>Eat - Drink - Stay - Events  </small></a></span>
                    </figure>
    
                </div>
            </div>


        </div>
    </div>



<?php foreach ($quotes as $quote ) : ?>


                                                                                                                          
 <section class="quote wow fadeInDown">


        <h2><?php echo $quote['title'] ?>
        </h2>

        <legend>– <?php echo $quote['author'] ?> – </legend>

    </section>
             
         

  <?php 
    endforeach ?>


  <section data-bg="events" style="background-image:url('<?php echo base_url('/'); ?>/backend/<?php echo $calendar_event->image ?>');"  class="container-fluid booking parallax wow fadeInDown">
        <div class="row">
            <div class="col-md-6 text ">
                <legend>UPCOMING EVENTS</legend>
                <h2><?php echo $calendar_event->title ?></h2>
                <p class="dashed "><a href="<?php echo base_url('calendar') ?>">Check the event here</a></p>
            </div>
        </div>


    </section>

<!--    
<?php $index=0; ?>
<?php foreach ($events as $event) : ?>

    <section data-bg="events" style="background-image:url('<?php echo base_url('/'); ?>/backend/<?php echo $event['image'] ?>');"  class="container-fluid booking parallax wow fadeInDown">
        <div class="row">
            <div class="col-md-6 text  <?php if ($index%2!=0) {echo "col-md-offset-6 white";} ?>">
                <legend>UPCOMING EVENTS</legend>
                <h2><?php echo $event['title'] ?></h2>
                <p class="dashed <?php if ($index%2!=0) {echo "white";} ?>"><a href="<?php echo base_url('calendar') ?>">Check the event here</a></p>
            </div>
        </div>


    </section>
<?php 
$index++ ; endforeach ?> -->