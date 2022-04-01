# MCD

favorites, ON USER, ON BAKERY
BAKERY: bakery_identifier, name, address, zip_code, profile_img, phone_number, rating, status, delivery_fees, delivery_time
sells, 11 PRODUCT, 0N BAKERY
TAG: tag_identifier, name
:

USER: user_identifier, name, password, email, role, address
owns, 11 BAKERY, 0N USER
PRODUCT: product_identifier, name, price, description, picture
is tagged by, 0N PRODUCT, 0N TAG
:

can make, ON USER, 11 ORDERS
ORDERS: order_identifier, total_price, order_date
have, 1N ORDERS, 0N PRODUCT
relates to, 11 PRODUCT, 0N CATEGORY
CATEGORY: category_identifier, name

# MLD

favorites ( user_identifier, bakery_identifier )
BAKERY ( bakery_identifier, name, address, zip_code, profile_img, phone_number, rating, status, delivery_fees, delivery_time, user_identifier )
TAG ( tag_identifier, name )
USER ( user_identifier, name, password, email, role, address )
PRODUCT ( product_identifier, name, price, description, picture, category_identifier, bakery_identifier )
is tagged by ( product_identifier, tag_identifier )
ORDERS ( order_identifier, total_price, order_date, user_identifier )
have ( order_identifier, product_identifier )
CATEGORY ( category_identifier, name )