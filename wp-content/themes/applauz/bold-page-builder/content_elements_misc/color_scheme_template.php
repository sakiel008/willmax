<?php

$custom_css = "

	/* Headline */
	.bt_bb_headline.bt_bb_color_scheme_{$scheme_id} .bt_bb_headline_superheadline {
		color: inherit;
	}
	
	/* Icons */
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon:hover a {
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline .bt_bb_icon_holder:before {
		background-color: transparent;
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline:hover .bt_bb_icon_holder:before {
		background-color: {$color_scheme[1]};
		box-shadow: 0 0 0 1.2em {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 1.2em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 2px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover .bt_bb_icon_holder:before {
		color: {$color_scheme[2]};
	}

	/* Buttons */
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a {
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a:hover {
		box-shadow: 0 0 0 2em {$color_scheme[1]} inset, 0 3px 10px rgba(24,24,24,.3);
		color: {$color_scheme[2]};		
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a {
		box-shadow: 0 0 0 rgba(24,24,24,.3);
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};		
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a:hover {
		box-shadow: 0 3px 10px rgba(24,24,24,.3);
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover a {
		color: {$color_scheme[2]};
	}

	/* Price List */
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} {
		color: {$color_scheme[1]};
	}
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id}:before {
		background: {$color_scheme[1]};
	}
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} ul:before, .bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_icon:after {
		border-top-color: {$color_scheme[1]};
	}

	/* Section */
	.bt_bb_section.bt_bb_color_scheme_{$scheme_id} {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}
	
	/* Service icon */
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service:hover .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_gradient_filled.bt_bb_service .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service .bt_bb_icon_holder {
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 2px {$color_scheme[2]} inset;
	}
	
	/* Features table */
	.bt_bb_color_scheme_{$scheme_id} .bt_bb_features_table table thead tr th, .bt_bb_color_scheme_{$scheme_id}.bt_bb_features_table table thead tr th {
		border-bottom-color: {$color_scheme[1]};
		color: {$color_scheme[1]};
	}

	/* Tabs */
	.bt_bb_tabs.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li.on, .bt_bb_tabs.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li:hover {
		color: inherit;
	}
	.bt_bb_tabs.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li {
		color: inherit;
	}

	/* Accordions */
	.bt_bb_accordion.bt_bb_color_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title:hover,
	.bt_bb_accordion.bt_bb_color_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title:hover {
		color: {$color_scheme[1]};
	}
";