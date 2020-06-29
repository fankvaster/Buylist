<?php
include 'bd.php';

class Production
{
    public $product;
    public $category;
    public $price;
    public $manufacturer;
    public $uid;
    
   
    public function AddProduct()
    {
        global $db, $_POST;

        $sql = "INSERT INTO manufacturer (product, category, manufacturer, uid, amount) 
            	VALUES (
            	:product,
            	:category, 
            	:manufacturer,  
            	:uid,
            	0)";

        $stmt = $db->prepare($sql);
        if (! $stmt) { //если ошибка - убиваем процесс и выводим сообщение об ошибке.
            die("SQL Error: {$db->errno} - {$db->error}");
        }
            
        $stmt->bindValue(':product', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
        $stmt->bindValue(':manufacturer', $_POST['manufacturer'], PDO::PARAM_STR);
        $stmt->bindValue(':uid', $_POST['uid'], PDO::PARAM_STR);
        $stmt->execute();

        $sql = "INSERT INTO prices (product, category, uid, price, amount) 
            	VALUES (
            	:product,
            	:category, 
            	:uid,  
            	:price,
            	0)";

        $stmt = $db->prepare($sql);
        if (! $stmt) { //если ошибка - убиваем процесс и выводим сообщение об ошибке.
            die("SQL Error: {$db->errno} - {$db->error}");
        }
        $stmt->bindValue(':product', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
        $stmt->bindValue(':uid', $_POST['uid'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
        $stmt->execute();

        printf("Товар успешно добавлен!\n", $stmt->affected_rows);
    }

    public function DelProduct()
    {
        global $db, $_POST;

        $uid = array_search('Удалить', $_POST);

        $sql = 'DELETE FROM manufacturer WHERE uid ='.$uid.'';
        
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $sql = 'DELETE FROM prices WHERE uid ='.$uid.'';
        
        $stmt = $db->prepare($sql);
        $stmt->execute();

        printf("Товар успешно удален!\n", $stmt->affected_rows);
        echo '<meta http-equiv="refresh" content="2; url=index.php">';
    }

    public function EditProduct()
    {
        global $db, $_POST;

        $uid = array_search('Изменить', $_POST);

        $sql = 'UPDATE manufacturer SET
            	product = "'. $_POST['name'] .'",
            	category = "'. $_POST['category'] .'", 
            	manufacturer = "'. $_POST['manufacturer'] .'",
            	uid = "'. $_POST['uid'] .'"
            	WHERE uid = '. $uid .'
            	';
        $stmt = $db->prepare($sql);
        if (! $stmt) { //если ошибка - убиваем процесс и выводим сообщение об ошибке.
            die("SQL Error: {$db->errno} - {$db->error}");
        }
            
        $stmt->execute();

        $sql = 'UPDATE prices SET
            	product = "'. $_POST['name'] .'",
            	category = "'. $_POST['category'] .'",  
            	price = "'. $_POST['price'] .'",
            	uid = "'. $_POST['uid'] .'"
            	WHERE uid = '. $uid .'
            	';

        $stmt = $db->prepare($sql);
        if (! $stmt) { //если ошибка - убиваем процесс и выводим сообщение об ошибке.
            die("SQL Error: {$db->errno} - {$db->error}");
        }
        
        $stmt->execute();
        printf("Товар успешно изменен!\n", $stmt->affected_rows);
        echo '<meta http-equiv="refresh" content="2; url=index.php">';
    }

    public function AddList()
    {
        global $db, $_POST;
        
            $uid = array_search('Добавить в список', $_POST);

            $sql = 'CREATE TABLE list(
        			uid int(11) PRIMARY KEY,
        			product text,
        			category text,
        			manufacturer text,
        			price varchar(244),
        			amount int)
        			ENGINE=MyISAM DEFAULT CHARSET=utf8';

        	$stmt = $db->prepare($sql);
        	$stmt->execute();

            $sql = 'SELECT m.product, m.manufacturer, m.category, m.uid, m.amount, p.price 
    FROM manufacturer AS m
    JOIN prices AS p ON p.uid = m.uid
    WHERE p.uid = '. $uid .'';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $val) {
            }

            $uid = $val['uid'];
            $product = $val['product'];
            $manufacturer = $val['manufacturer'];
            $category = $val['category'];
            $price = $val['price'];
            $amount = $val['amount'];

            $sql = 'INSERT INTO list VALUES (
            :uid,
            :product,
            :category,
            :price,
            :manufacturer,
            0
            )';

            $stmt = $db->prepare($sql);
            $stmt->bindValue(':uid', $val['uid'], PDO::PARAM_STR);
            $stmt->bindValue(':product', $val['product'], PDO::PARAM_STR);
            $stmt->bindValue(':manufacturer', $val['manufacturer'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $val['category'], PDO::PARAM_STR);
            $stmt->bindValue(':price', $val['price'], PDO::PARAM_STR);
            $stmt->execute();

            $sql = 'SELECT amount FROM list';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $valution) {
            }
            $colvo2 = $valution['amount'];

            if ($colvo2 < $amount) {
                echo 'Успешно добавлено!';               
                echo '<meta http-equiv="refresh" content="2; url=index.php">';
                $colvo2++;

                $sql = 'UPDATE list SET amount = '. $colvo2 .' 
                WHERE uid = '. $uid .'';

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $amount2 = $amount - 1;
            	$sql = 'UPDATE manufacturer SET amount = '. $amount2 .' WHERE uid = '. $uid .'';

            	$stmt = $db->prepare($sql);
            	$stmt->execute();

            	$sql = 'UPDATE prices SET amount = '. $amount2 .' WHERE uid = '. $uid .'';

            	$stmt = $db->prepare($sql);
            	$stmt->execute();
                
            } else {
                $sql = 'SELECT * FROM list';

                $stmt = $db->prepare($sql);
                if ($stmt->execute()) {
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo 'Ошибка! Возможно, вы выбрали недопустимое кол-во товара. Ваш список: '.'<br>';
                    echo '<table>';
                    echo '<th>uid</th>';
                    echo '<th>Название</th>';
                    echo '<th>Производитель</th>';
                    echo '<th>Категория</th>';
                    echo '<th>Цена (в рублях)</th>';
                    echo '<th>Кол-во товара</th>';
                    foreach ($rows as $value) {
                        echo '<tr>'."\n";
                        echo '<td>'.$value['uid']."\n";
                        echo '<td>'.$value['product']."\n";
                        echo '<td>'.$value['manufacturer']."\n";
                        echo '<td>'.$value['category']."\n";
                        echo '<td>'.$value['price'].'</td>'."\n";
                        echo '<td>'.$value['amount']."\n";
                    }
                    echo '</table></tr>';
                }
            }
    }

    public function DelList()
    {
        global $db, $_POST;
        if (array_search('Убрать из списка', $_POST)) {
            $uid = array_search('Убрать из списка', $_POST);

            $sql = 'SELECT uid, amount 
    FROM manufacturer 
    WHERE uid = '. $uid .'';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $val) {
            }
            $uid = $val['uid'];
            $amount = $val['amount'];

            $sql = 'SELECT amount FROM list WHERE uid = '. $uid .'';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $value) {
            }

            $colvo = $value['amount'];

            $amount2 = $amount + $colvo;
            $sql = 'UPDATE manufacturer SET amount = '. $amount2 .' WHERE uid = '. $uid .'';

            	$stmt = $db->prepare($sql);
            	$stmt->execute();

            $sql = 'UPDATE prices SET amount = '. $amount2 .' WHERE uid = '. $uid .'';

            	$stmt = $db->prepare($sql);
            	$stmt->execute();
            
            $sql = 'DELETE FROM list WHERE uid ='. $uid .'';

            $stmt = $db->prepare($sql);
            if ($stmt->execute()) {
                echo 'Успешно удалено!';
                echo '<meta http-equiv="refresh" content="2; url=index.php">';
                
            } else {
                echo $sql.'<br>'.'Ошибка';
            }

            $sql = 'SELECT * FROM list';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows == NULL) {
            	$sql = 'DROP TABLE buylist.list';

            	$stmt = $db->prepare($sql);
            	$stmt->execute();
            }
        }
    }
}
$Product = new Production();
