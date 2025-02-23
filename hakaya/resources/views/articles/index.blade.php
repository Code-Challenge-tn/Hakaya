<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حـكـايـا</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.min.js" defer></script>

    <style>
        body {
            background-color: #A48707;
            background-image: linear-gradient(135deg, #A48707, #F8F3E2);
            color: #333;
            font-family: 'Lato', sans-serif;
        }

        .container {
            background-color: white;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #0D0C52;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 10px;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 15px;
            padding: 10px 0;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            flex: none;
            transition: transform 0.3s ease;
        }

        .card-title {
    color: black;
    font-weight: bold;
    text-align: center;
}

        .card:hover {
            transform: translateY(-5px);
        }

        .card img, .card iframe {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 10px;
        }

        .btn-primary {
            background-color: #A48707;
            color: white;
            padding: 8px 12px;
            display: inline-block;
            text-align: center;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0D0C52;
        }

        .arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background:  #A48707; /* Gold circle */
    color: white; /* White arrow */
    border: none;
    width: 40px;
    height: 40px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10;
    transition: opacity 0.3s ease-in-out;
    pointer-events: auto;
    opacity: 0.8;
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Flip the arrow icons */
.arrow-left {
    right: 5px;
    transform: translateY(-50%) rotate(180deg); /* Flipped to point right */
}

.arrow-right {
    left: 5px;
    transform: translateY(-50%) rotate(180deg); /* Flipped to point left */
}

.carousel-container:hover .arrow {
    opacity: 1;
}



.clock-container {
    display: flex;
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement */
    gap: 30px; /* Espacement entre les horloges */
    width: 100%; /* Utilise toute la largeur pour éviter les décalages */
    text-align: center;
}

        .clock {
            position: relative;
            width: 150px;
            height: 150px;
            border: 8px solid #A48707;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .clock img {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            opacity: 0.8;
        }
        .clock-time {
            position: absolute;
            font-size: 18px;
            font-weight: bold;
            color: black;
            bottom: 20px;
        }
        .clock-label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    position: absolute;
    top: -30px; /* Déplace le label au-dessus */
    left: 50%;
    transform: translateX(-50%); /* Centre le texte */
    white-space: nowrap;
}
    
    </style>
</head>

<body>
    <!-- Inclusion du header -->
    @include('header')


   
    <div class="container">

    <div class="clock-container">
    <div class="clock">
        <div class="clock-label">تونس</div>
        <img src="storage/images/tun.png" alt="Map Tunis">
        <div class="clock-time" id="tunis-clock">00:00:00</div>
    </div>

    <div class="clock">
        <div class="clock-label">غزة</div>
        <img src="storage/images/gaz.png" alt="Map Gaza">
        <div class="clock-time" id="gaza-clock">00:00:00</div>
    </div>

    <div class="clock">
        <div class="clock-label">القاهرة</div>
        <img src="storage/images/egy.jpg" alt="Map Caire">
        <div class="clock-time" id="cairo-clock">00:00:00</div>
    </div>
    </div>




        <!-- Formulaire de recherche -->
        <!-- <form action="{{ route('articles.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un article..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form> -->
        

        <!-- Formulaire de filtrage -->
        <!-- <form action="{{ route('articles.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select name="categorie" class="form-control" onchange="this.form.submit()">
                    <option value="">Toutes les catégories</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                            {{ $categorie }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form> -->




        <div class="relative w-full max-w-4xl mx-auto mt-12 my-8 overflow-hidden" 
     x-data="{ 
         articlesWithMedia: {{ json_encode($articles->filter(fn($article) => !empty($article->image) || !empty($article->video_url))) }},
         activeIndex: 0, 
         totalSlides: {{ $articles->filter(fn($article) => !empty($article->image) || !empty($article->video_url))->count() }}
     }" 
     x-init="setInterval(() => { activeIndex = (activeIndex + 1) % totalSlides }, 3000)">

    <div class="relative w-full h-96">
        <!-- Carrousel Items -->
        <template x-for="(article, index) in articlesWithMedia" :key="index">
            <div class="absolute inset-0 transition-opacity duration-1000" 
                 x-show="activeIndex === index" 
                 x-transition:enter="opacity-0" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="opacity-100" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0">
                 
                <!-- Vérifier si l'article a une vidéo -->
                <template x-if="article.video_url">
                    <iframe 
                        :src="'https://www.youtube.com/embed/' + article.video_url.split('watch?v=')[1]" 
                        frameborder="0" 
                        allowfullscreen 
                        class="w-full h-full object-cover">
                    </iframe>
                </template>

                <!-- Sinon, afficher l'image -->
                <template x-if="!article.video_url">
                    <img :src="'/storage/' + article.image" class="w-full h-full object-cover" alt="Article Image">
                </template>

                <!-- Superposition du texte -->
                <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-white p-4 text-center">
                    <h2 class="text-lg font-bold" x-text="article.titre"></h2>
                    <p class="text-sm" x-text="article.description"></p>
                </div>
            </div>
        </template>
    </div>

    <!-- Pagination numérotée sous le carrousel -->
    <div class="flex justify-center mt-4 space-x-2">
        <template x-for="(article, index) in articlesWithMedia" :key="'pagination-' + index">
            <button 
                @click="activeIndex = index" 
                class="w-8 h-8 rounded-full border border-gray-400 text-black font-bold transition-colors duration-300"
                :class="activeIndex === index ? 'text-white border-[#0D0C52]' : ''"
                :style="activeIndex === index ? 'background-color: #0D0C52;' : ''"
                x-text="index + 1">
            </button>
        </template>
    </div>
</div>







       
        <!-- Sections des articles -->
        @php
    $categorieSelectionnee = request('categorie');
@endphp

@foreach (['أخبار', 'مقالات', 'تحقيقات', 'حوارات', 'مقاطع فيديو'] as $category)
    @if (!$categorieSelectionnee || $categorieSelectionnee == $category)
        <div class="section">
            <div class="section-title">
                <span>{{ $category }}</span>
            </div>
            <div class="carousel-container relative" x-data="{ scrollAmount: 300 }">
                <button class="arrow arrow-right" @click="$refs.carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' })">‹</button>

                <div class="carousel" x-ref="carousel">
                    @foreach ($articles->where('categorie', $category) as $article)
                        <div class="card">
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->titre }}">
                            @elseif ($article->video_url)
                                <iframe src="{{ Str::replace('watch?v=', 'embed/', $article->video_url) }}" frameborder="0" allowfullscreen></iframe>
                            @endif
                            <div class="card-body">
                                <strong class="card-title">{{ $article->titre }}</strong>
                                <br><br>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn-primary">قراءة المزيد</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="arrow arrow-left" @click="$refs.carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' })">›</button>
            </div>
        </div>
    @endif
@endforeach

    </div>


    <script>
        function updateClock(id, timezone) {
            const now = new Date();
            const options = { timeZone: timezone, hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
            document.getElementById(id).innerText = new Intl.DateTimeFormat('fr-FR', options).format(now);
        }
        function updateClocks() {
            updateClock('tunis-clock', 'Africa/Tunis');
            updateClock('gaza-clock', 'Asia/Gaza');
            updateClock('cairo-clock', 'Africa/Cairo');
        }
        setInterval(updateClocks, 1000);
        updateClocks();
    </script>

    <!-- Inclusion du footer -->
    @include('footer')

</body>
</html>
