<x-index-layout title="FAQ {{ $selectedCategory ? 'in ' . $selectedCategory->name : '' }}">

   <x-show-all-categories 
    route-name="faq.index" 
    :categories="$faqCategories"
    :selected-category="$selectedCategory"
    label="FAQs"/>

    @if($faqs->isEmpty())
        <p class="text-gray-600">Geen FAQ's beschikbaar in deze categorie.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($faqs as $faq)
                <div class="bg-white p-4 rounded-lg shadow-md border border-black">
                    <h2 class="text-lg font-bold text-gray-800">{{ $faq->vraagnaam }}</h2>
                    <p class="text-sm text-gray-600">{{ $faq->vraagbody }}</p>
                </div>
            @endforeach
        </div>
    @endif

</x-index-layout>