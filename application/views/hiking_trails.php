<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
     <div class="heading"></div>


<?php 
$index=0;

foreach ($sections as $section) : ?>



                    <div  class="container  hikings wow fadeIn">
        <div class="row">
            <div class="col-md-8 text ">
              
                <h2><?php echo $section['name'] ?></h2>
                <legend><?php echo $section['description'] ?></legend>
               
            </div>

            <div class="col-md-4"><a href="<?php echo base_url('/'); ?>/backend/<?php echo $section['pdf_link'] ?>">Download Pdf</a> </div>
        </div>


    </div>

<?php $index++; endforeach ?>

