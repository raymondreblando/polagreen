<?php
$page_title = "Messages";
$tab_active = "Messages";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <?php include('Partials/admin_navigation.php'); ?>

    <div>
      <div class="flex items-center justify-between gap-4 bg-white py-4 px-8 border-b border-b-gray-300/40">
        <div class="flex items-center gap-3">
          <button class="show-sidebar block md:hidden text-lg font-bold"><i class="ri-menu-line"></i></button>
          <div>
            <p class="text-sm font-semibold text-dark">Messages</p>
            <p class="hidden md:block text-[9px] text-gray-500">Manage sent messages</p>
          </div>
        </div>
        <div class="w-[7rem] h-10 flex items-center gap-3">
          <i class="ri-search-line text-lg text-gray-500"></i>
          <input type="text" class="search-div w-full text-gray-500 text-xs font-medium placeholder:text-gray-500 outline-none" id="search-input" placeholder="Search here" autocomplete="off">
        </div>
      </div>
      <div class="py-6 px-8">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mx-auto">
          <?php
                $database->DBQuery("SELECT * FROM `message` ORDER BY `msg_no` DESC");
                foreach($database->fetchAll() AS $msg):
          ?>
            <div class="search-area">
              <div class="py-4 px-6 rounded-md border border-gray-300/40">
                <div class="flex items-center gap-2 mb-2">
                  <i class="ri-chat-1-line text-2xl font-medium text-primary"></i>
                  <div>
                    <p class="text-xs font-semibold text-dark finder1"><?= $msg->msg_fullname ?></p>
                    <p class="text-[10px] font-medium text-gray-500 finder3"><?= $msg->msg_subject ?></p>
                  </div>
                </div>
                <p class="text-[10px] font-medium text-gray-500 mb-3 finder2"><?= $msg->msg_content ?></p>
                <?php
                  $database->DBQuery("SELECT * FROM `reply` WHERE `msg_id` = ?", [$msg->msg_id]);
                  $reply = $database->fetch();

                  if($database->rowCount() > 0):
                ?>
                  <p class="text-[10px] font-medium text-gray-500 mb-3 finder2"><strong>Your Reply:</strong> <?= $reply->reply ?></p>
                <?php else: ?>
                    <textarea id="reply<?= $msg->msg_id ?>" cols="30" rows="10" class="resize-none w-full h-20 text-[10px] font-medium text-gray-500 placeholder:text-gray-500 border border-gray-300/40 p-2 outline-none" placeholder="Reply here"></textarea>
                    <button type="button" data-id="<?= $msg->msg_id ?>" class="sendReply w-full text-[10px] font-medium text-white bg-primary py-2">Send Reply</button>
                <?php endif ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </main>

  <?php include('Partials/footer.php'); ?>