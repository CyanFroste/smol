<div class="h-[700px] w-[600px] flex flex-col bg-stone-50 shadow-md rounded p-8 text-stone-800">
  <h1 class="text-3xl font-medium text-center mb-4"><?php echo $welcome_message ?></h1>

  <div class="flex flex-col h-full overflow-auto gap-4">
    <span class="version text-center"></span>

    <div class="description h-full p-4 bg-stone-100 rounded overflow-auto prose prose-stone">
      <?php include 'readme.php' ?>
    </div>

    <div class="links ml-auto mt-auto"></div>
  </div>
</div>