<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



 <div class="heading"></div>

<div id='wrap'>

<div id='calendar'></div>

<div style='clear:both'></div>
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
    <p>  <?php echo $section['text'] ?></p>
    <a href=" <?php echo $section['link'] ?>"> <?php echo $section['link_display'] ?></a>
</div>

<?php $index++;
endforeach ?>

