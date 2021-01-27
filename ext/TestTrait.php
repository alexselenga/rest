<?php


namespace app\ext;

trait TestTrait
{
    public function getNumberIndex($number, $numbers) {
        $lastIndex = $leftIndex = -1;
        $rightIndex = count($numbers);
        $leftCount = $rightCount = 0;

        while ($rightIndex - $leftIndex > 1) {
            if ($leftCount <= $rightCount) {
                $leftIndex++;

                if ($numbers[$leftIndex] == $number) {
                    $leftCount++;
                }
            } else {
                $rightIndex--;

                if ($numbers[$rightIndex] != $number) {
                    $rightCount++;
                }
            }

            if ($leftCount && $rightCount && $leftCount == $rightCount) {
                $lastIndex = $leftIndex + 1;
            }
        }

        return $lastIndex;
    }
}