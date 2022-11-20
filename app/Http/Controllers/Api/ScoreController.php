<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ScoreController extends Controller
{
    public function getScore() {
        $user = auth()->user();
        $score = $user->score;
        if ($score->updated_at < today()) {
            $int = rand(10, 100);
            $total = $score->score + $int;
            $score->update([
                "score" => $total
            ]);
            return response()->json([
                "message" => "Get score {$int}",
                "total" => $score->score
            ]);
        } else {
            return response()->json([
                "message" => "Earn random points by daily lucky draw (once a day)"
            ]);
        }
    }

    public function getCoupon() {
        $user = auth()->user();
        $score = $user->score;        

        return response()->json([
            "message" => "Get Coupon Success.",
        ]);
    }
}
