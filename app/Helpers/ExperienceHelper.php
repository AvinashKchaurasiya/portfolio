<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\Admin\Experince;

class ExperienceHelper
{
    public static function calculateExperience()
    {
        $experiences = Experince::orderBy('id', 'desc')->get();

        $totalSecondsWithCompany = 0;
        $totalSecondsWithoutCompany = 0;

        foreach ($experiences as $exp) {
            $from = Carbon::parse($exp->from_date);
            $to = $exp->currently_working ? Carbon::now() : Carbon::parse($exp->to_date);
            $diffInSeconds = $to->diffInSeconds($from);

            if (strtolower($exp->company) === 'na') {
                $totalSecondsWithoutCompany += $diffInSeconds;
            } else {
                $totalSecondsWithCompany += $diffInSeconds;
            }
        }

        $freelance = self::formatDuration($totalSecondsWithoutCompany);
        $company = self::formatDuration($totalSecondsWithCompany);
        $total = self::formatDuration($totalSecondsWithCompany + $totalSecondsWithoutCompany);

        return [
            'freelanceExp' => "{$freelance['years']} years {$freelance['months']} months",
            'companyExp' => "{$company['years']} years {$company['months']} months",
            'totalExp' => "{$total['years']} years {$total['months']} months",
        ];
    }

    private static function formatDuration($totalSeconds)
    {
        $dtF = Carbon::createFromTimestamp(0);
        $dtT = Carbon::createFromTimestamp($totalSeconds);
        $diff = $dtF->diff($dtT);

        return [
            'years' => $diff->y,
            'months' => $diff->m
        ];
    }
}
