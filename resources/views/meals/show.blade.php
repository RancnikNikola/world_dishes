<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="./images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                <a href="/" class="text-xs font-bold uppercase">Home Page</a>

                <a href="#"
                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Subscribe
                    for Updates</a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <a href="/meals"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Meals
                        </a>
            <article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        <img src="./images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                @foreach ($meal->tags as $tag)
                                    <a href="#"
                                    class="px-3 py-1 text-blue-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">#{{$tag->title}}</a>
                                @endforeach
                                
                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl font-bold">
                                    {{ $meal->title }}
                                </h1>

                                <h5 class="font-semibold mt-2 text-xs">{{ $meal->category->title }}</h5>
                            </div>
                        </header>

                        <div class="mt-2">
                            <h5 class="font-bold mt-4">Description</h5>
                            <p class="mt-5">
                                {{ $meal->description }}
                            </p>
                            <div class="space-x-2 mt-5">
                                @foreach ($meal->ingredients as $ingredient)
                                    <a href="#"
                                    class="px-3 border border-blue-300 rounded-full py-1 text-blue-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">{{ $ingredient->title }}</a>
                                @endforeach
                            
                            </div>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                <div class="ml-3">

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $meal->created_at->diffForHumans() }}</time>
                                    </span>
                                    
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
        </main>

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent pl-4 focus-within:outline-none">
                        </div>
                        

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>
