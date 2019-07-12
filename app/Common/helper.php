<?php
/**
 * 帮助函数
 */
function getMsg(){
    $user_id = session('user_id');
    return \Illuminate\Support\Facades\DB::table('notice')->where(['user_id'=>$user_id,'isread'=>'0'])->exists();
}

function diffBetweenTwoDays ($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);

    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}
