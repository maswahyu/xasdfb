<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" encoding="UTF-8" indent="yes" href="{{ url('sitemap-aggregate.xsl') }}"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
@foreach ($posts as $post)
<url>
  <loc>{{ $post->url }}</loc>
  <lastmod>{{ optional($post->created_at)->toAtomString() }}</lastmod>
  <priority>0.6</priority>
</url>
@endforeach
</urlset>