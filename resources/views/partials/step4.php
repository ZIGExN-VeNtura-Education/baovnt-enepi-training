<?php include __DIR__ . '/banner.php'; ?>
<?php $step = 4; include __DIR__ . '/processbar.php'; ?>
<?php
if (!isset($errors)) $errors = [];
?>
<!-- Tiêu đề -->
<div class="w-full text-center mt-8 mb-4">
  <h2 class="text-base md:text-lg lg:text-xl font-bold text-gray-800">ご連絡先を入力してください</h2>
</div>

<!-- Form nhập thông tin liên lạc -->
<form class="w-full max-w-2xl mx-auto flex flex-col gap-4 px-4">
  <div>
    <label class="block text-gray-700 font-semibold mb-1">お名前 (Họ và tên)</label>
    <input type="text" name="name" class="w-full border <?php echo isset($errors['name']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['name']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 山田 太郎" />
    <?php if(isset($errors['name'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['name']; ?></p>
    <?php endif; ?>
  </div>
  <div>
    <label class="block text-gray-700 font-semibold mb-1">電話番号 (Số điện thoại)</label>
    <input type="tel" name="phone" class="w-full border <?php echo isset($errors['phone']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['phone']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: 090-1234-5678" />
    <?php if(isset($errors['phone'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['phone']; ?></p>
    <?php endif; ?>
  </div>
  <div>
    <label class="block text-gray-700 font-semibold mb-1">メールアドレス (Email)</label>
    <input type="email" name="email" class="w-full border <?php echo isset($errors['email']) ? 'border-red-500' : 'border-gray-300'; ?> rounded px-3 py-2 focus:outline-none focus:ring-2 <?php echo isset($errors['email']) ? 'focus:ring-red-400' : 'focus:ring-blue-400'; ?>" placeholder="例: sample@email.com" />
    <?php if(isset($errors['email'])): ?>
      <p class="text-red-500 text-xs mt-1"><?php echo $errors['email']; ?></p>
    <?php endif; ?>
  </div>
  <!-- Nút điều hướng -->
  <div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-6">
    <button type="button" class="w-full md:w-auto bg-gray-200 text-gray-700 font-bold rounded-full px-8 py-3 shadow hover:bg-gray-300 transition">戻る</button>
    <button type="submit" class="w-full md:w-auto bg-orange-500 text-white font-bold rounded-full px-8 py-3 shadow hover:bg-orange-600 transition">完了</button>
  </div>
</form>
<?php include __DIR__ . '/form-note.php'; ?> 
