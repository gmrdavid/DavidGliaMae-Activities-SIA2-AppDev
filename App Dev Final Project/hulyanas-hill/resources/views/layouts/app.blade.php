<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hulyanas Hill')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 antialiased">
    


    <!-- Main Content -->
    <main class="min-h-screen">
        <div class="max-w-full mx-auto py-10 px-6 lg:px-10">
            
            <!-- Success Message - BIG -->
            @if(session('success'))
                <div class="mb-8 px-8 py-6 bg-gray-100 border-4 border-black rounded-2xl text-xl font-bold text-gray-900 shadow-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Error Message - BIG -->
            @if(session('error'))
                <div class="mb-8 px-8 py-6 bg-gray-100 border-4 border-red-600 rounded-2xl text-xl font-bold text-red-700 shadow-lg">
                    {{ session('error') }}
                </div>
            @endif
            
            <!-- Validation Errors - BIG -->
            @if($errors->any())
                <div class="mb-8 px-8 py-6 bg-gray-100 border-4 border-red-600 rounded-2xl text-xl font-bold text-red-700 shadow-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>

</body>
</html>