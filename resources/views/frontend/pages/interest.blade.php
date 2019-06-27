@extends('frontend.layouts.skeleton')

@section('content')

<div class="container">

    <div class="row">
        <div class="span-12">
            <div class="section-title section-title--plain section-title--page section-title--interest">
                <span class="section-title__label section-title__label--category">Beritahu Kami Minat Kamu</span>
            </div>
            <p class="subtitle text-center">Pilih topik-topik menarik yang kamu suka.</p>
        </div>
    </div>

    <form action="" method="post">

        <div class="row">

            @foreach($interests as $interest)
            <div class="span-12 span-lg-4">

                <a href="#" class="post-card post-card--third post-card--elevation post-card--interest">

                    <div class="post-card__thumbnail post-card__thumbnail--interest">
                        <img class="post-card__img post-card__img--interest" src="{{ $interest->img }}" alt="">
                    </div>

                    <div class="post-card__info">

                        <div class="post-card__interest">
                            <div class="post-card__interest-checkbox">
                                <div class="pretty p-default">
                                    <input type="checkbox" />
                                    <div class="state p-danger">
                                        <label class="post-card__interest-title">{{ $interest->name }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-card__excerpt post-card__excerpt--interest">
                            <span>{{ $interest->description }}</span>
                        </div>

                    </div>

                </a>

            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="span-12 text-center">
                <button type="submit" class="btn btn-ghost btn-load-more btn-load-more--wide">SAVE</button>
            </div>
        </div>

    </form>

</div>

@endsection
