<template>
  <div class="w-full text-center mb-10">
    <h2 class="text-lg md:text-[28px] font-bold">利用先の住所を教えてください</h2>
    <p class="inline-block text-xs px-3 py-1 bg-paleblue mt-2">
      ※お客様の情報が一般に公開されることはありません
    </p>
  </div>
  <div class="flex flex-col md:flex-row gap-4 mt-10 mb-8">
    <div class="flex-1">
      <label class="flex items-center gap-2 mb-3">
        <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
        <span class="block text-[18px] font-semibold">郵便番号を入力</span>
      </label>
      <input type="text" name="postcode" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="例: 1230000"
        :value="postcode" @input="$emit('update:postcode', $event.target.value)" />
      <p v-if="errors?.postcode" class="text-red-500 text-xs mt-1">{{ errors.postcode }}</p>
    </div>
    <div class="flex-1">
      <label class="flex items-center gap-2 mb-3">
        <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
        <span class="block text-[18px] font-semibold">都道府県を選択</span>
      </label>
      <select name="prefecture" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        :value="prefecture" @change="$emit('update:prefecture', $event.target.value)">
        <option value="" disabled selected>選択してください</option>
        <option value="tokyo">東京都</option>
      </select>
      <p v-if="errors?.prefecture" class="text-red-500 text-xs mt-1">{{ errors.prefecture }}</p>
    </div>
  </div>
  <div>
    <label class="flex items-center gap-2 mb-3">
      <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
      <span class="block text-[18px] font-semibold">住所を入力</span>
    </label>
    <input type="text" name="address" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="例）港区新橋1-1 エネピ苑 101"
      :value="address" @input="$emit('update:address', $event.target.value)" />
    <p v-if="errors?.address" class="text-red-500 text-xs mt-1">{{ errors.address }}</p>
  </div>
  <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-10 mt-10">
    <button type="button" class="w-full md:w-auto btn-shadow text-lg px-14 py-2 rounded-full border-1 border-lightblue text-lightblue font-bold transition" @click="$emit('prev')">戻る</button>
    <button type="button" class="w-full md:w-auto btn-shadow text-lg px-14 py-2 rounded-full bg-orange text-white font-bold transition" @click="$emit('next')">次へ</button>
  </div>
</template>

<script>
export default {
  name: 'Step2Component',
  props: {
    postcode: String,
    prefecture: String,
    address: String
  },
  data() {
    return {
      errors: {}
    }
  },
  emits: [
    'update:postcode',
    'update:prefecture',
    'update:address',
    'next',
    'prev'
  ],
  methods: {
    validate() {
      let valid = true;
      const errs = {};
      if (!this.postcode) {
        errs.postcode = '郵便番号を入力してください';
        valid = false;
      }
      if (!this.prefecture) {
        errs.prefecture = '都道府県を選択してください';
        valid = false;
      }
      if (!this.address) {
        errs.address = '住所を入力してください';
        valid = false;
      }
      this.errors = errs;
      return valid;
    }
  }
}
</script> 
