<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favolite extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     //いいねしている投稿
    public function sweet()
    {
        return $this->belongsTo('App\Sweet');
    }

    //いいねが既にされているかを確認
    public function like_exist($id, $sweet_id)
    {
        //Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $exist = Favolite::where('user_id', '=', $id)->where('sweet_id', '=', $sweet_id)->get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }
}
