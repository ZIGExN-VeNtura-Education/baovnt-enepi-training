<?php if (!isset($errors)) $errors = []; ?>
<?php include __DIR__ . '/banner.php'; ?>
<?php $step = 2; include __DIR__ . '/processbar.php'; ?>

<!-- Banner thông báo trên cùng (giữ nguyên như step1) -->
<div class="w-full bg-yellow-200 text-center py-2 text-sm font-bold text-yellow-900">
  プロパンガス料金比較でガス代が年間約8万円安くなる！<br>
  <span class="text-xs font-normal">※削減金額は条件により異なります</span>
</div>

<!-- Thanh tiến trình các bước -->
<div class="w-full flex justify-center mt-6 mb-4">
  <div class="flex bg-white rounded-2xl shadow px-8 py-4 gap-4">
    <div class="flex flex-col items-center">
      <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-500 flex items-center justify-center font-bold">1</div>
      <span class="mt-2 text-xs font-semibold text-gray-500">物件情報</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">2</div>
      <span class="mt-2 text-xs font-semibold text-blue-500">住所</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-500 flex items-center justify-center font-bold">3</div>
      <span class="mt-2 text-xs font-semibold text-gray-500">利用状況</span>
    </div>
    <div class="flex flex-col items-center">
      <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-500 flex items-center justify-center font-bold">4</div>
      <span class="mt-2 text-xs font-semibold text-gray-500">連絡先</span>
    </div>
  </div>
</div>

<!-- Tiêu đề -->
<div class="w-full text-center mt-8 mb-4">
  <h2 class="text-lg md:text-xl font-bold text-gray-800">住所を入力してください</h2>
</div>

<!-- Form nhập địa chỉ -->
<form class="w-full max-w-2xl mx-auto flex flex-col gap-4 px-4">
  <div class="flex flex-col md:flex-row gap-4">
    <div class="flex-1">
      <label class="block text-gray-700 font-semibold mb-1">郵便番号</label>
      <input type="text" name="postcode" class="w-full border <?php echo isset($errors['postcode']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['postcode']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 123-4567" />
      <?php if(isset($errors['postcode'])): ?>
        <p class="text-red-500 text-xs mt-1"><?php echo $errors['postcode']; ?></p>
      <?php endif; ?>
    </div>
    <div class="flex-1">
      <label class="block text-gray-700 font-semibold mb-1">都道府県</label>
      <input type="text" name="prefecture" class="w-full border <?php echo isset($errors['prefecture']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['prefecture']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 東京都" />
      <?php if(isset($errors['prefecture'])): ?>
        <p class="text-red-500 text-xs mt-1"><?php echo $errors['prefecture']; ?></p>
      <?php endif; ?>
    </div>
  </div>
  <div>
    <label class="block text-gray-700 font-semibold mb-1">市区町村</label>
    <input type="text" name="city" class="w-full border <?php echo isset($errors['city']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['city']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 新宿区" />
    <?php if(isset($errors['city'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['city']; ?></p>
    <?php endif; ?>
  </div>
  <div>
    <label class="block text-gray-700 font-semibold mb-1">町名・番地</label>
    <input type="text" name="address" class="w-full border <?php echo isset($errors['address']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['address']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 西新宿2-8-1" />
    <?php if(isset($errors['address'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['address']; ?></p>
    <?php endif; ?>
  </div>
  <div>
    <label class="block text-gray-700 font-semibold mb-1">建物名・部屋番号</label>
    <input type="text" name="building" class="w-full border <?php echo isset($errors['building']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['building']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: ○○マンション101" />
    <?php if(isset($errors['building'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['building']; ?></p>
    <?php endif; ?>
  </div>
  <!-- Nút điều hướng -->
  <div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-6">
    <button type="button" class="w-full md:w-auto bg-gray-200 text-gray-700 font-bold rounded-full px-8 py-3 shadow hover:bg-gray-300 transition">戻る</button>
    <button type="submit" class="w-full md:w-auto bg-orange-500 text-white font-bold rounded-full px-8 py-3 shadow hover:bg-orange-600 transition">次へ</button>
  </div>
</form>
<?php include __DIR__ . '/form-note.php'; ?> 
