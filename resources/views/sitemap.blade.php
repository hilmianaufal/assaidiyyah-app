{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ route('news.index') }}</loc>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>{{ route('about') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('programs.index') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('gallery.index') }}</loc>
        <priority>0.7</priority>
    </url>

    <url>
        <loc>{{ route('contact') }}</loc>
        <priority>0.7</priority>
    </url>

    @foreach($news as $item)
        <url>
            <loc>{{ route('news.show', $item) }}</loc>
            <lastmod>{{ $item->updated_at->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>