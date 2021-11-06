SET NAMES utf8;

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
    image varchar(255) DEFAULT 'https://via.placeholder.com/200' NOT NULL,
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
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Carottes (1kg)', 'Carottes fraiches de l\'est, cultivés sur des terres non poluées par des pesticides.', 0.89, 'https://www.lafermederigny.fr/wp-content/uploads/2019/09/carottes-vrac.png', 1, 1);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Salade (la pièce)', 'Salade verte, arrosé à l\'eau de pluie et cultivée dans le sable.', 0.99, 'https://www.plaineduroussillon.com/wp-content/uploads/2017/06/Salade.png', 1, 2);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Haricots beurre (220g)', 'Haricots très bon pour les petits enfants.', 1.05, 'https://www.gelpassgroup.com/wp-content/uploads/2018/11/haricot_beurre.png', 1, 3);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Aubergine (la pièce)', 'Aubergine violette, cultivé sur les flants de montagnes de l\'est.', 1.19, 'https://www.les-toques.fr/wp-content/uploads/2021/03/2.-aubergine-Sharapova-650x1024.png', 1, 4);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Tomates (1kg)', 'Tomates cultivées en serre.', 1.49, 'https://www.charlet.com/wp-content/uploads/2017/07/tomat.png', 1, 8);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Oignons (1kg)', 'Oignons.', 1.49, 'https://www.vilmorin.fr/sites/france.sam/files/Oignon_Texte2.png', 1, 2);

INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Pommes (500g)', 'Pommes vertes grannysmith, ont poussés sur des arbres millénaires.', 0.99, 'https://www.domaine-darmandieu.com/wp-content/uploads/2018/07/Domaine-darmandieu-variete-pomme-Braeburn.png', 2, 5);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Poires (500g)', 'Poires williams, arrosés au william peel.', 0.99, 'https://felpi.fr/wp-content/uploads/2018/12/poires-fruit-industrie.png', 2, 6);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Fraises (500g)', 'Fraises de cléry, en serre.', 2.49, 'https://i0.wp.com/biorganic.blog/wp-content/uploads/2017/09/2-333-choisir-et-conserver-ses-fraises.png?fit=880%2C880&ssl=1', 2, 7);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Mirabelles (500g)', 'Mirabelles reines claude, sans pesticides.', 1.29, 'https://www.lorrainemag.com/wp-content/uploads/2019/08/%C2%A9-Les-Mirabelles-de-Lorraine-520x408.png', 2, 8);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Framboises (125g)', 'Framboises.', 1.49, 'https://www.vitafruits.fr/79-home_default/framboises.jpg', 2, 4);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Groseilles (125g)', 'Groseilles.', 2.59, 'https://www.fruits-vaud-geneve.ch/kcfinder/upload/images/fruits/groseille-a-grappe.png', 2, 1);

INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Pommes de terre (1,5kg)', 'Pommes de terre.', 0.99, 'https://upload.wikimedia.org/wikipedia/commons/6/61/Pommes_de_terre.png', 3, 9);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Petits pois (1kg)', 'Petits pois, ramassés à la main.', 1.39, 'https://www.aujardindeclarisse.fr/wp-content/uploads/2018/03/petits-poid.png', 3, 1);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Lentilles (500g)', 'Lentilles vertes, issus d\'une production responsable de l\'environnement.', 1.29, 'https://leclicavrac.fr/607-large_default/lentilles-vertes-500g.jpg', 3, 2);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Pois chiches (500g)', 'Pois chiches, cultivés en plein été.', 0.79, 'https://www.fondation-louisbonduelle.org/wp-content/uploads/2016/09/pois-chiche_203974900.png', 3, 3);

INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Orges (1kg)', 'Orges.', 0.49, 'https://www.savigny-viry-catholique.fr/wp-content/uploads/2017/04/graindorge.png', 4, 4);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Farine de blé (1kg)', 'Farine.', 0.59, 'https://www.celnat.fr/wp-content/uploads/2017/08/Farine-blanche.png', 4, 5);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Seigle (1kg)', 'Seigle de bonne qualité.', 0.59, 'https://img.saveur-biere.com/img/p/6099-46514.jpg', 4, 6);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Riz (1kg)', 'Riz long.', 1.69, 'https://cdn.shopify.com/s/files/1/0252/4912/0341/products/riz_basmati_bio_markal_300x300.png?v=1593618622', 4, 7);

INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Lait de vache (1L)', 'Lait de vache élevées en plein air.', 0.78, 'https://www.sodiaalfoodexperts.com/media/la_vache_ecreme_brique_1l.png', 5, 8);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Bûche fromage de chèvre (1kg)', 'Buche de chèvre, avec du lait de chèvre élevées en montagne.', 8.15, 'https://www.chavegrand.com/phototheque/i.php?/000/290/BelleDuBocage-1kg-DSC0141,280.210.80.60.crop.2x.1552495519.png', 5, 9);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Yaourt nature (1kg)', 'Yaourt fermenté en cave.', 1.63, 'https://cdn.mcommerce.franprix.fr/product-images/3760072800041', 5, 1);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Roquefort (1kg)', 'Roquefort AOC & AOP.', 11.27, 'https://www.fromages.com/media/uploads/fromage/detail_638_1.png', 5, 2);

INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Poulet fermier (la pièce)', 'Poulet élevées en cage de tungstène.', 11.32, 'https://www.lalouvrie.com/Files/128446/Img/17/Poulet-png-1200.png', 6, 3);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Boeuf haché (500g)', 'Boeuf élevé en prairie.', 4.95, 'https://www.saint-vincentbio.com/wp-content/uploads/2016/08/boeuf-hache-biologique-Saint-Vincent.png', 6, 4);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Jambon (200g)', 'Cochons élévés en plein air.', 1.99, 'https://www.broceliande.fr/sites/default/files/styles/product_packaging_full/public/product/images/packaging/2019-12/Jambon_superieur_3_noix_sans_antibiotique_Broc%C3%A9liande.png?itok=C8plSiyq', 6, 5);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Lapin (la pièce)', 'Lapin élevé au grain.', 13.37, 'https://cdn.pixabay.com/photo/2016/11/30/20/28/rabbit-1873789_960_720.png', 6, 6);

INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Thym (100g)', 'Thym tin tin tin.', 3.50, 'https://www.lamprienprovence.fr/img.php?path=https://root.argweb.fr/documents/users/310/editor/pics/produits/herbes-fraiches/bottes-nues/thym.png&size=1024', 7, 7);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Romarin (100g)', 'Romarin as-tu des patins ?', 2.70, 'https://lh3.googleusercontent.com/proxy/JHJ6cs4s-R2eZuuZTA7nMetp9oNx7hrsa3ePgao-V-0sqOdU7J9eIZRieGWPqxFpZM_dCj1tFHLTuYgtszmQLZ0T34J-J_kHmucCUGAI', 7, 7);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Persil (100g)', 'Persil, quelle heure est-t-il madame persil ?', 1.80, 'https://cdn.pixabay.com/photo/2018/08/22/05/16/parsley-3622868_960_720.png', 7, 8);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Origan (100g)', 'Origan frais.', 2.70, 'https://www.couleursprovence.com/Files/118577/Img/02/FL-Origan-vrac-zoom.png', 7, 8);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Herbes de Provence (100g)', 'De Provence.', 1.07, 'https://www.couleursprovence.com/Files/118577/Img/09/FL-Herbes-de-provence-vrac-zoom.png', 7, 8);
INSERT INTO product (name, description, unit_price, image, id_category, id_grower) VALUES ('Assortiment d\'herbes aromatiques (100g)', 'Thym, romarin, persil, origan, herbes de Provence.', 2.49, 'https://www.dinature.fr/wp-content/uploads/2019/12/DiNatureherbes-de-provence-de-provence-photo-Max-Daumin.png', 7, 9);

COMMIT;