<x-frontend-layout>

   <section>
    <div class="container grid md:grid-cols-12 gap-5">
        <div class="md:col-span-8 w-[100%]">

            <img src="{{asset($latest_post->image)}}" class="w-full" alt="{{$latest_post->title}}">

            <h1 class="text-4xl font-semibold py-8  md:text-2xl lg:text-3xl  mt-2"> {{$latest_post->title}}</h1>

            <div class="h-10 overflow-hidden w-[100%] object-cover descritpion">
                {!! html_entity_decode($latest_post->description) !!}

                {{--  Show as it is with ads images etc  --}}
                {{-- {{!! $latest_post->description !!}} --}}

                 {{--  Only Works in english   --}}
                {{-- {{Str::limit($latest_post->description, 200, '...')}} --}}

            </div>
        </div>

        <div class="md:col-span-4 space-y-4">
            <h1 class="text_primary bg-light_primary px-3 py-2 text-4xl font-semibold border-l-4 border-[#642571] space-y-5">
                ट्रेन्डिङ</h1>

            @foreach ($trending_posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>




   </section>

   {{-- <section>

    <div class="container py-10 space-y-5">


        @foreach ($categories as $category)
        @if (count($category->posts) > 0)
        <div>
            <h1 class="text_primary text-3xl font-semibold">{{$category->nep_title}}</h1>
            <img class="h-[5px] md:h-[10px] lg:h-[12px]"
            src="https://jawaaf.com/frontend/images/redline.png" alt="Line">
        </div>
            <div class="grid grid-cols-3 h-full object-cover">
                @foreach ($category->posts as $post)
                <x-post-card :post="$post" />
                @endforeach
            </div>
            @endif
        @endforeach

    </div>

   </section> --}}

   <section>
    <div class="container py-10 space-y-5">

        @foreach ($categories as $category)
            @if (count($category->posts) > 0)
                <div>
                    <h1 class="text_primary text-3xl font-semibold">{{ $category->nep_title }}</h1>
                    <img class="h-[5px] md:h-[10px] lg:h-[12px]"
                        src="https://jawaaf.com/frontend/images/redline.png" alt="Line">
                </div>

                {{-- Howmany to show in home page --}}
                @php
                    $posts = $category->posts->take(12);
                @endphp

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($posts as $index => $post)
                        @if ($index == 0)

                        @else
                            <x-post-card :post="$post" />
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach

    </div>
</section>


</x-frontend-layout>
