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

CREATE TABLE IF NOT EXISTS hangarlocal.`order`
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
        FOREIGN KEY (id_order) REFERENCES `order` (id)
);

/**INSERT GROWER**/
INSERT INTO grower (name, location, email, password) VALUES ('Produits locaux du 54', '12 rue des Coteaux, 54000 Nancy', 'produitslocaux.54@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('La Pépinière de Vent du Nord', '5 rue du Donjon, 54160 Pulligny', 'pepiniere.ventdunord@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('Le Verger de Paradis Vert', '2 rue des Hautes Ruelles, 54123 Viterne', 'vergerparadis.vert@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('Les Jardins du Perchoir', '34 rue du Souvenir, 88130 Charmes', 'jardins.perchoir@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('Le Champ du Chêne Moussu', '4 rue de l\'Eglise, 88130 Savigny', 'champ.chenemoussu@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('Les Pâturages des Falaises', '22 rue Paul Daum, 54280 Champenoux', 'paturage.falaises@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('La Prairie de Gros Rire', '1 rue Saint-Pierre, 54760 Faulx', 'prairie.grodrire@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('La Ferme du Phénix', '15 rue du Chaufour, 54170 Bioncourt', 'ferme.phenix@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');
INSERT INTO grower (name, location, email, password) VALUES ('La Ferme de Nouvelle Aube', '8 rue Louis Marin, 54160 Nomeny', 'ferme.aube@gmail.com', '$2y$10$9wvJcoVCKLKKFEUBjl7xQelSrLYw8L.pFKfQOYuq4ESYB.wtPsOi.');



/**INSERT CATEGORY**/
INSERT INTO category VALUES (1, 'legumes', 'legumineux');
INSERT INTO category VALUES (2, 'fruits', 'fruiteux');
INSERT INTO category VALUES (3, 'feculents', 'feculenteux');
INSERT INTO category VALUES (4, 'cereales', 'cerealeux');
INSERT INTO category VALUES (5, 'produits laitiers', 'laiteux');
INSERT INTO category VALUES (6, 'viandes', 'carne');
INSERT INTO category VALUES (7, 'aromates', 'aromath');



/**INSERT PRODUCT**/
INSERT INTO product (name, description, unit_price,  id_category, id_grower) VALUES ('Carottes (1kg)', 'Carottes fraiches de l\'est, cultivés sur des terres non poluées par des pesticides.', 0.89, 1, 1);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Salade (la pièce)', 'Salade verte, arrosé à l\'eau de pluie et cultivée dans le sable.', 0.99, 1, 2);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Haricots beurre (220g)', 'Haricots très bon pour les petits enfants.', 1.05, 1, 3);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Aubergine (la pièce)', 'Aubergine violette, cultivé sur les flants de montagnes de l\'est.', 1.19, 1, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Tomates (1kg)', 'Tomates cultivées en serre.', 1.49, 1, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Oignons (1kg)', 'Oignons.', 1.49, 1, 2);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Pommes (500g)', 'Pommes vertes grannysmith, ont poussés sur des arbres millénaires.', 0.99, 2, 5);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Poires (500g)', 'Poires williams, arrosés au william peel.', 0.99, 2, 6);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Fraises (500g)', 'Fraises de cléry, en serre.', 2.49, 2, 7);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Mirabelles (500g)', 'Mirabelles reines claude, sans pesticides.', 1.29, 2, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Framboises (125g)', 'Framboises.', 1.49, 2, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Groseilles (125g)', 'Groseilles.', 2.59, 2, 1);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Pommes de terre (1,5kg)', 'Pommes de terre.', 0.99, 3, 9);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Petits pois (1kg)', 'Petits pois, ramassés à la main.', 1.39, 3, 1);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Lentilles (500g)', 'Lentilles vertes, issus d\'une production responsable de l\'environnement.', 1.29, 3, 2);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Pois chiches (500g)', 'Pois chiches, cultivés en plein été.', 0.79, 3, 3);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Orges (1kg)', 'Orges.', 0.49, 4, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Farine de blé (1kg)', 'Farine.', 0.59, 4, 5);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Seigle (1kg)', 'Seigle de bonne qualité.', 0.59, 4, 6);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Riz (1kg)', 'Riz long.', 1.69, 4, 7);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Lait de vache (1L)', 'Lait de vache élevées en plein air.', 0.78, 5, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Bûche fromage de chèvre (1kg)', 'Buche de chèvre, avec du lait de chèvre élevées en montagne.', 8.15, 5, 9);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Yaourt nature (1kg)', 'Yaourt fermenté en cave.', 1.63, 5, 1);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Roquefort (1kg)', 'Roquefort AOC & AOP.', 11.27, 5, 2);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Poulet fermier (la pièce)', 'Poulet élevées en cage de tungstène.', 11.32, 6, 3);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Boeuf haché (500g)', 'Boeuf élevé en prairie.', 4.95, 6, 4);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Jambon (200g)', 'Cochons élévés en plein air.', 1.99, 6, 5);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Lapin (la pièce)', 'Lapin élevé au grain.', 13.37, 6, 6);

INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Thym (100g)', 'Thym tin tin tin.', 3.50, 7, 7);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Romarin (100g)', 'Romarin as-tu des patins ?', 2.70, 7, 7);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Persil (100g)', 'Persil, quelle heure est-t-il madame persil ?', 1.80, 7, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Origan (100g)', 'Origan frais.', 2.70, 7, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Herbes de Provence (100g)', 'De Provence.', 1.07, 7, 8);
INSERT INTO product (name, description, unit_price, id_category, id_grower) VALUES ('Assortiment d\'herbes aromatiques (100g)', 'Thym, romarin, persil, origan, herbes de Provence.', 2.49, 7, 9);

UPDATE product SET image = LOAD_FILE('C:/Users/Pierre-Alexandre/Documents/GitHub/LeHangar.local/public/ressources/carottes.png') WHERE id = 1;


COMMIT;