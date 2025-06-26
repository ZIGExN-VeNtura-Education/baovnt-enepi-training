<div class="w-full min-h-screen bg-[url('/images/background.png')] bg-repeat p-4 md:p-0 md:pb-8">
  <div class="w-full max-w-240 mx-auto pt-2 md:pt-10">
    <h1 class="text-center text-2xl md:text-4xl font-bold text-lightblue font-sans leading-tight">
    プロパンガス<span class="text-base md:text-[28px] text-brown">料金比較で</span>ガス代<span class="text-base md:text-[28px] text-brown">が<br class="block sm:hidden">年間約</span><span class="text-brandred">8<span class="text-base  text-2xl">万円</span></span><span class="text-base md:text-[28px] text-brown">安くなる！</span>
    </h1>
    <p class="text-xs text-center font-normal py-4">※削減金額は条件により異なります</p>
  </div>
  <form id="multiStepForm" class="w-full max-w-190 mx-auto bg-white rounded-xl border-4 border-lightblue p-4 md:p-10">
    <?php include __DIR__ . '/partials/processbar.php'; ?>
    <!-- Step 1 -->
    <div class="step mt-10" data-step="1">
      <?php include __DIR__ . '/partials/step1.php'; ?>
    </div>
    <!-- Step 2 -->
    <div class="step mt-10 hidden" data-step="2">
      <?php include __DIR__ . '/partials/step2.php'; ?>
    </div>
    <!-- Step 3 -->
    <div class="step mt-10 hidden" data-step="3">
      <?php include __DIR__ . '/partials/step3.php'; ?>
    </div>
    <!-- Step 4 -->
    <div class="step mt-10 hidden" data-step="4">
      <?php include __DIR__ . '/partials/step4.php'; ?>
    </div>
  </form>
  <div class="w-full max-w-190 mx-auto mt-8 bg-white rounded-xl border-2 border-lightblue">
    <div class="flex flex-row items-center justify-start">
      <img src="/images/chat-icon.png" alt="" class="w-6 h-6 mx-4" />
      <p class="text-left font-normal font-roboto py-4">07/10 大阪府東大阪市で年間 <span class="text-lightblue text-xl font-bold">44,833</span> 円安くなるご提案が出ました</p>
    </div>
  </div>
</div>
<?php include __DIR__ . '/partials/terms-modal.php'; ?>
