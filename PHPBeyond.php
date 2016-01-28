<?php 
	// NULL and empty

	// NULL znaci nista

	is_null(); // za null vrednost daje true, za prazan string false, za nepostojecu vrednost daje true i izbacuje notice
	isset(); // false za null, true za prazan string, false za nepostojecu vrednost

	// null je nepostojanje vrednosti

	// empty: "", null, 0, 0,0, "0", false, array()
	// empty: "", null, 0, 0,0, "0", false, array()

	KASTOVANJE

	// dva nacina
	settype(var, type); // menja tip varijable odmah
	(integer) $var;		// mora da se dodeli novoj vrednosti da bi se promenio tip

	gettype(var);

	string
	int, integer
	float
	array
	bool, boolean

	continue; // kada se koristi u vise nivoa petlje, mozemo da stavimo broj pored continue(2), to znaci da se continue odnosi na stariju for petlju:

	for ($i=0; $i < 5; $i++) { 
		if ($i % 2 == 0) { continue; }
		for ($k=0; $k < 5; $k++) { 
			if ($k == 3) { continue(2); } // odlazi skroz do gornje petlje, prestaje da izvrsava ovu
			echo $i . "-" . $k . "<br>";
		}
	}

	break; // u for petlji predstavlja izlazak iz kompletne petlje

	break(2); // ima isto opciju kao i continue

	POINTERI

	$ages = array(); // neki niz

	current($ages); // na koji trenutno pokazujemo
	next($ages);	// prebaci pokazivac na sledeci
	prev($ages);	// prebaci pokazivac na prethodni
	reset($ages);	// vrati na prvi
	end($ages);		// idi na poslednji, end pa next daje nista


	// koriscenje

	while ($age = current($ages)) { // dodeljivanje, nije poredjenje!!!
		echo $age . ", ";
		next($ages);
	} // bitno zbog rada sa bazama

	// kada imamo neku funkciju saberi_oduzmi() koja vraca niz sa, recimo, dve vrednosti, onda mozeom da ispisemo kao listu:

	list($zbir, $razlika) = saberi_oduzmi(20, 10); // ovako smestimo te dve vrednosti koje ce nam napuniti niz koji se vraca u listu, i onda mozemo da ih prikazemo 

	DEBAGOVANJE

	// korisna funkcija koju upisujemo unutar neke funkcije

	var_dump(debug_backtrace());

	// LINKS AND URL's

	// postoje tri nacina na koje prikupljamo informacije od korisnika na internetu:

	//Links and URL's 	GET request
	//Forms 			POST request
	//Cookies			COOKIE

	GET

	// super-globalna varijabla u kojoj se cuvaju podaci koje prosledimo preko url-a. Oni se smestaju u asocijativni niz iz kog mozemo da im pristupimo
	// npr. google.com/search=1&page=2

	$_GET['search']; // 1
	$_GET['page']; // 2

	// KODIRANJE GET VREDNOSTI (ako imamo nezeljene karaktere kao npr. &)

	// ima dosta karaktera koji su rezervisani u URL-u, zato moramo biti pazljivi !()@#$[]+%&*...
	// njih zamenjujemo sa znakom procenta i parom heksadecimalnih cifara (npr. %26 je &)

	urlencode($string); 	// rezervisani karakteri postaju % + 2 heksa cifre
							// space postaje +

	// koristi se samo za $_GET, ne i za $_POST i $_COOKIE jer tu nemamo smestanje vrednosti u URL

	rawurlencode($string); 	// rezervisani karakteri postaju % + 2 heksa cifre
							// space postaje %20 !!!!

	// Koji koristiti???

	// rawurlencode putanju pre ?
	// - space-ovi moraju biti interpretirani kao %20

	// urlencode query string posle ?
	// - space-ove je bolje enkodirati kao "+"

	// rawurlencode je generalno kompatibilniji !!!

	KODIRANJE HTML-a

	// rezervisani karakteri < > & "

	// htmlspecialchars(string) - enkodira 4 specijalna karaktera u &lt; &gt; &amp; &quot;
	// htmlentities(string) - enkodira sve znakove koji imaju HTML ekvivalent

	// INCLUDE, REQUIRE

	// kad include-ujemo fajl, bitmoje da i on ima otvoren php tag

	HEDERI

	// sluze za redirekcije

	header(string);

	// JAKO BITNO: oni se pojavljuju pre svog ostalog sadrzaja stranice !!!

	REDIREKCIJE

	// jedan tip redirekcije je 302 redirekcija

	// HTTP 1.1/ 302 Found
	// Location: path // novi URL

	header("Location: login.php"); // mora tacno ovako da izgleda Location: lokacija


	OUTPUT BUFFERING

	// kao slavina (php kod) koja puni casu (web server) HTML-om, kad upadne prva kap, dobijamo hedere, kad se casa napuni server salje podatke browseru
	// output buffer je kao posuda za merenje koja stalno salje istu "kolicinu" koda u casu, tako mozemo da editujemo hedere u toku "presipanja"
	// mozemo da ga podesimo u php.ini ili za svaki fajl posebno (recimo 4096, to je dobar broj)

	ob_start(); // pocetak (mora pre bilo kog sadrzaja, kao hederi)
	ob_end_flush(); // kraj

	FORME!!!!

	// POST zahtev
	// kad submit-ujemo formu, ona moze da vodi na istu stranu ili na neku drugu, podaci iz forme se smestaju u $_POST kao acosijativni niz, koji ima key ono sto je nama name inputa, a value je vrednost tog polja.

	echo $_POST['$key'];

	// provera da li ima vrednosti u $_POST, tj. dali smo dosli preko forme na stranicu ili samo preko url-a
	// boolean_test ? value_if_true : value_if_false
	$username = (isset($_POST['username'])) ? $username : "" ;
	// provera da li je forma poslata
	if (isset($_POST['submit'])) {
		// zbog ovoga submit input mora da ima name="submit"
	}

	FORMA I PROCESUIRANJE NA ISTOJ STRANI

	// dobro je ako imamo sve na istoj strani, i html i procesuiranje
	// lako mozemo da opet prikazemo formu sa podacima koje smo uneli kako bi ih ispravili ako ima gresaka

	VALIDACIJA FORME
	
	// postoje razne validacije i jako su bitne
		// - validacija prisutnosti (da li je polje popunjeno)
		// - validacija duzine (max i min)
		// - tip (string, integer)
		// - da li je u setu vrednosti (male, female)
		// - jedinstvenost (username)
		// - format (datum)
		// - ...

	// * prisutnost
	$value = ""; // proslo bi samo isset
	if (!isset($value) || empty($value)) {
		echo "Validation failed!<br>";
	}

	// * duzina
	// minimalna duzina
	$value = "micamica"; // ne prolazi
	$min = 3;
	if (strlen($value) < $min) {
		echo "Validation failed!<br>";
	}
	// maximalna duzina
	$max = 5;
	if (strlen($value) > $max) {
		echo "Validation failed!<br>";
	}

	// * tip
	$value = 1; // ne prolazi
	// BITNO - kad citamo vrednosti iz forme, one su uvek stringovi i moramo da ih konvertujemo da bi bile u nekom drugom formatu
	if (!is_string($value)) {
		echo "Validation failed!<br>";
	}

	// * set vrednosti
	$value = "5"; // ne prolazi 
	$set = array("1", "2", "3", "4");
	if (!in_array($value, $set)) {
		echo "Validation failed!<br>";
	}

	// * jedinstvenost

	// treba nam baza

	// * format
	// koristimo regex nad stringom
	// preg_match(pattern, subject)
	if (preg_match("/PHP/", "PHP iz fun")) {
		echo "A match was found"; // tacno
	} else {
		echo "A match was not found";
	}

	$value = "nobody@nowhere.com";
	if (!preg_match("/@/", $value)) {
		echo "Validation failed!<br>";
	}

	// umesto toga moze i ovo
	if (strpos("@", $value) === false) { // mora === jer ako bi bilo == i @ na prvom mestu, tj. poziciju 0, to bi bilo tacno
		echo "Validation failed!<br>";
	}

	// LAZNE POZITIVNE VREDNOSTI

	// klip 069, ima ih brda...

	empty(); // ""; 0; "0"; false, null, array() su svi empty, posebno je cudan "0"... (broj dece u formi)

	// Mozemo da napravimo fajl za validacije

	// treba je da napravimo validacije koje nama odgovaraju, poenta je da shvatimo kako stvari teku: korisnik unese podatke, mi ih malo ocistimo, odradimo validacije, ako prodju radimo jednu radnju, ako ne, radimo neku drugu

	COOKIES

	// Cookies su mali delovi podataka koje web server trazi od naseg browsera da ih sacuva, bitni su jer daju web developerima mogucnost da sacuvaju "stanje" korisnika, da zapamte ko je i sta je radio. Bez kukija web serveri ne mogu da prepoznaju kad vise poziva dolazi od istog korisnika. Bitno je da se cuvaju podaci iz BROWSERA, jer je tako najbolje, bolje nego IP (vise korisnika moze da deli istu IP adresu), ili isti korisnik moze da promeni IP ardesu (lik koji putuje i koristi mobilni)
	// Cookie se salje prilikom odgovora web server na zahtev korisnika kao jedan red u hederima

	// HTTP/1.1 200 OK
	// Content-type: text/html
	// Set-Cookie: admin_id=502

	// Tada browser sacuvava cookie na lokalnom kompjuteru i kad browser napravi novi request ka web serveru on mu salje sve cookie u request hederu

	// GET /second_page.php HTTP/1.1
	// Host: www.site.com
	// Cookie: admin_id=502
	// Accept: */*

	// Ne mozemo da postavimo ili pokupimo cookie ako ne naztaje poziv ili odgovor na poziv jer se nalaze u hederima tih poziva i odgovora!!!

	$_COOKIE["nesto"];

	SETOVANJE COOKIE-JA

	$name = "test";
	$value = 45;
	$expire = time() + (60*60*24*7) // nedelju dana od danas
	setcookie($name, $value, $expire);

	// ZAPAMTITI: setovanje cookie-ja se obavlja pre bilo kakvog ispisa HTML-a (kao i hederi) osim ukoliko nije ukljucen output buffering!!!!

	CITANJE VREDNOSTI COOKIE-JA

	$_COOKIE["test"] // 45

	// BITNO: kad promenimo cookie, on se nece omah po sledecem pozivu stranice pojaviti, tad ga mi saljemo, a ona vrednost koja je tu, je stari cookie, tek po drugom pozivu stranice, cookie ce se promeniti

	BRISANJE VREDNOSTI COOKIE-JA

	// ne radi se sa unset($_COOKIE["nesto"]); zato sto je to stara vrednost, mi moramo da se obradimo browseru
	// pravi nacin:
	setcookie($name);						// nije intuitivno
	setcookie($name, null);					// dobar nacin
	setcookie($name, $value, time() - 3600);// dobar nacin, postavimo ga u proslost, najbolje koristimo 2 i 3 skupa

	setcookie($name, null, time() - 3600);	// najbolji nacin

	SESIJE

	// sesije se oslanjaju na cookie-je da rade svoj posao
	// sesija je fajl koji se skladisti NA WEB SERVERU!
	// onda posaljemo cookie korisniku koji sadrzi referencu na sesijin fajl i onda mozemo da vidimo taj fajl i da povucemo podatke koji nam trebaju
	// dakle, najbitnija stvar je sto se SESIJA CUVA NA SERVERSKOJ STRANI

	// prednosti:
	// 	- sesije su vece od cookie-ja (cookie oko 4000 slova)
	// 	- mozemo da biramo sta uzimamo, a ne ceo cookie (manja velicina zahteva)
	// 	- sakriva vrednosti podataka
	// 	- sigurnije, manje hakabilno

	// mane:
	// 	- sporiji pristup (uzmeno vrednost sesije, nadjemo fajl, pa citamo podatke), nije mnogo bitno
	// 	- isticu cim se zatvori browser (tako su napravljene, takve i treba da budu)
	// 	- fajlovi sesije se nagomilavaju

	$_SESSION[""];

	session_start(); // kaze php-u da nadje cookie sesije, nadje fajl sesije, otvori ga i napuni superglobalnu varijablu, ili ako nema fajla, da ga napravi za dalje koriscenje

	// naravno, mora pre svakog HTML-a!!!

	$_SESSION['ime'] = "Mica";
	$ime = $_SESSION['ime'];
	echo $ime; // odmah ispisuje ime, drugacije od cookie-ja, nema cekanja, jer smo otvorili session fajl i samo upisujemo i citamo iz njega

	// sesije se koriste mnogo cesce od cookie-ja

	MYSQL BAZE PODATAKA

	// pisanje i citanje podataka
	// skladistenje vise podataka
	// brzi pristup podacima
	// bolje organizovani podaci
	// lakse upravljanje podacima
	// povezivanje podataka sa drugim podacima (relacione baze podataka)

	MYSQL:

	// dzabe
	// lako se koristi
	// popularan
	// dobar uvod u ostale baze podataka

	// Baza

	// baza predstavlja set tabela
	// jedna aplikacija, jedan projekat
	// permisije o pristupu se podesavaju na nivou baze

	// Tabela

	// set kolona i redova
	// predstavlja pojedinacan koncept (imenicu)
	// primeri: products, customers, orders (uvek mnozina, jer predstavljaju skup podataka)
	// imace odnose jedne izmedju drugih

	// Kolona
	
	// set podataka jednog jednostavnog tipa
	// npr: first_name, email, password
	// kolone imaju tip: int, string...

	// Red

	// jedno pojavljivanje grupe podataka
	// npr: "Micagica", "mica@mica.com", "sifrasifra"

	// Polje

	// presek kolone i reda, npr first_name: "Micagica"

	// Index

	// struktura podatka u tabeli koja ubrzava pretrazivanje
	// kao indeksi na kraju udzbenika (kazu na kojoj strani je sta)

	// Strani kljuc

	// kolona cije vrednosti odgovaraju vrednostima redova iz neke druge tabele
	// osnova relacionih baza podataka

	CRUD

	- Create
	- Read
	- Update
	- Delete

	KREIRANJE BAZE IZ TERMINALA

	// mysql --version (dobijemo verziju)

	// mysql -u root -p (logovanje u mysql, posle ovoga trazi sifru)
	// mysql -u widget_corp_user - widget_corp (logovanje na odredjenu baze)

	// kad se ulogujemo, sve komande kucamo sa ";" na kraju

	// neke komande:

	// SHOW DATABASES;
	// CREATE DATABASE ime_baze;
	// USE ime_baze;
	// DROP DATABASE ime_baze;
	// GRANT ALL PRIVILEGES ON ime_baze.* TO 'ime_usera'@'localhost' IDENTIFIED BY 'sifra' // dodamo usera na bazu
	// SHOW GRANTS FOR 'ime_usera'@'localhost' // pokazemo za koje baze user ima privilegije 

	KREIRANJE TABELA

	// CREATE TABLE table_name (
	// 	column_name1 definition,
	// 	column_name2 definition,
	// 	column_name3 definition,
	// 	options
	// );

	// SHOW COLUMNS FROM table_name;
	// DROP TABLE table_name;

	Create Read Update Delete - CRUD

	// SQL SELECT (read)

	// SELECT * 
	// FROM table 
	// WHERE column1 = 'some_text' // svuda spaceovi na kraju reda da bi mysql prepoznao sintaksu
	// ORDER BY column1 ACS;

	// SQL INSERT (create)

	// INSERT INTO table (column1, column2) 
	// VALUES (val1, val2);

	// SQL UPDATE (update)

	// UPDATE table 
	// SET column1 = 'neki_text'
	// WHERE id = 1; // koji id menjamo, ako ne stavimo, promenice sve

	// SQL DELETE (delete)
	// DELETE FROM table
	// WHERE id = 1;

	RELACIONE BAZE PODATAKA

	// 1 prema vise, 1 prema 1, vise prema vise...
	// to se radi preko spoljnih kljuceva (ovi referenciraju glavni kljuc druge tabele, tako da sta god da se tamo promeni, menja se i ovde)
	// sve poznato i jasno

	// INDEX se koristi za brzo pretrazivanje, to stavimo na spoljni kljuc i onda mozemo da pretrazujemo vrednosti u jednoj tabeli koje se odnose na kolonu u drugoj tabeli

	API BAZE PODATAKA - povezivanje sa bazom podataka

	mysql // osnovni API
	myslqi // poboljsani mysql
	PDO // PHP data objects

	// jako su slicni i lako se prelazi s jednog na drugi

	http://i.imgur.com/h160ZvF.png

	// PDO radi sa bilo kakvom bazom podataka, ostale dve su samo sa mysql
	// mysql ne radi sa mysql-om, moramo da imamo mysqli

	http://php.net/manual/en/mysqlinfo.api.choosing.php


	POVEZIVANJE MYSQL-A SA PHP-OM

	// 1. NAPRAVIMO KONEKCIJU SA BAZOM PODATAKA
	// 2. IZVRSAVAMO QUERY-JE
	// 3. KORISTIMO PODATKE KOJE DOBIJEMO (AKO IH IMA)
	// 4. "PUSTAMO" VRACENE PODATKE (OSLOBADJAMO MEMORIJU KOJU SMO KORISTILI ZA QUERY-JE)
	// 5. ZATVARAMO KONEKCIJU

	// prvi i peti korak se desavaju samo jednom u php skripti, ostali mogu da se ponove mnogo puta dok imamo otvorenu konekciju

	mysqli_connect();
	mysqli_connect_errno();
	mysqli_connect_error();
	mysqli_close();

	// povezivanje:

	$dbhost = "localhost";
	$dbuser = "ime_usera";
	$dbpass = "password";
	$dbname = "ime_baze";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // ovu varijablu koristimo posle za sve sto ima veze sa bazom

	// test da li smo se uspesno povezali s bazom:

	if (mysqli_connect_errno()) {
		die("Database connection failed: " . 
			mysqli_connect_error() . // vraca prazan string ako nema erora, zato je gore errno
			" (" . mysqli_connect_errno() . ")"
		);
	}

	// zatvaranje konekcije na kraju, posle </html>

	mysql_close($connection);

	// UZIMANJE PODATAKA MYSQL-om

	mysqli_query();
	mysqli_fetch_row();
	mysqli_free_result();

	$query  = "SELECT * ";
	$query .= "FROM table"; // bolje pisati ovako zbog pregletnosti, a ne sve u jednom redu
	$result = mysqli_query($connection, $query); // specijalan resourse objekat, skup redova iz tabele

	if (!$result) {
		die("Database query failed."); // ne pojavljuje se ako nema rezultata, samo ako imamo gresku u query-ju
	}

	// VRACANJE PODATAKA

	while ($subject = mysqli_fetch_row($result)) { // dok god ima nizova koji mogu da se upisu u varijablu $subject, ovde imamo "=", ne "==", to ima veze sa array pointer-ima, ova funkcija mysqli_fetch_row() sama povecava array pointer za nas, tako da je ovo dovoljno
		// vracanje podataka iz svakog niza
		echo $subject["id"] . "<br>";
		echo $subject["menu_name"] . "<br>";
		echo $subject["position"] . "<br>";
		echo $subject["visible"] . "<br>"; // ispis svih podataka iz niza
		echo "<hr>";
	}

	// OSLOBADJANJE PODATAKA

	mysqli_free_result($result);

	// RAD SA VRACENIM PODACIMA

	mysqli_fetch_row() // ovo je najbrza, niz sa indeksima
	mysqli_fetch_assoc() // ovo je mozda najbolja opcija, asocijativni niz, lakse za pristup podacima
	mysqli_fetch_array() // ova vraca obe opcije, ali zauzima najvise mesta i najsporija je (ali mi necemo to primetiti, osim ako ima na hiljade konekcija u sekundi)
	mysqli_fetch_object() // OOP

	// CREATE KORISTECI PHP

	// dobijamo true/false, ne objekat

	http://i.imgur.com/4Bqn5hy.png

	// Nemamo treci i cetvrti korak, najcesce vrednosti ubacujemo preko forme, iz $_POST

	$query  = "INSERT INTO subjects ("
	$query .= " menu_name, position, visible";
	$query .= ") VALUES (";
	$query .= " '{$menu_name}', {$position}, {$visible}";
	$query .= ")";

	$result = mysqli_query($connection, $query); // specijalan resourse objekat, skup redova iz tabele

	if ($result) {
		// success
		echo "Success!";
	} else {
		// failure
		die("Database query failed. " . mysqli_error($connection)); // ovako dobijamo poslednji error, tj. ovaj error
	}

	mysqli_insert_id($connection); // da dobijemo id koji je ubacen

	// UPDATE KORISTECI PHP

	$query  = "UPDATE subjects SET ";
	$query .= "menu_name = '{$menu_name}', ";
	$query .= "position = {$position}, ";
	$query .= "visible = {$visible}, ";
	$query .= "WHERE id = {$id}"; // cak iako ID ne postoji, mi cemo dobiti Success! ako ne stavimo mysqli_affected_rows($connection) == 1 u if

	$result = mysqli_query($connection, $query);


	if ($result && mysqli_affected_rows($connection) == 1) { // da li je neki red promenjen
		// success
		echo "Success!";
	} else {
		// failure
		die("Database update failed. " . mysqli_error($connection));
	}

	// ako prosledimo vrednosti koje su apsolutno iste, imacemo nula promenjenih redova

	// DELETE KORISTECI PHP

	$query  = "DELETE FROM subjects ";
	$query .= "WHERE id = {$id} ";
	$query .= "LIMIT 1";

	if ($result && mysqli_affected_rows($connection) == 1) { // da li je neki red promenjen
		// success
		echo "Success!";
	} else {
		// failure
		die("Subject delete failed. " . mysqli_error($connection));
	}

	// SQL Injection

	"INSERT INTO subjects (menu_name, position, visible) VALUES ('Mica', 1, 1)" // stringovi uvek sa ''!!!

	"INSERT INTO subjects (menu_name, position, visible) VALUES ('Mica's posao', 1, 1)" // ovo puca, jer zatvorimo ' pre vremena!!!

	// ovako neko moze da proba da nam sjebe sajt
	// najveci problem kod napada na sajt je sql injection

	$menu_name = "'); DROP TABLE subjects; '"; // obrisao bi celu tabelu subjects

	// "ESCAPING" strings

	// samo treba ubaciti "\" pre "'" i to ne treba da radimo rucno, nego preko funkcije

	addslashes($string);

	// nekad je to bilo po defaultu, ali je pravilo mnogo problema, pa je uklonjeno u PHP 5.4

	mysqli_real_escape_string($db, $string); // idealno, dodato u PHP 4.3-5.0

	$menu_name = "Today's bla bla";


	// escape all strings always!!!
	$menu_name = mysqli_real_escape_string($connection, $menu_name); // sad smo ga pravilno pripremili za unosenje u bazu

	$query  = "INSERT INTO subjects ("
	$query .= " menu_name, position, visible";
	$query .= ") VALUES (";
	$query .= " '{$menu_name}', {$position}, {$visible}";
	$query .= ")";

	// Prepared statements

	// templejti za CRUD - jos nisam za to :)

	/*------------------------------------*\
	    PRAVLJENJE PRVOG CMS-a
	\*------------------------------------*/

	// ISCRTAVANJE PROJEKTA

	http://i.imgur.com/dpwHeHo.png

	// BAZA

	http://i.imgur.com/ZoAi0Wt.png

	POVEZIVANJE SA BAZOM

	define("DB_SERVER", "localhost");
	define("DB_USER", "widget_corp_user");
	define("DB_PASS", "widget_corp_password");
	define("DB_NAME", "widget_corp");
	
	// 1. Create a database connection
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	// Test if connection succedded
	if (mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() . 
			" (" . mysqli_connect_errno() . ")"
		);
	}

	ISPISIVANJE SVIH SUBJECTS I PAGES

	?>
	<ul class="subjects">
	<?php 
		// 2. Perform database query
		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
	?>
	<?php
		// 3. Use returned data (if any)
		while ($subject = mysqli_fetch_assoc($subject_set)) {
		// output data from each row
	?>
	
		<li>
			<?php echo $subject["menu_name"]; ?>
			<?php 
				// 2. Perform database query
				$query  = "SELECT * ";
				$query .= "FROM pages ";
				$query .= "WHERE visible = 1 ";
				$query .= "AND subject_id = {$subject['id']} ";
				$query .= "ORDER BY position ASC";
				$page_set = mysqli_query($connection, $query);
				confirm_query($page_set);
			?>
			<ul class="pages">
				<?php
					// 3. Use returned data (if any)
					while ($page = mysqli_fetch_assoc($page_set)) {
					// output data from each row
				?>
				<li><?php echo $page["menu_name"]; ?></li>
				<?php
					} 
				?>
				<?php
					// 4. Release returned data
					mysqli_free_result($page_set);
				?>
			</ul>
		</li>

	<?php
		} 
	?>
	<?php
		// 4. Release returned data
		mysqli_free_result($subject_set);
	?>
	</ul>
	<?php

	REFAKTORISANJE NAVIGACIJE

	// REFAKTORISANJE: pregled dosadasnjeg koda da bismo promenili njeogvu skrukturu ili izgled bez menjanja njegovog ponasanja
	// ovo radimo zbog:
	// - pojednostavljivanja koda
	// - razjasnjivanja
	// - odrzivosti
	// - efikasnosti
	// - fleksibilnosti (ponovno koriscenje i nadogradnja)

	// funkcije su odlican nacin refaktorisanja koda

	// primeri:

	function find_all_subjects() {
		global $connection;

		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		return $subject_set;
	}

	function find_pages_for_subject($subject_id) {
		global $connection;

		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE visible = 1 ";
		$query .= "AND subject_id = {$subject_id} ";
		$query .= "ORDER BY position ASC";
		$page_set = mysqli_query($connection, $query);
		confirm_query($page_set);
		return $page_set;
	}

	// PODSETNIK: kad god radim sa query stringovima (?subject=<?php echo $subject_id;) uvek treba da urlencode vrednost $subject_id

	NAVIGACIJA - // navigaciju mozemo da prebacimo u poseban fajl (navigation.php) ili da je pozivamo preko funkcije













































	$a = "hello";
	$hello = "Hello svima!";
	
	// ispisuje $(sadrzaj $a), tj. $hello, tj. Hello svima!
	echo $$a;  
	
	// Sta znaci $$var[1]:
	// #1 nadji prvi element, pa onda odredi vrednost dinamicki
	// #2 odredi vrednosti dinamicki, pa uzmi prvi element

	// Da se ne bi zbunjivali, koristimo {}
	// echo ${$var[1]} za #1
	// echo ${$var}[1] za #2

	// ARRAY FUNCTIONS

	// shifts first element out of an array and returns it
	array_shift(array);

	// prepends an element to an array, returns elements count, 'first' is the value of the element
	$b = array_unshift($numbers, 'first');

	// pops last element out of an array and returns it
	$a = array_pop($numbers);

	// pushes the element onto the end of an array, returns elements count
	$b = array_push($numbers, 'last');  

	// DATES AND TIMES

	Epoch time/Unix timestamp - vreme proteklo od pocetka racunanja vremena u sekundama po php-u

	Nula predstavlja 1. januar 1970. u ponoc

	// pravljenje timestamp-a

	time(); // trenutno vreme (broj sekundi od 1970)
	mktime($hr, $min, $sec, $m, $d, $y); // napravimo vreme
	strtotime($any_string) // prebacuje string u vreme na najbolji nacin na koji ume npr 'now', '20 September 1980', 'last monday'
	checkdate(month, day, year) // proverava da li datum postoji

	// FORMATIRANJE DATUMA

	date();
	strftime();

	Moze da se koristi bilo koji od ova dva, Skoglund vise gotivi strftime();
	u dokumentaciji moze da se vidi kako da se napravi format koji odgovara zahtevima, to je smesno

	Posto strftime() nema opciju da prikaze mesec i dan bez nula, postoji hak:

	function strip_zeros_from_time($not_formated = '') {
		$no_zeros = str_replace('*0', '', $not_formated);
		$cleared_string = str_replace('*', '', $no_zeros);
		return $cleared_string;
	}

	echo strip_zeros_from_time(strftime('The time is *%m/*%d/%y', $timestamp));

	Format za mysql: strftime("%Y-%m-%d %H:%M:%S", $string); // 2015-10-13 20:17:11

	// SERVER AND REQUEST VARIABLES

	$_SERVER 	// 	mnostvo podataka 
				//	$_SERVER['SERVER_NAME']
				//	$_SERVER['SERVER_ADDR']
				//	$_SERVER['SERVER_PORT']
				//	$_SERVER['DOCUMENT_ROOT'] ...
	$_REQUEST	// ne koristiti, sve podatke mozemo da dobijemo preko $_POST i $_GET

	// VARIABLE SCOPE

	Varijable unutar php-a imaju global scope, varijable unutar funkcija imaju local scope
	static varijabla je lokalna varijabla funkciji, ali ne gubi svoju vrednost kada izadjemo iz funkcije

	u OOP postoji jos jedna funkcija reci static na koju treba obratiti paznju i dobro je znati ovo kao osnovu za to

	// REFERENCE ASSIGNMENT

	$a = 1;
	$b = $a;
	$b = 2;
	echo 'a:' . $a . ', b:' . $b . '<br>';
	// a:1, b:2

	$a = 1;
	$b =& $a; // reference assignment, kao precica na desktopu ka folderu, menjamo jedan, menja se drugi
	$b = 2;
	echo 'a:' . $a . ', b:' . $b . '<br>';
	// a:2, b:2

	ako obrisemo b, a ce ostati netaknuto

	unset($b);
	echo 'a:' . $a . ', b:' . $b . '<br>';
	// a: 2, b:

	// REFERENCA KAO ARGUMENT FUNKCIJE

	function ref_test(&$var){
		$var = $var * 2;
	}
	$a = 10;
	ref_test($a); // 20, da smo gore imali samo $var, bez &, onda bi rezultat bio 10, jer je $var nestaje kad se izvrsi funkcija

	// OOP - OBJEKTNO ORIJENTISANO PROGRAMIRANJE

	Zasnovano na objektima, objekti mogu imati funkcije i atribute

/*	Objekti su nam korisni za:

		- Ormanizovanje i odrzavanje koda
		- Smanjuje kompleksnost i bolje objasnjava stvari (mnogo lakse je da napravimo objekat student koji ce da ima funkcije i atribute)
		- Jednostavna pravila nam omogucavaju kompeksne interakcije
		- Stavlja akcenat na podatke, a ne na procedure (procedure su ugradjene u objekte)
		- Deljenje koda (podelimo kod na delove i onda mozemo da radimo na necemu, a da to ne utice ninasta drugo)
		- Konovno koriscenje koda
		- Objetki su odlicni za rad sa bazama (ako imamo objekad automobil, mozemo da imamo bazu automobili)
*/

	// DEFINISANJE KLASA

	class Student {
		// ovde idu atributi i metode
	} // velikim slovom, svaka sledeca rec prvo slovo veliko

	get_declared_classes() // ispisuje sve klase koje postoje
	if (class_exists(imeklase)) {} // da li klasa postoji

	// DEFINISANJE METODA KLASA

	metode su isto sto i funkcije, samo sto kada se deklarisu unutar klasa, onda su metode


	// INSTANCIRANJE KLASA

	new Person(); // kao da postavljamo prazan papir sa poljima za popunjavanje


	$person = new Person(); // instanciranje klase
	$person2 = new Person(); // dve razlicite instance klase Person

	if (is_a($person, 'Person')) // gledamo da li instanca pripada klasi, vraca true/false

	$person->metodaIzKlasePerson(); // pozivanje metode klase

	$this // referencira na instancu trenutne klase (znaci poziva se samo unutar klase)

	// VARIJABLE KLASE

	// varijable koje se pojavljuju u klasama se nazivaju properties ili attributes ili instance variables te klase
	// kada deklarisemo varijable unutar klase, moramo da koristimo var!
	// kada ih pozivamo, ne koristimo $ (jer bi to onda bila varijabilna varijabla), a ne koristimo ni ()
	$person->arm_count; // to je to

	// NASLEDJIVANJE KLASA

	definisemo jednu klasu, onda definisemo drugu klasu uz pomoc kljucne reci extends, i onda ona nasledjuje metode i varijable prve klase

	class CompactCar extends Car {}

	get_parent_class();
	is_subclass_of(object, class_name);

	// MODIFIKATORI PRISTUPA

	public // dostupno svuda, default
	private // samo unutar klase u kojoj se nalazi
	protected // malo slobodnije, iz ove klase ili njenih podklasa

	po defaultu kad koritimo var, to je kao da smo koristili public!

	public $a = 1;
	protected $b = 2;
	private $c = 3;

	// SETERI I GETERI

	class SetterGetterExample
	{
		private $a=1;

		public function get_a() { // GETTER
			return $this->a;
		}

		public function set_a($value) { // SETTER (primer banke)
			$this->a = $value;
		}
	}

	// STATIC


	class Student {
		static $total_students=0;

		static function welcome_students($var="Hello") {
			echo "{$var} students.";
		}
	}

	// ovako imamo pristup i varijabli $total_students i funkciji welcome_studenst cak iako nemamo instance

	POZIVANJE INSTANCE
	// $student = new Student();
	// echo $student->total_students;

	STATICKI POZIV
	echo Student::$total_students;

	SA STATICKIM METODAMA NE MOZEMO DA KORISTIMO $this!!!!!
	umesto toga koristimo self!!!

	static function add_student() {
		self::$total_students++;
	}

	// kada u nasledjivanju negde u klasama koje nasledjuju promenimo vrednost statickoj varijabli, njena vrednost se menja u svim klasama u kojima postoji!!!

	// SCOPE RESOLUTION OPERATOR 

	to su ove :: // paamayim nekudotayim ili dupla dvotacka

	// REFERENCIRANJE PARENT KLASE SA ::

	parent:: // kljucna rec
	// ono sto je najbitnije je da ovako mozemo da koristimo :: sa instancama, i ovo radi samo sa metodama parenta, ne i sa atributima
	// stoga mozemo da overrajdujemo parent metodu, ali da i dalje koristimo ono sto imamo sacuvano u njoj

	// KONSTRUKTORI I DESTRUKTORI KLASA

	// konstruktori su odlicni za inicijalizaciju svih objekata pre nego sto se on zapravo koristi

	class Table {
		function __construct(){ // moze da ima artibute
			// ovde inicijalizujemo sve pocetne vrednosti atributa funkcije Table
		}
	}

	// destruktori se jako retko koriste

	// KLONIRANJE (KOPIRANJE) OBJEKATA

	$b = clone $a; // sad nije referenca objekta $a, nego novi objekat

	function __clone() // konstruktor za kloniranje

	// UPOREDJIVANJE OBJEKATA

	uporedjivanje:	== 
	identicnost:	===

	$box === $box_reference; // ostali svi slucajevi su netacni

	$box == $box_reference;
	$box == $box_clone;
	$box == $another_box; // sve tacno, samo ako promenimo vrednost atributa, nece biti tacno

	// RAD SA FAJLOVIMA

	echo __FILE__ // daje nam putanju do trenutnog fajla
	echo __LINE__ // daje nam liniju fajla koje trenutno gledamo, treba da pazimo na inkludovane fajlove, jer onda ovo ne mora da bude tacno
	echo dirname(__FILE__) // direktorijum u kome je fajl
	echo __DIR__ // ista stvar od PHP-a v5.3

	file_exists(filename) // da li postoji fajl (moze i za dokument)

	is_file(filename) // da li je fajl ili direktorijum

	is_dir(filename) // da li je direktorijum

	is_dir('..')

	// PERMISIJE

	// generalno treba davati sto manje permisija, tj. omoguciti samo one koje treba da stavimo da bismo uradili ono sto zelimo

	// u sustini, postoje tri kategorije korisnika: user, group, other

	// i tri pita akcija nad fajlom/folderom read(R), write(W), execute(X) (execute je islistavanje fajlova u direktorijumu, ili da pokrenemo fajl)

	// i onda imamo dve vrste prikaza: simbolicki i oktalni(numericki)

	// npr: rwxrw-r-- (- znaci ne moze ta operacija)

	// u oktalnom sistemu r = 4, w = 2, x = 1, - = 0 (rwx = 7, rw = 6, r = 4, rx = 5 ...)


	// who am I, who is the owner, who is the web server?
	// often Nobody, or sometimes WWW, Apache

	// chown i chmod (poznato)




?>