<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>حكايا</title>

    <!-- Include Tailwind or your base CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <style>
        /*========== FOOTER ==========*/
        .footer__container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            row-gap: 2rem;
            text-align: right;
        }

        .footer__logo {
            font-size: 1.5rem;
            color: #000;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .footer__logo img {
            height: 50px;
            margin-left: 10px;
        }

        .footer__description {
            display: block;
            font-size: 0.875rem;
            margin: .25rem 0 1rem;
            color: #000;
        }

        .footer__social {
            font-size: 1.5rem;
            color: #000;
            margin-right: 1rem;
        }

        .footer__title {
            font-size: 1.25rem;
            color: #000;
            margin-bottom: 1rem;
        }

        .footer__link {
            display: inline-block;
            color: #000;
            margin-bottom: 0.5rem;
        }

        .footer__link:hover {
            color: #A48707;
        }

        .footer__copy {
            text-align: center;
            font-size: 0.875rem;
            color: #000;
            margin-top: 3.5rem;
        }

        /* Change footer background to white */
        .footer {
            background-color: white;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Main Content -->
    <main>
        <!-- Your main content here -->
    </main>

    <!-- FOOTER -->
<footer class="footer section py-6">
    <div class="footer__container container mx-auto px-6">
        
        <!-- Logo et Réseaux sociaux -->
        <div class="footer__content">
            <a href="{{ route('articles.index') }}" class="footer__logo">
                <img src="{{ asset('storage/images/logo.png') }}" alt="شعار حكايا">
            </a>
            <div class="social-icons flex space-x-4 mt-2">
                <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Navigation verticale à droite -->
        <div class="footer__content text-right">
            <h3 class="footer__title">التصنيفات</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('articles.index') }}" class="footer__link">الصفحة الرئيسية</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'أخبار']) }}" class="footer__link">أخبار</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'مقالات']) }}" class="footer__link">مقالات</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'تحقيقات']) }}" class="footer__link">تحقيقات</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'حوارات']) }}" class="footer__link">حوارات</a></li>
                <li><a href="{{ route('articles.index', ['categorie' => 'مقاطع فيديو']) }}" class="footer__link">مقاطع فيديو</a></li>
            </ul>
        </div>

        <!-- Autres Informations -->
        <div class="footer__content text-right">
            <h3 class="footer__title">المعلومات</h3>
            <ul class="space-y-2">
            <li><a  class="footer__link">موقع "حكايا" نشر بواسطة :

codechallengetn@gmail.com</a></li>
                <li><a  class="footer__link">البريد الالكتروني : chaabanirym.journaliste@outlook.com</a></li>
                <li><a  class="footer__link"> اتصل بنا : 530 319 23 </a></li>
                
                
            </ul>
        </div>

    </div>

    <p class="footer__copy text-center mt-6">&#169; 2025 جميع الحقوق محفوظة</p>
</footer>


</body>
</html>
