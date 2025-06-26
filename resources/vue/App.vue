<template>
  <div>
    <HeaderComponent />
    <BusinessHoursComponent />
    <BannerComponent />
    <MultiStepForm />
  </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue';
import BusinessHoursComponent from './components/BusinessHoursComponent.vue';
import BannerComponent from './components/BannerComponent.vue';
import MultiStepForm from './components/MultiStepForm.vue';
export default {
  components: {
    HeaderComponent,
    BusinessHoursComponent,
    BannerComponent,
    MultiStepForm
  }
}
</script>


