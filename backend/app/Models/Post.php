<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'content'];
//     Eloqunet モデルを使って create するときに、何も設定していないと MassAssignmentException というエラーが出ます。
// これは Eloquent で Mass Assignment（割り当て許可）の設定をしていないからです。
// Eloquent の create で割り当てようとする値は、あらかじめ Eloqunet 側で割り当て許可を与えなくてはいけません。
// 割り当て許可の方法はブラックリスト方式とホワイトリスト方式があります。
// ブラックリスト方式は $guarded（保護）を使います。
// 下記のように $guarded 変数に配列を設定した上で protected すれば、「id」と「year」以外の要素を、create から渡すことができます。
// class User extends Model{
//   protected $guarded = ['id', 'year'];
// }
 
// ホワイトリスト方式
// 割り当て許可を与えたい要素が少ないなら、ホワイトリスト方式もあります。
// 下記のように $fillable（代入可能）に配列を設定した上でprotectedすれば、「名前」「email」「住所」「電話番号」のみ書き換えることができます。
// class User extends Model {
//   $fillable = ['name', 'email', 'address', 'tel']; 
// }

// ポイント
// fillable と guarded の設定はどちらか一方のみです。
// 両者の属性を両方同時に設定することはできません。


 }
