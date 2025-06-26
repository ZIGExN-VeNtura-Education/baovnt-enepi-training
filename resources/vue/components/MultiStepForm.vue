<template>
  <div class="w-full min-h-screen bg-[url('/images/background.png')] bg-repeat p-4 md:p-0 md:pb-8 ">
    <TitleComponent />
    <form id="multiStepForm" class="w-full max-w-190 mx-auto bg-white rounded-xl border-4 border-lightblue p-4 md:p-10">
        <ProcessbarComponent :currentStep="currentStep" />
        <div v-if="currentStep === 1">
          <Step1Component v-model="form.property_type" :error="errors.property_type" @next="nextStep" />
        </div>
        <div v-if="currentStep === 2">
          <Step2Component
            v-model:postcode="form.postcode"
            v-model:prefecture="form.prefecture"
            v-model:address="form.address"
            :errors="errors"
            @next="nextStep"
            @prev="prevStep"
          />
        </div>
        <div v-if="currentStep === 3">
          <Step3Component
            v-model:company="form.company"
            v-model:equipment="form.equipment"
            v-model:month="form.month"
            v-model:gas_fee="form.gas_fee"
            v-model:usage_amount="form.usage_amount"
            v-model:household="form.household"
            :errors="errors"
            @next="nextStep"
            @prev="prevStep"
          />
        </div>
        <div v-if="currentStep === 4">
          <Step4Component
            v-model:name="form.name"
            v-model:furigana="form.furigana"
            v-model:phone="form.phone"
            v-model:email="form.email"
            :errors="errors"
            @prev="prevStep"
            @submit="submitForm"
            @show-privacy="showPrivacyModal = true"
            @show-terms="showTermsModal = true"
          />
        </div>
    </form>
    <ChatInfoComponent />
    <PrivacyModal v-if="showPrivacyModal" @close="showPrivacyModal = false" />
    <TermsModal v-if="showTermsModal" @close="showTermsModal = false" />
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import ProcessbarComponent from './ProcessbarComponent.vue';
import Step1Component from './Step1Component.vue';
import Step2Component from './Step2Component.vue';
import Step3Component from './Step3Component.vue';
import Step4Component from './Step4Component.vue';
import PrivacyModal from './PrivacyModal.vue';
import TermsModal from './TermsModal.vue';
import TitleComponent from './TitleComponent.vue';
import ChatInfoComponent from './ChatInfoComponent.vue';

const currentStep = ref(1);
const showPrivacyModal = ref(false);
const showTermsModal = ref(false);
const form = reactive({
  property_type: '',
  postcode: '',
  prefecture: '',
  address: '',
  company: '',
  equipment: [],
  month: '',
  gas_fee: '',
  usage_amount: '',
  household: '',
  name: '',
  furigana: '',
  phone: '',
  email: '',
});
const errors = reactive({});

function nextStep() {
  if (validateStep(currentStep.value)) {
    if (currentStep.value < 4) currentStep.value++;
  }
}
function prevStep() {
  if (currentStep.value > 1) currentStep.value--;
}
function submitForm() {
  if (validateStep(currentStep.value)) {
    // Submit logic ở đây
    alert('Gửi thành công!');
  }
}
function validateStep(step) {
  // Reset errors
  Object.keys(errors).forEach(k => delete errors[k]);
  if (step === 1) {
    if (!form.property_type) {
      errors.property_type = '物件種別を選択してください';
      return false;
    }
    return true;
  }
  if (step === 2) {
    let valid = true;
    if (!form.postcode) {
      errors.postcode = '郵便番号を入力してください';
      valid = false;
    }
    if (!form.prefecture) {
      errors.prefecture = '都道府県を選択してください';
      valid = false;
    }
    if (!form.address) {
      errors.address = '住所を入力してください';
      valid = false;
    }
    return valid;
  }
  if (step === 3) {
    let valid = true;
    if (!form.company) {
      errors.company = 'ガス会社名を入力してください';
      valid = false;
    }
    return valid;
  }
  if (step === 4) {
    let valid = true;
    if (!form.name) {
      errors.name = 'お名前を入力してください';
      valid = false;
    }
    if (!form.phone) {
      errors.phone = '電話番号を入力してください';
      valid = false;
    }
    if (!form.email) {
      errors.email = 'メールアドレスを入力してください';
      valid = false;
    }
    return valid;
  }
  return true;
}
</script>
