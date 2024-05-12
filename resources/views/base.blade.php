<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://kit.fontawesome.com/2eb292a73a.js" crossorigin="anonymous"></script>
    <title>Blog</title>
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
                <div class="container">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('images/logo/1.png') }}" alt="Logo"></a>
                    </div>
                    <a href="/articles/create">Artikel aanmaken</a>
                    <a href="/authors/create">Auteur aanmaken</a>
                    <div class="dropdown categories-menu">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorieën
                        </button>
                        <div class="dropdown-menu category-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                            @endforeach
                            <a class="dropdown-item category-item" href="/categories/create">Categorie aanmaken</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="search-bar">
                                <input name="search-input" class="form-control form-control-sm" id="search-input" placeholder="Zoeken...">
                            </div>
                        </div>
                    </div><hr>
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" title="Log uit"><i class="fa-solid fa-right-from-bracket"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" title="Login"><i class="fa-solid fa-right-to-bracket"></i></a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" title="Registreer"><i class="fa-solid fa-user-plus"></i></a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            &copy; Blog Merve {{ Date('Y') }}
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var searchInput = $('#search-input');

            searchInput.on('input', function () {
                var searchTerm = $(this).val().toLowerCase();
                filterItems(searchTerm);
            });

            function filterItems(searchTerm) {
                // Filter categories
                $('.categories .category').each(function () {
                    var itemText = $(this).text().toLowerCase();

                    if (itemText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Filter authors
                $('.authors .author').each(function () {
                    var itemText = $(this).text().toLowerCase();

                    if (itemText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Filter articles
                $('.articles .article').each(function () {
                    var itemText = $(this).text().toLowerCase();

                    if (itemText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });

        // document.addEventListener("DOMContentLoaded", function() {
        //     const slider = document.querySelector('.slider');
        //     const slides = document.querySelectorAll('.slide');
        //     const prevButton = document.querySelector('.prev');
        //     const nextButton = document.querySelector('.next');
        //     let slideIndex = 0;

        //     function showSlide(index) {
        //         slider.style.transform = `translateX(-${index * 100}%)`;
        //     }

        //     prevButton.addEventListener('click', function() {
        //         slideIndex = Math.max(slideIndex - 1, 0);
        //         showSlide(slideIndex);
        //     });

        //     nextButton.addEventListener('click', function() {
        //         slideIndex = Math.min(slideIndex + 1, slides.length - 1);
        //         showSlide(slideIndex);
        //     });
        // });


        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            let slideIndex = 0;

            function showSlide(index) {
                slider.style.transform = `translateX(-${index * 100}%)`;
            }

            prevButton.addEventListener('click', function() {
                slideIndex = (slideIndex - 1 + slides.length) % slides.length;
                showSlide(slideIndex);
            });

            nextButton.addEventListener('click', function() {
                slideIndex = (slideIndex + 1) % slides.length;
                showSlide(slideIndex);
            });
        });


    </script>


</body>
</html>