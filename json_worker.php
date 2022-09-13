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
        $url = 'http://jsonplaceholder.typicode.com/posts/';
        $fields = array(
            'user_id' => $user_id,
            'title' => $title,
            'body' => $body,
        );
        $postvars = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        $result = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($result);
        return $obj;
    }
    public static function delete_post($post_id){
        $url = "http://jsonplaceholder.typicode.com/posts/$post_id";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $httpCode;
    }
    public static function edit_post($user_id,$post_id,$title,$body){
        $url = "http://jsonplaceholder.typicode.com/posts/$post_id";
        $fields = array(
            'post_id' =>$post_id,
            'user_id' => $user_id,
            'title' => $title,
            'body' => $body,
        );
        $postvars = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        $result = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($result);
        return $obj;
    }
}