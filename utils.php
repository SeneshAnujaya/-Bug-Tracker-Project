<?php
function isDuplicate($new, $list) {
  foreach ($list as $bug) {
    if (strtolower($bug['status']) === 'resolved') continue;

    similar_text($new['title'], $bug['title'], $titlePct);
    similar_text($new['description'], $bug['description'], $descPct);
    $average = ($titlePct + $descPct) / 2;

    if ($average >= 80) return true;
  }
  return false;
}
