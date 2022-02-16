<?php

class Messages
{
    public static function setMsg($text, $type)
    {
        if($type === 'error') {
            $_SESSION['errMsg'] = $text;
        } else {
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function display()
    {
        if(isset($_SESSION['errMsg'])) {
            echo '<div class="alert alert-danger">'.$_SESSION['errMsg'].'</div>';
            unset($_SESSION['errMsg']);
        }

        if(isset($_SESSION['successMsg'])) {
            echo '<div class="alert alert-success">'.$_SESSION['successMsg'].'</div>';
            unset($_SESSION['successMsg']);
        }
    }
}