<?php

function matchAndPrint($str, $regex) {
  echo '$str:  ' . $str   ."\n";
  echo '$regex:' . $regex ."\n";

  if (preg_match("/$regex/u", $str)) {
    echo "Matched.\n";
  } else {
    echo "Unmatched\n";
  }
  echo "\n";
}

matchAndPrint('カタカナ',  '^\p{Katakana}+$');
matchAndPrint('カタカナー','^\p{Katakana}+$');
matchAndPrint('カタカナー', '^[\p{Katakana}\p{Common}]+$');
