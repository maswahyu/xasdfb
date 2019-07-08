<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:geo="http://www.google.com/geo/schemas/sitemap/1.0">
    <sitemap>
        <loc>{{ url('sitemaps/master.xml') }}</loc>
        <lastmod>2019-06-27T04:17:41+00:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemaps/video.xml') }}</loc>
        <lastmod>2019-06-27T04:17:41+00:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemaps/photo.xml') }}</loc>
        <lastmod>2019-06-27T04:17:41+00:00</lastmod>
    </sitemap>
    @foreach ($category as $post)
    <sitemap>
        <loc>{{ url('/sitemaps/' . $post->slug . '.xml') }}</loc>
        <lastmod>{{ optional($post->created_at)->toAtomString() }}</lastmod>
    </sitemap>
    @endforeach
</sitemapindex>