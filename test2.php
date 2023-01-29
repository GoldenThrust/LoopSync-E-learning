<!DOCTYPE html>
<html lang='en-US'>

<head>
    <title>LoopSync</title>
    <style>
        table {
            border: solid;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-spacing: 10px;
            font-size: 19px;
        }

        tr {
            text-align: center;
            width: 100%;
        }

        td {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<boddy>
    <?php
    require('db_config.php');
    $course = $database->read('courses');

    $rand = [];
    print_r($rand)
        ?>
</boddy>

</html>