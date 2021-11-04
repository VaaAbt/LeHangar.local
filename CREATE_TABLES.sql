CREATE TABLE IF NOT EXISTS hangarlocal.grower
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    location varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS hangarlocal.manager
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS hangarlocal.category
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS hangarlocal.product
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(255),
    unit_price float(4, 2) NOT NULL,
    image longblob,
    id_category int(11) NOT NULL,
    id_grower int(11) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_product_id_category
        FOREIGN KEY (id_category) REFERENCES category (id),
    CONSTRAINT fk_product_id_grower
        FOREIGN KEY (id_grower) REFERENCES grower (id)
);

CREATE TABLE IF NOT EXISTS hangarlocal.order
(
    id int(11) NOT NULL AUTO_INCREMENT,
    customer_name varchar(255) NOT NULL,
    customer_email varchar(255) NOT NULL,
    customer_phone varchar(255) NOT NULL,
    amount float(6, 2) NOT NULL,
    status int(11) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS hangarlocal.listProducts
(
    id int(11) NOT NULL AUTO_INCREMENT,
    id_product int(11) NOT NULL,
    id_order int(11) NOT NULL,
    quantity int(3) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_list_id_product
        FOREIGN KEY (id_product) REFERENCES product (id),
    CONSTRAINT fk_list_id_order
        FOREIGN KEY (id_order) REFERENCES order (id)
);

COMMIT;