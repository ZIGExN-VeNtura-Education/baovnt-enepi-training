<template>
  <div class="w-full min-h-screen bg-[url('/images/background.png')] bg-repeat p-4 md:p-0 md:pb-8 ">
    <TitleComponent />
    <form id="multiStepForm" class="w-full max-w-190 mx-auto bg-white rounded-xl border-4 border-lightblue p-4 md:p-10" @submit.prevent="submitForm">
        <ProcessbarComponent :currentStep="currentStep" />
        <div v-if="currentStep === 1" class="mt-10">
          <Step1Component ref="step1" v-model="form.property_type" @next="nextStep" />
        </div>
        <div v-if="currentStep === 2" class="mt-10">
          <Step2Component ref="step2"
            v-model:postcode="form.postcode"
            v-model:prefecture="form.prefecture"
            v-model:address="form.address"
            @next="nextStep"
            @prev="prevStep"
          />
        </div>
        <div v-if="currentStep === 3" class="mt-10">
          <Step3Component ref="step3"
            v-model:company="form.company"
            v-model:equipment="form.equipment"
            v-model:month="form.month"
            v-model:gas_fee="form.gas_fee"
            v-model:usage_amount="form.usage_amount"
            v-model:household="form.household"
            @next="nextStep"
            @prev="prevStep"
          />
        </div>
        <div v-if="currentStep === 4" class="mt-10">
          <Step4Component ref="step4"
            v-model:name="form.name"
            v-model:furigana="form.furigana"
            v-model:phone="form.phone"
            v-model:email="form.email"
            @prev="prevStep"
          />
        </div>
    </form>
    <ChatInfoComponent />
  </div>
</template>

<script>
import ProcessbarComponent from './ProcessbarComponent.vue';
import Step1Component from './Step1Component.vue';
import Step2Component from './Step2Component.vue';
import Step3Component from './Step3Component.vue';
import Step4Component from './Step4Component.vue';
import TitleComponent from './TitleComponent.vue';
import ChatInfoComponent from './ChatInfoComponent.vue';
export default {
  name: 'MultiStepForm',
  components: {
    ProcessbarComponent,
    Step1Component,
    Step2Component,
    Step3Component,
    Step4Component,
    TitleComponent,
    ChatInfoComponent
  },
  data() {
    return {
      currentStep: 1,
      form: {
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
      }
    }
  },
  methods: {
    nextStep() {
      if (!this.validateCurrentStep()) return;
      if (this.currentStep < 4) this.currentStep++;
    },
    prevStep() {
      if (this.currentStep > 1) this.currentStep--;
    },
    submitForm() {
      if (!this.validateCurrentStep()) return;
    },
    validateCurrentStep() {
      const refName = `step${this.currentStep}`;
      const stepComponent = this.$refs[refName];
      if (stepComponent && typeof stepComponent.validate === 'function') {
        return stepComponent.validate();
      }
      return true;
    }
  }
}
</script>
