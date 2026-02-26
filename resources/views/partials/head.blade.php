<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

{{-- <script>
    // Inline script to prevent FOUC (Flash of Unstyled Content)
    if (localStorage.getItem('flux-appearance') === 'dark' || (!('flux-appearance' in localStorage) && window
            .matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script> --}}

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
{{-- <link rel="apple-touch-icon" href="/apple-touch-icon.png"> --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
  rel="stylesheet">

<title>{{ $title ?? config('app.name') }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
