<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="./images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>
            

            <div class="mt-8 md:mt-0">
               
                     <!--  Category -->
                     <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    
                        <div>
                            <button 
                            class="py-2 pl-3 pr-9 text-sm font-semibold w-36 text-left inline-flex">
    
                            {{ 'Languages' }}
    
                            <svg class="transform -rotate-90 absolute pointer-events-none " style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                        </button>
    
                            <div class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-20">
                                    
                                @foreach (config('translatable.locales') as $locale)
                                    <a href="{{ request()->url() }}?language={{ $locale }}"
                                    class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                        [{{ strtoupper($locale) }}]
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
            </div>
        </nav>

        <header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                Latest <span class="text-blue-500">Laravel From Scratch</span> News
            </h1>

            <h2 class="inline-flex mt-2">By Lary Laracore <img src="./images/lary-head.svg"
                                                               alt="Head of Lary the mascot"></h2>

            <h1> {{ trans('words.food') }}</h1>
            <h2>{{ __('words.delicious') }}</h2>
            <p class="text-sm mt-14">
                Another year. Another update. We're refreshing the popular Laravel series with new content.
                I'm going to keep you guys up to speed with what's going on!
               
            </p>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                <!--  Category -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    
                    <div x-data="{ show: false }" @click.away="show = false">
                        <button 
                        @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold w-36 text-left inline-flex">

                        {{ isset($currentCategory) ? ucwords($currentCategory->title) : 'Categories' }}

                        <svg class="transform -rotate-90 absolute pointer-events-none " style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                    </button>

                        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-20" style="display: none">
                                <a href="/" class="block text-left px-5 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">All</a>
                            @foreach ($categories as $category)
                                <a href="/?category={{$category->slug}}" :active='request()->is("categories/{$category->slug}")' 
                                    class="{{ isset($currentCategory) && $currentCategory->id == $category->id ? 'bg-gray-300' : '' }}
                                    block text-left px-5 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">{{ $category->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>



                 <!--  Tag  -->
                 <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    
                    <div x-data="{ show: false }" @click.away="show = false">
                        <button 
                        @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold w-36 text-left inline-flex">

                        {{ isset($currentTag) ? ucwords($currentTag->title) : 'Tags' }}

                        <svg class="transform -rotate-90 absolute pointer-events-none " style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                    </button>

                        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-20" style="display: none">
                                <a href="/" class="block text-left px-5 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">All</a>
                            @foreach ($tags as $tag)
                                <a href="/?tag={{$tag->slug}}" :active='request()->is("tags/{$tag->slug}")' 
                                    class="{{ isset($currentTag) && $currentTag->id == $tag->id ? 'bg-gray-300' : '' }}
                                    block text-left px-5 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>


                            <!--  Ingredients  -->
                            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    
                                <div x-data="{ show: false }" @click.away="show = false">
                                    <button 
                                    @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold w-36 text-left inline-flex">
            
                                    {{ isset($currentIngredient) ? ucwords($currentIngredient->title) : 'Ingredients' }}
            
                                    <svg class="transform -rotate-90 absolute pointer-events-none " style="right: 12px;" width="22"
                                     height="22" viewBox="0 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path fill="#222"
                                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                                </button>
            
                                    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-20" style="display: none">
                                            <a href="/" class="block text-left px-5 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">All</a>
                                        @foreach ($ingredients as $ingredient)
                                            <a href="/?ingredient={{$ingredient->slug}}" :active='request()->is("ingredients/{$ingredient->slug}")' 
                                                class="{{ isset($currentIngredient) && $currentIngredient->id == $ingredient->id ? 'bg-gray-300' : '' }}
                                                block text-left px-5 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">{{ $ingredient->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            

            <div class="lg:grid lg:grid-cols-2">


                @foreach ($meals as $meal)
                <article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5">
                    <div>
                        <img src="./images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    <div class="mt-8 flex flex-col justify-between">
                        <header>
                            <div class="space-x-2">
                                @foreach ($meal->tags as $tag)
                                <a href="#"
                                class="px-3 py-1 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">#{{$tag->title}}</a>
                                @endforeach
                                

                                
                            </div>

                            <div class="mt-4">
                               
                                <div class="space-x-2 flex">
                                    <h1 href="#"
                                       class="px-3 py-1 text-3xl font-semibold"
                                       >{{ $meal->translate('en')->title ?? optional($meal->translate('es'))->title }}</h1>
                                    
    
                                    <p 
                                       class="pt-4 text-blue-700 text-xs uppercase font-bold"
                                       style="font-size: 10px">{{ $meal->status }}</p>
                                </div>
                                

                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>{{ $meal->created_at->diffForHumans() }}</time>
                                </span>
                            </div>
                        </header>

                        <div class="text-sm mt-4">
                            <p>
                                {{ $meal->description }}
                            </p>
                            <div class="space-x-2 mt-5">
                                @foreach ($meal->ingredients as $ingredient)
                                    <a href="#"
                                    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">{{ $ingredient->title }}</a>
                                @endforeach
                                
                            </div>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                <div class="ml-3">
                                    <h5 class="font-bold">{{ $meal->category->title }}</h5>
                                </div>
                            </div>

                            <div>
                               
                                <a href="/meals/{{ $meal->title }}"
                                   class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                >
                                    View meal
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
                @endforeach
            
                
            </div>

            
        </main>

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>

<script>

$englishLink.click(function() {
     $englishLink.toggleClass('bg-aqua-active');
     $englishForm.toggleClass('d-none');
     $spanishLink.toggleClass('bg-aqua-active');
     $spanishForm.toggleClass('d-none');
   });

   $spanishLink.click(function() {
     $englishLink.toggleClass('bg-aqua-active');
     $englishForm.toggleClass('d-none');
     $spanishLink.toggleClass('bg-aqua-active');
     $spanishForm.toggleClass('d-none');
   });
</script>