<div class="feature" data-slug="{{ $featurePage->slug }}" data-cat="{{ $featurePage->category->slug }}">
    <div class="feature-block">
        <h5 class="feature-title">{{ $featurePage->title }}</h5>
        <a class="feature-cat" href="{{ route("category.show", $featurePage->category->slug) }}">{{ $featurePage->category->title }}</a>
    </div>
</div>
