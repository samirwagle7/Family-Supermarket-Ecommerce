<?php
$product = [
    'title' => 'Electronic Products',
    'AMP2600' => [
        'name' => 'Apple MacBook Pro',
        'slug' => 'apple-macbook-pro',
        'desc' => 'This product is for professional workflows. Not for normal users.',
        'sku' => 'AMP2600',
        'variations' => [
            'colors' => ['Shiny Silver', 'Rose Gold', 'Space Black'],
            'price' => '270000',
            'screen_size' => '13',
        ],
        'image' => 'images_files-name1.jpg'
    ],
    'AMP2601' => [
        'name' => 'HP Victos',
        'slug' => 'hp-victos',
        'sku' => 'AMP2601',
        'desc' => 'This product is for basic workflow and normal users. Will be good enough for most users.',
        'variations' => [
            'colors' => ['White', 'Black'],
            'price' => '17000',
            'screen_size' => '15.4',
        ],
        'image' => 'images_files-name2.jpg'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
            <th rowspan="2">S.N.</th>
                <th rowspan="2">SKU</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Slug</th>
                <th rowspan="2">Description</th>
                <th colspan="3">Attributes</th>
                <th rowspan="2">Image</th>
            </tr>
            <tr>
                <th>Color</th>
                <th>Price</th>
                <th>Screen_Size</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $key => $item) : ?>
                <?php if ($key !== 'title') : ?>
                    <tr>
                        <td><?= $product['title'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['slug'] ?></td>
                        <td><?= $item['desc'] ?></td>
                        <td><?= $item['sku'] ?></td>
                        <td><?= implode(', ', $item['variations']['colors']) ?></td>
                        <td><?= $item['variations']['price'] ?></td>
                        <td><?= $item['variations']['screen_size'] ?></td>
                        <td><?= $item['image'] ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>