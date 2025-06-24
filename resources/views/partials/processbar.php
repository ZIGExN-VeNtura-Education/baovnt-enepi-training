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
      <div class="flex flex-col items-center w-[131px] relative z-<?php echo 10*($i+1); ?> -ml-4">
        <svg width="132" height="52" viewBox="0 0 132 52" class="w-full h-full" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M116.886 0.731445L131.11 26L116.886 51.2686H2.20312L16.2256 26.3594L16.4277 26L16.2256 25.6406L2.20312 0.731445H116.886Z" fill="<?php echo ($i+1)==$step ? 'var(--color-lightblue)' : 'var(--color-processbar-inactive)'; ?>" stroke="white" stroke-width="1.46341"/>
          <text x="50%" y="54%" dominant-baseline="middle" text-anchor="middle"
            font-family="'Noto Sans', sans-serif"
            font-size="18" 
            fill="white"
            font-weight="<?php echo ($i+1)==$step ? 'bold' : 'normal'; ?>"
            <?php if (($i+1)==$step): ?>
              style="text-decoration:underline;text-decoration-thickness:2px;text-underline-offset:4px;"
            <?php endif; ?>
          ><?php echo $s['label']; ?></text>
        </svg>
      </div>
    <?php endforeach; ?>
  </div>
</div> 
