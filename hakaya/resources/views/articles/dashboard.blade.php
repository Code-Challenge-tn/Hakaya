<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المقالات</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <style>
        body {
            background-color: #A48707; /* Doré color from logo */
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #A48707;
            color: white;
        }

        td img {
            width: 100px;
            height: auto;
        }

        .btn {
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-warning {
            background-color: #F1C40F;
            color: white;
        }

        .btn-warning:hover {
            background-color: #F39C12;
        }

        .btn-danger {
            background-color: #E63946;
            color: white;
        }

        .btn-danger:hover {
            background-color: #C32C2D;
        }

        .btn-primary {
            background-color: #A48707;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0D0C52;
        }

        .btn-logout {
            background-color: #0D0C52;
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
            width: fit-content;
        }

        .btn-logout:hover {
            background-color: #0A0A29;
        }

        .btn-add {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
            width: fit-content;
        }

        .btn-add:hover {
            background-color: #45A049;
        }

        .header-logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header-logo img {
            width: 40px;
            height: auto;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo">
        <h1 class="text-center mb-4">لوحة تحكم المقالات</h1>
    </div>

    <!-- Logout Button -->
    <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-4">
                @csrf
        <button type="submit" class="btn btn-logout">تسجيل الخروج</button>
    </form>

    <!-- Ajouter Button -->
    <a href="{{ route('articles.create') }}" class="btn btn-add">إضافة مقال</a>

    <!-- Articles Table -->
    <table>
        <thead>
            <tr>
                <th>الصورة</th>
                <th>العنوان</th>
                <th>التصنيف</th>
                <th>تاريخ النشر</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->titre }}">
                        @elseif ($article->video_url)
                            <iframe width="100" height="56" 
                                src="{{ Str::replace('watch?v=', 'embed/', $article->video_url) }}" 
                                frameborder="0" allowfullscreen>
                            </iframe>
                        @endif
                    </td>
                    <td>{{ $article->titre }}</td>
                    <td>{{ $article->categorie }}</td>
                    <td>{{ $article->date_publication }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">تعديل</a>

                        <!-- Delete Button -->
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>

                        <!-- Show Button -->
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">عرض المزيد</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
