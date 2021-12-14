<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- AlpineJS Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Website</title>
    <style>
        html, body {scroll-behavior: smooth}
        /** position of dots **/
        .flickity-page-dots {
            bottom: -34px;
            /* display: none; /* if you don't want dots, uncomment this */
        }
        /** prev and next buttons **/
        .flickity-prev-next-button {
            display: none; /** if you want arrows, delete this **/
        }
        /* If you don't want the carousel to be dragable,
        be sure to include this bit inside the div with the class of 'main-carousel'
        don't forget to add the comma if you have more than 2 properties! 
            data-flickity='{ "draggable": false }' */
        .cool-bg {
            background-color: #f7f5e5;
            background-image: radial-gradient(#000000 1px, #f7f5e5 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="cool-bg">

    <div 
        class="w-screen h-screen absolute bg-yellow-50"
        x-data="{ loader : true}"
        x-init="setTimeout(()=>loader=false,300)"
        x-show="loader"
        id="loader"
    >
        <div x-show="loader">
        </div> <!-- loader end -->
    </div> <!-- wrapper end -->

    <div class="flex flex-col w-full" id="heythere">
        <x-manager-shortcut/>
        <div 
            class="p-8 flex flex-col justify-end items-center h-full text-center m-4"
            x-data="{ shown: false }" x-intersect:enter="shown = true"
        >   
            <div 
                x-show="shown" x-transition.duration.1100ms.delay.50ms
                class="flex flex-col items-center justify-center"
            >
                <x-profile-hero :profile="$profile"/>
            </div>
        </div> 
    </div> <!-- profile end -->

    <div class="flex flex-col md:grid grid-cols-2 gap-y-5 gap-x-5 m-4 md:m-12 md:mt-0">
        <div class="col-start-1">
            <x-qualities :qualities="$qualities"/>
        </div>
        
       <div class="col-start-2">
            <x-toolbox :tools="$tools"/>
       </div>
    </div> <!-- qualities $ toolbox end -->

    <div 
        class="flex items-center justify-center w-full h-full p-4 my-52"
        x-data="{quote: false}" 
        x-intersect:enter="quote = true"
        x-intersect:leave="quote = false"
    >
        @foreach ($profile as $quote)
            <p 
                class="text-4xl font-bold text-purple-800 italic text-opacity-85 leading-relaxed text-center"
                x-show="quote" x-transition.duration.1100ms.delay.50ms
            >
                {{ $quote->optional }}
            </p>
        @endforeach
    </div>

    <div 
        id="projects"
        class="my-16"
    >
        <div class="p-2 text-center">
            <h1 class="font-bold text-3xl p-6">Projects</h1>
        </div> 
        
        <div 
            class="carousel m-8 shadow-2xl rounded-md"
            data-flickity='{ "wrapAround": true }'
        >
            @foreach ($projects as $project)

                <div class="carousel-cell w-full bg-yellow-200">
                    <div class="flex flex-col md:flex-row h-full rounded-md md:space-x-2 md:space-y-0 space-y-4">
                        <img src="https://picsum.photos/400" class="h-96 rounded-tl-md rounded-bl-md" alt="">
                        <!-- project image -->
                        <div class="flex flex-col">
                            <p class="rounded-md p-4">
                                {{ $project->description }}
                            </p> <!-- project description end -->
        
                            <div class="flex items-center flex-col md:flex-col lg:flex-row lg:pr-8 justify-end p-2">
                                <div class="md:pr-4 font-bold text-xl md:text-2xl"> {{ $project->title }} </div>
                                <span class="rounded-full w-1 h-1 bg-black my-4 flex justify-center items-center"></span>
                                <div class="px-4 text-gray-500"> {{ $project->display_date }} </div>

                                @if ($project->url == true)
                                    <div class="flex items-center justify-center md:justify-start">
                                        <a href="{{ $project->url }}">
                                            <div class="flex items-center justify-center my-4">
                                                <button class="font-semibold text-white py-2 px-4 shadow-md bg-purple-500 rounded-md w-24 cursor-pointer h-auto hover:bg-green-500 focus:outline-none">
                                                    Visit
                                                </button>
                                            </div> <!-- visit button end -->
                                        </a> 
                                    </div> <!-- wrapper end -->
                                @else

                                @endif
                            </div> <!-- details end -->
                        </div> <!-- description and details end-->
                    </div> <!-- wrapper end -->
                </div> <!-- carousel cell end -->

            @endforeach

        </div> <!-- carousel end -->

        <div class="flex flex-col md:items-end items-center justify-center md:mt-12 mt-20">
            <a 
                href="#heythere"
                class="font-semibold md:pr-12 text-gray-700"
            >
                Top
            </a>
        </div> <!-- back to top end-->
    </div> <!-- projects layout end -->

    <div class="flex flex-col items-center justify-center md:flex-row md:p-6 md:justify-around
                bg-gray-900 text-gray-100">
        <img 
            src=""
            alt="logo"
            class="max-h-16 p-4"
        >
        <p class="text-center text-xl pb-4 leading-relaxed">
            Graphic Designer, México<br>
            eduardongua@hotmail.com
        </p>
    </div> <!-- contact end -->

    <!-- FlickityJS -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        window.addEventListener('load', 
        function() { 
            var test = document.getElementById("loader");
            test = setTimeout( () => test = false,300);
            console.log(test);
        }, false);
    </script>
</body>
</html>