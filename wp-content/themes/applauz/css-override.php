<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#53ba00";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#a6e72a";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Raleway";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Raleway";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Roboto";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "100";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -5" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -5" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -10" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$css_override = sanitize_text_field("select,
input{font-family: {$bodyFont};}
input[type=\"file\"]::-webkit-file-upload-button{background: {$accentColor};
    font-family: {$headingFont};}
input[type=\"file\"]::-webkit-file-upload-button:hover{background: {$accentColorDark} !important;}
.btContent a{color: {$accentColor};}
a:hover{
    color: {$accentColor};}
.btText a{color: {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\";}
blockquote{
    font-family: \"{$headingFont}\";}
.btContentHolder table thead th{
    background-color: {$accentColor};}
.btAccentDarkHeader .btPreloader .animation > div:first-child,
.btLightAccentHeader .btPreloader .animation > div:first-child,
.btTransparentLightHeader .btPreloader .animation > div:first-child{
    background-color: {$accentColor};}
.btPreloader .animation .preloaderLogo{height: {$logoHeight}px;}
.btLoader{
    -webkit-box-shadow: 0 -34px 0 -27px {$accentColor},-12px -32px 0 -27px {$accentColor},-22px -26px 0 -27px {$accentColor},-30px -17px 0 -27px {$accentColor},-34px -5px 0 -27px {$accentColor},-34px 7px 0 -27px {$accentColor};
    box-shadow: 0 -34px 0 -27px {$accentColor},-12px -32px 0 -27px {$accentColor},-22px -26px 0 -27px {$accentColor},-30px -17px 0 -27px {$accentColor},-34px -5px 0 -27px {$accentColor},-34px 7px 0 -27px {$accentColor};}
.error404 .btErrorPage .bt_bb_port .bt_bb_headline .bt_bb_headline_subheadline a{
    font-family: {$headingFont};}
.mainHeader{
    font-family: \"{$menuFont}\";}
.mainHeader a:hover{color: {$accentColor};}
.menuPort{font-family: \"{$menuFont}\";}
.menuPort nav > ul > li > a:after{
    background-color: {$accentColor};}
.menuPort nav > ul > li.on > a:after{
    background-color: {$accentColor} !important;}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.menuPort nav ul ul li a{
    font-family: {$bodyFont};}
.btTextLogo{font-family: \"{$menuFont}\";
    line-height: {$logoHeight}px;}
.btLogoArea .logo img{height: {$logoHeight}px;}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort ul ul li.current-menu-item > a{color: {$accentColor} !important;}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:before{
    background: {$accentColor};}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a{
    font-family: {$menuFont};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInMenu .topBarInMenuCell{line-height: -webkit-calc({$logoHeight}px/2);
    line-height: -moz-calc({$logoHeight}px/2);
    line-height: calc({$logoHeight}px/2);}
.btAccentLightHeader .btBelowLogoArea,
.btAccentLightHeader .topBar{background-color: {$accentColor};
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(to right,{$alternateColor} 0%,{$accentColor} 100%);}
.btAccentLightHeader .btBelowLogoArea nav > ul > li.current-menu-ancestor > a:hover:after,
.btAccentLightHeader .btBelowLogoArea nav > ul > li.current-menu-item > a:hover:after,
.btAccentLightHeader .topBar nav > ul > li.current-menu-ancestor > a:hover:after,
.btAccentLightHeader .topBar nav > ul > li.current-menu-item > a:hover:after{background-color: {$accentColor};}
.btAccentDarkHeader .btBelowLogoArea,
.btAccentDarkHeader .topBar{background-color: {$accentColor};
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(to right,{$alternateColor} 0%,{$accentColor} 100%);}
.btAccentDarkHeader .btBelowLogoArea nav > ul > li.current-menu-ancestor > a:hover:after,
.btAccentDarkHeader .btBelowLogoArea nav > ul > li.current-menu-item > a:hover:after,
.btAccentDarkHeader .topBar nav > ul > li.current-menu-ancestor > a:hover:after,
.btAccentDarkHeader .topBar nav > ul > li.current-menu-item > a:hover:after{background-color: {$accentColor};}
.btLightAccentHeader .btLogoArea,
.btLightAccentHeader .btVerticalHeaderTop{background-color: {$accentColor};
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(to right,{$alternateColor} 0%,{$accentColor} 100%);}
.btLightAccentHeader .btLogoArea nav > ul > li.current-menu-ancestor > a:hover:after,
.btLightAccentHeader .btLogoArea nav > ul > li.current-menu-item > a:hover:after,
.btLightAccentHeader .btVerticalHeaderTop nav > ul > li.current-menu-ancestor > a:hover:after,
.btLightAccentHeader .btVerticalHeaderTop nav > ul > li.current-menu-item > a:hover:after{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .btLogoArea{background-color: {$accentColor};}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .logo img{height: -webkit-calc({$logoHeight}px*0.6);
    height: -moz-calc({$logoHeight}px*0.6);
    height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .btTextLogo{
    line-height: -webkit-calc({$logoHeight}px*0.6);
    line-height: -moz-calc({$logoHeight}px*0.6);
    line-height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .menuPort nav > ul > li > a,
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .menuPort nav > ul > li > .subToggler{line-height: -webkit-calc({$logoHeight}px*0.6);
    line-height: -moz-calc({$logoHeight}px*0.6);
    line-height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .topBarInMenu{height: -webkit-calc({$logoHeight}px*0.6);
    height: -moz-calc({$logoHeight}px*0.6);
    height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .topBarInMenuCell{line-height: -webkit-calc({$logoHeight}px*0.6);
    line-height: -moz-calc({$logoHeight}px*0.6);
    line-height: calc({$logoHeight}px*0.6);}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuVertical .mainHeader nav ul li li a{font-family: {$bodyFont} !important;}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btMenuVertical .menuPort nav > ul > li.current-menu-ancestor a,
.btMenuVertical .menuPort nav > ul > li.current-menu-item a,
.btMenuVertical .menuPort nav > ul > li.menu-item a{font-family: \"{$menuFont}\";}
.btMenuVertical .menuPort nav > ul > li.current-menu-ancestor a:hover,
.btMenuVertical .menuPort nav > ul > li.current-menu-item a:hover,
.btMenuVertical .menuPort nav > ul > li.menu-item a:hover{color: {$accentColor} !important;}
.btMenuVertical .menuPort nav > ul > li .current_page_item a{color: {$accentColor} !important;}
.btLightAccentHeader.btMenuBelowLogo.btMenuVertical .menuPort nav > ul > li .current_page_item a,
.btLightDarkHeader:not(.btMenuBelowLogo).btMenuVertical .menuPort nav > ul > li .current_page_item a{color: {$accentColor} !important;}
.btSiteFooter .btSiteFooterCopyMenu .btFooterMenu .menu li{
    font-family: {$headingFont};}
.btSiteFooter .btSiteFooterCopyMenu .btFooterMenu .menu li a:hover{color: {$alternateColor};}
.btSiteFooter .bt_bb_custom_menu li a:hover{color: {$alternateColor};}
.btSiteFooter .bt_bb_custom_menu.btBottomFooterMenu li{
    font-family: {$headingFont};}
.btSiteFooter .btFooterSubscribe input[type='submit']{
    background: {$alternateColor} !important;}
.btSiteFooter .btFooterSubscribe input[type='submit']:hover{background: {$accentColor} !important;}
.btSiteFooter .btFooterSubscribe .ajax-loader{
    background: {$alternateColor};
    border: 2px solid {$alternateColor};}
.btSiteFooter .btFooterSubscribe span.wpcf7-not-valid-tip{color: {$alternateColor};}
.btDarkSkin .btSiteFooter .port:before,
.btLightSkin .btDarkSkin .btSiteFooter .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooter .port:before,
.bt_bb_color_scheme_1 .btSiteFooter .port:before,
.bt_bb_color_scheme_3 .btSiteFooter .port:before,
.bt_bb_color_scheme_6 .btSiteFooter .port:before{background-color: {$accentColor};}
.btMediaBox.btQuote:before,
.btMediaBox.btLink:before{
    background-color: {$accentColor};
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(left,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(to right,{$alternateColor} 0%,{$accentColor} 100%);}
.btMediaBox.btQuote cite,
.btMediaBox.btLink cite{
    font-family: {$headingSubTitleFont};}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]{font-family: {$headingFont};
    background: {$accentColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]:hover{
    background: {$accentColorDark};}
.btPagination{font-family: \"{$headingFont}\";}
.btPagination .paging a:after{
    background: {$accentColor};}
.btPagination .paging a:hover:after{background: {$alternateColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{font-family: {$headingFont};}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.btPrevNextNav .btPrevNext:hover .btPrevNextImage{
    -webkit-box-shadow: 0 0 0 3px {$alternateColor} inset,0 3px 10px rgba(24,24,24,.3);
    box-shadow: 0 0 0 3px {$alternateColor} inset,0 3px 10px rgba(24,24,24,.3);}
.btLinkPages ul a{
    background: {$accentColor};}
.btLinkPages ul a:hover{background: {$alternateColor};}
.btArticleCategories a:hover{color: {$accentColor} !important;}
.btArticleDate:before,
.btArticleAuthor:before,
.btArticleComments:before{
    color: {$accentColor};}
.btArticleDate:not(span):hover,
.btArticleAuthor:not(span):hover,
.btArticleComments:not(span):hover{color: {$accentColor} !important;}
.btCommentsBox ul.comments li.pingback .edit-link a:before{
    color: {$accentColor};}
.btCommentsBox .vcard .posted:before{
    color: {$accentColor};}
.btCommentsBox .commentTxt p.edit-link a:before,
.btCommentsBox .commentTxt p.reply a:before{
    color: {$accentColor};}
.comment-awaiting-moderation{color: {$accentColor};}
a#cancel-comment-reply-link{
    color: {$accentColor};
    font-family: {$headingFont};
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
a#cancel-comment-reply-link:hover{
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);
    box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);}
.btCommentSubmit{font-family: {$headingFont};
    background: {$accentColor};}
.btCommentSubmit:hover{
    background: {$accentColorDark};}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 2px solid {$accentColor};}
.btBox ul li a:before,
.btCustomMenu ul li a:before,
.btTopBox ul li a:before{
    background: {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.widget_calendar table caption{background: {$accentColor};
    background: {$accentColor};
    font-family: \"{$headingFont}\";}
.widget_rss li a.rsswidget{font-family: \"{$headingFont}\";}
.fancy-select ul.options li:hover{color: {$accentColor};}
.widget_shopping_cart .total{
    font-family: {$headingFont};}
.widget_shopping_cart .buttons .button{
    font-family: {$menuFont};
    background: {$accentColor} !important;}
.widget_shopping_cart .buttons .button:hover{background: {$accentColorDark} !important;}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};
    -webkit-box-shadow: 0 0 0 0 {$alternateColor} inset;
    box-shadow: 0 0 0 0 {$alternateColor} inset;}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{-webkit-box-shadow: 0 0 0 1.5em {$alternateColor} inset;
    box-shadow: 0 0 0 1.5em {$alternateColor} inset;}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    font: normal .92em/1 {$bodyFont};
    background: {$accentColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon:hover,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon:hover,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon:hover{color: {$accentColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent{
    top: -webkit-calc({$logoHeight}px/2);
    top: -moz-calc({$logoHeight}px/2);
    top: calc({$logoHeight}px/2);}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{font-family: {$headingFont};}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    font-family: {$headingFont};}
.btBox .tagcloud a:hover,
.btTags ul a:hover{
    background: {$accentColor};}
.topTools .btIconWidget:not(div).topTools .btIconWidget:hover,
.topBarInMenu .btIconWidget:not(div).topBarInMenu .btIconWidget:hover{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
.btAccentLightHeader .btLogoArea .btIconWidget:not(div):hover{color: {$accentColor} !important;}
.btLightAccentHeader .btBelowLogoArea .btIconWidget:not(div):hover,
.btLightAccentHeader .topBar .btIconWidget:not(div):hover{color: {$accentColor} !important;}
.btLightDarkHeader .btLogoArea .btIconWidget:not(div):hover{color: {$accentColor} !important;}
.btLightDarkHeader .btBelowLogoArea .btIconWidget:not(div):hover,
.btLightDarkHeader .topBar .btIconWidget:not(div):hover{color: {$accentColor} !important;}
.btLightDarkHeader .btBelowLogoArea .btIconWidget.btAccentIconWidget .btIconWidgetIcon,
.btLightDarkHeader .topBar .btIconWidget.btAccentIconWidget .btIconWidgetIcon{color: {$accentColor};}
.btSidebar .btSearch button,
.btSiteFooter .btSearch button,
.btSidebar .btSearch input[type=submit],
.btSiteFooter .btSearch input[type=submit],
.btSidebar .widget_product_search button,
.btSiteFooter .widget_product_search button,
.btSidebar .widget_product_search input[type=submit],
.btSiteFooter .widget_product_search input[type=submit]{
    background: {$accentColor};}
.btLightSkin .btSidebar .btSearch button:hover,
.btLightSkin .btSiteFooter .btSearch button:hover,
.btDarkSkin .btLightSkin .btSidebar .btSearch button:hover,
.btDarkSkin .btLightSkin .btSiteFooter .btSearch button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar .btSearch button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSiteFooter .btSearch button:hover,
.bt_bb_color_scheme_2 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_2 .btSiteFooter .btSearch button:hover,
.bt_bb_color_scheme_4 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_4 .btSiteFooter .btSearch button:hover,
.bt_bb_color_scheme_5 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_5 .btSiteFooter .btSearch button:hover,
.btDarkSkin .btSidebar .btSearch button:hover,
.btDarkSkin .btSiteFooter .btSearch button:hover,
.btLightSkin .btDarkSkin .btSidebar .btSearch button:hover,
.btLightSkin .btDarkSkin .btSiteFooter .btSearch button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar .btSearch button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooter .btSearch button:hover,
.bt_bb_color_scheme_1 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_1 .btSiteFooter .btSearch button:hover,
.bt_bb_color_scheme_3 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_3 .btSiteFooter .btSearch button:hover,
.bt_bb_color_scheme_6 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_6 .btSiteFooter .btSearch button:hover,
.btLightSkin .btSidebar .widget_product_search button:hover,
.btLightSkin .btSiteFooter .widget_product_search button:hover,
.btDarkSkin .btLightSkin .btSidebar .widget_product_search button:hover,
.btDarkSkin .btLightSkin .btSiteFooter .widget_product_search button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSidebar .widget_product_search button:hover,
.btLightSkin .btDarkSkin .btLightSkin .btSiteFooter .widget_product_search button:hover,
.bt_bb_color_scheme_2 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_2 .btSiteFooter .widget_product_search button:hover,
.bt_bb_color_scheme_4 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_4 .btSiteFooter .widget_product_search button:hover,
.bt_bb_color_scheme_5 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_5 .btSiteFooter .widget_product_search button:hover,
.btDarkSkin .btSidebar .widget_product_search button:hover,
.btDarkSkin .btSiteFooter .widget_product_search button:hover,
.btLightSkin .btDarkSkin .btSidebar .widget_product_search button:hover,
.btLightSkin .btDarkSkin .btSiteFooter .widget_product_search button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSidebar .widget_product_search button:hover,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooter .widget_product_search button:hover,
.bt_bb_color_scheme_1 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_1 .btSiteFooter .widget_product_search button:hover,
.bt_bb_color_scheme_3 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_3 .btSiteFooter .widget_product_search button:hover,
.bt_bb_color_scheme_6 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_6 .btSiteFooter .widget_product_search button:hover{background: {$accentColorDark} !important;}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
.bt_bb_dash_top.bt_bb_headline .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline .bt_bb_headline_content:before{
    border-color: {$accentColor};}
.bt_bb_headline .bt_bb_headline_superheadline{
    font-family: {$headingSuperTitleFont};}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{font-family: {$headingSubTitleFont};}
.bt_bb_dash_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h6 .bt_bb_headline_content:after{
    border-color: {$accentColor};}
.bt_bb_headline h1 a:hover,
.bt_bb_headline h2 a:hover,
.bt_bb_headline h3 a:hover,
.bt_bb_headline h4 a:hover,
.bt_bb_headline h5 a:hover,
.bt_bb_headline h6 a:hover{color: {$accentColor};}
.bt_bb_headline h1 strong,
.bt_bb_headline h2 strong,
.bt_bb_headline h3 strong,
.bt_bb_headline h4 strong,
.bt_bb_headline h5 strong,
.bt_bb_headline h6 strong{
    color: {$accentColor};}
.bt_bb_headline h1 u,
.bt_bb_headline h2 u,
.bt_bb_headline h3 u,
.bt_bb_headline h4 u,
.bt_bb_headline h5 u,
.bt_bb_headline h6 u{
    color: {$alternateColor};}
button.mfp-close{
    color: {$accentColor};}
button.mfp-close:hover{
    color: {$alternateColor};}
button.mfp-arrow:hover{background: {$alternateColor};}
.bt_bb_required:after{
    color: {$accentColor} !important;}
.required{color: {$accentColor} !important;}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category{
    font-family: {$headingSuperTitleFont};}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category .post-categories li a:hover{color: {$accentColor};}
.bt_bb_color_scheme_3 .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a{color: {$accentColor} !important;}
.bt_bb_color_scheme_4 .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a{color: {$accentColor} !important;}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a:hover{color: {$accentColor};}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta > span:before{
    color: {$accentColor};}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta > span a:hover{color: {$accentColor} !important;}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_date{font-family: {$bodyFont};}
.btSiteFooter .bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a:hover{color: {$alternateColor};}
.bt_bb_post_grid_loader{
    -webkit-box-shadow: 0 -34px 0 -27px {$accentColor},-12px -32px 0 -27px {$accentColor},-22px -26px 0 -27px {$accentColor},-30px -17px 0 -27px {$accentColor},-34px -5px 0 -27px {$accentColor},-34px 7px 0 -27px {$accentColor};
    box-shadow: 0 -34px 0 -27px {$accentColor},-12px -32px 0 -27px {$accentColor},-22px -26px 0 -27px {$accentColor},-30px -17px 0 -27px {$accentColor},-34px -5px 0 -27px {$accentColor},-34px 7px 0 -27px {$accentColor};}
.bt_bb_post_grid_filter{
    font-family: {$menuFont};}
.bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:after{
    background: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_thumbnail:after,
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_thumbnail:after{
    background: {$alternateColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category,
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category{
    font-family: {$headingSuperTitleFont};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category .post-categories li a:hover,
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category .post-categories li a:hover{
    color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span:before,
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span:before{
    color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span a:hover,
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span a:hover{color: {$accentColor} !important;}
.bt_bb_color_scheme_3 .bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a,
.bt_bb_color_scheme_3 .bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a{color: {$accentColor} !important;}
.bt_bb_color_scheme_4 .bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a,
.bt_bb_color_scheme_4 .bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a{color: {$accentColor} !important;}
.bt_bb_color_scheme_7 .bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a,
.bt_bb_color_scheme_7 .bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a{color: {$alternateColor} !important;}
.bt_bb_color_scheme_8 .bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a,
.bt_bb_color_scheme_8 .bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a{color: {$alternateColor} !important;}
.bt_bb_masonry_post_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover,
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover{color: {$accentColor};}
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category{
    font-family: {$headingSuperTitleFont};}
.bt_bb_masonry_portfolio_grid .bt_bb_grid_item_post_content .bt_bb_grid_item_category a:hover{
    color: {$accentColor};}
.bt_bb_masonry_portfolio_tiles .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_inner_content .bt_bb_grid_item_post_excerpt:before{border-top: 2px solid {$accentColor};}
.bt_bb_style_gradient_filled.bt_bb_icon .bt_bb_icon_holder{background: -webkit-linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -ms-linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -o-linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(315deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(315deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);}
.bt_bb_style_gradient_borderless.bt_bb_icon .bt_bb_icon_holder:before{color: {$accentColor};
    background: {$accentColor};
    background-image: -webkit-linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);
    background-image: -moz-linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);
    background-image: -ms-linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);
    background-image: -o-linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);
    background-image: -webkit-linear-gradient(315deg,{$alternateColor} 33%,{$accentColor} 66%);
    background-image: -moz-linear-gradient(315deg,{$alternateColor} 33%,{$accentColor} 66%);
    background-image: linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);}
.bt_bb_style_gradient_filled.bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColor};}
.bt_bb_button .bt_bb_button_text{font-family: {$headingFont};}
.bt_bb_color_scheme_5.bt_bb_button.bt_bb_style_filled a:hover{background: {$accentColorDark} !important;}
.bt_bb_color_scheme_6.bt_bb_button.bt_bb_style_filled a:hover{background: {$accentColorDark} !important;}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title{
    font-family: {$headingFont};}
.bt_bb_service:hover .bt_bb_service_content_title a{color: {$accentColor};}
.bt_bb_style_gradient_filled.bt_bb_service .bt_bb_icon_holder{background: -moz-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -webkit-linear-gradient(315deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(315deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(135deg,{$alternateColor} 0%,{$accentColor} 100%);}
.bt_bb_style_gradient_borderless.bt_bb_service .bt_bb_icon_holder{color: {$accentColor};
    background: {$accentColor};
    background: -moz-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);
    background: -webkit-linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);
    background: -webkit-linear-gradient(315deg,{$alternateColor} 33%,{$accentColor} 66%);
    background: -moz-linear-gradient(315deg,{$alternateColor} 33%,{$accentColor} 66%);
    background: linear-gradient(135deg,{$alternateColor} 33%,{$accentColor} 66%);}
.bt_bb_style_gradient_filled.bt_bb_service:hover a.bt_bb_icon_holder{color: {$accentColor};}
.slick-dots li.slick-active,
.slick-dots li.slick-active:hover{-webkit-box-shadow: 0 -4px 0 0 {$accentColor} inset !important;
    box-shadow: 0 -4px 0 0 {$accentColor} inset !important;}
button.slick-arrow:hover{background: {$alternateColor};}
.bt_bb_custom_menu div ul a:hover{color: {$accentColor};}
.bt_bb_style_simple ul.bt_bb_tabs_header li.on{border-color: {$accentColor};}
ul.bt_bb_tabs_header li{font-family: {$headingFont};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title{font-family: {$headingFont};}
.bt_bb_style_simple.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title:after{
    background: {$accentColor};}
.bt_bb_color_scheme_5.bt_bb_price_list:before{
    background: {$accentColor} !important;}
.bt_bb_color_scheme_6.bt_bb_price_list:before{
    background: {$accentColor} !important;}
.bt_bb_price_list .bt_bb_price_list_title{
    font-family: {$headingFont};}
.bt_bb_price_list .bt_bb_price_list_title:after{
    background: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_price{
    font-family: {$headingFont};}
.bt_bb_counter_holder{
    font-family: {$headingFont};}
.wpcf7-form .wpcf7-submit{
    font-family: {$headingFont} !important;
    background: {$accentColor} !important;}
.wpcf7-form .wpcf7-submit:hover{
    background: {$accentColorDark} !important;}
.bt_bb_color_scheme_1 .wpcf7-form .wpcf7-submit{background: {$accentColor} !important;}
.bt_bb_color_scheme_1 .wpcf7-form .wpcf7-submit:hover{background: {$accentColorDark} !important;}
.bt_bb_color_scheme_2 .wpcf7-form .wpcf7-submit{background: {$accentColor} !important;}
.bt_bb_color_scheme_2 .wpcf7-form .wpcf7-submit:hover{background: {$accentColorDark} !important;}
.bt_bb_color_scheme_3 .wpcf7-form .wpcf7-submit{background: {$accentColor} !important;}
.bt_bb_color_scheme_3 .wpcf7-form .wpcf7-submit:hover{background: {$accentColorDark} !important;}
.bt_bb_color_scheme_4 .wpcf7-form .wpcf7-submit{background: {$accentColor} !important;}
.bt_bb_color_scheme_4 .wpcf7-form .wpcf7-submit:hover{background: {$accentColorDark} !important;}
.bt_bb_masonry_image_grid .bt_bb_grid_item_inner > .bt_bb_grid_item_inner_image:after{
    background: {$alternateColor};}
.btLightSkin .bt_bb_features_table table thead tr th,
.btDarkSkin .btLightSkin .bt_bb_features_table table thead tr th,
.btLightSkin .btDarkSkin .btLightSkin .bt_bb_features_table table thead tr th,
.bt_bb_color_scheme_2 .bt_bb_features_table table thead tr th,
.bt_bb_color_scheme_4 .bt_bb_features_table table thead tr th,
.bt_bb_color_scheme_5 .bt_bb_features_table table thead tr th{border-bottom-color: {$accentColor};}
.btDarkSkin .bt_bb_features_table table thead tr th,
.btLightSkin .btDarkSkin .bt_bb_features_table table thead tr th,
.btDarkSkin.btLightSkin .btDarkSkin .bt_bb_features_table table thead tr th,
.bt_bb_color_scheme_1 .bt_bb_features_table table thead tr th,
.bt_bb_color_scheme_3 .bt_bb_features_table table thead tr th,
.bt_bb_color_scheme_6 .bt_bb_features_table table thead tr th{border-bottom-color: {$accentColor};}
.bt_bb_features_table table tbody tr td .bt_bb_features_table_yes:after{
    color: {$accentColor};}
.bt_bb_section.bt_bb_background_overlay_solid_accent[class*=\"bt_bb_background_overlay\"]:before{background: -moz-gradient(135deg,{$alternateColor} 20%,{$accentColor} 80%);
    background: -webkit-linear-gradient(135deg,{$alternateColor} 20%,{$accentColor} 80%);
    background: -webkit-linear-gradient(315deg,{$alternateColor} 20%,{$accentColor} 80%);
    background: -moz-linear-gradient(315deg,{$alternateColor} 20%,{$accentColor} 80%);
    background: linear-gradient(135deg,{$alternateColor} 20%,{$accentColor} 80%);}
div.wpcf7 .btAlternateSubscribe input[type='submit']{
    background: {$alternateColor} !important;}
div.wpcf7 .btAlternateSubscribe input[type='submit']:hover{background: {$accentColor} !important;}
div.wpcf7 .btAlternateSubscribe span.wpcf7-not-valid-tip{color: {$accentColor};}
.bt_bb_color_scheme_1 div.wpcf7 .btAlternateSubscribe input[type='submit'],
.bt_bb_color_scheme_2 div.wpcf7 .btAlternateSubscribe input[type='submit'],
.bt_bb_color_scheme_3 div.wpcf7 .btAlternateSubscribe input[type='submit'],
.bt_bb_color_scheme_4 div.wpcf7 .btAlternateSubscribe input[type='submit'],
.bt_bb_color_scheme_5 div.wpcf7 .btAlternateSubscribe input[type='submit'],
.bt_bb_color_scheme_6 div.wpcf7 .btAlternateSubscribe input[type='submit']{background: {$alternateColor} !important;}
.bt_bb_color_scheme_1 div.wpcf7 .btAlternateSubscribe input[type='submit']:hover,
.bt_bb_color_scheme_2 div.wpcf7 .btAlternateSubscribe input[type='submit']:hover,
.bt_bb_color_scheme_3 div.wpcf7 .btAlternateSubscribe input[type='submit']:hover,
.bt_bb_color_scheme_4 div.wpcf7 .btAlternateSubscribe input[type='submit']:hover,
.bt_bb_color_scheme_5 div.wpcf7 .btAlternateSubscribe input[type='submit']:hover,
.bt_bb_color_scheme_6 div.wpcf7 .btAlternateSubscribe input[type='submit']:hover{background: {$accentColor} !important;}
div.wpcf7 .btNotify input[type='submit']{background: {$accentColor} !important;}
div.wpcf7 .btNotify input[type='submit']:hover{background: {$accentColorDark} !important;}
.btCounterHolder{font-family: {$headingFont};}
.btCounterHolder .btCountdownHolder span[class$=\"_text\"]{font-family: {$bodyFont};}
.btCountDownAccentNumbers.btCounterHolder .btCountdownHolder span[class^=\"n\"],
.btCountDownAccentNumbers.btCounterHolder .btCountdownHolder .days > span:first-child,
.btCountDownAccentNumbers.btCounterHolder .btCountdownHolder .days > span:nth-child(2),
.btCountDownAccentNumbers.btCounterHolder .btCountdownHolder .days > span:nth-child(3){color: {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .bt_bb_image:after,
ul.products li.product .btWooShopLoopItemInner .bt_bb_image:after{
    background: {$alternateColor};}
.products ul li.product .btWooShopLoopItemInner .price,
ul.products li.product .btWooShopLoopItemInner .price{
    color: {$accentColor};
    font-family: {$headingFont};}
.products ul li.product .btWooShopLoopItemInner .added:after,
.products ul li.product .btWooShopLoopItemInner .loading:after,
ul.products li.product .btWooShopLoopItemInner .added:after,
ul.products li.product .btWooShopLoopItemInner .loading:after{
    background-color: {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .added_to_cart,
ul.products li.product .btWooShopLoopItemInner .added_to_cart{
    color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{font-family: {$headingFont};
    background: {$alternateColor};}
.products ul li.product .onsale:after,
ul.products li.product .onsale:after{
    border-color: {$alternateColorVeryDark} transparent transparent transparent;}
.rtl .products ul li.product .onsale:after,
.rtl ul.products li.product .onsale:after{
    border-color: transparent {$alternateColorVeryDark} transparent transparent;}
nav.woocommerce-pagination ul li a:focus,
nav.woocommerce-pagination ul li a:hover{
    background: {$alternateColor};}
nav.woocommerce-pagination ul li a.next,
nav.woocommerce-pagination ul li a.prev{background: {$accentColor};}
nav.woocommerce-pagination ul li a.next:hover,
nav.woocommerce-pagination ul li a.prev:hover{
    background: {$alternateColor};}
div.product .onsale{font-family: {$headingFont};
    background: {$alternateColor};}
div.product .onsale:after{
    border-color: transparent {$alternateColorVeryDark} transparent transparent;}
.rtl div.product .onsale:after{
    border-color: {$alternateColorVeryDark} transparent transparent transparent;}
div.product div.images .woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image:not(:first-child) a:after{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    background: {$accentColor};}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{background: {$alternateColor};}
div.product div.summary .price{font-family: {$headingFont};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
table.shop_table td.product-remove a.remove{
    color: {$accentColor};
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
table.shop_table td.product-remove a.remove:hover{-webkit-box-shadow: 0 0 0 2em {$alternateColor} inset;
    box-shadow: 0 0 0 2em {$alternateColor} inset;}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
.woocommerce-MyAccount-navigation ul{font-family: {$menuFont};}
.woocommerce-MyAccount-navigation ul li a:after{
    background: {$accentColor};}
form fieldset legend{
    font-family: {$headingFont};}
.select2-container .select2-results .select2-results__option:hover,
.select2-container .select2-results .select2-results__option--highlighted{background: {$accentColor};}
.woocommerce-info a: not(.button),
.woocommerce-message a: not(.button){color: {$accentColor};}
.woocommerce-message:before,
.woocommerce-info:before{
    color: {$accentColor};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button{
    font-family: {$headingFont};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button{background-color: {$accentColor};}
.woocommerce .btSidebar a.button:hover,
.woocommerce .btContent a.button:hover,
.woocommerce-page .btSidebar a.button:hover,
.woocommerce-page .btContent a.button:hover,
.woocommerce .btSidebar input[type=\"submit\"]:hover,
.woocommerce .btContent input[type=\"submit\"]:hover,
.woocommerce-page .btSidebar input[type=\"submit\"]:hover,
.woocommerce-page .btContent input[type=\"submit\"]:hover,
.woocommerce .btSidebar button[type=\"submit\"]:hover,
.woocommerce .btContent button[type=\"submit\"]:hover,
.woocommerce-page .btSidebar button[type=\"submit\"]:hover,
.woocommerce-page .btContent button[type=\"submit\"]:hover,
.woocommerce .btSidebar input.button:hover,
.woocommerce .btContent input.button:hover,
.woocommerce-page .btSidebar input.button:hover,
.woocommerce-page .btContent input.button:hover,
div.woocommerce a.button:hover,
div.woocommerce input[type=\"submit\"]:hover,
div.woocommerce button[type=\"submit\"]:hover,
div.woocommerce input.button:hover{background: {$accentColorDark};}
.woocommerce .btSidebar input.alt,
.woocommerce .btContent input.alt,
.woocommerce-page .btSidebar input.alt,
.woocommerce-page .btContent input.alt,
.woocommerce .btSidebar a.button.alt,
.woocommerce .btContent a.button.alt,
.woocommerce-page .btSidebar a.button.alt,
.woocommerce-page .btContent a.button.alt,
.woocommerce .btSidebar .button.alt,
.woocommerce .btContent .button.alt,
.woocommerce-page .btSidebar .button.alt,
.woocommerce-page .btContent .button.alt,
.woocommerce .btSidebar button.alt,
.woocommerce .btContent button.alt,
.woocommerce-page .btSidebar button.alt,
.woocommerce-page .btContent button.alt,
div.woocommerce input.alt,
div.woocommerce a.button.alt,
div.woocommerce .button.alt,
div.woocommerce button.alt{
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;
    color: {$accentColor};}
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{background: {$accentColor};
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);
    box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);}
.woocommerce .btSidebar a.edit:before,
.woocommerce .btContent a.edit:before,
.woocommerce-page .btSidebar a.edit:before,
.woocommerce-page .btContent a.edit:before,
div.woocommerce a.edit:before{
    color: {$accentColor};}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.product-category a:hover{color: {$accentColor};}
.pswp--has_mouse .pswp__button--arrow--left:hover,
.pswp--has_mouse .pswp__button--arrow--right:hover{background: {$alternateColor};}
.btQuoteBooking .btContactNext{
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;
    color: {$accentColor};
    font-family: {$headingFont};}
.btQuoteBooking .btContactNext:focus,
.btQuoteBooking .btContactNext:hover{-webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);
    box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{
    background: {$accentColor};}
.btQuoteBooking input[type=\"text\"]:focus,
.btQuoteBooking input[type=\"email\"]:focus,
.btQuoteBooking input[type=\"password\"]:focus,
.btQuoteBooking textarea:focus,
.btQuoteBooking .fancy-select .trigger:focus,
.btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{
    -webkit-box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);
    box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{
    background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    background: {$accentColor};}
.btQuoteBooking .btQuoteTotalText{
    font-family: {$headingFont};}
.btQuoteBooking .btQuoteTotalCurrency{
    font-family: {$headingFont};}
.btQuoteBooking .btQuoteTotalCalc{
    font-family: {$headingFont};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btDatePicker .ui-datepicker-header{
    background-color: {$accentColor};}
.btQuoteBooking .ddChild ul li:hover,
.btQuoteBooking .ddChild ul li.selected:hover{color: {$accentColor};}
.btQuoteBooking .btContactSubmit{
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;
    color: {$accentColor};
    font-family: {$headingFont};}
.btQuoteBooking .btContactSubmit:focus,
.btQuoteBooking .btContactSubmit:hover{
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);
    box-shadow: 0 0 0 2em {$accentColor} inset,0 3px 10px rgba(24,24,24,.3);}
.btPayPalButton:hover{-webkit-box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.bt_cc_email_confirmation_container [type=\"checkbox\"]:not(:checked) + label:after,
.bt_cc_email_confirmation_container [type=\"checkbox\"]:checked + label:after{
    background: {$accentColor};}
.bt_cc_email_confirmation_container [type=\"checkbox\"]:checked + label:before{border-color: {$accentColor};
    background: {$accentColor};}
}.wp-block-button__link:hover{color: {$accentColor} !important;}
", array() );