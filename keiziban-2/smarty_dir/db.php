<?php
require_once("/home/haku19/pear/temp/download/DB-1.7.11/DB.php");

class bbs_db{
    /*DBに接続し、表示する値を取得*/
    public function db_Get() {
        $dsn = array(
        //データベースの種類
        "phptype" => "データベース名",
        //ユーザ名
        "username" => "ユーザ名",
        //パスワード
        "password" => "パスワード",
        //ホスト名
        "hostspec" => "ホスト名",
        //DB名
        "database" => "DB名");
        
        $conn = DB::connect($dsn);

        //接続に失敗した場合、メッセージを取得
        if (DB::isError($conn)) {
            die($conn->getMessage());
        }
        
        //変数$sqlへSQL構文の挿入
        $sql = "SELECT * FROM bbs_test_data";
        
        //クエリの実行結果を2次元配列へ格納
        $dimen_arr = $conn->getAll($sql);
        
        //クエリにエラーが生じた場合、メッセージを取得
        if (DB::isError( $dimen_arr )) {
            die($dimen_arr->getMessage());
        }
        
        return $dimen_arr;
        
        //DB接続を切断
        $conn->disconnect();
    }
}
?>
