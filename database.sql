-- Active: 1748246604740@@localhost@3306@blaze_leon
DROP TABLE IF EXISTS brand;
DROP TABLE IF EXISTS car;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS article;

CREATE TABLE reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    image TEXT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    mail VARCHAR(320),
    article_id INTEGER,
    FOREIGN KEY(article_id) REFERENCES article(id)
);

CREATE TABLE article (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(100) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    text TEXT,
    image TEXT,
    likes INT DEFAULT 0,
    car_id INTEGER,
    FOREIGN KEY(car_id) REFERENCES car(id)
);

CREATE TABLE car (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    model VARCHAR(150) NOT NULL,
    year SMALLINT(4),
    image TEXT,
    brand_id INTEGER,
    FOREIGN KEY(brand_id) REFERENCES brand(id)
);

CREATE TABLE brand (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    origin VARCHAR(163),
    description TEXT
);

INSERT INTO brand(name,origin,description) VALUES
("Ferrari", "Italy", "Ferrari S.p.A. is an Italian luxury sports car manufacturer based in Maranello. Founded in 1939 by Enzo Ferrari, the company built its first car in 1940, adopted its current name in 1945, and began to produce its current line of road cars in 1947."),
("Lamborghini", "Italy", "An Italian manufacturer of luxury sports cars and SUVs based in Sant'Agata Bolognese. The company is owned by the Volkswagen Group through its subsidiary Audi.
"),
("Honda", "Japanese", "Honda is a globally recognized Japanese brand known for producing reliable and fuel-efficient vehicles. Founded in 1948, Honda began as a motorcycle manufacturer before expanding into automobiles, power equipment, and robotics. The company is celebrated for its innovation, including the development of the VTEC engine and its commitment to sustainability through hybrid and electric models like the Honda Civic Hybrid and Honda e. Honda's reputation for quality engineering and long-lasting performance has made it a trusted name in the automotive industry worldwide."),
("Nissan", "Japanese", "Nissan is a Japanese automobile manufacturer known for its innovative technology and reliable vehicles. Founded in 1933, the brand offers a wide range of cars, from compact models to electric vehicles like the Nissan LEAF. Nissan is recognized for blending performance, efficiency, and modern design.");

INSERT INTO car(model, year, image, brand_id) VALUES
("500 Superfast GRAN TURISMO", 1964, '/assets/car/ferrari_500_superfast.jpg', 1),
("Huracan", 2016, '/assets/car/lamborghini_huracan.jpg', 2),
("Aventador", 2015, '/assets/car/lamborghini_aventador.jpg', 2),
("Revuelto", 2023, '/assets/car/lamborghini_revuelto.jpg', 2),
("Siàn FKP 37", 2019, '/assets/car/lamborghini_sian_fkp.jpg', 2),
("240Z", 1973, '/assets/car/nissan_dastun.jpg', 4);

INSERT INTO article (author,text, car_id, image) VALUES 
("Niantique", "The Nissan 240Z, introduced in 1969 by Nissan under the Datsun brand in the United States, is one of the most iconic Japanese sports cars ever built. Known for its sleek styling, impressive performance, and affordable price, the 240Z helped redefine what a sports car could be, especially in the American market. At the heart of the 240Z was a 2.4-liter inline-six engine (hence the “240” in its name) that produced around 151 horsepower. Paired with a 4-speed manual transmission, the car could accelerate from 0 to 60 mph in just over 8 seconds—an impressive feat for the time. Its independent suspension and lightweight design gave it agile handling and a smooth, enjoyable ride. The 240Z combined performance with reliability, a rare combination in sports cars of that era. It was also praised for its European-inspired design, drawing comparisons to far more expensive models like the Jaguar E-Type.
Beyond its technical merits, the 240Z built a loyal fanbase and inspired generations of car enthusiasts. It laid the foundation for Nissan’s Z-car lineage, which continues today with models like the Nissan 370Z and the new Nissan Z. Even decades after its debut, the Nissan 240Z remains a beloved classic, admired for its timeless design, balanced performance, and the bold statement it made about what a Japanese sports car could be.", 6, '/assets/car/nissan_dastun.jpg'),
("Niantique", "The Lamborghini Aventador is a flagship supercar that represents the pinnacle of Italian automotive engineering and design. First unveiled in 2011 as the successor to the Murciélago, the Aventador quickly became a symbol of extreme performance, aggressive styling, and advanced technology. Under the hood, the Aventador is powered by a naturally aspirated 6.5-liter V12 engine, delivering up to 769 horsepower in its most powerful variant, the Aventador LP 780-4 Ultimae. With a top speed of over 217 mph (350 km/h) and 0 to 60 mph acceleration in under 2.9 seconds, the Aventador offers raw power that few road cars can match. Its design is unmistakably Lamborghini—sharp, angular, and inspired by stealth fighter jets. The carbon-fiber monocoque chassis ensures high strength with minimal weight, contributing to its razor-sharp handling and high-speed stability. Advanced aerodynamics, an adaptive suspension system, and all-wheel drive make the Aventador not just fast, but incredibly precise. Inside, the Aventador offers a futuristic cabin with a fighter jet-inspired cockpit, premium materials, and advanced digital displays. Despite its performance focus, it doesn't skimp on luxury or style. Over the years, the Aventador has been released in various limited-edition versions, including the SVJ (Super Veloce Jota), Roadster models, and exclusive one-offs like the Aventador J. Each has further cemented its status as a collector's dream and a symbol of automotive excellence. The Lamborghini Aventador isn’t just a car—it’s a statement. A bold expression of power, passion, and the relentless pursuit of performance.", 3, '/assets/car/lamborghini_aventador.jpg'),
("Niantique", "The Lamborghini Huracán is a high-performance supercar that blends cutting-edge technology with unmistakable Italian design. Introduced in 2014 as the successor to the Gallardo, the Huracán quickly became one of Lamborghini’s most popular models. It features a naturally aspirated 5.2-liter V10 engine, producing between 602 and 631 horsepower depending on the variant, allowing it to accelerate from 0 to 60 mph in around 2.9 seconds. The car’s sharp, aerodynamic design, aggressive front fascia, and signature Y-shaped LED headlights give it an instantly recognizable presence on the road. Built on a lightweight aluminum and carbon-fiber chassis, the Huracán delivers exceptional handling and stability, whether in rear-wheel-drive or all-wheel-drive configurations. Inside, the cabin is driver-focused, with a digital instrument cluster, luxurious materials, and controls inspired by fighter jets. Over the years, Lamborghini has released several versions of the Huracán, including the Performante, EVO, and STO, each pushing performance boundaries even further. The Huracán is not only a showcase of Lamborghini’s engineering prowess but also a thrilling driving experience that captures the essence of modern supercar excellence.", 2, '/assets/car/lamborghini_huracan.jpg');




