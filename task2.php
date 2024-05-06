<?php

class Task2
{
    function removeDuplicates(&$nums)
    {
        $n = count($nums);
        if ($n <= 1) {
            return $n;
        }

        $prev = $nums[0];
        $count = 1;

        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] != $prev) {
                $prev = $nums[$i];
                $nums[$count] = $nums[$i];
                $count++;
            }
        }

        return $count;
    }
}