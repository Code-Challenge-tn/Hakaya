<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المقال</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <style>
        body {
            background-color: #A48707;
            background-image: linear-gradient(135deg, #A48707, #F8F3E2);
            color: #333;
            font-family: 'Lato', sans-serif;
            direction: rtl; /* الاتجاه من اليمين إلى اليسار */
            text-align: right;
        }

        .container {
            background-color: white;
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #0D0C52;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #A48707;
            font-size: 16px;
        }

        .form-group textarea {
            height: 150px;
        }

        .btn {
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            background-color: #A48707;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0D0C52;
        }

        .header-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .header-logo img {
            width: 50px;
            height: auto;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>تعديل المقال</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">عنوان المقال</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $article->titre }}" required>
        </div>

        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->titre }}" width="200">
            @endif
        </div>

        <div class="form-group">
            <label for="video_url">رابط فيديو يوتيوب</label>
            <input type="url" name="video_url" id="video_url" class="form-control" value="{{ $article->video_url }}">
            @if ($article->video_url)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ Str::afterLast($article->video_url, 'v=') }}" frameborder="0" allowfullscreen></iframe>
            @endif
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" id="description" class="form-control" required>{{ $article->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_publication">تاريخ النشر</label>
            <input type="date" name="date_publication" id="date_publication" class="form-control" value="{{ $article->date_publication }}" required>
        </div>

        <div class="form-group">
            <label for="categorie">الفئة</label>
            <select name="categorie" id="categorie" class="form-control" required>
                <option value="تحقيقات" {{ $article->categorie == 'تحقيقات' ? 'selected' : '' }}>تحقيقات</option>
                <option value="مقالات" {{ $article->categorie == 'مقالات' ? 'selected' : '' }}>مقالات</option>
                <option value="أخبار" {{ $article->categorie == 'أخبار' ? 'selected' : '' }}>أخبار</option>
                <option value="حوارات" {{ $article->categorie == 'حوارات' ? 'selected' : '' }}>حوارات</option>
                <option value="مقاطع فيديو" {{ $article->categorie == 'مقاطع فيديو' ? 'selected' : '' }}>مقاطع فيديو</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
    </form>
</div>
</body>
</html>
