<?php

namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    public function search($search, $count){
        $query = mb_strtolower($search, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                    {
                        $query[] = $word . "*";
                        break;
                    }
                case ($len > 3 && $len <= 6):
                    {
                        $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 6 && $len <= 9):
                    {
                        $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 9):
                    {
                        $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $users = User::whereRaw("MATCH(name, first_name, last_name) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
            $qQeury)->leftJoin('followables','users.id','=','followables.followable_id')->
        selectRaw('users.*, count(followables.followable_id) AS `count`')->
        groupBy('users.id')->
        orderBy('count', 'DESC')->paginate($count) ;
        return $users;
    }
}
