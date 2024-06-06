<?php
$apiURL = "https://api.hnb.hr/tecajn-eur/v3";

$odgovor = file_get_contents($apiURL);

$apiPodaci = json_decode($odgovor, true);

$upit = $_POST;

$result="";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST)){
        echo "niste kliknuli konvertiraj!";
    }
    else{
        $result = convert($_POST, $apiPodaci);

    }
}

function convert (array $inputData, array $apiData): float {
    $value = (float) $inputData['input_value'];
    $input_currency = $inputData['input_currency'];
    $output_currency = $inputData['output_currency'];

    foreach($apiData as $data) {
        if($data['valuta'] == $input_currency) {
            $first_currency = (float) str_replace(',', '.', $data['srednji_tecaj']);
        }
        if($data['valuta'] == $output_currency) {
            $second_currency = (float) str_replace(',', '.', $data['srednji_tecaj']);
        }

    }
    return floor($value * ($second_currency/$first_currency)*100)/100;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konverter valuta</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 50vh;
            background-color: #0B607E;
            padding: 20px;
            border-radius: 10px;
            color: white;
            font-family: sans-serif;
            font-weight: bold;
        }
        form input {
            width: 200px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
        
        form input[type="submit"]:hover {
            background-color: #1DA0CD; 
        }
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        button {
            color: yellow;
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="text" placeholder="unesite iznos" name="input_value" id="input_value">
        <select id="input_currency" name="input_currency">
            <?php 
                foreach($apiPodaci as $data) : ?>
                <option value="<?= $data['valuta']; ?>"><?= $data['valuta']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <?php if($result): ?>
            <input type="text" value=<?= $result; ?>>
            <?php endif; ?>
        <?php if(!$result): ?>
            <input type="text" value=<?= ""; ?>>
            <?php endif; ?>
        <select id="output_currency" name="output_currency">
            <?php 
                foreach($apiPodaci as $data) : ?>
                <option value="<?= $data['valuta']; ?>"><?= $data['valuta']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" value="Konvertiraj!">
    </form>
</body>
</html>