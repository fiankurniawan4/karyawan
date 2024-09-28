<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Karyawan extends Model
{
    use HasFactory, Searchable;

    public static function rupiah($angka)
    {
        $rupiah = "";
        $angka = strval($angka);
        if (strlen($angka) <= 3) {
            return $angka;
        } else {
            $sisa = strlen($angka) % 3;
            if ($sisa == 0) {
                $blok = intval(strlen($angka) / 3);
            } else {
                $blok = intval(strlen($angka) / 3) + 1;
            }

            for ($i = 0; $i < $blok; $i++) {
                if ($i == $blok - 1) {
                    $rupiah .= substr($angka, 0, $sisa) . ".";
                } else {
                    $rupiah .= substr($angka, 0, $sisa) . ".";
                    $angka = substr($angka, $sisa);
                    $sisa = 3;
                }
            }
            return substr($rupiah, 0, -1);
        }
    }

    public function toSearchableArray(): array
    {
        return [
            'nama' => $this->nama,
        ];
    }
}
