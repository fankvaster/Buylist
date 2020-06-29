<?php
include 'bd.php';

if (array_search('Очистить', $_POST)) {

            $sql = 'SELECT uid, amount 
                    FROM manufacturer';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $val) {
            }
            $uid = $val['uid'];
            $amount = $val['amount'];

            $sql = 'SELECT amount FROM list WHERE uid='. $uid .'';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $value) {
            }

            $colvo = $value['amount'];

            $amount2 = $amount + $colvo;

            $sql = 'SELECT uid FROM list';

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $res = count($rows);

            for ($i = 0; $i <= $res; $i++) { 

                $sql = 'UPDATE manufacturer SET amount = '. $amount2 .' WHERE uid='. $rows[$i]['uid'] .'';

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $sql = 'UPDATE prices SET amount = '. $amount2 .' WHERE uid='. $rows[$i]['uid'] .'';

                $stmt = $db->prepare($sql);
                $stmt->execute();
            }
            
            $sql = 'TRUNCATE list';

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