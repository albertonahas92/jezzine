<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
 <div class="heading"></div>
<article ng-controller="BookingFilterController">
<div  class="container bookings-page">

     <h2>Bookings</h2>  

<div class="date-filter wow fadeInUp">

<div class="col-md-2">
    <label for="">From</label>
    <input  type="date"/>
</div>
<div class="col-md-2">
    <label for="">To</label>
    <input type="date"/>
</div>

<div class="col-md-3">
      <label class="checkbox">
        <input type="checkbox" class="filled-in grey darken-4"  />
        <span>+/- 3 days</span>
      </label>
</div>

</div>

<div class="filter container wow fadeInUp">
<!-- Village start -->
<div class="col-md-2 filters-column">

<h3>Village</h3>
<section class="list">

   <?php foreach ($villages as $v) : ?>

                                 
<div >
     <label>
        <input ng-click="setVillage(<?php echo $v['id']; ?>);" type="checkbox" class="filled-in grey darken-4" />
        <span><?php echo $v['name']; ?></span>
      </label>
</div>
<?php endforeach ?>
</section>
</div>
<!-- Village end -->
<!-- Hotels Column start -->
<div class="col-md-3 filters-column">
    
<h3>Hotel / Property</h3>
<input name="name" ng-model="f.name" type="text" placeholder="Start typing the name"/>
<section class="list list-hotels">
<div ng-repeat="p in properties | filter:f"> 
     <label>
        <input type="checkbox" class="filled-in grey darken-4"  />
        <span>{{p.name}}</span>
      </label>
</div>

</section>
</div>
<!-- Hotels end -->

<!-- additional filter start -->
<div class="col-md-7 settings filters-column">

<div class="row">

<div class="col-md-3">
   <h3>Nights From</h3>
<select class="browser-default">
    <option value="" disabled selected>Select</option>
    <option value="1"> 1</option>
    <option value="2"> 2</option>
    <option value="3"> 3</option><option value="5"> 5</option><option value="5"> 5</option>
  </select>
 
</div>
<div class="col-md-3">
    <h3>Nights To</h3>
      <!-- Dropdown Trigger -->
 
 <select class="browser-default">
    <option value="" disabled selected>Select</option>
    <option value="1"> 1</option>
    <option value="2"> 2</option>
    <option value="3"> 3</option><option value="5"> 5</option><option value="5"> 5</option>
  </select>
 

</div>
<div class="col-md-3">
    <h3>Adults</h3>
      <!-- Dropdown Trigger -->
 
 <select class="browser-default">
    <option value="" disabled selected>Select</option>
    <option value="1"> 1</option>
    <option value="2"> 2</option>
    <option value="3"> 3</option><option value="5"> 5</option><option value="5"> 5</option>
  </select>
 

</div>
<div class="col-md-3 ">
    <h3>Children</h3>
      <!-- Dropdown Trigger -->
 
 <select class="browser-default">
    <option value="" disabled selected>Select</option>
    <option value="1"> 1</option>
    <option value="2"> 2</option>
    <option value="3"> 3</option><option value="5"> 5</option><option value="5"> 5</option>
  </select>
 

</div>

</div>
<!-- End row -->

<div class="row">

<div class="col-md-3">

<h3>Category 1</h3>
<section class="list">
<div ng-repeat="c in stars">
     <label>
        <input type="checkbox" ng-model="c.checked" ng-checked="c.checked==1"  class="filled-in grey darken-4"  />
        <span>{{c.title}}</span>
      </label>
</div>

</section>
</div>

<div class="col-md-3">

<h3>Category 2</h3>
<section class="list">

<div ng-repeat="c in categories">
     <label>
        <input type="checkbox" ng-model="c.checked" ng-checked="c.checked==1"  class="filled-in grey darken-4"  />
        <span>{{c.title}}</span>
      </label>
</div>

</section>
</div>

<div class="col-md-6">
<div class="row">
<div class="col-md-6">

   <h3>Price</h3>
<input placeholder="from" type="number"/>
 
</div>

<div class="col-md-6">

   <h3> &nbsp; </h3>
<input placeholder="to" type="number"/>
 
</div>
<div class="col-md-12">
<div class="row">
  <div class="col-md-4">
    <label>
        <input type="checkbox" class="filled-in grey darken-4"  />
        <span>USD</span>
      </label> 
  </div>
  <div class="col-md-4">
    <label>
        <input type="checkbox" class="filled-in grey darken-4"  />
        <span>EUR</span>
      </label> 
  </div>
  <div class="col-md-4">
    <label>
        <input type="checkbox" class="filled-in grey darken-4"  />
        <span>LBP</span>
      </label> 
  </div>
</div>


</div>
</div>
</div>


</div>

</div>

</div>


<!-- Additional end -->
</div>





<div class="container properties">

 <div dir-paginate="item in data |itemsPerPage:entryLimit |  keywordFilter: {category: categories }| filter:starsFilter "
                                     class="col-md-4 wow fadeInUp">

<img class="img-responsive" src="<?php echo base_url('/'); ?>/backend/{{item.image}}" />

<div class="details">

   <legend><i class="fa fa-map-marker"></i>{{item.name}}</legend> 
    <h2>{{item.name}}</h2>

</div>
 






           <div class="row">
                            <div class="col-xs-12 col-sm-12 text-center menu-pegination wow fadeInUp">
                                <dir-pagination-controls
                                        max-size="5"
                                        direction-links="true"
                                        boundary-links="true">
                                </dir-pagination-controls>
                                                </div>
                        </div>
                        </div>
</div>
                        <!-- menu pegination ends-->

</div></article>