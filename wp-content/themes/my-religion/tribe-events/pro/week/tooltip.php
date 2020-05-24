<?php

/**
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/pro/week/tooltip.php
 * @version 4.4
 * 
 * @cmsmasters_package 	My Religion
 * @cmsmasters_version 	1.1.8
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		<div class="tribe-events-event-body">
		<h5 class="entry-title summary">[[=title]]<\/h5>
		
			<div class="tribe-event-duration duration">
				<abbr class="tribe-events-abbr tribe-event-date-start published">[[=dateDisplay]] <\/abbr>
			<\/div>
			[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" \/>
			<\/div>
			[[ } ]]
			[[ if(excerpt.length) { ]]
			<div class="tribe-event-description">[[=raw excerpt]]<\/div>
			[[ } ]]
			<span class="tribe-events-arrow"><\/span>
		<\/div>
	<\/div>
</script>

<script type="text/html" id="tribe_tmpl_tooltip_featured">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip tribe-event-featured">
		<div class="tribe-events-event-body">
			<h5 class="entry-title summary">[[=title]]<\/h5>
			<div class="tribe-event-duration duration">
				<abbr class="tribe-events-abbr tribe-event-date-start published">[[=dateDisplay]] <\/abbr>
			<\/div>
			[[ if(imageTooltipSrc.length) { ]]
				<div class="tribe-events-event-thumb">
					<img src="[[=imageTooltipSrc]]" alt="[[=title]]" \/>
				<\/div>
			[[ } ]]
			[[ if(excerpt.length) { ]]
			<div class="tribe-event-description">[[=raw excerpt]]<\/div>
			[[ } ]]
			<span class="tribe-events-arrow"><\/span>
		<\/div>
	<\/div>
</script>
