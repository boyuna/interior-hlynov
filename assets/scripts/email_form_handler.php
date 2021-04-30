<meta charset='utf-8'>
<link rel='stylesheet' href='../design/back_f.css'>

<?php
if ($_POST) {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $subject = htmlspecialchars($_POST["subject"]);
  $message = htmlspecialchars($_POST["message"]);
  $json = array();
  if (!$name or !$email or !$subject or !$message) {
    $json['error'] = 'Ошибка! Предоставьте, пожалуйста, все данные';
   // echo json_encode($json);
    echo(
    "<body>
     <div class='back-f'>
       
       <div class='logo'>
          <img class='logotype' src='logotype.png' alt='мебель премиум'><br>
          <img class = 'logo_text' src='logo-n.png' alt='качественная luxury киров'>         
       </div>
       <div class='back-f__text'>
         <p>Ошибка! Заполните, пожалуйста, все поля.</p>
         <a href='/#feedback'>Вернуться назад к заполнению формы</a>
       </div>
       
     </div>
     </body>");
    die();
  }
  if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)) {
  $json['error'] = 'Не верный формат email!';
 // echo json_encode($json);
 
  echo(
    "<body>
     <div class='back-f'>
     <div class='logo'>
          <img class='logotype' src='logotype.png' alt='мебель премиум'><br>
          <img class = 'logo_text' src='logo-n.png' alt='качественная luxury киров'>      
       </div>
       <div class='back-f__text'>
         <p>Ошибка! Неверный формат адреса электронной почты.</p>
         <a href='/#feedback'>Вернуться назад к заполнению формы</a>
       </div>
       
     </div>
     </body>");
 
  die();
  }

  function mime_header_encode($str, $data_charset, $send_charset) {
  if($data_charset != $send_charset)
  $str=iconv($data_charset,$send_charset.'//IGNORE',$str);
  return ('=?'.$send_charset.'?B?'.base64_encode($str).'?=');
  }

  class TEmail {
  public $from_email;
  public $from_name;
  public $to_email;
  public $to_name;
  public $subject;
  public $data_charset='UTF-8';
  public $send_charset='windows-1251';
  public $body='';
  public $type='text/plain';

    function send(){
      $dc=$this->data_charset;
      $sc=$this->send_charset;
      $enc_to=mime_header_encode($this->to_name,$dc,$sc).' <'.$this->to_email.'>';
      $enc_subject=mime_header_encode($this->subject,$dc,$sc);
      $enc_from=mime_header_encode($this->from_name,$dc,$sc).' <'.$this->from_email.'>';
      $enc_body=$dc==$sc?$this->body:iconv($dc,$sc.'//IGNORE',$this->body);
      $headers='';
      $headers.="Mime-Version: 1.0\r\n";
      $headers.="Content-type: ".$this->type."; charset=".$sc."\r\n";
      $headers.="From: ".$enc_from."\r\n";
      return mail($enc_to,$enc_subject,$enc_body,$headers);
    }

  }

  $emailgo= new TEmail;
  $emailgo->from_email= $email;
  $emailgo->to_email= "hlynov.mebel@gmail.com";
  $emailgo->from_name= $name;
  $emailgo->subject= $subject;
  $emailgo->body= $message;
  $emailgo->send();

  $json['error'] = 0;
  echo(
    "<body>
     <div class='back-f'>
     <div class='logo'>
          <img class='logotype' src='logotype.png' alt='мебель премиум'><br>
          <img class = 'logo_text' src='logo-n.png' alt='качественная luxury киров'> 
       </div>
       <div class='back-f__text'>
         <p>Благодарим за обращение! Направим вам ответное письмо как можно скорее.</p>
         <a href='/'>Перейти на главную страницу сайта</a>
       </div>
       
     </div>
     </body>");
}
?>
