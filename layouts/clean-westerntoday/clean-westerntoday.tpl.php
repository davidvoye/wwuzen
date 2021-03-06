<?php
/**
 * @file
 * Template for a custom layout built for WesternToday.
 *
 * This template provides a full-width top area, 75%/25% mid area for a sidebar,
 * and 4 columns for news feed views, followed by a final 100% bottom row.
 *
 * Matthew Takemoto January 2017
 * Based on the 75/25 layout by Nigel Packer (February 2014)
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['top_1']: Content for the top 100% row.
 *   - $content['top_2']: Same as above but without the white background 
 *   - $content['left_1..2']: Content in the left column. 
 *   - $content['right_1..2']: Content in the right column.
 *   - $content['col_1..4'] Content for one of the four columns.
 *   - $content['bottom'] Content for the bottom 100% row.
 */
?>
<div class="wwu-100-percent-wrapper top-1-wrapper section-wrapper white-bg">

  <?php if ($content['top_1']): ?>
  <div class="wwu-100-percent wt-section top" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
    <?php print $content['top_1']; ?>
  </div>
  <?php endif; ?>

</div>

<div class="wwu-100-percent-wrapper top-2-wrapper section-wrapper">

  <?php if ($content['top_2']): ?>
  <div class="wwu-100-percent wt-section top" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
    <?php print $content['top_2']; ?>
  </div>
  <?php endif; ?>

</div>

<div class="wwu-75-25-wrapper middle-1-wrapper section-wrapper white-bg">
  <div class="wwu-75-25-container wt-section">

    <?php if ($content['left_1']): ?>
    <div class="wwu-75-percent-left-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['left_1']; ?>
    </div>
    <?php endif; ?>

    <?php if ($content['right_1']): ?>
    <div class="wwu-25-percent-right-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['right_1']; ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="wwu-75-25-container wt-section">

    <?php if ($content['left_2']): ?>
    <div class="wwu-left-half-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['left_2']; ?>
    </div>
    <?php endif; ?>

    <?php if ($content['mid_2']): ?>
    <div class="wwu-mid-half-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['mid_2']; ?>
    </div>
    <?php endif; ?>

    <?php if ($content['right_2']): ?>
    <div class="wwu-25-percent-right-column" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['right_2']; ?>
    </div>
    <?php endif; ?>

  </div>
</div>

<div class="wwu-4-col-wrapper middle-2-wrapper section-wrapper white-bg">
  <div class="wwu-4-col-container wt-section">

    <?php if ($content['col_1']): ?>
    <div class="col-1" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['col_1']; ?>
    </div>
    <?php endif; ?>

    <?php if ($content['col_1']): ?>
    <div class="col-2" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['col_2']; ?>
    </div>
    <?php endif; ?>

    <?php if ($content['col_1']): ?>
    <div class="col-3" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['col_3']; ?>
    </div>
    <?php endif; ?>

    <?php if ($content['col_1']): ?>
    <div class="col-4" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
      <?php print $content['col_4']; ?>
    </div>
    <?php endif; ?>

  </div>
</div>

<div class="wwu-100-percent-wrapper bottom-wrapper section-wrapper">

  <?php if ($content['bottom']): ?>
  <div class="wwu-100-percent wt-section bottom" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
    <?php print $content['bottom']; ?>
  </div>
  <?php endif; ?>

</div>
