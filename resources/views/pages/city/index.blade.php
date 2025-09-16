@extends('layout.app')
@section('content')
        <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[20px]">
            <a href="/"
                class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
            </a>
            <p class="font-semibold">All Cities</p>
            <div class="dummy-btn w-12"></div>
        </div>
        <section id="Cities" class="flex flex-col p-5 gap-4 bg-[#F5F6F8] w-full min-h-screen">
            <div class="grid grid-cols-2 gap-4">
                @foreach ($cities as $city)
                    <a href="{{ route('city.slug', $city->slug) }}">
                        <div
                            class="flex items-center rounded-[22px] p-[10px] gap-3 bg-white border border-white overflow-hidden hover:border-[#91BF77] transition-all duration-300">
                            <div
                                class="w-[55px] h-[55px] flex shrink-0 rounded-full border-4 border-white ring-1 ring-[#F1F2F6] overflow-hidden">
                                <img src="{{ Storage::url($city->image) }}" class="w-full h-full object-cover"
                                    alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-semibold text-xs" >{{ $city->name }}</h3>
                                <p class="text-sm text-ngekos-grey"> 30 Kos</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
    </section>
@endsection