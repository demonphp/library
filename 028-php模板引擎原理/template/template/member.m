<html>
{! like.js}
{$data},{$person}
<ul>
<?php
echo $pai*2;?>
{if $data == 'abc'}
我是abc
{elseif $data == 'def'}
我是def
{else}
我就是我,{$data}
{/if}
</html>