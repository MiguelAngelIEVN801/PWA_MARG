// Etapa 1: Instalación
self.addEventListener('install', function(event) {
    console.log('Service Worker: Instalando…');

    // Lista de archivos a cachear
    const cacheFiles = [
        '/',
        '/resources/css/app.css',
        '/resources/layouts/app.blade.php',
        '/resources/auth/login.blade.php',
        '/resources/contact.blade.php',
        '/resources/faq.blade.php',
        '/resources/home.blade.php',
        '/resources/product.blade.php',
        '/resources/quienes.blade.php',
        '/resources/ubicacion.blade.php',
        '/resources/css/contacto.css',
        '/resources/js/app.js',
        '/icons/radiologia.png',
        '/icons/avatar.png',
        '/icons/esmalte.jpg',
        '/icons/gel.jpg',
        '/icons/logo.png',
        '/icons/logo1.png',
        '/icons/mascara.jpg',
        '/icons/portada.jpg',
        '/icons/uña_p.jpg',
        '/icons/uña4.jpg',
        '/icons/uña5.jpg',
        '/icons/uña6.jpg',
        '/manifest.json',
        '/screenshots/screensho1.png',
        '/screenshots/screensho2.png',
    ];

    event.waitUntil(
        // Usa Promise.all para verificar cada archivo con fetch
        Promise.all(
            cacheFiles.map(url =>
                fetch(url, { cache: 'no-store' }).then(response => {
                    if (!response.ok) {
                        throw new Error(`No se pudo cargar: ${url}`);
                    }
                    return url;
                }).catch(error => {
                    console.error(error);
                })
            )
        ).then(validUrls =>
            caches.open('v1').then(function(cache) {
                return cache.addAll(validUrls.filter(Boolean));
            })
        )
    );
});

// Etapa 2: Activación
self.addEventListener('activate', function(event) {
    console.log('Service Worker: Activado');
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.filter(function(cacheName) {
                    // Elimina versiones antiguas del cache
                    return cacheName !== 'v1';
                }).map(function(cacheName) {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});

// Etapa 3: Intercepción de Solicitudes (Fetch)
self.addEventListener('fetch', function(event) {
    console.log('Service Worker: Fetching', event.request.url);
    event.respondWith(
        caches.match(event.request).then(function(response) {
            // Devuelve la respuesta en cache o realiza la solicitud a la red
            return response || fetch(event.request);
        })
    );
});

// Etapa 4: Notificaciones Push
self.addEventListener('push', function(event) {
    console.log('Service Worker: Notificación Push recibida');
    const title = 'Nueva notificación';
    const options = {
        body: event.data ? event.data.text() : 'Tienes una nueva notificación!',
        icon: '/icons/avatar.png',
        badge: '/icons/radiologia.png'
    };
    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});
