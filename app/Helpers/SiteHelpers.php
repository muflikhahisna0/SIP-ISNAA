<?php

use App\Helpers;
use Illuminate\Support\Facades\DB;

class SiteHelpers
{
    public static function cek_akses()
    {
        $user = DB::table('users')->where('username', 'admin')->get();
        return $user;
    }

    public static function main_menu()
    {
        $main_menu = DB::table('akses')->join('menu', 'menu.id', '=', 'akses.menu_id')
            ->select('menu.*', 'akses.akses', 'akses.tambah', 'akses.edit', 'akses.hapus')
            ->where('akses.level_user_id', '1')
            ->where('menu.level_menu', 'main_menu')->get();

        return $main_menu;
    }

    public static function sub_menu()
    {
        $sub_menu = DB::table('akses')->join('menu', 'menu.id', '=', 'akses.menu_id')
            ->select('menu.*', 'akses.akses', 'akses.tambah', 'akses.edit', 'akses.hapus')
            ->where('akses.level_user_id', '1')
            ->where('menu.level_menu', 'sub_menu')->get();

        return $sub_menu;
    }
}
