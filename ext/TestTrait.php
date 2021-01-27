<?php


namespace app\ext;

trait TestTrait
{
    public function getNumberIndex($number, $numbers) {
        $leftIndex = 0;
        $rightIndex = count($numbers) - 1;
        $leftCount = $rightCount = 0;

        while ($leftIndex != $rightIndex) {
            if ($leftCount <= $rightCount) {
                if ($numbers[$leftIndex] == $number) {
                    $leftCount++;
                }

                $leftIndex++;
            } else {
                if ($numbers[$rightIndex] != $number) {
                    $rightCount++;
                }

                $rightIndex--;
            }
        }

        if (!$leftCount || !$rightCount) {
            return -1;
        }

        return $leftIndex;
    }
}