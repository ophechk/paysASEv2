-- Table utilisateur
CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50) NOT NULL,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table pays (Asie du Sud-Est)
CREATE TABLE pays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE,
    population BIGINT,
    capital VARCHAR(50) NOT NULL UNIQUE,
    superficie DECIMAL(10,2),
    langue_officielle_id INT NOT NULL, -- Relation 1,N avec langue
    FOREIGN KEY (langue_officielle_id) REFERENCES langue(id)
);

-- Table langue (Relation 1,N avec pays)
CREATE TABLE langue (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Table de jointure pour les favoris (Relation 1,N ↔ 1,N)
CREATE TABLE favoris (
    utilisateur_id INT NOT NULL,
    pays_id INT NOT NULL,
    date_ajout DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (utilisateur_id, pays_id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id),
    FOREIGN KEY (pays_id) REFERENCES pays(id)
);

-- Insertion des langues
INSERT INTO langue (nom) VALUES
('Indonésien'),
('Thaï'),
('Malais'),
('Tagalog'),
('Anglais'),
('Vietnamien'),
('Laotien'),
('Khmer'),
('Birman'),
('Malais (Brunei)');

-- Insertion des pays d'Asie du Sud-Est (ASEAN)
INSERT INTO pays (nom, code_iso, population, superficie, date_entree_asean, langue_officielle_id) VALUES
('Indonésie', 'ID', 273523615, 1904569.00, '1967-08-08', (SELECT id FROM langue WHERE nom = 'Indonésien')),
('Thaïlande', 'TH', 69950850, 513120.00, '1967-08-08', (SELECT id FROM langue WHERE nom = 'Thaï')),
('Malaisie', 'MY', 32365999, 330803.00, '1967-08-08', (SELECT id FROM langue WHERE nom = 'Malais')),
('Philippines', 'PH', 109581078, 300000.00, '1967-08-08', (SELECT id FROM langue WHERE nom = 'Tagalog')),
('Singapour', 'SG', 5850342, 728.00, '1967-08-08', (SELECT id FROM langue WHERE nom = 'Anglais')),
('Vietnam', 'VN', 97338579, 331212.00, '1995-07-28', (SELECT id FROM langue WHERE nom = 'Vietnamien')),
('Laos', 'LA', 7275560, 236800.00, '1997-07-23', (SELECT id FROM langue WHERE nom = 'Laotien')),
('Cambodge', 'KH', 16718965, 181035.00, '1999-04-30', (SELECT id FROM langue WHERE nom = 'Khmer')),
('Birmanie', 'MM', 54409800, 676578.00, '1997-07-23', (SELECT id FROM langue WHERE nom = 'Birman')),
('Brunei', 'BN', 437479, 5765.00, '1984-01-07', (SELECT id FROM langue WHERE nom = 'Malais (Brunei)'));


--Exemples de requêtes

-- Détails complets d'un pays avec sa langue officielle
SELECT p.*, l.nom AS langue_officielle
FROM pays p
JOIN langue l ON p.langue_officielle_id = l.id
WHERE p.id = 1;

-- Liste des favoris d'un utilisateur
SELECT p.nom, p.code_iso, f.date_ajout 
FROM favoris f
JOIN pays p ON f.pays_id = p.id
WHERE f.utilisateur_id = 1;

-- Ajout d'un favori
INSERT INTO favoris (utilisateur_id, pays_id) VALUES (1, 3);

-- Pays utilisant une langue spécifique
SELECT p.nom, p.code_iso 
FROM pays p
JOIN langue l ON p.langue_officielle_id = l.id
WHERE l.nom = 'Malais';

-- Langues officielles des pays de l'ASEAN
SELECT p.nom, l.nom AS langue_officielle 
FROM pays p
JOIN langue l ON p.langue_officielle_id = l.id
ORDER BY p.nom;