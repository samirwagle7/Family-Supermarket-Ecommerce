<?php
$product = [
    [
        'title' => 'Apple iphone pro 11',
        'slug' => 'apple-iphone-pro-11',
        'price' => '6000',
        'storage' => '125'
    ],
    [
        'title' => 'Samsung 2500',
        'slug' => 'samsung-2500',
        'price' => '1000',
        'storage' => '60'
    ],
    [
        'title' => 'Nokia Windows Phone',
        'slug' => 'nokia-windows-phone',
        'price' => '1000',
        'storage' => '40'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Listing</title>
</head>
<body>  
    <h1>Product Listing</h1>
    <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Price</th>
                <th>Storage (GB)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $p) { ?>
                <tr>
                    <td><?php echo $p['title']; ?></td>
                    <td><?php echo $p['slug']; ?></td>
                    <td><strong><i>Rs.</i> </strong><?php echo $p['price']; ?></td>
                    <td><?php echo $p['storage']; ?> GB</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Task for 2023-July-20:
    create database named: db_grocery
    Tables:
    +5:
            
            created_at TIMESTAMP NULL
            created_by VARCHAR(55) NULL
            updated_at TIMESTAMP NULL
            updated_by VARCHAT(55) NULL 
            status BOOLEAN NULL DEFAULT (FALSE),  

        -th1_users (
            _id INT NOT NULL AUTO INCREMENT,
            fullname VARCHAR(100), NOT NULL,
            email VARCHAR(155) NOT NULL,
            password VARCHAR(50) NOT NULL,
            address VARCHAR(50) NULL,
            phone VARCHAR(50) NULL, UNIQUE
            usre_type VARCHAR(50) NULL,
            login_status BOOLEAN NULL DEFAULT (FALSE),
            created_at TIMESTAMP NULL
            created_by VARCHAR(55) NULL
            updated_at TIMESTAMP NULL
            updated_by VARCHAT(55) NULL
            PRIMARY KEY(_id), NOT NULL
        )

        -th1 products (
            id INT NOT NULL AUTO INCREMENT,
            name VARCHAR(100) NULL,
        )

        - th1_users
        - th1_products
        - th1_cart
        - th1_order
        - th1_pages -->

</body>
</html>