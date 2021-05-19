<?php


namespace App\Http\Controllers;

class UserController
{

    public function index(){
        return 8888;
    }

    public function show($id){
        return 'show:'.$id;
    }

    public function test($id){
        return 'test:'.$id;
    }

    public function test1($id){
        return 'test1:'.$id;
    }

    public function test2($id){
        return 'test2:'.$id;
    }

    public function here(){
        return 'here';
    }

    public function there(){
        return 'there';
    }

    public function profile1(){
        // 生成链接...
        $url = route('profile1');
        return $url;
    }

    public function profile2(){
        // 生成重定向...
        return redirect()->route('profile1');
    }
}
