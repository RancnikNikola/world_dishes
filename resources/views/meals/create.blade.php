
    




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
                  
      
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                      <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                          <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                          <p class="mt-1 text-sm text-gray-600">
                            This information will be displayed publicly so be careful what you share.
                          </p>
                        </div>
                      </div>
                      <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="/" method="POST">
                            @csrf
                          <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                              <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="title_{{ $locale }}">Title ({{ strtoupper($locale) }})</label>

                                  <div class="mt-1 flex rounded-md shadow-sm">
                                    
                                    <input type="text" name="title_{{ $locale }}" id="title_{{ $locale }}"
                                           value="{{ old('title_' . $locale) }}"
                                           class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus />
                                  </div>
                                </div>
                              </div>
                  
                              <div>
                                <label for="description_{{ $locale }}">Description ({{ strtoupper($locale) }})</label>

                                <div class="mt-1">
                                    <textarea name="description_{{ $locale }}" id="description_{{ $locale }}" rows="5"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description_' . $locale) }}</textarea>                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                  Brief description for your meal.
                                </p>
                              </div>
                
                              <div>
                                <label class="block text-sm font-medium text-gray-700">
                                  Image
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                  <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="True">
                                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                      <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                      </label>
                                      <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                      PNG, JPG, GIF up to 10MB
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-span-3 sm:col-span-2">
                                <div class="mt-1 rounded-md shadow-sm">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                          Category
                                        </label>
                                        <div class="relative">
                                          <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category" name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                          </select>
                                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                          Tags
                                        </label>
                                        <div class="relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tags[]" name="tags[]">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                @endforeach
                                              </select>
                                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                          Ingredients
                                        </label>
                                        <div class="relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ingredients[]" name="ingredients[]">
                                                @foreach ($ingredients as $ingredient)
                                                    <option value="{{ $ingredient->id }}">{{ $ingredient->title }}</option>
                                                @endforeach
                                              </select>
                                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                              </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
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