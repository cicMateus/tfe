-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 09 Juin 2015 à 20:11
-- Version du serveur: 5.5.43
-- Version de PHP: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cindymateus_design_tfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `rub` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `association` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cause` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `evenement` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo_small` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accroche` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bouton` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `actions`
--

INSERT INTO `actions` (`id`, `rub`, `association`, `nom`, `date`, `lieu`, `province`, `cause`, `evenement`, `photo_small`, `accroche`, `bouton`) VALUES
(1, 'croix-rouge', 'Croix-Rouge', '20Km de Bruxelles', '2015-05-31', 'Parc du Cinquantenaire, Bruxelles', 'bruxelles', 'pauvrete', 'Course', 'croix-rouge.jpg', 'Courrez pour les 20Km de Bruxelles au profit du Burundi', 'Je veux courrir'),
(2, 'jet21', 'Jet21', '10km de Uccle', '2015-05-14', 'Parc de Wolvendael, Uccle', 'bruxelles', 'handicapes', 'Course', 'jet21.jpg', 'Courrez les 10km d''Uccle pour la Trisomie 21', 'Je veux courrir'),
(3, 'sos-faim', 'SOS Faim', 'Grande parade "Tout Autre Chose" ', '2015-03-29', 'Gare du nord, Bruxelles', 'bruxelles', 'pauvrete', 'Rassemblement ', 'sos-faim.jpg', 'Participez à la grande parade contre la faim', 'Je rejoins la team '),
(4, 'sos-villages-enfants', 'SOS Villages Enfants', 'Construire une école au Congo', '2015-06-17', 'Rue Bruno, Arsenal, Namur', 'namur', 'enfants', 'Repas', 'sosvillage.jpg', 'Un souper caritatif pour la construction  d''une école au Congo.', 'Je participe'),
(5, 'oxfam', 'Oxfam', 'Oxfam Trailwalker 2015', '2015-06-29', 'Hautes Fagnes - Kettnis', 'liege', 'pauvrete', 'Marche', 'oxfam.jpg', '100km | Team de 4 | 30h', 'Je veux aider');

-- --------------------------------------------------------

--
-- Structure de la table `causes`
--

CREATE TABLE IF NOT EXISTS `causes` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cause` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `causes`
--

INSERT INTO `causes` (`id`, `nom`, `cause`, `picto`) VALUES
(1, 'Enfants', 'enfants', 'enfant.png'),
(2, 'Animaux', 'animaux', 'animaux.png'),
(3, 'Pauvreté', 'pauvrete', 'pauvrete.png'),
(4, 'Droits de l''homme', 'droits-de-lhomme', 'droit-homme.png'),
(5, 'Handicapés', 'handicapes', 'handicape.png'),
(7, 'Sports et loisirs', 'sports-loisirs', 'sport.png'),
(8, 'Personnes agées', 'personnes-agees', 'agee.png'),
(10, 'Maladies', 'maladaies', 'maladies.png');

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `rub` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `but` text COLLATE utf8_unicode_ci NOT NULL,
  `quoi` text COLLATE utf8_unicode_ci NOT NULL,
  `ou` text COLLATE utf8_unicode_ci NOT NULL,
  `quand` text COLLATE utf8_unicode_ci NOT NULL,
  `prix` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `avantages` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `informations`
--

INSERT INTO `informations` (`id`, `rub`, `photo`, `titre`, `but`, `quoi`, `ou`, `quand`, `prix`, `comment`, `avantages`) VALUES
(1, 'croix-rouge', 'img/actions/croix_rouge_20km.jpg', '20km de Bruxelles avec la Croix-Rouge', '<p>La Croix-Rouge de Belgique développe des projets de coopération au développement en collaboration avec les Croix-Rouge du Sud. Ces projets ont pour objectif de lutter contre la pauvreté et l''injustice dans le monde en améliorant les conditions de vie des communautés bénéficiaires.</p><p>Le défi de la Red Cross team est de collecter des dons afin d''améliorer l''accès à l''eau potable au Burundi.Chaque personne, en courant sous les couleurs de la Croix-Rouge, s''engage à se faire parrainer par son entourage !</p>', '<p>La course mythique de Bruxelles rassemble des coureurs du monde entier depuis plus de 30 ans. C''est désormais 40.000 coureurs qui foulent les pavés de la capitale de l''Europe chaque année.</p><p>La Croix-Rouge y participe depuis 2011 et comptait l''année dernière 1.120 coureurs au sein de son équipe, la Red Cross team.</p>', '<p>Le départ de la course est fixé à <strong>10h00</strong> sur les pelouses du Cinquantenaire. Le départ sera donné en six vagues.</p><h4>Transports:</h4><p>Métro ligne 1 et 5</p> <p>Tram 81 et 83</p><p>Bus 1, 22, 27, 61 et 80</p>', '<p>Rendez-vous le <strong>31 Mai 2015</strong>.</p><p>Pour tous les membres du groupe, rendez-vous au stand de la RedCross Team dans le parc du Cinquantenaire (voir plan ci-dessous) :</p><ul><li>A 9h pour la photo de groupe et la distribution de boissons et barres énergétiques.</li><li>Après la course pour récupérer, boire un coup et partager vos impressions. Nous aurons à votre disposition des boissons et collations (fruits, Ice Tea…) ainsi que des kinés prêts à vous masser !</li><li>Un vestiaire est mis gratuitement à disposition dans le musée de l''armée au cinquantenaire par l''organisation des 20km. Néanmoins, toute responsabilité est déclinée en cas de perte ou de vol. L''accès est réservé aux porteurs d''un dossard.</li></ul><p>Vu l''affluence de supporters, faites passer le mot à vos connaissances et/ou supporters !</p>', '<p>Le prix de l''inscription est fixé à <strong>30€</strong> : soit 25€ de frais d''inscription reversés au SIBP, organisateur des 20km plus 5€ de participation au coût du tee-shirt de la Red Cross team (production et envoi postal).</p>', '<p>Prêt à faire partie de notre équipe? Remplissez le formulaire ci-dessous pour vous inscrire.</p>\r\n\r\n<p>Vous souhaitez intégrer la Red Cross team avec votre entreprise?</br>Contactez-nous par email au <a href="mailto:20km@croix-rouge.be">20km@croix-rouge.be.</a>.</br>Nous vous enverrons les modalités d''inscription des entreprises.</p>\r\n\r\n<p>Les inscriptions se clôturent le 3 Mai 2015</p>\r\n\r\n<p>Pour plus d''informations, rendez-vous sur le site du <a href="http://www.20km.redcross.be/fr/index.php" target="blank">Run 20Km</a></p>.', '<ul><li>Votre inscription auprès du SIPB, organisateur des 20km</li><li>L''envoi à votre domicile du dossard et du tee-shirt de la Red Cross team</li><li>Le jour J : collations, boissons énergisantes et massages offerts sur notre stand, situé autour de la fontaine du parc du Cinquantenaire</li></ul>'),
(2, 'jet21', 'img/actions/jet_21_10km.jpg', '10Km de Uccle avec Jet21', '<p>Jet21 est une association de parents de jeunes enfants trisomiques 21 désireux d’unir leurs forces pour offrir à leurs enfants si merveilleusement différents, un monde meilleur.</p><p>Venez donc courir les 10km de Uccle avec nous pour soutenir notre association</p>', '<p>Pour sa deuxième édition, JET 21 participera aux 10 Km d''Uccle.</p><p>Faites-vous parrainer et venez nous rejoindre pour courir au profit de notre association!</p><p>Qu''on se le dise...</br>Que vous soyez plutôt lièvre ou tortue... peu importe!</p><p>Venez courir ou marcher avec nous, nous soutenir... et faites de cette course une opération GRAND COEUR!</p>', '<p>Cette année, le départ et l’arrivée de la course se fera du <strong>parc de Wolvendael à Uccle</strong>.</p>\r\n<p>Le tracé a été modifié de manière à garder la spécificité de la course et permettre ainsi aux coureurs de traverser une partie de la Forêt de Soignes.</p>\r\n\r\n<h4>Transports</h4>\r\n\r\n<p>Bus : 38,41,43,98</p>\r\n<p>Tram : 4,92,97</p>\r\n<p>Train : gare de Saint-Job</p>', '<p>Le départ est donné le <strong>14 Mai 2015</strong> à <strong>15h</strong> au parc de Wolvendael avenue de Wolvendael (entrée Wolvendael et rue Rouge) à Uccle.</p>\r\n<p>Le parcours sera inaccessible à tout véhicule de 13h30 à 18h.</p>\r\n<p>Le parcours est de 10km.</p> \r\n<p>Les inscriptions se clôtureront le 8 mai 2015 à 16h00</p>\r\n\r\n<p>Le numéro de dossard est attribué au fur et à mesure des inscriptions</p>\r\n<p>Le dossard ( avec un chip incorporé) sera expédié par la poste si vous vous inscrivez avant le 2 mai 2015. Après cette date, les dossards pourront être retirés au service des Sports, rue Beeckman 87, 2ème étage du lundi au vendredi de 9h00 à 18h00.</p>', '<p><strong>12€</strong> pour les participants individuels et les sociétés.</p>\r\n\r\n<p><strong>15€</strong> à partir du 11 mai 2015 et sur place le jour de la course</p>\r\n\r\n<p>Les inscriptions sont individuelles et ne peuvent faire l''objet d''aucune réservation.</p>\r\n<p>Aucun transfert d''inscription n''est autorisé.</p>\r\n<p>Les changements de coordonnées des dossards seront facturés <strong>5€</strong>.</p>', '<p>Completez le formulaire ci-dessous pour vous inscire</p>\r\n<p>Il est important de préciser que vous courrez pour JET 21 dans le champ "messages"</p>\r\n\r\n<p>Les inscriptions se clôtureront le 8 mai 2015 à 16h00.</p>\r\n\r\n<p>Pour plus d''informations rendez-vous sur le site <a href="www.10km.be">www.10km.be</a></p>', '<ul>\r\n<li>Le dossard ( avec un chip incorporé) expédié par la poste</li>\r\n<li>Diplôme personnalisé de participation</li>\r\n<li>Ravitaillement sur place</li>\r\n</ul>\r\n'),
(3, 'sos-faim', 'img/actions/sos-faim-parade.jpg', 'La grande parade avec SOS Faim', '<p>SOS Faim est une ONG belge de développement active depuis 1964 dans la lutte contre la faim et la pauvreté en milieu rural en Afrique et en Amérique latine.</p>\r\n\r\n<p>Nous serons dans le bloc "Biens communs" pour rappeler que nous sommes tous dans le même bateau.</p>', '<p>Les mouvements citoyens Tout Autre Chose et Hart Boven Hard tirent la sonnette d’alarme et interpellent les responsables de cette société : nous voulons tout autre chose.</p>\r\n<p>La Grande Parade rassemblera tous ceux qui s’opposent aux mesures du gouvernement et y proposent des alternatives.</p>\r\n<p>Ensemble nous marcherons pour une société multiple et solidaire, où tout le monde se sent chez lui.</p>', '<p>Devant la gare du nord à Bruxelles</p>\r\n<h4>transport</h4>\r\n<p>Train: Gare Bruxelles-Nord</p>', '<p>Dimanche 29 mars 2015</p>\r\n<ul>\r\n\r\n<li>11h – mise sur pied de la Parade (Avenue du Roi Albert II) pour les véhicules spéciaux (s’arranger avec les organisateurs en adressant un mail à parade@hartbovenhard.be)</li>\r\n<li>Le point de rendez-vous est donné à 13h, gare du Nord à Bruxelles.</li>\r\n<li>La parade partira de la gare du nord à 14h.</li>\r\n<li>Elle se terminera à 16h place de l’Albertine (Mont des Arts) pour un grand moment festif de rassemblement en musique et de prises de paroles de Tout Autre Chose et de Hart Boven Hard.</li>\r\n<li>La journée se terminera vers 17h.</li>\r\n</ul>', 'Gratuit', '<p>Pour faire partie de notre horizon, inscrivez-vous via le formulaire ci-dessous</p>', '<p>Le seul avantage c''est de pouvoir contribuer pour un monde meilleur, de façon créative et gratuite.</p>  '),
(4, 'sos-villages-enfants', 'img/actions/sosvillage_repas.jpg', 'Souper caritatif avec SOS Villages d''enfants', '<p>La famille est le meilleur endroit pour grandir. Pourtant, il y a des millions d''enfants dans le monde livrés à eux-mêmes. Nous sommes là pour les aider.</p>\r\n<p>C''es pourquoi nous organisons un repas pour récolter des fonds dans le but de construire une école au Congo</p>\r\n<p>Si tu veux venir nous aider, inscris-toi pour un des profils que nous cherchons!</p>', '<p>Chaque année SOS organise des évènements pour récolter des fonds, et cette année c''est autour d''un repas de bienfaisance que nous nous rassemblons pour les enfants du Congo.</p>\r\n\r\n<p>Nous cherchons ainsi des bénévoles motivés voulant nous aider pendant l''évènement</p>\r\n\r\n<h4>Profils que nous cherchons</h4>\r\n<ul>\r\n<li>Quatre personnes pour servir les boissons lors du repas</li>\r\n<li>Un animateur pour animer la soirée avec des musiques et des activités</li>\r\n<li>Une personne ayant de l''expérience en puériculture pouvant garder les enfants présents</li>\r\n</ul> \r\n', '<p>La soirée se déroulera dans la salle de l''Arsenal à Namur qui se trouve à côté la Haute Ecole de Namur, Rue Bruno</p>\r\n\r\n', '<p>La rencontre est prévue pour le 17 Juin 2015</p>\r\n\r\n<h4>Plan de la soirée</h4>\r\n<ul>\r\n<li>18h30: Accueil des invités</li>\r\n<li>19h: Présentation de SOS Villages d''enfants</li>\r\n<li>20h: Ouverture du souper</li><li>21h30: Récolte de dons</li>\r\n<li>22h00: Soirée dansente</li>\r\n</ul>\r\n\r\n', '<p>Tarifs par personne:</p><ul><li>Adultes: 15€</li><li>Etudiants (sous présentation de carte d''étudiant): 10€</li><li>Enfants (-6ans): Gratuit</li><li>Bénévoles: Gratuit</li><ul> ', '<p>Pour s''inscrite comme bénévole remplit le formulaire en indiquant dans le champ message le profil choisi.</p>\r\n<p>Nous te répondrons dans un délais de 3 jours pour confirmer ton inscription et te présenter les détails pour la suite</p>', '<ul>\r\n<li>Repas + Boissons gratuit</li>\r\n<li>Navette si tu habite à plus de 20km de Namur</li>\r\n<li>T-shirt de staff avec ton nom</li>\r\n</ul>'),
(5, 'oxfam', 'img/actions/oxfam_trailwalker.jpg', 'Trailwalker 2015 avec Oxfam', '<p>Aujourd''hui, des millions de personnes sont touchées de près ou de loin par les conséquences du changement climatique.</p>\r\n<p>C’est pourquoi Oxfam sensibilise le grand public et fait pression pour un engagement des décideurs politiques.</p>\r\n<p>Outre le soutien matériel aux victimes des intempéries, nous formons, via nos partenaires à travers le monde, les agriculteurs locaux à des pratiques durables et nous les aidons à faire face aux conséquences du changement climatique.</p>', '<p>Oxfam Trailwalker est un défi d''équipe unique (entre amis, en famille ou entre collègues) accessible à toutes et tous. Il a pour objectif de lutter contre l''injustice de la pauvreté dans le monde.</p>\r\n<p>Le défi est de parcourir à pied et en équipe de 4 personnes une distance de 100 km en 30 heures maximum. À côté de cela, chaque équipe s’engage à récolter au moins 1500 euros au profit des projets d’Oxfam-Solidarité dans le Nord et le Sud.</p>', '<p>Dans le très joli cadre des Hautes Fagnes, une des régions naturelles les plus belles et les mieux préservées de Belgique.</p>', '<p>Pour cette huitième édition belge d''Oxfam Trailwalker, nous cherchons des bénévoles du mercredi <strong>26 août</strong> au dimanche <strong>30 août 2015</strong> inclus.</p><p>Vous êtes libre une heure, un jour, le week-end, la semaine ? Participez selon vos disponibilités ! Nous cherchons des bénévoles enthousiastes, désireux de contribuer à un projet qui promeut une solidarité mondiale.</p><p>Nous cherchons des profils :</p><ul><li>Généraux</li><li>Spécialisés</li></ul><p>Pour connaitre les missions de chaque profil <a href="http://www.oxfamtrailwalker.be/fr/benevoles/vos-taches-pendant-oxfam-trailwalker" target="_blank">jetez un coup d''oeil ici</a></p> ', '<p><strong>55€ par membre du groupe</strong> si vous participez comme team</p><p><strong>Gratuit</strong> pour les bénévoles</p>', '<p>Pour vous inscrire, remplissez le formulaire ci-dessous. Ajoutez comme message les tâches que vous pouvez accomplir, ainsi que vos coordonnées d''adresse et contact.</p><p>Pour plus d''informations visitez le site de <a href="http://www.oxfamtrailwalker.be/fr" target="_blank">l''évènement</a></p>', '<ul>\r\n<li>Encadrement organisé avec camping et repas offerts</li>\r\n<li>Covoiturage ou remboursement de trajets de train aller/retour sous demande</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_user_from` int(8) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jour` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heure` time NOT NULL,
  `public` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_to` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lien` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `lien`, `logo`) VALUES
(1, 'Oxfam', 'http://www.oxfamsol.be/fr/', 'img/partenaires/oxfam.png'),
(2, 'SOS Villages d''enfants', 'http://www.sos-villages-enfants.be/', 'img/partenaires/sos_villages.png'),
(3, 'Croix-Rouge Belgique', 'http://www.croix-rouge.be/', 'img/partenaires/croix_rouge.png'),
(4, 'SOS Faim', 'https://www.sosfaim.org/be/', 'img/partenaires/sos_faim.png'),
(5, 'Jet21', 'http://www.jet21.be/', 'img/partenaires/jet21.png');

-- --------------------------------------------------------

--
-- Structure de la table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `province`
--

INSERT INTO `province` (`id`, `nom`, `province`, `p`) VALUES
(1, 'Luxembourg', 'luxembourg', 'lux'),
(2, 'Namur', 'namur', 'nam'),
(3, 'Liège', 'liege', 'lie'),
(4, 'Hainaut', 'hainaut', 'hai'),
(5, 'Limbourg', 'limbourg', 'lim'),
(6, 'Brabant Wallon', 'brabant_wallon', 'bw'),
(7, 'Brabant Flamand', 'brabant_flamand', 'bf'),
(8, 'Anvers', 'anvers', 'anv'),
(9, 'Flandre Occidentale', 'flandre_occidentale', 'foc'),
(10, 'Flandre Orientale', 'flandre_orientale', 'for'),
(11, 'Bruxelles-Capitale', 'bruxelles', 'bxl');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banque_carrefour` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connected` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `profil`, `banque_carrefour`, `connected`) VALUES
(1, 'Mateus', 'Cindy', 'c.matmar@gmail.com', 'cc4b2066cfef89f2475de1d4da4b29c7', 'benevole', '', 'false'),
(2, 'Jacoby', 'Michael', 'michael_strike@hotmail.com', '07af613eea059030daaed3bde1fd1ce7', 'benevole', '', 'true'),
(4, 'Mateus Martins', 'Raphael', 'raphaelmateus.martins@gmail.com', '149f27745062e642344795103b5de0cc', 'benevole', '', 'false'),
(5, 'guerra', 'jose', 'jagr.ribeiro@gmail.com', '55890413293a361ece22b1853b966686', 'benevole', '', 'false'),
(6, 'jurydwm', '', 'jurydwm@esiaj.be', '06752433912595852545268d6ea7245b', 'benevole', '', 'false');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
