<?php
$file = 'words.json';

// Function to calculate the number of vowels in a word
function countVowels($word) {
    $vowels = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');
    $count = 0;
    foreach (str_split($word) as $char) {
        if (in_array($char, $vowels)) {
            $count++;
        }
    }
    return $count;
}

// Function to calculate the number of consonants in a word
function countConsonants($word) {
    $consonants = array_diff(range('a', 'z'), array('a', 'e', 'i', 'o', 'u'));
    $count = 0;
    foreach (str_split($word) as $char) {
        if (in_array(strtolower($char), $consonants)) {
            $count++;
        }
    }
    return $count;
}

// Function to handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $word = $_POST['word'];

    if (!empty($word)) {
        $data = json_decode(file_get_contents($file), true);
        $data[] = array(
            'word' => $word,
            'num_letters' => strlen($word),
            'num_vowels' => countVowels($word),
            'num_consonants' => countConsonants($word)
        );
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    }
}

// Display saved words in the table
$data = json_decode(file_get_contents($file), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic HTML Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<form action="#" method="post">
    <label for="word">Unesite riječ:</label><br>
    <input type="text" id="word" name="word"><br>
    <input type="submit" value="Pošalji">
</form>

<table>
    <tr>
        <th>Riječ</th>
        <th>Broj slova</th>
        <th>Broj suglasnika</th>
        <th>Broj samoglasnika</th>
    </tr>
    <?php foreach ($data as $entry): ?>
        <tr>
            <td><?php echo $entry['word']; ?></td>
            <td><?php echo $entry['num_letters']; ?></td>
            <td><?php echo $entry['num_consonants']; ?></td>
            <td><?php echo $entry['num_vowels']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
