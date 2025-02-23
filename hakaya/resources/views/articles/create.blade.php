<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مقال جديد</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <style>
        body {
            background-color: #A48707;
            background-image: linear-gradient(135deg, #A48707, #F8F3E2);
            color: #333;
            font-family: 'Lato', sans-serif;
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
        }

        .form-group input,
        .form-group textarea {
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

        .btn-secondary {
            background-color: #E63946;
            color: white;
            margin-top: 10px;
            font-size: 16px;
        }

        .btn-secondary:hover {
            background-color: #C32C2D;
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
            margin-right: 10px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo">
        <h1>إضافة مقال جديد</h1>
    </div>

    <!-- Form to add a new article -->
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titre">العنوان</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة (اختياري إذا كان هناك فيديو YouTube)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="video_url">رابط الفيديو من YouTube (اختياري إذا كانت صورة)</label>
            <input type="url" name="video_url" id="video_url" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="date_publication">تاريخ النشر</label>
            <input type="date" name="date_publication" id="date_publication" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="categorie">الفئة</label>
            <select name="categorie" id="categorie" class="form-control" required>
                <option value="تحقيقات">تحقيقات</option>
                <option value="مقالات">مقالات</option>
                <option value="أخبار">أخبار</option>
                <option value="حوارات">حوارات</option>
                <option value="مقاطع فيديو">مقاطع فيديو</option>
            </select>
        </div>
        <button type="submit" class="btn">إضافة</button>
    </form>

    <!-- After form is submitted, this button will allow users to return to the dashboard -->
    <a href="{{ route('articles.dashboard') }}" class="btn btn-secondary mt-4">الرجوع إلى لوحة التحكم</a>
</div>

</body>
</html>
