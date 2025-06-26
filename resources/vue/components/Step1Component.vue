<template>
  <div class="w-full text-center mb-10">
    <h2 class="text-base md:text-lg lg:text-[28px] font-bold">所有種別をお選びください</h2>
  </div>
  <div class="flex flex-col items-center gap-4 md:gap-6 px-2 md:px-0">
    <label v-for="option in options" :key="option.value" class="relative flex items-center bg-white border border-[1.5px] border-brown rounded-lg pl-4 py-3 md:pl-4 md:py-3 transition w-full mx-auto md:mx-0 max-w-120 min-h-16 cursor-pointer btn-shadow"
      :class="{ 'border-lightblue ring-2 ring-blue-100': modelValue === option.value, 'border-red-500': !!error }">
      <input type="radio" :value="option.value" name="property_type" class="sr-only peer" :checked="modelValue === option.value" @change="handleSelectionChange(option.value)" />
      <img :src="option.icon" :alt="option.label" class="w-12 md:w-16 mb-2 absolute left-4 md:left-8 top-1/2 -translate-y-1/2" />
      <span class="block w-full text-center font-semibold text-sm md:text-[18px]">{{ option.label }}</span>
    </label>
  </div>
  <p v-if="error" class="step-error text-red-500 text-xs text-center mt-5">{{ error }}</p>
  <div class="w-full flex flex-col md:flex-row justify-center px-2 md:px-0 mt-10">
    <button type="button" class="w-full md:w-auto bg-orange text-white font-bold rounded-full px-8 md:px-12 py-3 shadow transition text-base md:text-lg" @click="onNext">次へ</button>
  </div>
</template>

<script>
export default {
  name: 'Step1Component',
  props: {
    modelValue: String
  },
  emits: ['update:modelValue', 'next'],
  data() {
    return {
      options: [
        { value: '戸建て', label: '戸建て', icon: '/images/house-icon.png' },
        { value: 'マンション・アパート', label: 'マンション・アパート', icon: '/images/apartment-icon.png' },
        { value: '店舗・事務所', label: '店舗・事務所', icon: '/images/store-icon.png' },
      ],
      error: ''
    };
  },
  methods: {
    handleSelectionChange(value) {
      this.$emit('update:modelValue', value);
      if (this.error) {
        this.error = '';
      }
    },
    onNext() {
      if (!this.validate()) return;
      this.$emit('next');
    },
    validate() {
      if (!this.modelValue) {
        this.error = '物件種別を選択してください';
        return false;
      }
      this.error = '';
      return true;
    }
  }
}
</script> 
