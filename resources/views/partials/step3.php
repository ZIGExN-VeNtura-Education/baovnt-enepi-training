<?php include __DIR__ . '/banner.php'; ?>
<?php $step = 3; include __DIR__ . '/processbar.php'; ?>

<!-- Tiêu đề -->
<div class="w-full text-center mt-8 mb-4">
  <h2 class="text-base md:text-lg lg:text-xl font-bold text-gray-800">利用状況を教えてください</h2>
</div>

<!-- Các lựa chọn toggle -->
<div class="w-full max-w-2xl mx-auto flex flex-col md:flex-row gap-4 md:gap-8 mb-8 px-4">
  <label class="flex-1 cursor-pointer">
    <input type="radio" name="usage" class="peer hidden" checked />
    <div class="flex flex-col items-center border-2 border-blue-400 rounded-lg px-4 py-6 shadow peer-checked:bg-blue-50 transition">
      <span class="font-semibold text-gray-700 text-sm md:text-base mb-2">現在ガスを利用している</span>
      <span class="text-xs text-gray-500">(Đang sử dụng gas)</span>
    </div>
  </label>
  <label class="flex-1 cursor-pointer">
    <input type="radio" name="usage" class="peer hidden" />
    <div class="flex flex-col items-center border-2 border-blue-400 rounded-lg px-4 py-6 shadow peer-checked:bg-blue-50 transition">
      <span class="font-semibold text-gray-700 text-sm md:text-base mb-2">これから利用する</span>
      <span class="text-xs text-gray-500">(Sẽ sử dụng gas)</span>
    </div>
  </label>
</div>

<!-- Có thể bổ sung trường nhập nếu chọn option 1 -->
<div class="w-full max-w-2xl mx-auto flex flex-col gap-4 px-4 mb-8">
  <label class="block text-gray-700 font-semibold mb-1">ご利用人数 (Số người sử dụng)</label>
  <input type="number" min="1" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="例: 3" />
</div>

<!-- Nút điều hướng -->
<div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-6 w-full max-w-2xl mx-auto px-4 mb-8">
  <button type="button" class="w-full md:w-auto bg-gray-200 text-gray-700 font-bold rounded-full px-8 py-3 shadow hover:bg-gray-300 transition">戻る</button>
  <button type="submit" class="w-full md:w-auto bg-orange-500 text-white font-bold rounded-full px-8 py-3 shadow hover:bg-orange-600 transition">次へ</button>
</div> 
