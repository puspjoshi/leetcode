<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function findTargetSumWays(array $nums, int $target): int
    {
        $sum = array_sum($nums);
        
        if (($sum + $target) % 2 !== 0 || $sum < abs($target)) {
            return 0;
        }
        
        $subsetSum = ($sum + $target) / 2;
        
        return $this->countSubsetsWithSum($nums, $subsetSum);
    }

    private function countSubsetsWithSum(array $nums, int $sum): int
    {
        $dp    = array_fill(0, $sum + 1, 0);
        
        $dp[0] = 1;
        
        foreach ($nums as $num) {
            for ($j = $sum; $j >= $num; $j--) {
                $dp[$j] += $dp[$j - $num];
            }
        }
        
        return $dp[$sum];
    }
}

$solution = new Solution();

$res = $solution->findTargetSumWays([1,1,1,1,1],3);

?>