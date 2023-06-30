<?php

    // CREATION DU BLOG AVEC UN TITRE
    $blog = new Blog("Bienvenue sur le blog de Super Aliments Pérou") ;
    $blog->setDescription("Nous sommes ravis de vous accueillir dans notre univers dédié aux super aliments du Pérou. Chez Amazon Andes France, nous avons à cœur de vous faire découvrir la richesse des produits naturels et organiques issus des régions vierges du Pérou. Préparez-vous à plonger dans un monde de saveurs exotiques et de bienfaits pour la santé, car nos super aliments sont bien plus que de simples ingrédients - ce sont de véritables trésors de vitalité.");
    // UTILISATEURS
    $owner = new User("admin", "Grégoire", "CASIER") ;
    $visitor1 = new User("Wiracocha", "Charles", "Aznavert") ;
    $visitor2 = new User("Inti-RÂ", "Omer", "Simpson") ;
    $visitor3 = new User("Atom Kamak", "Lucie", "Van kapelle") ;
    $visitor4 = new User("Inkarri", "Yann", "lefier") ;

    // AFFECTATION DU PROPRIETAIRE DU BLOG
    $blog->setOwner($owner);



    // POSTS DU BLOG
    $post1 = new Post();
    $post1->setTitle("Nos produits sont 100% naturels");
    $post1->setMessage("Aujourd'hui, nous allons explorer les incroyables bienfaits du Camu Camu, une petite baie qui regorge de nutriments essentiels pour notre santé.

    Originaire des régions vierges du Pérou, le Camu Camu (Myrciaria dubia) est considéré comme l'une des sources naturelles les plus riches en vitamine C au monde. Cette petite baie orange vif est véritablement un trésor nutritif, et son potentiel pour améliorer notre bien-être est tout simplement remarquable.
    
    La vitamine C est connue pour renforcer le système immunitaire, mais le Camu Camu va bien au-delà de cela. Une cuillère à café de poudre de Camu Camu contient jusqu'à 1180% de l'apport quotidien recommandé en vitamine C, fournissant ainsi une protection puissante contre les radicaux libres et les dommages oxydatifs. Grâce à sa teneur élevée en antioxydants, le Camu Camu aide à prévenir les maladies, à ralentir le vieillissement cellulaire et à favoriser une peau saine et éclatante.");
    $post1->setViews(151821);
    $post1->setDate(new DateTime('2023-06-19 18:36 GMT'));
    $post1->setAuthor($owner);


    $post2 = new Post();
    $post2->setTitle("En savoir plus sur nos actions Solidaires");
    $post2->setMessage("## **Protéger - Préserver - Partager**

    Chez Amazon Andes France, notre mission ne s'arrête pas à la vente de produits naturels de haute qualité. Nous sommes engagés dans une démarche solidaire et responsable vis-à-vis des communautés natives du Pérou, en particulier la Nation Qeros. Nos actions s'articulent autour de trois piliers principaux : Protéger, Préserver et Partager.");
    $post2->setViews(27972);
    $post2->setDate(new DateTime('2023-06-19 18:36 GMT'));
    $post2->setAuthor($owner);


    $post3 = new Post();
    $post3->setTitle("La Nation Qeros: Gardiens des traditions ancestrales du Pérou!");
    $post3->setMessage("Au cœur des majestueuses montagnes des Andes péruviennes, vit la Nation Qeros. Cette communauté indigène, réputée pour sa sagesse et son mode de vie en harmonie avec la nature, incarne l'esprit ancestral du Pérou.

    Les Qeros, souvent considérés comme les gardiens des traditions incas, préservent avec fierté les connaissances et les pratiques héritées de leurs ancêtres depuis des générations. Leur mode de vie traditionnel est profondément enraciné dans la spiritualité, la connexion à la Terre et le respect des équilibres naturels.");
    $post3->setViews(18666);
    $post3->setDate(new DateTime('2023-06-19 18:36 GMT'));
    $post3->setAuthor($owner);

    $post4 = new Post();
    $post4->setTitle("le Pérou Inca, un pays de légendes et de mystères");
    $post4->setMessage("LLe Pérou, terre des anciens Incas, est un pays empreint de mystères et de légendes. Niché dans les hauteurs majestueuses des Andes, il offre une richesse culturelle et historique qui fascine les voyageurs du monde entier.

    Au cœur de cette contrée, les ruines de Machu Picchu se dressent comme un témoignage énigmatique de la grandeur passée de l'Empire Inca. Ce site archéologique extraordinaire, perché sur une crête montagneuse, évoque des questions sur la construction, l'usage et la mystérieuse disparition de cette cité antique.");
    $post4->setViews(96381);
    $post4->setDate(new DateTime('2023-06-19 18:36 GMT'));
    $post4->setAuthor($owner);


    // CREATION DES COMMENTAIRES
    $comment1 = new Comment("Je suis tellement impressionné par l'engagement de Amazon Andes France envers les communautés natives du Pérou. C'est merveilleux de voir une entreprise qui va au-delà du simple commerce pour soutenir des causes nobles", $visitor1, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment2 = new Comment("Je suis tellement impressionné par l'engagement de Amazon Andes France envers les communautés natives du Pérou. C'est merveilleux de voir une entreprise qui va au-delà du simple commerce pour soutenir des causes nobles", $visitor2, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment3 = new Comment("Les actions de protection et de préservation de la Nation Qeros sont inspirantes. C'est gratifiant de savoir que chaque achat chez Amazon Andes France contribue à soutenir ces efforts et à préserver la culture et les traditions précieuses de la communauté", $visitor2, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment4 = new Comment("Le Pérou Inca est une destination de rêve pour les amateurs d'histoire et d'aventure. J'ai hâte de découvrir les ruines mystérieuses de Machu Picchu et d'explorer les paysages spectaculaires de ce pays fascinant", $visitor3, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment5 = new Comment("RLa richesse culturelle du Pérou est tout simplement époustouflante. Les festivals colorés, les danses traditionnelles et les coutumes ancestrales témoignent d'une histoire et d'une identité uniques. C'est un privilège de pouvoir en apprendre davantage grâce à Amazon Andes France", $visitor3, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment6 = new Comment("Ou alors faut prévoir de passer un week-end tout pourri ^^", $visitor4, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment7 = new Comment("La Nation Qeros est une communauté extraordinaire, porteuse de traditions séculaires. Leur artisanat authentique est magnifique et j'apprécie l'opportunité de le soutenir en achetant leurs produits chez Amazon Andes France.", $visitor2, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment8 = new Comment("La démarche solidaire et responsable d'Amazon Andes France envers la Nation Qeros est admirable. Leur engagement à protéger, préserver et partager est inspirant. C'est un honneur de pouvoir soutenir ces actions en choisissant leurs produits de haute qualité.", $visitor4, new DateTime('2023-06-21 18:36 GMT')) ;
    $comment9 = new Comment("Merci à Tous pour votre soutient. Je suis tellement reconnaissant d'avoir découvert les bienfaits du Camu Camu originaire de ce pays incroyable qu'est le Pérou. C'est incroyable de voir comment un petit fruit peut apporter autant de vitalité et de bien-être. Je ne peux plus m'en passer et c'est pour cela que je souhaite faire connaitre ce merveilleux produit! ENCORE MERCI !!!", $owner, new DateTime('2023-06-21 18:36 GMT')) ;

    // AJOUT DES COMMENTAIRES AUX POSTS
    $post1->addComment($comment1);
    $post1->addComment($comment9);
    $post1->addComment($comment2);
    $post2->addComment($comment3);
    $post2->addComment($comment4);
    $post3->addComment($comment5);
    $post3->addComment($comment6);
    $post4->addComment($comment7);
    $post4->addComment($comment8);

    // AJOUT DES POSTS AU BLOG
    $blog->addPost($post1);
    $blog->addPost($post2);
    $blog->addPost($post3);
    $blog->addPost($post4);

?>
