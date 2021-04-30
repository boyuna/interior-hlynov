<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartlid/php/phpmailer/phpmailer.php');

    // ** SMTP-YANDEX.
    // const HOST = 'ssl://smtp.yandex.ru';
    // const LOGIN = 'sender';
    // const PASS = 'XXXXXXXXXX';
    // const PORT = 465;

    /// ** SMTP-MAIL.RU
    // const HOST = 'ssl://smtp.mail.ru';
    // const LOGIN = 'sender@mail.ru';
    // const PASS = 'XXXXXXXXXXX';
    // const PORT = 465;

    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartlid/php/phpmailer/smtp.php');
   
    const SENDER = 'hlynov.mebel@gmail.com';
    const CATCHER = 'hlynov.mebel@gmail.com';
    // const CATCHER2 = 'catcher2@gmail.com';
    const SUBJECT = 'Перезвоните мне';
    const CHARSET = 'UTF-8';

    $nameIsRequired = false;
    $telIsRequired = true;
    $emailIsRequired = true;
    // $textIsRequired = false;
    
