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

        $sql = "INSERT INTO manufacturer (product, category, manufacturer, uid) 
            	VALUES (
            	:product,
            	:category, 
            	:manufacturer,  
            	:uid)";

        $stmt = $db->prepare($sql);
        if (! $stmt) { //если ошибка - убиваем процесс и выводим сообщение об ошибке.
            die("SQL Error: {$db->errno} - {$db->error}");
        }
            
        $stmt->bindValue(':product', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
        $stmt->bindValue(':manufacturer', $_POST['manufacturer'], PDO::PARAM_STR);
        $stmt->bindValue(':uid', $_POST['uid'], PDO::PARAM_STR);
        $stmt->execute();

        $sql = "INSERT INTO prices (product, category, uid, price) 
            	VALUES (
            	:product,
            	:category, 
            	:uid,  
            	:price)";

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
        echo '<meta http-equiv="refresh" content="5; url=admin.php">';
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
        echo '<meta http-equiv="refresh" content="5; url=admin.php">';
    }

    public function AddList()
    {
        global $db, $_POST;
        if (array_search('Добавить в список', $_POST)) {
            $uid = array_search('Добавить в список', $_POST);

            $sql = 'SELECT m.product, m.manufacturer, m.category, m.uid, p.price 
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

            $sql = 'INSERT INTO list VALUES (
            :uid,
            :product,
            :category,
            :price,
            :manufacturer
            )';

            $stmt = $db->prepare($sql);
            $stmt->bindValue(':uid', $val['uid'], PDO::PARAM_STR);
            $stmt->bindValue(':product', $val['product'], PDO::PARAM_STR);
            $stmt->bindValue(':manufacturer', $val['manufacturer'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $val['category'], PDO::PARAM_STR);
            $stmt->bindValue(':price', $val['price'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                echo 'Успешно добавлено!';
                if ($_SESSION['role'] == 1) {
                    echo '<meta http-equiv="refresh" content="5; url=admin.php">';
                } else {
                    echo '<meta http-equiv="refresh" content="5; url=user.php">';
                }
            } else {
                $sql = 'SELECT * FROM list';

                $stmt = $db->prepare($sql);
                if ($stmt->execute()) {
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo 'Ошибка! Возможно, товар уже находится в списке. Ваш список: '.'<br>';
                    echo '<table>';
                    echo '<th>uid</th>';
                    echo '<th>Название</th>';
                    echo '<th>Производитель</th>';
                    echo '<th>Категория</th>';
                    echo '<th>Цена (в рублях)</th>';
                    foreach ($rows as $value) {
                        echo '<tr>'."\n";
                        echo '<td>'.$value['uid']."\n";
                        echo '<td>'.$value['product']."\n";
                        echo '<td>'.$value['manufacturer']."\n";
                        echo '<td>'.$value['category']."\n";
                        echo '<td>'.$value['price'].'</td>'."\n";
                    }
                    echo '</table></tr>';
                }
            }
        }
    }

    public function DelList()
    {
        global $db, $_POST;
        if (array_search('Убрать из списка', $_POST)) {
            $uid = array_search('Убрать из списка', $_POST);
            
            $sql = 'DELETE FROM list WHERE uid ='. $uid .'';

            $stmt = $db->prepare($sql);
            if ($stmt->execute()) {
                echo 'Успешно удалено!';
                if ($_SESSION['role'] == 1) {
                    echo '<meta http-equiv="refresh" content="5; url=admin.php">';
                } else {
                    echo '<meta http-equiv="refresh" content="5; url=user.php">';
                }
            } else {
                echo $sql.'<br>'.'Ошибка';
            }
        }
    }
}
$Product = new Production();
