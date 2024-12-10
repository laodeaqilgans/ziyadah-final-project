<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Kami</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        nav {
            margin: 20px 0;
        }
        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.2em;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?nature,water') no-repeat center center/cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-align: center;
        }
        .hero h2 {
            font-size: 3em;
            margin: 0;
        }
        .content {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .content h3 {
            color: #35424a;
        }
        .content p {
            line-height: 1.6;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #35424a;
            color: #ffffff;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Selamat Datang di Website Kami</h1>
    <nav>
        <a href="#about">Tentang Kami</a>
        <a href="#services">Layanan</a>
        <a href="#contact">Kontak</a>
    </nav>
</header>

<div class="hero">
    <h2>Menemukan Solusi Terbaik untuk Anda</h2>
</div>

<div class="content">
    <section id="about">
        <h3>Tentang Kami</h3>
        <p>Kami adalah tim profesional yang berdedikasi untuk memberikan solusi terbaik bagi kebutuhan Anda. Dengan pengalaman bertahun-tahun di industri ini, kami siap membantu Anda mencapai tujuan Anda.</p>
    </section>

    <section id="services">
        <h3>Layanan Kami</h3>
        <p>Kami menawarkan berbagai layanan, termasuk:</p>
        <ul>
            <li><i class="fas fa-check"></i> Konsultasi</li>
            <li><i class="fas fa-check"></i> Pengembangan Website</li>
            <li><i class="fas fa-check"></i> Pemasaran Digital</li>
            <li><i class="fas fa-check"></i> Dukungan Pelanggan</li>
        </ul>
    </section>

    <section id="contact">
        <h3>Kontak Kami</h3>
        <p>Jika Anda memiliki pertanyaan atau ingin bekerja sama, silakan hubungi kami di:</p>
        <p>Email: info@website.com</p>
        <p>Telepon: (123) 456-7890</p>
    </section>
</div>

<footer>
    <p>&copy; 2023 Website Kami. Semua hak dilindungi.</p>
</footer>

</body>
</html>