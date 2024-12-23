<nav class="py-4 bg-[#642571] text-white my-4">
    <div class="container">
        <div class="md:hidden">
            <button
            class=""
               type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
            <i class="fas fa-align-justify text-2xl"></i>
            </button>
         </div>
        <ul class="gap-8 hidden md:flex">
            <li>
                <a href="{{route('home')}}" class="text-pink-600 font-semibold">Home</a>
            </li>

        @php

            $first_categories = $categories->take(10); // Only take num elements form the lists
            $last_categories = $categories->skip(10); // skips the num elements form 0 index and store every elements after num skips

        @endphp

        @foreach ($first_categories as $category)
        <li>
            <a href="{{route('cate',$category->slug)}}"
                class="hover:text-pink-600 hover:no-underline">{{ $category->nep_title }}</a>
        </li>
        @endforeach

        @if (count($last_categories) > 0)

        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button"
            class="flex items-center">थप <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown"
            class="z-10 bg-[#642571] hidden bg_primary text-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
            <ul class="py-2 mx-4 text-sm" aria-labelledby="dropdownDefaultButton">
                @foreach ($last_categories as $category)
                    <li>
                        <a href=""
                            class="hover:text-pink-600 hover:no-underline font-semibold">{{ $category->nep_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    @endif

        </ul>
    </div>

</nav>




<!-- drawer init and toggle -->

<!-- drawer component -->
<div id="drawer-example"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-[#642571] w-80 text-white"
    tabindex="-1" aria-labelledby="drawer-label">
    <h5 class="text-2xl mb-4">Menu</h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <ul class="space-y-4">
        <li>
            <a href="" class="text-pink-600 font-semibold">Home</a>
        </li>
        @foreach ($categories as $category)
        <li>
            <a href=""
                class="hover:text-pink-600 font-semibold">{{ $category->nep_title }}</a>
        </li>
        @endforeach
    </ul>
</div>
