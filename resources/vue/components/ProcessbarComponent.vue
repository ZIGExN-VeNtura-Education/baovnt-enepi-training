<template>
  <div class="flex flex-col items-center max-w-80 mx-auto md:max-w-none">
    <div class="flex flex-row items-center justify-between w-full md:w-auto">
      <div
        v-for="(step, i) in steps"
        :key="i"
        class="processbar-step flex flex-col items-center w-[90px] md:w-[131px] relative"
        :class="{ ['z-' + 10 * (i + 1)]: true, '-ml-2 md:-ml-[14px]': i > 0 }"
        :data-step="i + 1"
        :data-active="currentStep === i + 1 ? 1 : null"
        :data-done="currentStep > i + 1 ? 1 : null"
      >
        <svg width="132" height="52" viewBox="0 0 132 52" class="w-full h-full" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="processbar-bg" d="M116.886 0.731445L131.11 26L116.886 51.2686H2.20312L16.2256 26.3594L16.4277 26L16.2256 25.6406L2.20312 0.731445H116.886Z" />
          <text x="50%" y="54%" dominant-baseline="middle" text-anchor="middle"
            font-family="'Noto Sans', sans-serif"
            font-size="18" 
            class="processbar-label"
          >{{ step.label }}</text>
          <rect class="processbar-underline" x="26" y="42" width="80" height="2" rx="1" />
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProcessbarComponent',
  props: {
    currentStep: {
      type: Number,
      default: 1
    }
  },
  data() {
    return {
      steps: [
        { label: '物件情報' },
        { label: '住所' },
        { label: '利用状況' },
        { label: '連絡先' },
      ]
    };
  }
}
</script>
