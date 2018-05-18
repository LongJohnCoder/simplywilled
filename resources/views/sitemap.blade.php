<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{url('/')}}</loc>
    <lastmod>2018-05-12T04:46:53+00:00</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{url('/')}}/register</loc>
    <lastmod>2018-05-12T04:46:53+00:00</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{url('/')}}/sign-in</loc>
    <lastmod>2018-05-12T04:46:53+00:00</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{url('/')}}/about-us</loc>
    <lastmod>2018-05-12T04:46:53+00:00</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{url('/')}}/faq</loc>
    <lastmod>2018-05-12T04:46:53+00:00</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{url('/')}}/blog</loc>
    <lastmod>2018-05-12T04:46:53+00:00</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  @if(!empty($categories))
    @foreach($categories as $cat)
      <url>
        <loc>{{url('/')}}/category/{{$cat->slug}}</loc>
        <lastmod>{{$cat->updated_at->format('Y-m-d\TH:i:s')}}+00:00</lastmod>
        <priority>0.7</priority>
      </url>
    @endforeach
  @endif
  @if(!empty($blogs))
    @foreach($blogs as $blog)
      <url>
        <loc>{{url('/')}}/blogdetails/{{$blog->slug}}</loc>
        <lastmod>{{$blog->updated_at->format('Y-m-d\TH:i:s')}}+00:00</lastmod>
        <priority>{{$blog->featured == 0 ? 0.7 : 0.8}}</priority>
      </url>
    @endforeach
  @endif
</urlset>
