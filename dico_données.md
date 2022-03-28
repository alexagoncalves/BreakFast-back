# Dictionnaire de données

## USER (`utilisateur`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|User ID|
|name|VARCHAR(64)|NOT NULL,|User name|
|password|VARCHAR(255)|NOT NULL|Hashed password|
|email|VARCHAR(125)|NOT NULL|User email to login|
|role|VARCHAR(64)|NOT NULL|User role for security purposes|
|address|VARCHAR(125)|NOT NULL|User address|
|bakery_id|tinyint|UNSIGNED, NOT NULL|Bakery ID to connect the user for admin purposes|

## BAKERY (`boulangerie`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Bakery ID|
|name|VARCHAR(64)|NOT NULL,|Bakery name|
|address|VARCHAR(125)|NOT NULL|Bakery address|
|profile_img|VARCHAR(125)|NOT NULL|Picture URL|
|phone_number|VARCHAR(125)|NOT NULL|Bakery phone number|
|rating|int|NULLABLE|Bakery rating|
|status|int|UNSIGNED, NOT NULL| Bakery open or closed |
|user_id|TINYINT|UNSIGNED, NOT NULL|User ID to connect to Bakery 

## CATEGORY (`catégories`) 

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Category ID|
|name|VARCHAR(64)|NOT NULL,|Category name|


## PRODUCT (`produits`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Product ID|
|name|VARCHAR(64)|NOT NULL,|Product name|
|price|FLOAT|NOT NULL|Product price|
|description|VARCHAR(125)|NOT NULL|Product description|
|picture|VARCHAR(64)|NOT NULL|Product image|
|category_id|TINYINT|UNSIGNED, NOT NULL| Category ID to connect to Product

## TAG (`label`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|Tag ID|
|name|VARCHAR(64)|NOT NULL,|Tag name|