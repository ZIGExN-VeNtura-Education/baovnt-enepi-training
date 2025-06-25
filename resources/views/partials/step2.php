<div class="w-full text-center mt-8 mb-4">
  <h2 class="text-lg md:text-[28px] font-bold">利用先の住所を教えてください</h2>
  <p class="inline-block text-xs px-3 py-1 bg-paleblue mt-2">
    ※お客様の情報が一般に公開されることはありません
  </p> 
</div>

<div class="flex flex-col md:flex-row gap-4 my-8">
  <div class="flex-1">
    <label class="flex items-center gap-2 mb-3">
      <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
      <span class="block text-[18px] font-semibold">郵便番号を入力</span>
    </label>
    <input type="text" name="postcode" required class="w-full border <?php echo isset($errors['postcode']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['postcode']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 1230000" />
    <?php if(isset($errors['postcode'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['postcode']; ?></p>
    <?php endif; ?>
  </div>
  <div class="flex-1">
    <label class="flex items-center gap-2 mb-3">
      <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
      <span class="block text-[18px] font-semibold">都道府県を選択</span>
    </label>
    <select name="prefecture" required class="w-full border <?php echo isset($errors['prefecture']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['prefecture']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>">
      <option value="" disabled selected>選択してください</option>
    </select>
    <?php if(isset($errors['prefecture'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['prefecture']; ?></p>
    <?php endif; ?>
  </div>
</div>
<div>
  <label class="flex items-center gap-2 mb-3">
    <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
    <span class="block text-[18px] font-semibold">住所を入力</span>
  </label>
  <input type="text" name="address" required class="w-full border <?php echo isset($errors['address']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['address']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例）港区新橋1-1 エネピ荘 101" />
  <?php if(isset($errors['address'])): ?>
    <p class="text-red-500 text-xs mt-1"><?php echo $errors['address']; ?></p>
  <?php endif; ?>
</div>

<div class="flex flex-row justify-center items-center gap-10 mt-6">
  <button type="button" class="btn-shadow text-lg px-14 py-2 rounded-full border-1 border-lightblue text-lightblue font-bold transition">戻る</button>
  <button type="submit" class="btn-shadow text-lg px-14 py-2 rounded-full bg-orange text-white font-bold transition">次へ</button>
</div>
