<?php
require 'connect.php';
$data2=$_GET['req3'];
$result=$db->find(['dateFilm'=>$data2],
        ['_id' => 0, 'NameFilm' => 1,'dateFilm'=>1,'type'=>1,'producer'=>1,'country'=>1,'actors'=>1]);
$loc;
foreach ($result as $res) 
{
   echo "Фильм: ";
    print_r($res['NameFilm']);
	echo "<br>";
	echo "Дата выхода: ";
	print_r($res['dateFilm']);
	echo "<br>";
	echo "Тип носителя: ";
	print_r($res['type']);
	echo "<br>";
	echo "Режиссер: ";
	print_r($res['producer']);
	echo "<br>";
	echo "Страна выхода: ";
	print_r($res['country']);
	echo "<br>";
	echo "Актерский состав: ";
	print_r($res['actors']);
	echo "<br>";
$loc=$res['NameFilm'];
}
?>
<script>
     localStorage.setItem('<?php echo $data2;?>','<?php echo $loc;?>' );
</script>