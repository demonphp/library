<?php
//count_chars函数和str_word_count
    $data = "Two Ts and one F.";

    foreach (count_chars($data, 1) as $i => $val) {
        echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
    }

    echo "<hr>";
    $str = "Hello fri3nd, you're looking good today!";

    print_r(str_word_count($str, 1));

