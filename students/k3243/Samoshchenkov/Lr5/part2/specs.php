<?php
echo "<title>Специализация</title>";


 	$dbuser = 'postgres';
	$dbpass = '123456789';
	$host = '127.0.0.1';
	$dbport = '5433';
	$dbname= 'lab3';
	$table = '"Clinic"."Specialization"';
	$db = pg_connect("host=$host port=$dbport dbname=$dbname user=$dbuser
	password=$dbpass");
 	$query = "select * from $table";
 	$result = pg_fetch_all(pg_query($db, $query));
 	$status = "";

 	if($_SERVER['REQUEST_METHOD'] == 'POST'){

         if (isset($_POST["Delete"])) {
             $query = "delete from $table where ID_patient='$_POST[ID_Specialization]'";
             $status = "Deleted";
         }

         if (isset($_POST["Add"])) {
             $query = "insert into $table values ('$_POST[ID_Specialization]', '$_POST[Specialization_name]'";
             echo $query;
             $status = "Added";
         }

         if (isset($_POST["Update"])) {
             $query = "Update $table set ID_Specialization='$_POST[ID_Specialization]', Specialization_name='$_POST[Specialization_name]' WHERE ID_Specialization='$_POST[ID_Specialization]'";
             $status = "Updated";
         }
         pg_query($query);
         echo "<meta http-equiv='refresh' content='0'>";
     }

     pg_close($db);
 ?>

 <a href = 'index.php'>Главная страница</a> 
 
 <table>
   <thead>
     <tr>
       <th><?php echo implode('</th><th>', array_keys($result[0])); ?></th>
     </tr>
   </thead>
   <tbody>
 <?php foreach ($result as $row): array_map('htmlentities', $row); ?>
     <tr>
       <td><?php echo implode('</td><td>', $row); ?></td>
     </tr>
 <?php endforeach; ?>
   </tbody>
 </table>

 <body>
 <form action="" method="post">
     <label><input name="ID_Specialization" placeholder="001"> - Идентификатор специализации </label>
     <button type="submit" name="Delete">Удалить</button>
 </form>
 <form action="" method="post">
     <input name="ID_Specialization" size="15" placeholder="001"> - Идентификатор специализации <Br>
     <input name="Specialization_name" size="15"  placeholder="Therapist"> - ФИО пациента <Br>	 
     <button type="submit" name="Add">Добавить</button>
 	<button type="submit" name="Update">Редактировать</button>
 </form>
 <?php echo $status ?>
 </body>
 </html> 
