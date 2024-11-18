<?php
session_start();

define('ADMIN' , 'admin' );

if ( ! empty( $_POST['login'])){
// и если это равно константе ADMIN
if( $_POST['login'] === ADMIN ){
// тогда мы создадим сессионную переменную,
// чтобы мы могли попасть на страницу secret
$_SESSION [ 'admin' ] = ADMIN ;

$_SESSION [ 'res' ] = 'Вы успешно авторизовались!' ;
}
else{
// иначе запишем сообщение об ошибке
    $_SESSION [ 'res' ] = 'Неверный логин' ;
}
    header( "Location: sess1.php");
// и завершаем выполнение скрипта
    die;
}
?>
<ul>
    <li><a href="sess1.php"> sess1 </a></li>
    <li><a href="secret.php"> secret </a></li>
</ul>
<?php
if ( isset ( $_SESSION [ 'res' ])){
    echo $_SESSION [ 'res' ];
// удалим ненужную переменную из сессии
//(после обновления страницы сообщение - не нужно)
    unset( $_SESSION [ 'res' ]);
}
?>
<!-- форма авторизации -->
<form action="" method="post">
    <input type="text" name="login">
    <button type="submit"> Login </button>
</form>

