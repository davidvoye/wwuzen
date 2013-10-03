<?php
/**
 * @file
 * Template for a 2 column Clean Huxley panel layout.
 *
 * This template provides a two column panel display layout with minimal markup.
 * Edited by Amy Brown September 2013
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="clean-huxley huxley-homepage-left-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php print $content['left']; ?>
</div>

<div class="clean-huxley huxley-homepage-right-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php print $content['right']; ?>
</div>
