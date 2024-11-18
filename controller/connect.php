<?php
class connect{
    public static function ConnectDb() {
        return new mysqli("localhost",'root', '', 'test');
    }
}