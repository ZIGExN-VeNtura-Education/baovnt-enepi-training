<div class="w-full text-center mt-8 mb-4">
  <h2 class="text-lg md:text-[28px] font-bold">ガスの利用状況を教えてください</h2>
  <p class="inline-block text-xs px-3 py-1 bg-paleblue mt-2">
    ※任意の項目は分かる範囲でご入力ください
  </p> 
</div>

<div class="w-full max-w-2xl mx-auto flex flex-col gap-6 px-4">
  <div>
    <label class="flex items-center gap-2 mb-3">
      <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
      <span class="block font-semibold text-[18px]">ガス会社名を入力</span>
    </label>
    <input type="text" name="company" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-lightblue" placeholder="例）株式会社エネピ" />
  </div>

  <div>
    <div class="toggle-detail relative flex items-center cursor-pointer select-none mb-2 bg-paleblue text-center text-[18px] font-semibold min-h-[48px]">
      <div class="block w-full text-sm md:text-[18px]">詳細な結果をご覧いただくにはこちら</div>
      <img src="/images/arrow-up.png" alt="toggle" class="toggle-arrow absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5" style="display:inline;" />
      <img src="/images/arrow-down.png" alt="toggle" class="toggle-arrow absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5" style="display:none;" />
    </div>
    <div class="toggle-detail-content flex flex-col gap-6 mt-5">
      <div>
        <label class="flex items-center gap-2 mb-3">
          <span class="inline-block text-xs rounded px-1 py-0.5 mr-1 bg-gray text-white">任意</span>
          <span class="block font-semibold text-sm md:text-[18px]">利用中の以下の設備はありますか？</span>
        </label>
        <div class="flex flex-col gap-4 my-4 md:flex-row md:gap-8">
          <label class="flex items-center cursor-pointer px-2 py-1 md:px-4 md:py-3 w-full md:w-auto">
            <input type="checkbox" name="equipment[]" value="ガスコンロ" class="border border-lightgray mr-4 w-[22px] h-[22px]" />
            <span class="text-[18px]">ガスコンロ</span>
          </label>
          <label class="flex items-center cursor-pointer px-2 py-1 md:px-4 md:py-3 w-full md:w-auto">
            <input type="checkbox" name="equipment[]" value="ガス給湯器" class="border border-lightgray mr-4 w-[22px] h-[22px]" />
            <span class="text-[18px]">ガス給湯器</span>
          </label>
          <label class="flex items-center cursor-pointer px-2 py-1 md:px-4 md:py-3 w-full md:w-auto">
            <input type="checkbox" name="equipment[]" value="ストーブ" class="border border-lightgray mr-4 w-[22px] h-[22px]" />
            <span class="text-[18px]">ストーブ</span>
          </label>
        </div>
      </div>
      <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
          <label class="flex items-center gap-2 mb-3">
            <span class="inline-block text-xs rounded px-1 py-0.5 mr-1 bg-gray text-white">任意</span>
            <span class="block font-semibold text-[18px]">使用月を選択</span>
          </label>
          <select name="month" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-lightblue">
            <option value="" disabled selected>選択してください</option>
          </select>
        </div>
        <div class="flex-1 flex items-end">
          <div class="w-full">
            <label class="flex items-center gap-2 mb-3">
              <span class="inline-block text-xs rounded px-1 py-0.5 mr-1 bg-gray text-white">任意</span>
              <span class="block font-semibold text-[18px]">ガス代を入力</span>
            </label>
            <div class="flex items-center">
              <input
                type="text"
                name="gas_fee"
                class="flex-1 border border-lightgray rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-lightblue mr-3"
                placeholder="例）5,000"
              />
              <span class="font-semibold text-[18px]">
                円
                <span class="text-xs font-normal align-top leading-6">(税込)</span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1 flex items-end">
          <div class="w-full">
            <label class="flex items-center gap-2 mb-3">
              <span class="inline-block text-xs rounded px-1 py-0.5 mr-1 bg-gray text-white">任意</span>
              <span class="block font-semibold text-[18px]">使用量を入力</span>
            </label>
            <div class="flex items-center">
              <input type="text" name="usage_amount" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-lightblue mr-3" placeholder="例）10" />
              <span class="font-semibold">m<sup>3</sup></span>
            </div>
          </div>
        </div>
        <div class="flex-1">
          <label class="flex items-center gap-2 mb-3">
            <span class="inline-block text-xs rounded px-1 py-0.5 mr-1 bg-gray text-white">任意</span>
            <span class="block font-semibold text-[18px]">世帯人数を選択</span>
          </label>
          <select name="household" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-lightblue">
            <option value="" disabled selected>選択してください</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-10 mt-6">
    <button type="button" class="w-full md:w-auto btn-shadow text-lg px-14 py-2 rounded-full border-1 border-lightblue text-lightblue font-bold transition">戻る</button>
    <button type="submit" class="w-full md:w-auto btn-shadow text-lg px-14 py-2 rounded-full bg-orange text-white font-bold transition">次へ</button>
  </div>
</div> 
