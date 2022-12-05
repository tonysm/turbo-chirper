<?php

use Tonysm\ImportmapLaravel\Facades\Importmap;

Importmap::pinAllFrom("resources/js", to: "js/", preload: true);
Importmap::pin("@hotwired/turbo", to: "https://ga.jspm.io/npm:@hotwired/turbo@7.2.4/dist/turbo.es2017-esm.js");
Importmap::pin("alpinejs", to: "https://ga.jspm.io/npm:alpinejs@3.10.5/dist/module.esm.js");
Importmap::pin("laravel-echo", to: "https://ga.jspm.io/npm:laravel-echo@1.14.2/dist/echo.js");
Importmap::pin("lodash", to: "https://ga.jspm.io/npm:lodash@4.17.21/lodash.js");
Importmap::pin("pusher-js", to: "https://ga.jspm.io/npm:pusher-js@7.5.0/dist/web/pusher.js");
Importmap::pin("axios", to: "https://ga.jspm.io/npm:axios@0.27.2/index.js");
Importmap::pin("#lib/adapters/http.js", to: "https://ga.jspm.io/npm:axios@0.27.2/lib/adapters/xhr.js");
Importmap::pin("#lib/defaults/env/FormData.js", to: "https://ga.jspm.io/npm:axios@0.27.2/lib/helpers/null.js");
Importmap::pin("buffer", to: "https://ga.jspm.io/npm:@jspm/core@2.0.0-beta.27/nodelibs/browser/buffer.js");
