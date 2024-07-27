<?php 
    require 'administrator/element_LTP/mod/loaihangCls.php'
?>

<a href="./index.php">
    <div class="itemsmenu">
        <img class="imgmenu" src="./administrator/img_LTP/home-icon.png" alt="">Home
    </div>
</a>

<?php
    $obj = new loaihang();
    $list_lh = $obj->LoaihangGetAll();

    foreach ($list_lh as $v) {
        
      ?>
      <a href="./index.php?reqView=<?php echo $v->idloaihang; ?>">
        <div class="itemsmenu">
            <img class="imgmenu" src="data:image/png;base64,<?php echo $v->hinhanh; ?>">
            <?php echo $v->tenloaihang; ?>
        </div>
      </a>
      <?php

    }
?>