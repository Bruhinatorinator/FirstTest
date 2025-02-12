<?php
require_once 'config/config.session.php';
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
