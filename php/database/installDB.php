<?php
/* Diese Datei erstellt die Datenbank mit allen Tabellen für den Webshop automatisch beim 
   ersten Aufruf der index.php Seite solange die Datenbank und jeweiligen Tabellen noch nicht existieren,
   der Admin Benutzer wird auch direkt erstellt mit dem username 'admin' und dem Passwort '123456789' */

// Anmdeldedaten für die MySQL Datenbank, müssen bei Bedarf angepasst werden!
$servername = "localhost";
$username = "root";
$password = "";

// Verbindung zur MySQL Datenbank wird erstellt
$conn = mysqli_connect($servername, $username, $password);

// Einfache Prüfung ob die Verbindung erfolgreich war 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Existiert die Datenbank "webshop_schreibwaren" noch nicht wird diese erstellt
$database_name = "webshop_schreibwaren";
$create_database_query = "CREATE DATABASE IF NOT EXISTS $database_name";

if (mysqli_query($conn, $create_database_query)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// "$conn" wird überschrieben um die Tabellen zur richtigen Datenbank zuzuweisen
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Existiert die Tabelle "users" noch nicht wird diese erstellt
$create_users_table_query = "CREATE TABLE IF NOT EXISTS users(
    User_ID INT AUTO_INCREMENT NOT NULL,
    Customer_ID INT,
    Username VARCHAR(20),
    Email VARCHAR(50),
    Password VARCHAR(40),
    Role SET('user', 'admin') DEFAULT 'user',
    Picture VARCHAR(255),
    PRIMARY KEY(User_ID)

)";

if (mysqli_query($conn, $create_users_table_query)) {
    echo "Table 'users' created successfully";
} else {
    echo "Error creating table 'users': " . mysqli_error($conn);
}

// Prüfe ob ein Admin Account bereits existiert, wenn nicht wird einer erstellt
$admin_created_query = "SELECT User_ID FROM users WHERE Role = 'admin'";
$result = mysqli_query($conn, $admin_created_query);
if (mysqli_num_rows($result) == 0) {
    // Erstelle den Admin Benutzer 
    $create_admin = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (0,'admin', 'admin@gmail.com', '12345678', 'admin' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_admin);
}

// Es werden 7 weitere User erstellt und in die Datenbank eingefügt
$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 1";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (1,'torben', 'torbenknoeten@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 2";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (2,'jan', 'jannessen@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 3";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (3,'tim', 'timmersen@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 4";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (4,'torsten', 'torsteren@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 5";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (5,'ulf', 'ulfsepp@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 6";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (6,'jochen', 'jochenralf@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

$user_created_query = "SELECT User_ID FROM users WHERE Customer_ID = 7";
$result = mysqli_query($conn, $user_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_user = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (7,'karsten', 'karstenene@gmail.com', '12345678', 'user' ,'../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $create_user);
}

// Existiert die Tabelle "products" noch nicht wird diese erstellt
$create_product_table_query = "CREATE TABLE IF NOT EXISTS products(
    Product_ID INT AUTO_INCREMENT NOT NULL,
    Name VARCHAR(50),
    Brand VARCHAR(50),
    Price FLOAT,
    Stock INT,
    AvgRating FLOAT,
    NoRating INT,
    RatingScore FLOAT,
    Description TEXT,
    Picture VARCHAR(255),
    PRIMARY KEY(Product_ID)
)";

if (mysqli_query($conn, $create_product_table_query)) {
    echo "Table 'products' created successfully";
} else {
    echo "Error creating table 'products': " . mysqli_error($conn);
}

// Es werden 15 Produkte erstellt und in die Datenbank eingefügt
$product1_created_query = "SELECT Product_ID FROM products WHERE Name = 'Fineliner Set'";
$result = mysqli_query($conn, $product1_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product1 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Fineliner Set','FRIXION', 2.43, 120, 3.5, 46, 161,'Entdecke die wahre Definition von Präzision und Kreativität mit unserem exquisiten Fineliner-Set! Egal, ob du ein passionierter Künstler, ein kreativer Schreiber oder ein enthusiastischer Planer bist, diese hochwertigen Fineliner werden dein Talent auf ein neues Level heben. Jeder Strich wird zu einem Meisterwerk, dank der ultrafeinen Spitzen, die eine unglaublich präzise Linienführung ermöglichen. Die brillanten, leuchtenden Farben lassen deine Ideen zum Leben erwachen und verleihen deinen Projekten einen Hauch von Magie. Die wasserbasierte Tinte trocknet schnell und ist absolut verschmierfrei, sodass du mühelos faszinierende Illustrationen, detaillierte Notizen oder kunstvolle Skizzen erstellen kannst. Das Set enthält eine vielfältige Auswahl an Farben, damit du deine Fantasie grenzenlos entfalten kannst.','../src/images/productpictures/frixion_stifte2.jpg')";
    mysqli_query($conn, $create_product1);
}

$product2_created_query = "SELECT Product_ID FROM products WHERE Name = 'OHPen Folienstifte-Set'";
$result = mysqli_query($conn, $product2_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product2 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('OHPen Folienstifte-Set','Stabilo', 6.62, 56, 4.0, 120, 480,'Das STABILO OHPen universal Folienstifte-Set farbsortiert non-permanent 4 St. können Sie für fast alle gängigen Oberflächen (OHP-Folien, CDs, DVDs, Glas, Metall, Holz, Mamor, Plastik) verwenden. Das Produkt ist ganz leicht wieder abwischbar, falls Sie sich doch einmal verschreiben sollten oder z.B. das beschriebene Material anderweitig benötigen.','../src/images/productpictures/stabilo_ohpen_universal_folienstifte_set.jpg')";
    mysqli_query($conn, $create_product2);
}

$product3_created_query = "SELECT Product_ID FROM products WHERE Name = 'Classic M200 Kolbenfüller'";
$result = mysqli_query($conn, $product3_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product3 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Classic M200 Kolbenfüller','Pelikan', 106.60, 73, 5.0, 87, 435,'Übernehmen Sie die Federführung und bringen Sie mithilfe des Pelikan Classic M200 Kolbenfüllers schwarz/gold M (mittel) Ihre Handschrift zur vollen Entfaltung! Er lässt Sie flüssig und leicht über das Blatt gleiten und verleiht Ihren Schriftstücken eine individuelle Gestalt. Diese besondere Eigenschaft bringt er ebenfalls mit: Kolbenmechanismus aus hochwertigen Messingbauteilen.','../src/images/productpictures/pelikan_classic_m200_kolbenfüller.jpg')";
    mysqli_query($conn, $create_product3);
}

$product4_created_query = "SELECT Product_ID FROM products WHERE Name = 'Korrekturroller Mini'";
$result = mysqli_query($conn, $product4_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product4 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Korrekturroller Mini','Tipp-Ex', 2.24, 205, 2.5, 39, 97.5,'Das Talent von Mäusen wird ja häufig unterschätzt. Diese Maus der Tipp-Ex Mini Pocket Mouse Korrekturroller hat das besondere Talent, Fehler zu überdecken und überschreibbar zu machen.Die Mini Pocket Mouse ist ein Einweg-Korrekturroller im Miniformat, mit dem Sie Schreibfehler, Schmierereien oder falsch Gedrucktes leicht und locker korrigieren können. Das 5,0 mm breite, weiße Korrekturband lässt sich sehr einfach abrollen und absolut sauber aufgetragen. Es ist danach sofort überschreibbar. Diese Maus darf in keinem Büro fehlen und eignet sich wegen ihres extra kleinen Gehäuses auch wunderbar für Mäppchen, Etuis oder Aktentaschen. Damit werden Sie an dieser Maus lange Zeit viel Freude haben!','../src/images/productpictures/tipp_ex_korrekturroller_mini.jpg')";
    mysqli_query($conn, $create_product4);
}

$product5_created_query = "SELECT Product_ID FROM products WHERE Name = 'Geodreieck 32,0 cm'";
$result = mysqli_query($conn, $product5_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product5 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Geodreieck 32,0 cm','M + R', 10, 163, 4.5, 24, 108,'Das technische Geodreieck verfügt über zahlreiche nützliche Eigenschaften. Sie werden bei der Nutzung nichts vermissen und restlos begeistert sein! Die gegenläufige Grad-Skala ist für ein besseres Ablesen farbig markiert. Dank des praktischen Kunststoffgriffs liegt Ihnen das Zeichendreieck gut in der Hand und Sie können es ruckellos über den Untergrund hinwegbewegen. Am Nullpunkt verfügt das Geodreieck über einen Einstechpunkt für den Zirkel. Dadurch sind exakte Zeichnungen über gerade Linien hinweg möglich','../src/images/productpictures/m_r_geodreieck.jpg')";
    mysqli_query($conn, $create_product5);
}

$product6_created_query = "SELECT Product_ID FROM products WHERE Name = 'edding 3000 Permanentmarker'";
$result = mysqli_query($conn, $product6_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product6 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('edding 3000 Permanentmarker','edding', 2.24, 18, 3.5, 78, 273,'Wenn es darum geht, etwas zu beschriften, zu markieren oder sonst deutlich hervorzuheben, dann ist der edding Permanentmarker 3000 die richtige Wahl. Mit seiner schnell trocknenden, geruchsarmen, lichtbeständigen, wisch- und wasserfesten Tusche - ohne Zusatz von Toluol und Xylol - können Sie mit diesem edding schnell und wirkungsvoll arbeiten.','../src/images/productpictures/edding_3000_permanentmarker.jpg')";
    mysqli_query($conn, $create_product6);
}

$product7_created_query = "SELECT Product_ID FROM products WHERE Name = 'ORIGINAL Textmarker'";
$result = mysqli_query($conn, $product7_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product7 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('ORIGINAL Textmarker','Stabilo', 0.92, 167, 4.5, 35, 157.5,'Mit leuchtendem gelb macht der STABILO BOSS ORIGINAL Texte übersichtlich. Wichtiges springt sofort ins Auge und Texte lassen sich so viel schneller erfassen. Dank einer Keilspitze mit variabler Strichstärke von 2,0 - 5,0 mm geht das Unterstreichen von einzelnen Textstellen und Worten oder auch das Markieren von ganzen Absätzen schnell und einfach von der Hand. Egal ob fürs Büro, das Studium oder die Schule - der STABILO BOSS ORIGINAL Textmarker sorgt immer für Übersicht und Ordnung in Ihren Unterlagen.','../src/images/productpictures/stabilo_boss_original_textmarker.jpg')";
    mysqli_query($conn, $create_product7);
}

$product8_created_query = "SELECT Product_ID FROM products WHERE Name = 'Job TM 150'";
$result = mysqli_query($conn, $product8_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product8 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Job TM 150','Schneider', 0.54, 87, 2.5, 67, 167.5,'Der Schneider Textmarker Job TM 150 mit maximaler Leuchtkraft lässt markierte Textstellen sofort ins Auge springen. Er ist unentbehrlich im Büro, Studium, Seminar und immer da, wo Texte ganz genau angeschaut und hervorgehoben werden. Der Job TM 150 ist sehr ergiebig und kann mit seinem großen Tintenvorrat mehr als 15.000 Worte markieren.','../src/images/productpictures/schneider_job_tm.jpg')";
    mysqli_query($conn, $create_product8);
}

$product9_created_query = "SELECT Product_ID FROM products WHERE Name = '1511 Fineliner schwarz'";
$result = mysqli_query($conn, $product9_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product9 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('1511 Fineliner schwarz','Faber Castell', 0.74, 52, 4.5, 23, 103.5,'Wählen Sie den FABER-CASTELL 1511 Fineliner schwarz 0,4 mm für Ihren Alltag! Die feinen Linien erzeugen ein sauberes Schriftbild – ideal für ansprechende Fließtexte, ordentliche Skizzen oder wichtige Notizen. Auch Schablonen und Lineale stellen dank der feinen Spitze keine Herausforderung dar.','../src/images/productpictures/faber_castell_1511.jpg')";
    mysqli_query($conn, $create_product9);
}

$product10_created_query = "SELECT Product_ID FROM products WHERE Name = '3 Pelikan 96 Fineliner'";
$result = mysqli_query($conn, $product10_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product10 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('3 Pelikan 96 Fineliner','Pelikan', 2.35, 106, 3.5, 65, 227.5,'Immer dann, wenn es auf einen präzisen Strich ankommt, sind die 3 Pelikan 96 Fineliner schwarz 0,4 mm eine gute Wahl. Sie überzeugen nicht nur mit feinen Linien, sondern auch durch lange Haltbarkeit und hervorragenden Schreibkomfort.','../src/images/productpictures/pelikan_96_fineliner.jpg')";
    mysqli_query($conn, $create_product10);
}

$product11_created_query = "SELECT Product_ID FROM products WHERE Name = '4 STAEDTLER triplus® 334'";
$result = mysqli_query($conn, $product11_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product11 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('4 STAEDTLER triplus® 334','STAEDLER', 2.75, 176, 5, 87, 435,'Mit den 4 STAEDTLER triplus® 334 Finelinern farbsortiert 0,3 mm sind Sie bestens ausgerüstet, wenn Sie auf eine saubere und präzise Arbeitweise wert legen. Geeignet für Lineal und Schablone sind sie der perfekte Begleiter für Schule oder Studium. Doch auch im Büro macht der Artikel eine ausgezeichnete Figur. Dank des feinen Schriftbilds sind gut lesbare Unterschriften, präzise Zeichnungen oder Notizen fortan selbstverständlich.','../src/images/productpictures/staedtler_triplus_334.jpg')";
    mysqli_query($conn, $create_product11);
}

$product12_created_query = "SELECT Product_ID FROM products WHERE Name = 'Dosenspitzer dreifach'";
$result = mysqli_query($conn, $product12_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product12 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Dosenspitzer dreifach','Faber Castell', 3.24, 287, 4.5, 45, 202.5,'Diese praktische Spitzdose vom Markenhersteller FABER-CASTELL bietet Ihnen gleich drei Dosenspitzer dreifach in einem und eignet sich für Jumbo-, Blei- und Farbstifte in Dreieck-, Rund- und 6-Eck-Form mit einem Durchmesser von bis 8, bis 12 mm. Mit den Maßen 4,5 x 4,5 x 6,5 cm (BxTxH) passt dieser praktische Dosenspitzer dreifach auf jeden Schreibtisch und in jede Schultasche. Denn besonders für unterwegs eignet sich die Spitzdose dank des Auffangbehälters besonders gut. Dieser lässt sich übrigens ganz schnell und einfach entleeren.','../src/images/productpictures/faber_castell_dosenspitzer.jpg')";
    mysqli_query($conn, $create_product12);
}

$product13_created_query = "SELECT Product_ID FROM products WHERE Name = 'Dosenspitzer doppelt'";
$result = mysqli_query($conn, $product13_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product13 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Dosenspitzer doppelt','M + R', 1.45, 67, 3.5, 24, 84,'Glänzend peppiges Design und für jeden Stift den passenden Spitzer. Das bekommen Sie mit dem stylischen Dosenspitzer doppelt TRIO Swing ® von M + R made in Germany. Er kokettiert mit seinem dreieckigen Design, der hochglänzenden Oberfläche und der geschwungenen Form des Spitzeraufsatzes. Aber nicht nur die Optik hat es in sich.','../src/images/productpictures/m_r_dosenspitzer_doppelt_trio.jpg')";
    mysqli_query($conn, $create_product13);
}

$product14_created_query = "SELECT Product_ID FROM products WHERE Name = 'Parabelschablone'";
$result = mysqli_query($conn, $product14_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product14 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Parabelschablone','Wedo', 2.87, 65, 4, 56, 224,'Eine Parabel ist in der Mathematik eine Kurve zweiter Ordnung ein Funktionsgraph der Polynomdivision. Die Parabelschablone von WEDO hat die Form der Einheitsparabel y = x² und ist somit ein unverzichtbares Hilfsmittel für Schüler und Studenten.','../src/images/productpictures/wedo_parabelschablone.jpg')";
    mysqli_query($conn, $create_product14);
}

$product15_created_query = "SELECT Product_ID FROM products WHERE Name = 'Zeichenschablone'";
$result = mysqli_query($conn, $product15_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_product15 = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('Zeichenschablone','KOH-I-NOOR', 4.99, 86, 3, 37, 111,'Eine Parabel ist in der Mathematik eine Kurve zweiter Ordnung ein Funktionsgraph der Polynomdivision. Die Parabelschablone von WEDO hat die Form der Einheitsparabel y = x² und ist somit ein unverzichtbares Hilfsmittel für Schüler und Studenten.','../src/images/productpictures/koh_i_noor_zeichenschablone.jpg')";
    mysqli_query($conn, $create_product15);
}

// Existiert die Tabelle "customers" noch nicht wird diese erstellt
$create_customers_table_query = "CREATE TABLE IF NOT EXISTS customers(
    Customer_ID INT AUTO_INCREMENT NOT NULL,
    User_ID INT,
    Title VARCHAR(20),
    Name VARCHAR(255),
    Surname VARCHAR(255),
    Street VARCHAR(255),
    Number INT,
    City VARCHAR(255),
    Zipcode INT,
    PRIMARY KEY(Customer_ID)
)";

if (mysqli_query($conn, $create_customers_table_query)) {
    echo "Table 'customers' created successfully";
} else {
    echo "Error creating table 'customers': " . mysqli_error($conn);
}

// Es werden 7 Customer erstellt und in die Datenbank eingefügt
$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 2";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (2,'Herr', 'Torben', 'Knoeten', 'Bergstraße' , 34, 'Dortmund', 44273)";
    mysqli_query($conn, $create_customer);
}

$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 3";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (3,'Herr', 'Jan', 'Nesen', 'Dorfstraße' , 2, 'Essen', 45345)";
    mysqli_query($conn, $create_customer);
}

$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 4";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (4,'Herr', 'Tim', 'Ersen', 'Pfingstweg' , 67, 'Hamburg', 21034)";
    mysqli_query($conn, $create_customer);
}

$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 5";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (5,'Herr', 'Torsten', 'Etterich', 'Aufm Stein' , 6, 'Bottrop', 46237)";
    mysqli_query($conn, $create_customer);
}

$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 6";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (6,'Herr', 'Ulf', 'Sepp', 'Weg zum Dorf' , 23, 'Berlin', 36447)";
    mysqli_query($conn, $create_customer);
}

$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 7";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (7,'Herr', 'Jochen', 'Ralf', 'Kieselstraße' , 64, 'Emmerich', 49283)";
    mysqli_query($conn, $create_customer);
}

$customer_created_query = "SELECT Customer_ID FROM customers WHERE User_ID = 8";
$result = mysqli_query($conn, $customer_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_customer = "INSERT INTO customers (User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES (8,'Herr', 'Karsten', 'Karsteron', 'Schiefweg' , 374, 'Oldenburg', 24654)";
    mysqli_query($conn, $create_customer);
}

// Existiert die Tabelle "order" noch nicht wird diese erstellt
$create_orders_table_query = "CREATE TABLE IF NOT EXISTS orders(
    Order_ID INT AUTO_INCREMENT NOT NULL,
    Customer_ID INT,
    Date TIMESTAMP,
    PRIMARY KEY(Order_ID)
)";

if (mysqli_query($conn, $create_orders_table_query)) {
    echo "Table 'orders' created successfully";
} else {
    echo "Error creating table 'orders': " . mysqli_error($conn);
}

// Es werden 21 Orders erstellt und in die Datenbank eingefügt
$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 1";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (2, date('2023-06-12'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 2";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (5, date('2023-06-12'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 3";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (1, date('2023-06-12'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 4";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (7, date('2023-06-13'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 5";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (3, date('2023-06-13'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 6";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (4, date('2023-06-13'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 7";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (3, date('2023-06-14'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 8";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (1, date('2023-06-14'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 9";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (5, date('2023-06-14'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 10";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (6, date('2023-06-15'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 11";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (7, date('2023-06-15'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 12";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (8, date('2023-06-15'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 13";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (2, date('2023-06-16'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 14";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (4, date('2023-06-16'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 15";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (3, date('2023-06-16'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 16";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (7, date('2023-06-17'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 17";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (5, date('2023-06-17'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 18";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (1, date('2023-06-17'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 19";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (6, date('2023-06-18'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 20";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (4, date('2023-06-18'))";
    mysqli_query($conn, $create_order);
}

$order_created_query = "SELECT Order_ID FROM orders WHERE Order_ID = 21";
$result = mysqli_query($conn, $order_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_order = "INSERT INTO orders (Customer_ID, Date) VALUES (3, date('2023-06-18'))";
    mysqli_query($conn, $create_order);
}

// Existiert die Tabelle "ordered_items" noch nicht wird diese erstellt
$create_ordered_items_table_query = "CREATE TABLE IF NOT EXISTS ordered_items(
    OItem_ID INT AUTO_INCREMENT NOT NULL,
    Order_ID INT,
    Product_ID INT,
    Price FLOAT,
    PRIMARY KEY(OItem_ID)
)";

if (mysqli_query($conn, $create_ordered_items_table_query)) {
    echo "Table 'ordered_items' created successfully";
} else {
    echo "Error creating table 'ordered_items': " . mysqli_error($conn);
}

// Es werden 41 ordered_items erstellt und in die Datenbank eingefügt
$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 1";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (1, 1, 2.43)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 2";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (1, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 3";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (2, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 4";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (2, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 5";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (3, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 6";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (3, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 7";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (3, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 8";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (4, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 9";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (4, 4, 2.24)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 10";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (5, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 11";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (5, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 12";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (5, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 13";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (6, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 14";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (7, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 15";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (7, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 16";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (7, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 17";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (8, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 18";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (8, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 19";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (9, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 20";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (9, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 21";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (9, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 22";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (10, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 23";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (11, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 24";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (11, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 25";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (12, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 26";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (12, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 27";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (13, 2, 6.62)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 28";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (13, 2, 6.62)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 29";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (14, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 30";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (14, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 31";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (14, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 32";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (14, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 33";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (15, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 34";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (16, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 35";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (16, 1, 2.43)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 36";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (17, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 37";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (18, 4, 2.24)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 38";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (19, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 39";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (19, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 40";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (20, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

$ordered_item_created_query = "SELECT OItem_ID FROM ordered_items WHERE OItem_ID = 41";
$result = mysqli_query($conn, $ordered_item_created_query);
if (mysqli_num_rows($result) == 0) {
    $create_ordered_item = "INSERT INTO ordered_items (Order_ID, Product_ID, Price) VALUES (21, 3, 106.60)";
    mysqli_query($conn, $create_ordered_item);
}

// Existiert die Tabelle "reviews" noch nicht wird diese erstellt
$create_reviews_table_query = "CREATE TABLE IF NOT EXISTS reviews(
    Review_ID INT AUTO_INCREMENT NOT NULL,
    User_ID INT,
    Product_ID INT,
    Bought BIT,
    Rating INT,
    Review TEXT,
    Date TIMESTAMP,
    PRIMARY KEY(Review_ID)
)";

if (mysqli_query($conn, $create_reviews_table_query)) {
    echo "Table 'reviews' created successfully";
} else {
    echo "Error creating table 'reviews': " . mysqli_error($conn);
}

// Es werden 45 reviews erstellt und in die Datenbank eingefügt
$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 1";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 1, 0, 3, 'Das Produkt ist ok, kann besser sein aber macht was es soll',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 2";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 1, 1, 4, 'Viele Farben und halten lange, insgesammt ein gutes Fineliner set', date('2023-06-09'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 3";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 1, 0, 3, 'Die Qualität der Verarbeitung lässt zu wünschen übrig aber malen gut!',  date('2023-06-10'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 4";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (5, 2, 1, 5, 'Wunderbare Stifte, benutze sie seit 3 Monaten täglich und tun immer das was sie sollen',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 5";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (6, 2, 1, 3, 'Ansich gute OHP Stifte aber sie gehen leider sehr schnell leer',  date('2023-06-12'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 6";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (7, 2, 0, 4, 'Top Stifte, lassen sich super einfach von Folien wischen',  date('2023-05-12'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 7";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (8, 3, 1, 5, 'Ein wunderbarer Füller, liegt super in der Hand und schreiben fühlt sich auch sehr gut an',  date('2023-06-09'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 8";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 3, 0, 5, 'Super Gerät sehr befriedigend zu nutzen und einfacher Wechsel von Patronen',  date('2023-06-10'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 9";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 3, 1, 5, 'Bester Füller',  date('2023-06-10'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 10";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 4, 1, 2, 'Bin nicht so zufriden mit dem Tipp-Ex Roller. Hält nicht so gut und die Benutzung ist hakelig',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 11";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (5, 4, 1, 3, 'Ist Ok, hatte aber schon bessere',  date('2023-06-15'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 12";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (6, 4, 1, 2, 'Lässt zu wünschen übrig',  date('2023-06-13'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 13";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (7, 5, 1, 4, 'Gutes, stabiles Geodreieck',  date('2023-06-08'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 14";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (8, 5, 0, 5, 'Hat alles was man von einem Geodreieck erwarten würde',  date('2023-06-03'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 15";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 5, 1, 5, 'Gutes Stück',  date('2023-06-03'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 16";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 6, 1, 4, 'Klassicher Edding Stift gewohnte Qualität',  date('2023-05-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 17";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 6, 0, 3, 'Ist leider schnell leer gewesen, ansonsten top',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 18";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (5, 6, 0, 5, 'Wunderbarer Marker hält lange und deckt gut',  date('2023-06-12'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 19";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (6, 7, 0, 4, 'Macht wat er soll',  date('2023-06-13'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 20";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (7, 7, 1, 3, 'Deckt manchmal ein wenig zu sehr',  date('2023-06-14'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 21";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (8, 7, 1, 4, 'Optimaler Marker für den Alltag',  date('2023-06-06'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 22";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 8, 1, 2, 'Gibt deutlich bessere Marker, sehr schwer zu erkennen auf dem falschen Papier',  date('2023-06-02'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 23";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 8, 0, 3, 'Nicht all zu gut verarbeitet da kommt manchmal was raus',  date('2023-06-09'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 24";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 8, 0, 2, 'Keine Empfehlung von mir da gibts bessere',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 25";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (5, 9, 1, 5, 'Gibt wenig Fineleiner mit so einer Qualität sehr gut',  date('2023-06-12'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 26";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (6, 9, 1, 4, 'Mag den Fineliner sehr',  date('2023-06-03'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 27";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (7, 9, 0, 5, 'Optimaler Fineliner für alle Dinge für die man einen brauch',  date('2023-06-03'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 28";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (8, 10, 1, 4, 'Gutes Set, halten lange und tun was sie sollen',  date('2023-06-16'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 29";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 10, 0, 3, 'Gehen leider schnell kaputt wenn man zu viel drucka uf die Mine macht',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 30";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 10, 0, 4, 'Feine Fineliner',  date('2023-06-12'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 31";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 11, 0, 5, 'Eine gute Auswahl an Stiften, aboslut keine Probleme gehabt mit denen',  date('2023-06-15'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 32";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (5, 11, 0, 4, 'Das Blau und Schwarz sind sich leider sehr ähnlich aber ansonsten top',  date('2023-06-08'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 33";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (6, 11, 0, 5, 'Da gibts nichts auszusetzen',  date('2023-06-08'))";
    mysqli_query($conn, $review_comment);
}


$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 34";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (7, 12, 1, 4, 'Der Klassiker, funktioniert einwand frei nur etwas sperrig',  date('2023-06-05'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 35";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (8, 12, 1, 5, 'Top Anspitzer',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 36";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 12, 0, 5, 'Die Stifte sind danach angespritzt, so wie es soll',  date('2023-06-13'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 37";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 13, 1, 3, 'Nicht so stabil wie er aussieht geht leider schnell kaputt',  date('2023-06-11'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 38";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 13, 1, 4, 'Top könnte besser sein aber mahct alles so wies sein soll',  date('2023-06-02'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 39";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (5, 13, 1, 3, 'Nicht all zu gut aber für ne schmale Mark ausreichend',  date('2023-06-12'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 40";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (6, 14, 0, 4, 'Wenn man eine PArabelschablone brauch dann ist das eine gute Wahl',  date('2023-06-13'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 41";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (7, 14, 1, 5, 'Einwand frei',  date('2023-06-09'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 42";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (8, 14, 0, 4, 'Perfekt um schöne PArabeln zu zeichnen',  date('2023-06-01'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 43";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (2, 15, 1, 2, 'Coole Formen aber zu biegsames Material',  date('2023-06-02'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 44";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (3, 15, 1, 4, 'Ist solide gibts aber auch bessere',  date('2023-06-15'))";
    mysqli_query($conn, $review_comment);
}

$review_created_query = "SELECT Review_ID FROM reviews WHERE Review_ID = 45";
$result = mysqli_query($conn, $review_created_query);
if (mysqli_num_rows($result) == 0) {
    $review_comment = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES (4, 15, 0, 3, 'Kann man mit arbeiten',  date('2023-06-12'))";
    mysqli_query($conn, $review_comment);
}
// Die Verbindung zur MySQL Datenbank wird geschlossen
mysqli_close($conn);
