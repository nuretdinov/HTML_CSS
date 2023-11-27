SQL
1. выборка
SELECT [DISTINCT | DISTINCTROW | ALL]
select_expression,...
FROM table_references
[WHERE where_definition]
[GROUP BY {unsigned_integer | col_name | formula}]
[HAVING where_definition]
[ORDER BY {unsigned_integer | col_name | formula} [ASC | DESC], ...]

SELECT что получаем FROM откуда-название таблицы
SELECT `log` from `users` - получает все логины
SELECT `log`, `pwd` from `users`
SELECT * from `users`
SELECT `pwd` from `users` WHERE `log`='admin'
SELECT * from `users` ORDER BY `log`

2. вставка
INSERT INTO таблица (поле1, поле2, ...) VALUES (знач1, знач2, ...)
INSERT INTO `users` (`id`, `log`, `pwd`) VALUES (null, 'new_user', '666')

3. изменение
UPDATE таблица SET `поле`='значение' WHERE усл
UPDATE `users` SET `pwd`='000' WHERE `log`='new_user'
UPDATE `users` SET `pwd`='000' WHERE `log`='new_user' OR `log`='user'

4. удаление
DELETE FROM таблица
DELETE FROM `users`
DELETE FROM `users` WHERE `log`='new_user'

PHP
$connect = new mysqli("адрес БД", "логин", "пароль", "название база данных");
$connect = new mysqli('localhost', 'root', '', 'database_name');
$connect = new mysqli('localhost', 'root', '', 'database_name') or die('no DB connection');

$sql='SELECT * from `users`';

$result = $connect -> query($sql);
$result = $connect -> query('SELECT * from `users`');

//это необходимо только при выборке данных из БД
while($row = $result -> fetch_assoc()){
//$row - ассоциат. массив, ключ - поле БД
echo $row['log'].' '.$row['pwd'].' ';
}

$result -> free();
$connect -> close();