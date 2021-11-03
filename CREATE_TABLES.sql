CREATE TABLE IF NOT EXISTS grower
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    location varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS manager
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS category
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(255),
    PRIMARY KEY (id)
);



CREATE TABLE IF NOT EXISTS product
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


CREATE TABLE IF NOT EXISTS `order`
(
    id int(11) NOT NULL AUTO_INCREMENT,
    customer_name varchar(255) NOT NULL,
    customer_email varchar(255) NOT NULL,
    customer_phone varchar(255) NOT NULL,
    amount float(6, 2) NOT NULL,
    status int(11) NOT NULL,
    PRIMARY KEY (id)
);



CREATE TABLE IF NOT EXISTS listProducts
(
    id int(11) NOT NULL AUTO_INCREMENT,
    id_product int(11) NOT NULL,
    id_order int(11) NOT NULL,
    quantity int(3) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_list_id_product
        FOREIGN KEY (id_product) REFERENCES product (id),
    CONSTRAINT fk_list_id_order
        FOREIGN KEY (id_order) REFERENCES `order` (id)
);




/**INSERT GROWER**/
INSERT INTO grower (name, location, email, password) VALUES ('Produits locaux du 54', '12 rue des Coteaux, 54000 Nancy', 'produitslocaux.54@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('la Pépinière de Vent du Nord', '5 rue du Donjon, 54160 Pulligny', 'pepiniere.ventdunord@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('le Verger de Paradis Vert', '2 rue des Hautes Ruelles, 54123 Viterne', 'vergerparadis.vert@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('les Jardins du Perchoir', '34 rue du Souvenir, 88130 Charmes', 'jardins.perchoir@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('le Champ du Chêne Moussu', '4 rue de l\'Eglise, 88130 Savigny', 'champ.chenemoussu@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('les Pâturages des Falaises', '22 rue Paul Daum, 54280 Champenoux', 'paturage.falaises@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('la Prairie de Gros Rire', '1 rue Saint-Pierre, 54760 Faulx', 'prairie.grodrire@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('la Ferme du Phénix', '15 rue du Chaufour, 54170 Bioncourt', 'ferme.phenix@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('la Ferme de Nouvelle Aube', '8 rue Louis Marin, 54160 Nomeny', 'ferme.aube@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');



/**INSERT CATEGORY**/
INSERT INTO category VALUES (1, 'legumes', 'legumineux');
INSERT INTO category VALUES (2, 'fruits', 'fruiteux');
INSERT INTO category VALUES (3, 'feculents', 'feculenteux');
INSERT INTO category VALUES (4, 'cereales', 'cerealeux');
INSERT INTO category VALUES (5, 'produits laitiers', 'laiteux');
INSERT INTO category VALUES (6, 'viandes', 'carne');
INSERT INTO category VALUES (7, 'aromates', 'aromath');



/**INSERT PRODUCT**/
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('carottes 1kg', 'carottes fraiches de l\'est, cultivés sur des terres non poluées par des pesticides.', 15.99, 1, 1);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('salade scarole', 'salade verte, arrosé à l\'eau de pluie et cultivée dans le sable', 1.8, 1, 2);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('haricots beurre 500g', 'haricots très bon pour les petits enfants.', 1.14, 1, 3);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('aubergine', 'aubergine violette, cultivé sur les flants de montagnes de l\'est.', 3, 1, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('tomates 1kg', 'tomates cultivées en serre', 2.49, 1, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('oignons 2kg', 'oignons', 1.2, 1, 2);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('pommes 2kg', 'pommes vertes grannysmith, ont poussés sur des arbres millénaires.', 7, 2, 5);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('poires 1kg', 'poires williams, arrosés au william peel.', 2.80, 2, 6);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('fraises 700g', 'fraises de cléry, en serre.', 5, 2, 7);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('mirabelles 3kg', 'mirabelles reines claude, sans pesticides.', 7.5, 2, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('framboises 500g', 'framboises', 6.7, 2, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('groseilles 300g', 'groseilles', 2.34, 2, 1);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('pommes de terre 10kg', 'pommes de terre', 18, 3, 9);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('petits pois 1kg', 'petits pois, ramassés à la main.', 5, 3, 1);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('lentilles 500g', 'lentilles vertes, issus d\'une production responsable de l\'environnement', 1.8, 3, 2);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('pois chiches 1kg', 'pois chiches, cultivés en plein été.', 2.5, 3, 3);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('orges 1kg', 'orges, ', 0.2, 4, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('farine de blé 1kg', 'farine', 0.5, 4, 5);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('seigle 1kg', 'seigle de bonne qualité.', 1, 4, 6);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('riz 2kg', 'riz long', 1.6, 4, 7);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('lait de vache 1L', 'lait de vache élevées en plein air.', 0.8, 5, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('buche fromage de chèvre 200g', 'buche de chèvre, avec du lait de chèvre élevées en montagne.', 2, 5, 9);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('yahourt nature 1kg', 'yahourt fermenté en cave.', 1.63, 5, 1);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('roquefort 300g', 'roquefort, AOC', 5, 5, 2);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('poulet fermier entier', 'poulet élevées en cage de tungstène.', 12.5, 6, 3);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('boeuf haché 2kg', 'boeuf élevé en prairie.', 26.67, 6, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('jambon', 'cochons élévés en plein air.', 60, 6, 5);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('lapin entier', 'lapin élevé au grain.', 10.89, 6, 6);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('thym 100g', 'thym tin tin tin.', 7, 7, 7);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('persil 500g', 'persil, quelle heure est-t-il madame persil ?', 10.43, 7, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('assortiment d\'herbes aromatiques 300g', 'laurier, thym, romarin, origan, herbes de provences', 4.36, 7, 9);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('romarin 200g', 'romarin a tu des patins ?', 0.6, 7, 1);