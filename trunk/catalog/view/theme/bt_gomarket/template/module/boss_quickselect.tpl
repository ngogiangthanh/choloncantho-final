<div class="box-selected<?php echo $module ?> quick-select">
	<p><a><?php echo $heading_title ?></a><span></span></p>
	<div class="sub-inside">
		<ul>
            <?php foreach ($iconcates as $iconcate) { ?>
			<li class="quick-list-iterm">
                <img title="<?php echo $iconcate['name']; ?>" src="<?php echo $iconcate['icon']; ?>" alt="<?php echo $iconcate['name']; ?>" />
                <?php if(!empty($iconcate['name'])){ ?>
                    <a title="<?php echo $iconcate['name']; ?>" href="<?php echo $iconcate['href']; ?>"><?php echo $iconcate['name']; ?></a>
                <?php } else{?>
                    <a title="<?php echo $iconcate['cate_name']; ?>" href="<?php echo $iconcate['href']; ?>"><?php echo $iconcate['cate_name']; ?></a>
                <?php } ?>
            </li>
            <?php } ?>
		</ul>
	</div>
</div>
