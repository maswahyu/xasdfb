<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" encoding="UTF-8" indent="yes" href="{{ url('sitemap-aggregate.xsl') }}"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>{{ url('/') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>{{ url('points') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('interest') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('gallery/video') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('gallery/photo') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('events') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('lifestyle') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('entertainment') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('inspiration') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('lensaphoto') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>{{ url('sneakerland') }}</loc>
  <lastmod>2019-06-27T04:17:41+00:00</lastmod>
  <priority>0.80</priority>
</url>
@foreach ($category as $post)
<url>
  <loc>{{ $post->url }}</loc>
  <lastmod>{{ optional($post->created_at)->toAtomString() }}</lastmod>
  <priority>0.80</priority>
</url>
@endforeach
</urlset>