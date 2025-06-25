<?php
if (!isset($step)) $step = 1;
$steps = [
  ['label' => '物件情報'],
  ['label' => '住所'],
  ['label' => '利用状況'],
  ['label' => '連絡先'],
];
?>
<div class="flex flex-col items-center">
  <div class="flex flex-row items-center justify-between">
    <?php foreach ($steps as $i => $s): ?>
      <div class="processbar-step flex flex-col items-center w-[131px] relative z-<?php echo 10*($i+1); ?> -ml-[14px]" data-step="<?php echo $i+1; ?>" <?php if (($i+1)==$step): ?>data-active="1"<?php endif; ?>>
        <svg width="132" height="52" viewBox="0 0 132 52" class="w-full h-full" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="processbar-bg" d="M116.886 0.731445L131.11 26L116.886 51.2686H2.20312L16.2256 26.3594L16.4277 26L16.2256 25.6406L2.20312 0.731445H116.886Z" />
          <text x="50%" y="54%" dominant-baseline="middle" text-anchor="middle"
            font-family="'Noto Sans', sans-serif"
            font-size="18" 
            class="processbar-label"
          ><?php echo $s['label']; ?></text>
          <rect class="processbar-underline" x="26" y="42" width="80" height="2" rx="1" />
        </svg>
      </div>
    <?php endforeach; ?>
  </div>
</div> 
