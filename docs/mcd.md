# MCD

USER: name, password, email, role, address, bakery_id
belongs to, 0N BAKERY, 1N USER
BAKERY: name, address, profile_img, phone_number, rating, status, user_id

is tagged by, 0N PRODUCT, 0N TAG
PRODUCT: name, price, description, picture, category_id
sells, 0N PRODUCT, 0N BAKERY

TAG: name
relates to, 11 PRODUCT, 0N CATEGORY
CATEGORY: name

# MLD

USER ( name, password, email, role, address, bakery_id )
belongs to ( name, name.1 )
BAKERY ( name, address, profile_img, phone_number, rating, status, user_id )
is tagged by ( name, name.1 )
PRODUCT ( name, price, description, picture, category_id, name.1 )
sells ( name, name.1 )