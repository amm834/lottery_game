<?php

include_once 'helper.php';

echo "Welcome From Lottery Game!\n";

$correctNumber = correctNumberGenerator();
$leagalAge = 18;
$legalUserId = 123456;
$totalMoney = 0;
$minimumMoney = 1000;
$gumbblerMoney = 0;

$age = (int)readline("Enter your age : ");

if ($age < $leagalAge) {
  echo "You are too young to play this game.\n";
  exit();
}

while ($age >= $leagalAge) {
  $userId = (int)readline("Enter your user ID : ");

  if ($userId !== $legalUserId) {
    echo "You cannot access to this game now!\n";
    exit();
  }

  while ($userId === $legalUserId) {

    $totalMoney = (int)readline("Enter your total money : ");
    if ($totalMoney < $minimumMoney) {
      echo "You don't have enough money!\n";
      exit();
    }

    while ($totalMoney > $minimumMoney) {
      $gumbblerNumber = (int)readline("Enter your guessing number between 000 to 999 : ");

      if (strlen($gumbblerNumber) < 3) {
        echo "Guessing Number Should be greater than or equal 000 to 999\n";
      }

      $gumbblerMoney = (int)readline("Enter your gumbbler money (1000>=) : ");

      if ($gumbblerMoney < $minimumMoney) {
        echo "Gummbler money should be greater than or equal to 1000\n";
        exit();
      }

      $totalMoney -= $gumbblerMoney;
      echo "Your total money is $totalMoney\n";

      if ($gumbblerNumber === $correctNumber) {
        // generate new number
        $correctNumber = correctNumberGenerator();

        $bonusMoney = $gumbblerMoney * 5;
        $totalMoney += $bonusMoney;
        echo "Congrat! You win!\n";
        echo "You win $bonusMoney MMK\n";
        echo "Your total Money is $totalMoney\n";
        $isPlaying = readline("Do you want to play? [Y/N] : ");
        switch ($isPlaying) {
          case 'Y':
            echo "You are still playing \n";
            break;

          case 'N':
            echo "Bye Bye!\n";
            exit();
            break;
        }

      } else {
        
        $correctNumber = correctNumberGenerator();

        $totalMoney -= $gumbblerMoney;
        echo "You Lose :( \n";

        if ($totalMoney < $minimumMoney) {
          echo "You don't enough money to play this game!\n";
          exit();
        }
        echo "Your total money is $totalMoney\n";

      }

    }

  }

}