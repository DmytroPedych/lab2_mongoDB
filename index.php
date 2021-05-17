<?php
require 'connect.php'; 
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Лаба 2</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form action="request1.php" method="get">
        <p>Что можно посмотреть на видеокассетах:</p>

    <select name="req1">
    <?php
    $result1=$db->find(['type'=>"videocasset"],
        ['_id' => 0, 'type' => 1]);
            
    foreach ($result1 as $res1) {
    echo '<option value="'.$res1['type'].'">'.$res1['type'].'</option>';
}
    ?>
    </select>
       <button type="submit">Search</button>
    </form> 




    <form action="request2.php" method="get">
        <p>В каких фильмах участвовал выбранный актер:</p>

    <select name="req2">
    <?php
    $result2=$db->find([],
        ['_id' => 0, 'actors' => 1]);
            
    foreach ($result2 as $res2) {
    echo '<option value="'.$res2['actors'].'">'.$res2['actors'].'</option>';
}
    ?>
    </select> 
       <button type="submit">Search</button>
    </form>



    <form action="request3.php" method="get">
        <p>Что посмотреть из нового (вышедшее в этом году)</p>
    <select name="req3">

    <?php
    
    $result3=$db->find([],
        ['_id' => 0, 'dateFilm' => 1]);
            
    foreach ($result3 as $res3) {
    echo '<option value="'.$res3['dateFilm'].'">'.$res3['dateFilm'].'</option>';
}
    ?>
    </select> 
       <button type="submit">Search</button>
    </form>

    
    <p>Local storage</p>
    <script>
            var resArr=new Array();
            for(var i=0;i<localStorage.length;i++){
                resArr[resArr.length]=localStorage.key(i);
            }
            console.log(resArr);
    </script>
    <select name="local_temp" id="local_temp">
    </select>
    <button type="submit" class="button_local">Show</button>



    
     <script>
         $(function(){ 
           for(var i=0;i<resArr.length;i++){
               var count = new Option(resArr[i], resArr[i]);
               $(count).html(resArr[i]);
               $("#local_temp").append(count);
           }
       });
    </script>
     <script>
        $(function(){
            $('.button_local').click(function(){
                var i=0;
                var key=$('#local_temp').val();
                var stroka=localStorage.getItem(key);
                console.log(stroka);
         
            });
        });
    </script>    

</body> 