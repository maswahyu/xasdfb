<div class="faq-section">

    <div class="section-title section-title--plain section-title--page">
        <span class="section-title__label section-title__label--category">FAQ</span>
    </div>

    <div class="container faq-list">

        <div class="row">

            <div class="span-12 span-lg-10 off-lg-1">
                @foreach($faqs as $faq)
                <div class="expand-collapsed">
                    <div class="expand-collapsed__header">
                        <span class="expand-collapsed__title"> {{ $faq->title }} </span>
                        <span class="expand-collapsed__icon">
                            <svg class="svg-plus">
                                <use xlink:href="{{ asset('static/images/sprites.svg') }}#plus"></use>
                            </svg>
                        </span>
                    </div>
                    <div class="expand-collapsed__content">
                        {{ $faq->description }}
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>

</div>
