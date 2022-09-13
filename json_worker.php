<?php

class json_worker
{
    public static function get_users(){
        $json = file_get_contents('http://jsonplaceholder.typicode.com/users');
        $obj = json_decode($json);
        return $obj;
    }
    public static function get_users_posts($user_id){
        $json = file_get_contents("http://jsonplaceholder.typicode.com/users/$user_id/posts");
        $obj = json_decode($json);
        return $obj;
    }
    public static function get_users_todos($user_id){
        $json = file_get_contents("http://jsonplaceholder.typicode.com/users/$user_id/todos");
        $obj = json_decode($json);
        return $obj;
    }
    public static function add_post($user_id,$title,$body){

    }
    public static function delete_post($post_id){

    }
    public static function edit_post($user_id,$post_id,$title,$body){

    }
}