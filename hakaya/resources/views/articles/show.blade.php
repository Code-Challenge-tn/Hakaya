<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <title>{{ $article->titre }}</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }

        /* Article Container */
        .article-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title */
        .article-title {
            font-size: 30px;
            color: #A48707;
            margin-bottom: 20px;
        }

        /* Image & Video */
        .article-media {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Article Text */
        .article-text {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            text-align: justify;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        /* Back Button */
        .btn-secondary {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            background-color: #0D0C52;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn-secondary:hover {
            background-color: #A48707;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .article-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    @include('header')

    <!-- Article Container -->
    <div class="article-container">
        <h1 class="article-title">{{ $article->titre }}</h1>

        <!-- Media Section (Image or Video) Always on Top -->
        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" class="article-media" alt="{{ $article->titre }}">
        @elseif ($article->video_url)
            <iframe class="article-media" 
                src="{{ Str::replace('watch?v=', 'embed/', $article->video_url) }}" 
                frameborder="0" allowfullscreen style="height: 315px;">
            </iframe>
        @endif

        <!-- Article Description -->
        <div class="article-text">
            <p>{{ $article->description }}</p>
            <p><strong>🗓 Date de publication :</strong> {{ $article->date_publication }}</p>
        </div>

        <a href="{{ route('articles.index') }}" class="btn-secondary">🔙 Retour</a>
    </div>

    <!-- Include Footer -->
    @include('footer')

</body>
</html>
