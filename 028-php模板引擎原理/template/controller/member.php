<?php
    include '../core/Template.php';
    $tpl = new Template(['php_turn'=>true,'debug'=>true]);
    $tpl->assign('data','hello world');
    $tpl->assign('person','cateCat');
    $tpl->assign('pai','3.14');
    $tpl->assign('b',[1,2,3,4,"hahattt",6]);
    $tpl->show('member');
