<?php
// 跑100次，紀錄每次的執行次數作平均，看執行次數k是否接近log_2(n) (n為猜數字的猜測數字範圍)
// this is an auto guess number game

// user config variables
$randMin = readline('Enter min number bound: ');
$randMax = readline('Enter max number bound: ');
$howManyRoundsToCount = readline('Enter total count times: ');
print("now the random number is between ". $randMin . " and " . $randMax . "\n\ngame start:\n\n");

$totalRunTimesCountSeqSearch = 0; // initial the total sequential search running times counter
$totalRunTimesCountBinSearch = 0; // initial the total binary search running times counter

$autoFillNum = 0; // initial the autoFillNum to 0
$userInputNum = 0; // initial the user Input Number
// initial the upper bond and lower bond
for ( $i = $howManyRoundsToCount; $i > 0; $i-- ) {
    // 初始化遊戲開始前參數
    $up = $randMax;
    $lower = $randMin;
    $randomNum = rand( $randMin, $randMax ); // 每回合都產生新亂數
    $totalRunTimesCountSeqSearch+=($randomNum-$randMin+1); // seq search search times is from 1 to the number
    $everyRunTimesCount = 0; // reset the running times counter every round
    while ( true ) {
        
        // guess from the middle
        $userInputNum = intdiv( ( $up + $lower ), 2 );
        // determine the guess right or wrong
        // guess until right number
        $everyRunTimesCount++; // every guess add 1 to counter
        if ( $userInputNum == $randomNum ) {
            // print("guess right!\n");
            break;
        } else if ( $userInputNum > $randomNum ) { // if guess larger number
            $up = $userInputNum - 1;
        } else if ( $userInputNum < $randomNum ) { // if guess lower number
            $lower = $userInputNum + 1;
        } else {
            print("out of bound\n");
            break; // if error, break.
        }
    }
    $totalRunTimesCountBinSearch+=$everyRunTimesCount;
}

print("The average guess times of Sequential Search is " . $totalRunTimesCountSeqSearch/$howManyRoundsToCount . " times.\n\n");
print("The average guess times of Binary Search is " . $totalRunTimesCountBinSearch/$howManyRoundsToCount . " times.\n\n");
// git test
?>