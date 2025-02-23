<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حـكـايـا</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <!-- FontAwesome pour les icônes modernes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            direction: rtl; /* Alignement en arabe */
        }

        /* En-tête */
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background-color: white;
        }

        /* Logo */
        .logo-container img {
            height: 120px; /* Taille du logo */
            width: auto;
        }

        /* Slogan */
        .slogan {
            font-size: 18px;
            font-weight: bold;
            color: #0D0C52; /* Bleu du logo */
            text-align: center;
            flex-grow: 1;
        }

        /* Icônes des réseaux sociaux */
        .social-icons {
            display: flex;
            gap: 20px;
        }

        .social-icons a {
            text-decoration: none;
            font-size: 28px; /* Taille des icônes */
            color: #A48707; /* Doré du logo */
            transition: color 0.3s ease-in-out;
        }

        .social-icons a:hover {
            color: #0D0C52; /* Bleu foncé du logo */
        }

        /* Barre de navigation */
        .navbar {
            background-color: #A48707; /* Doré du logo */
            display: flex;
            justify-content: center;
            padding: 10px 0;
            position: relative;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #0D0C52;
            border-radius: 5px;
        }

        /* Bouton de connexion */
        .login-btn {
            background-color: #A48707;
            padding: 5px 8px;
            border-radius: 50%;
            font-size: 20px;
            color: white;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .login-btn:hover {
            background-color: #0D0C52;
        }

    </style>
</head>
<body>

    <!-- En-tête -->
    <div class="header-container">
        <!-- Logo -->
        <div class="logo-container">
            <a href="{{ route('articles.index') }}">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Slogan centré -->
        <div class="slogan">
        تسلط الضوء على حكايا الإنسان .. و تمس في تجارب الزمان والمكان
        </div>

        <!-- Icônes des réseaux sociaux -->
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>

    <!-- Barre de navigation -->
    <div class="navbar">
        <nav class="p-4">
            <ul class="flex justify-center space-x-6">
                <li><a href="{{ route('articles.index') }}">الصفحة الرئيسية</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'أخبار']) }}">أخبار</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'مقالات']) }}">مقالات</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'تحقيقات']) }}">تحقيقات</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'حوارات']) }}">حوارات</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'مقاطع فيديو']) }}">مقاطع فيديو</a></li>
            </ul>
        </nav>

        <a href="{{ route('login') }}" class="login-btn">🔑</a>
    </div>

</body>
</html>
