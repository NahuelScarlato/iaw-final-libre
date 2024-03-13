// importScripts("https://storage.googleapis.com/workbox-cdn/releases/4.0.0/workbox-sw.js");

const CACHE_NAME = "my-cache"

self.addEventListener("install", e => {
    e.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll([
                `/`,
                `index.html`,
                `Components/*`,
                `Storage/*`,
                `src/*`,
                `*.css`,
                `*.js`
            ]).then(() => self.skipWaiting());
        })
    )
})

self.addEventListener("activate", e => {
    e.waitUntil(self.clients.claim());
})

self. addEventListener('fetch', event => {
    if (navigator.onLine) {
        let fetchRequest = event. request. clone();

        return fetch(fetchRequest).then((response) => {
            if (!response || response.status !==200 || response.type !== 'basic') {
                return response;
            }
            let responseToCache = response.clone();
            caches.open(CACHE_NAME)
                .then((cache) => {
                    cache.put(event.request, responseToCache);
                });

            return response;
        });
    } else {
        event.respondWith(
            caches.match(event.request)
                .then ((response) => {
                    if (response) {
                        return response;
                    }
                })
        );
    }
});

// --

// if (workbox) {
//     console.log("Yay! Workbox is loaded !");
//     workbox.precaching.precacheAndRoute([]);
//
//     /*  cache images in the e.g others folder; edit to other folders you got
//    and config in the sw-config.js file
//     */
//     workbox.routing.registerRoute(
//         /(.*)others(.*)\.(?:png|gif|jpg)/,
//         new workbox.strategies.CacheFirst({
//             cacheName: "images",
//             plugins: [
//                 new workbox.expiration.Plugin({
//                     maxEntries: 50,
//                     maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
//                 })
//             ]
//         })
//     );
//     /* Make your JS and CSS âš¡ fast by returning the assets from the cache,
//   while making sure they are updated in the background for the next use.
//   */
//     workbox.routing.registerRoute(
//         // cache js, css, scc files
//         /.*\.(?:css|js|scss|)/,
//         // use cache but update in the background ASAP
//         new workbox.strategies.StaleWhileRevalidate({
//             // use a custom cache name
//             cacheName: "assets",
//         })
//     );
//
//     // cache google fonts
//     workbox.routing.registerRoute(
//         new RegExp("https://fonts.(?:googleapis|gstatic).com/(.*)"),
//         new workbox.strategies.CacheFirst({
//             cacheName: "google-fonts",
//             plugins: [
//                 new workbox.cacheableResponse.Plugin({
//                     statuses: [0, 200],
//                 }),
//             ],
//         })
//     );
//
//     // add offline analytics
//     workbox.googleAnalytics.initialize();
//
//     /* Install a new service worker and have it update
// and control a web page as soon as possible
// */
//
//     workbox.core.skipWaiting();
//     workbox.core.clientsClaim();
//
// } else {
//     console.log("Oops! Workbox didn't load ðŸ‘º");
// }