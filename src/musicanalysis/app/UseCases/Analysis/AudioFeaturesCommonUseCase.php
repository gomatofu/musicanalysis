<?php
namespace App\UseCases\Analysis;

use App\Services\SpotifyAPIService;
use Exception;

class AudioFeaturesCommonUseCase
{
    /**
     * 曲のキーを数値⇒文字列に変換(0⇒C)
     * @param int $key
     * @return string
     */
    public function keyConversion(int $key):string
    {
        $pitchClass = array(0 => "C", 1 => "C#", 2 => "D" , 3 => "D#", 4 => "E", 5 => "F"
                            , 6 => "F#", 7 => "G", 8 => "G#" , 9 => "A", 10 => "A#", 11 => "B");
        return $pitchClass[$key];
    }

    /**
     * 曲の長さをミリ秒⇒分へ変換
     * @param int $milliseconds.
     * @return string
     */
    public function millisecondsConversion(int $milliseconds):string
    {
        $seconds = floor($milliseconds / 1000);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        $ms = sprintf("%2d:%02d", $minutes, $seconds);
        return $ms;
    }

    /**
     * メジャー/マイナーに変換
     * @param int $mode.
     * @return string
     */
    public function modeConversion(int $mode):string
    {
        if ($mode == 0) {
            $scale  = 'minor';
        }else{
            $scale  = 'major ';
        };
        return $scale;
    }
}