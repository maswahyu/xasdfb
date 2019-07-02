@extends('frontend.layouts.skeleton')

@section('content')

<div class="container">

    <div class="row">
        <div class="span-12">
            <div class="section-title section-title--plain section-title--page section-title--interest">
                <span class="section-title__label section-title__label--category">Beritahu Kami Minat Kamu</span>
            </div>
            <p class="subtitle text-center">Pilih topik-topik menarik yang kamu suka.</p>
            <p class="subtitle text-center" style="color: #ec2427;" id="its_warning"></p>
        </div>
    </div>

    <form class="js-form" action="{{ url('interest') }}" method="post">

        <div class="row">

            @foreach($interests as $interest)
            <div class="span-12 span-lg-4">

                <a href="javascript:void(0)" class="post-card post-card--third post-card--elevation post-card--interest">

                    <div class="post-card__thumbnail post-card__thumbnail--interest">
                        <img class="post-card__img post-card__img--interest" src="{{ $interest->img }}" alt="">
                    </div>

                    <div class="post-card__info">

                        <div class="post-card__interest">
                            <div class="post-card__interest-checkbox">
                                <div class="pretty p-default">
                                    <input type="checkbox" name="interest[]" class="ids" value="{{ $interest->id }}" />
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
@section('before-body-end')
<script src="{{ asset('static/js/interest.js') }}?v={{ filemtime(public_path() . '/static/js/interest.js') }}"></script>
@endsection
