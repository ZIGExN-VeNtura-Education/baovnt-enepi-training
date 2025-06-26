<template>
  <div>
    <div @click="showPrivacyModal = true" class="w-full bg-yellow-200 overflow-hidden js-privacy-link cursor-pointer">
      <img src="/images/banner-pc.png" alt="Banner PC" class="w-full h-auto hidden md:block" />
      <img src="/images/banner-sp.jpg" alt="Banner SP" class="w-full h-auto md:hidden" />
    </div>
    <PrivacyModal v-if="showPrivacyModal" @close="showPrivacyModal = false" />
  </div>
</template>

<script>
import PrivacyModal from './PrivacyModal.vue';
export default {
  name: 'BannerComponent',
  components: {
    PrivacyModal
  },
  data() {
    return {
      showPrivacyModal: false,
    }
  },
}
</script>
