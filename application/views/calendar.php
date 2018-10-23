<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



 <div class="heading"></div>

<div class="mycalendar wow fadeIn"></div>

<div class="cal-filter">
  <ul>
    <li data-value="tours" class="clickable">TOURS</li>
      <li>/</li>
    <li  data-value="packages" class="clickable">PACKAGES</li>
    <li>/</li>
    <li  data-value="events" class="clickable">EVENTS</li>
    <li>/</li>
    <li  data-value="all" class="clickable active">ALL</li>
  </ul>
</div>

<div class="">
<div class="cal-events wow fadeIn grid-container">


</div>
</div>

<h2 class="text-center">Request a personlised tour or package</h2>
<div class="banner">
        <img src="<?php echo base_url('/'); ?>/backend/<?php echo $this->settings->calendar1; ?>" alt="tech 2">
       
    </div>

<h2 class="text-center">Looking for an escape?</h2>
<div class="banner">
        <img src="<?php echo base_url('/'); ?>/backend/<?php echo $this->settings->calendar2; ?>" alt="tech 2">
       
    </div>

<?php 
$index = 0;

foreach ($sections as $section) : ?>
<div data-izimodal-group="group1" data-izimodal-loop="" class="iziModal" id="modal-default-<?php echo $section['id'] ?>">
  <div class="close">
    <i class="icon icon-close"></i>
  </div>
  <h2>  <?php echo $section['title'] ?></h2>
  <legend><?php echo $section['date'] ?></legend>
  <img src="<?php echo base_url(); ?>/backend/<?php echo $section['image'] ?>" alt="">
    <!-- <p>  <?php echo $section['text'] ?></p>
    <a href=" <?php echo $section['link'] ?>"> <?php echo $section['link_display'] ?></a> -->
</div>

<?php $index++;
endforeach ?>

