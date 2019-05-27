<div class="insta-gallery-image-mask">
</div>
<div class="insta-gallery-image-mask-content">
  <?php if ($instagram_item['insta_likes']): ?>
    <span class="ig-likes-likes">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z" fill="#fff"></path></svg>
      <?php echo esc_attr($item['likes']); ?>
    </span>
  <?php endif; ?>
  <?php if ($instagram_item['insta_comments']): ?>
    <span class="ig-likes-comments">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M256 32c-141.385 0-256 93.125-256 208s114.615 208 256 208c13.578 0 26.905-0.867 39.912-2.522 54.989 54.989 120.625 64.85 184.088 66.298v-13.458c-34.268-16.789-64-47.37-64-82.318 0-4.877 0.379-9.665 1.082-14.348 57.898-38.132 94.918-96.377 94.918-161.652 0-114.875-114.615-208-256-208z" fill="#fff"></path></svg>
      <?php echo esc_attr($item['comments']); ?>
    </span>
  <?php endif; ?>
</div>