<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>حـكـايـا</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #ffffff; /* Set background color to white */
            background-image: none; /* No gradient */
        }

        /* Center the logo */
        .logo-container {
            text-align: center;
            padding: 50px 0; /* Add padding to ensure it is well spaced */
        }
        .logo-container img {
            max-height: 100px;
            width: auto;
        }

        /* Styling for form and sections */
        .form-container {
            background-color: white;
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #A48707; /* Logo gold color */
        }

        .form-container label {
            font-size: 14px;
            color: #333;
        }

        .form-container input {
            padding: 12px;
            margin-bottom: 15px;
            width: 100%;
            border: 1px solid #A48707; /* Doré border */
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        .form-container button {
            background-color: #A48707;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
            border: none;
        }

        .form-container button:hover {
            background-color: #0D0C52; /* Darker gold on hover */
        }

        /* Footer styling */
        footer {
            background-color: #0D0C52; /* Dark background for footer */
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="logo-container">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" />
    </header>

    <main class="form-container">
        <section>
            <h3>تسجيل الدخول</h3>
            <p class="text-gray-600 pt-2 text-center">يرجى إدخال بريدك الإلكتروني وكلمة المرور.</p>
        </section>

        <!-- Error Display -->
        @if ($errors->any())
            <div class="bg-red-500 text-white text-center py-2 mb-4 rounded">
                {{ $errors->first('message') }}
            </div>
        @endif

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">البريد الإلكتروني</label>
                    <input type="text" name="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">كلمة المرور</label>
                    <input type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                </div>
                
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">تسجيل الدخول</button>
            </form>
        </section>
    </main>

</body>
</html>
