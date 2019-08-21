<div class="btTileBox" data-hw="<?php echo $hw ?>">
	<div class="bpgPhoto"> 
		<a href="<?php echo $post['permalink']; ?>">
			<div class="boldPhotoBox"><div class="bpbItem"><div class="btImage"><img src="<?php echo $img_src; ?>"></div></div></div>
			<div class="captionPane">
				<h5 class="captionTitle"><?php echo $post['title']; ?></h5>
				<div class="captionExcerpt"><?php echo $post['excerpt']; ?></div>
			</div>
			<?php if ( $tiles_title ) { ?>
				<div class="btShowTitle">
					<h5 class="captionTitle"><?php echo $post['title']; ?></h5>
				</div>
			<?php } ?>
		</a>
	</div>
</div>