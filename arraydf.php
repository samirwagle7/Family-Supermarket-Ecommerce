<?php
$product = [
    'title' => 'Electronics Products',
    'AMP2600_SKU' => [
        'name' => 'Apple MacBook pro',
        'slug' => 'Apple MacBook-pro',
        'desc' => "This project is for professional UI/UX designer who wants fine tune.",
        'attribute' => [
            'color_variations' => ['silver', 'white'],
            'price' => '270000',
            'screen_size' => '13"' ,  
        ],
        'image' => 'image_file_name1.jpg'
    ],

    'AMP201_SKU' => [
        'name' => 'HP Victors',
        'slug' => 'hp-victor',
        'desc' => 'This products is for prfessional programmer to code on multiple plateform.',
        'attribute' => [
            'color_variations' => ['silver', 'black'],
            'price' => '105000',
            'screen_size' => '14"' ,  
        ],
        'image' => 'image_file_name2.jpg'
    ]


    ];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale=1.0 />
        <title>Document</title>
</head>
<body>
    <?php if(count($product) > 0): ?>
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th colspan="10"><?php echo $product['title']; ?></th>
    </tr>
    <tr>
        <th rowspan="2">S.N.</th>
        <th rowspan="2">SKU</th>
        <th rowspan="2">Nmae</th>
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
        <?php $i = 1; foreach($product as $key=> $item):
            if($key != 'title'): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $key; ?></td>
                <?php $j = 0; foreach($item as$c_key => $data):
                if($j <3): ?>
                <td><?php echo $data; ?></td>
                <?php endif;
                $j++;
                if($c_key == 'attributes'): 
                    foreach($data as  $sc_key =>$attr):
                        if($c_key == "color_variation"):?>
                    <td>color</td>
                    <?php else: ?>
                    <td><?php echo $attr; ?></td>
                    <?php endif;
                    endforeach;
                endif;
            endforeach; ?>
            <td><?php echo $product[$key]['image'] ?></td>

        </tr>
            <?php $i++;
            endif;
        endforeach; ?>
        </tbody>
        </table>
        <?php endif; ?>
        </body>
        </html>