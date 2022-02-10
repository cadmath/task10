<?php
$dns = 'mysql:host=localhost;dbname=home';
$db = new PDO($dns, 'root', '');

$show = 'SELECT * FROM text';
$query = $db->query($show);
$arr_chat = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
        <style>
            .name{
                width: 30%;
                float: left;
                margin-right: 5px;
                }
            .text{
                    width: 65%;
                }
            .bor{
                padding: 10px;
                border: 2px solid #60D6A9;
                border-radius: 10px;
                margin-bottom: 7px;
            }
            .tim{
                margin-right: 10px;
                text-align: right;
            }
            .bor hr{
                height: 12px;
                border: 0;
                box-shadow: inset 0 15px 12px -11px rgba(0,0,0,0.15);
            }



        </style>
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">

            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-content">
                                <div class="form-group">

                                <?php
                                if(isset($_COOKIE['alert'])){
                                    if($_COOKIE["alert"] == 'on'){
                                ?>
                                 <div class="alert alert-danger fade show" role="alert">
                                        Данное сообщение уже есть в нашей базе
                                </div>
                                <?php }else{ ?>
                                    <div class="alert alert-success fade show" role="alert">
                                        Ваше сообщение записано!
                                </div>
                                <?php }} ?>

                                    <form action="save.php" method="post">
                                        <input type="text" id="simpleinput" class="form-control name" name="name" required placeholder="Имя">
                                        <input type="text" id="simpleinput" class="form-control text" name="text" required placeholder="Введите сообщение">
                                        <button class="btn btn-success mt-3">Отправить</button>
                                    </form>
                                </div>
                                <?php 
    

                        //Добавление параметров в БД
                    

     
                        
                    //Выборка из БД
                    foreach($arr_chat as $chat){
                        echo '<div class="bor">'.'<h2><i>'.$chat['name'].'</i></h2>'.'<hr />'.
                        '<p>'.$chat['text'].'</p>'.'<br>'.'<hr />'.
                        '<div class="tim">'.$chat['date'].'</div>'.'</div>';
                    }


                        ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
