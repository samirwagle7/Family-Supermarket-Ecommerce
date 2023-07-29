<?php
$product = [
    'title' => 'Electronic Products',
    'AMP2600' => [
        'name' => 'Apple MacBook Pro',
        'slug' => 'apple-macbook-pro',
        'desc' => 'This product is for professional workflows. Not for normal users.',
        'attributes' => [
            'color_variations' => ['Silver'],
            'price' => '270000',
            'screen_size' => '13',
        ],
        'image' => 'images_files-name1.jpg'
    ],

    'AMP2601' => [
        'name' => 'HP Victos',
        'slug' => 'hp-victos',
        'desc' => 'This product is for basic workflow and normal users. Will be good enough for most users.',
        'attributes' => [
            'color_variations' => ['White', 'Silver'],
            'price' => '300000',
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
    
<?php if(count($product) > 0):?>
    <table border="1px" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th colspan="9"><?php echo $product['title']?></th>
            </tr>
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
                <th>Screen Size</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($product as $key => $item): 
                if($key != 'title'): ?>
                <tr> 
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key; ?></td>
                    <?php $j = 0; foreach($item as $c_key => $data): 
                        if($j < 3): ?>
                        <td><?php echo $data; ?></td>
                        <?php endif;
                        $j++;
                        if($c_key == 'attributes'):
                            foreach($data as $sc_key => $attr):
                                if($sc_key == "color_variations"): ?>
                                    <td>Color</td> ?>
                                <?php else: ?>
                                    <td><?php echo $attr; ?></td>
                                <?php endif;
                            endforeach;
                        endif;
                    endforeach; ?>
                    <td><?php echo $product[$key]['image'];?></td>
                </tr>

                <?php $i++;
                    endif;
                    endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
    <!-- Front -end pages for project:
        Home, About, Services, Gallery, Contact
        + Product List, Product Detail
        +Cart Page, Checkout Page -->
</body>
</html>