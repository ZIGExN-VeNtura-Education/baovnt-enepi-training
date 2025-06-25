<div class="w-full text-center mt-8 mb-4">
  <h2 class="text-lg md:text-[28px] font-bold">ご連絡先を教えてください</h2>
  <p class="inline-block text-xs px-3 py-1 bg-paleblue mt-2">
    ※お客様の情報が一般に公開されることはありません
  </p> 
</div>

<form class="w-full max-w-2xl mx-auto flex flex-col gap-4 px-4">
  <div class="flex flex-col md:flex-row gap-4 my-8">
    <div class="flex-1">
      <label class="flex items-center gap-2 mb-3">
        <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
        <span class="block text-[18px] font-semibold">お名前を入力</span>
      </label>
      <input type="text" name="name" required class="w-full border <?php echo isset($errors['name']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['name']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 山田 太郎" />
      <?php if(isset($errors['name'])): ?>
        <p class="text-red-500 text-xs mt-1"><?php echo $errors['name']; ?></p>
      <?php endif; ?>
    </div>
    <div class="flex-1">
      <label class="flex items-center gap-2 mb-3">
        <span class="inline-block text-xs rounded px-1 py-0.5 mr-1 bg-gray text-white">任意</span>
        <span class="block text-[18px] font-semibold">ふりがなを入力</span>
      </label>
      <input type="text" name="furigana" class="w-full border <?php echo isset($errors['furigana']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['furigana']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: やまだ たろう" />
      <?php if(isset($errors['furigana'])): ?>
        <p class="text-red-500 text-xs mt-1"><?php echo $errors['furigana']; ?></p>
      <?php endif; ?>
    </div>
  </div>
  <div class="flex flex-col md:flex-row gap-4">
    <div class="flex-1">
      <label class="flex items-center gap-2 mb-3">
        <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
        <span class="block text-[18px] font-semibold">電話番号を入力</span>
      </label>
      <input type="tel" name="phone" required class="w-full border <?php echo isset($errors['phone']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['phone']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 090-1234-5678" />
      <?php if(isset($errors['phone'])): ?>
        <p class="text-red-500 text-xs mt-1"><?php echo $errors['phone']; ?></p>
      <?php endif; ?>
    </div>
    <div class="flex-1">
      <label class="flex items-center gap-2 mb-3">
        <span class="inline-block bg-brandred text-white text-xs rounded px-1 py-0.5 mr-1" style="border-radius:4px;">必須</span>
        <span class="block text-[18px] font-semibold">メールアドレスを入力</span>
      </label>
      <input type="email" name="email" required class="w-full border <?php echo isset($errors['email']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['email']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例）info@enepi.jp" />
      <?php if(isset($errors['email'])): ?>
        <p class="text-red-500 text-xs mt-1"><?php echo $errors['email']; ?></p>
      <?php endif; ?>
    </div>
  </div>
  <p class="text-xs text-center my-10">
    個人情報の取り扱いについては<span class="text-lightblue">利用規約</span>および<span class="text-lightblue js-terms-link cursor-pointer">プライバシーポリシー</span>に同意してください
  <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-10">
    <button type="button" class="w-full md:w-auto btn-shadow text-lg px-14 py-2 rounded-full border-1 border-lightblue text-lightblue font-bold transition">戻る</button>
    <button type="submit" class="w-full md:w-auto btn-shadow text-lg px-14 py-2 rounded-full bg-orange text-white font-bold transition">【無料】料金を比較する</button>
  </div>
</form>
