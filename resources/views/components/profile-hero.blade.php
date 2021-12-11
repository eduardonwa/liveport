<div class="flex flex-col items-center justify-center my-3">
    <span class="text-5xl font-bold">Hello, welcome! 👋</span>
</div>

<img 
    class="rounded-full shadow-2xl my-10" 
    src="https://source.unsplash.com/200x200/?face&crop=face&v=1" 
    alt="profile picture"
>

<div class="row-start-2 col-start-2 my-3">
    <div class="flex flex-col justify-start items-center h-full text-center">
        @foreach ($profile as $profile)
        <h1>My name is</h1>
            <p class="font-bold text-lg">{{ $profile->full_name }}</p>
            <p class="my-3 md:w-3/5">{{ $profile->bio }}</p>
            <ul>
                <li class="flex items-center">
                    <img class="w-6 h-6" src="https://img.icons8.com/color/144/000000/linkedin.png"/>
                    <a 
                        class="underline text-blue-500" 
                        href="{{ $profile->linkedin_url }}"
                    >
                        Linkedin
                    </a>
                </li>
            </ul>
        @endforeach
    </div>
</div> <!-- bio end -->