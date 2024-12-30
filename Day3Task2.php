<?php
#Task 1 :
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            width: 50%;
            
            
        }
        th, td {
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .cms {
            background-color: red;
            color: white;
        }
</style>
</head>
<body>
<table>
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Track</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['name']; ?></td>
            <td><?= $student['email']; ?></td>
            <td class="<?= $student['track'] === 'CMS' ? 'cms' : ''; ?>">
                <?= $student['track']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
</body>
</html>
