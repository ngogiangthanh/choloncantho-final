<div class="box boss_manufacturer">
  <div class="box-heading"><span><?php echo $heading_title; ?></span></div>
  <div class="box-content">
    <?php if ($manufacturers) { ?>
    <select onchange="location=this.options[this.selectedIndex].value;">
      <option value=""><?php echo $text_select; ?></option>
      <?php foreach ($manufacturers as $manufacturer) { ?>
      <option value="<?php echo $manufacturer['href']; ?>"><?php echo $manufacturer['name']; ?></option>
      <?php } ?>
    </select>
    <?php } ?>
  </div>
</div>