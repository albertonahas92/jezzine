<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
    <?php if($_GET['type']==2):?>
    <div class="cover">
        <img src="<?php echo base_url('/'); ?>/backend/<?php echo $this->settings->section2; ?>" alt="tech 2">
      
    </div>
    <!-- .cd-hero -->
<?php endif ?>

    <?php if($_GET['type']==3):?>
    <div class="cover">
        <img src="<?php echo base_url('/'); ?>/backend/<?php echo $this->settings->section3; ?>" alt="tech 2">
       
    </div>
    <!-- .cd-hero -->
<?php endif ?>

    <?php if($_GET['type']==1):?>
    <div class="cover">
        <img src="<?php echo base_url('/'); ?>/backend/<?php echo $this->settings->section1; ?>" alt="tech 2">
      
    </div>
    <!-- .cd-hero -->
<?php endif ?>

<?php 
$index=0;
foreach ($sections as $section) : ?>



                    <section style="background-image: url('<?php echo base_url('/'); ?>/backend/<?php echo $section['background'] ?>');" class="container-fluid booking  wow fadeIn">
        <div class="row">
            <div class="col-md-6 text <?php if ($index%2!=0) {echo "col-md-offset-6 white";} ?>">
                <legend><?php echo $section['legend'] ?></legend>
                <h2><?php echo $section['title'] ?></h2>
                <article><?php echo $section['description'] ?></article>
                <p class="arrow<?php if ($index%2==0) {echo "-white";} ?>"><a href="<?php echo base_url('article?id=');echo $section['id']  ?>"><?php echo $section['link'] ?></a></p>
            </div>
        </div>


    </section>

<?php $index++; endforeach ?>

  
    