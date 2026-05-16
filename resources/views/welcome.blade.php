<!doctype html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>{{ config('app.name', 'Voltage Grit') }}</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect" />
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Oswald:wght@600;700&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="bg-background text-on-background font-body-md text-body-md antialiased grit-bg overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container"
    >
        <!-- TopNavBar -->
        <nav
            class="fixed top-0 w-full z-50 bg-background/80 backdrop-blur-md border-b border-outline-variant/30 flex justify-between items-center px-margin-desktop py-4 max-w-container-max mx-auto md:px-margin-desktop px-margin-mobile"
        >
            <div
                class="font-display-lg text-headline-md italic uppercase text-primary tracking-tighter"
            >
                VOLTAGE GRIT
            </div>
            <div class="hidden md:flex space-x-8 items-center">
                <a
                    class="text-on-surface-variant hover:text-primary transition-colors hover:bg-primary/10 hover:text-secondary-fixed transition-all duration-300 px-3 py-2 rounded-md font-label-bold text-label-bold"
                    href="#"
                    >Clases</a
                >
                <a
                    class="text-on-surface-variant hover:text-primary transition-colors hover:bg-primary/10 hover:text-secondary-fixed transition-all duration-300 px-3 py-2 rounded-md font-label-bold text-label-bold"
                    href="#"
                    >Instalaciones</a
                >
                <a
                    class="text-on-surface-variant hover:text-primary transition-colors hover:bg-primary/10 hover:text-secondary-fixed transition-all duration-300 px-3 py-2 rounded-md font-label-bold text-label-bold"
                    href="#"
                    >Precios</a
                >
                <a
                    class="text-on-surface-variant hover:text-primary transition-colors hover:bg-primary/10 hover:text-secondary-fixed transition-all duration-300 px-3 py-2 rounded-md font-label-bold text-label-bold"
                    href="#"
                    >Equipo</a
                >
            </div>
            <a
                href="{{ route('filament.admin.auth.login') }}"
                class="bg-primary-container text-on-primary-container font-label-bold text-label-bold px-6 py-3 rounded-none uppercase hover:neon-glow transition-all hidden md:block"
            >
                Iniciar Sesión
            </a>
            <button class="md:hidden text-primary">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </nav>

        <!-- Hero Section -->
        <section
            class="relative min-h-[921px] flex items-center justify-center pt-24 overflow-hidden"
        >
            <!-- Background Image -->
            <div
                class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat"
                style="
                    background-image: url('./wall.png');
                "
            >
                <div class="absolute inset-0 bg-background/80"></div>
            </div>

            <div
                class="relative z-10 text-center px-margin-mobile max-w-4xl mx-auto flex flex-col items-center gap-8"
            >
                <h1
                    class="font-display-lg text-headline-lg-mobile md:text-display-lg text-primary uppercase tracking-tighter"
                >
                    TU MEJOR VERSIÓN EMPIEZA HOY
                </h1>
                <p
                    class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl"
                >
                    Entrena en un ambiente de alto rendimiento diseñado para
                    forjar disciplina y resultados. No es solo un gimnasio, es
                    tu campo de batalla.
                </p>
                <a
                    href="{{ route('filament.admin.auth.login') }}"
                    class="mt-4 bg-primary-container text-on-primary-container font-label-bold text-label-bold px-10 py-4 uppercase tracking-widest hover:neon-glow transition-all border border-primary-container"
                >
                    PRUEBA UN DÍA GRATIS
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer
            class="bg-surface-container-lowest w-full relative border-t border-outline-variant"
        >
            <div
                class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-mobile md:px-margin-desktop py-12 max-w-container-max mx-auto"
            >
                <div class="flex flex-col gap-4">
                    <span
                        class="font-display-lg text-headline-md italic text-primary"
                        >VOLTAGE GRIT</span
                    >
                    <p
                        class="font-body-md text-body-md text-on-surface-variant"
                    >
                        ¡Libera tu poder interior! El entorno definitivo para tu
                        transformación física y mental.
                    </p>
                </div>
                <div class="flex flex-col gap-3">
                    <h4
                        class="font-label-bold text-label-bold text-primary uppercase tracking-widest"
                    >
                        Enlaces
                    </h4>
                    <a
                        class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="#"
                        >Política de Privacidad</a
                    >
                    <a
                        class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="#"
                        >Términos de Servicio</a
                    >
                    <a
                        class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="#"
                        >Contáctanos</a
                    >
                    <a
                        class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                        href="#"
                        >Trabaja con nosotros</a
                    >
                </div>
                <div class="flex flex-col gap-3">
                    <h4
                        class="font-label-bold text-label-bold text-primary uppercase tracking-widest"
                    >
                        Contacto
                    </h4>
                    <p
                        class="font-body-md text-body-md text-on-surface-variant"
                    >
                        Lunes - Viernes: 24h
                    </p>
                    <p
                        class="font-body-md text-body-md text-on-surface-variant"
                    >
                        Sáb - Dom: 6am - 10pm
                    </p>
                    <div class="flex gap-4 mt-2">
                        <a
                            class="text-on-surface-variant hover:text-primary transition-colors"
                            href="#"
                            ><span class="material-symbols-outlined"
                                >link</span
                            ></a
                        >
                        <a
                            class="text-on-surface-variant hover:text-primary transition-colors"
                            href="#"
                            ><span class="material-symbols-outlined"
                                >mail</span
                            ></a
                        >
                    </div>
                </div>
                <div
                    class="flex flex-col gap-3 h-48 bg-surface-container rounded overflow-hidden relative border border-outline-variant/30"
                >
                    <iframe
                        title="Mapa de ubicación"
                        class="w-full h-full object-cover opacity-70 dark-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d956.3567304472788!2d-68.1299845696012!3d-16.504530913795755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f21f2c1dd941d%3A0xda55addb6e1d3c5!2sGimnasio%20Universitario%20%22Pablo%20Ramos%22!5e0!3m2!1sen!2sus!4v1778956532421!5m2!1sen!2sus"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-background to-transparent pointer-events-none"
                    ></div>
                    <div
                        class="absolute bottom-2 left-2 text-primary font-label-bold text-label-bold text-xs"
                    >
                        <span
                            class="material-symbols-outlined text-[16px] align-middle mr-1"
                            >location_on</span
                        >
                        Distrito Centro
                    </div>
                </div>
            </div>
            <div class="border-t border-outline-variant/30 py-6 text-center">
                <p class="font-body-md text-body-md text-on-surface-variant">
                    © {{ date('Y') }} VOLTAGE GRIT. ¡LIBERA TU PODER INTERIOR!
                </p>
            </div>
        </footer>

        <!-- FAB -->
        <a
            class="fixed bottom-8 right-8 z-50 bg-secondary-fixed text-on-secondary-fixed w-14 h-14 flex items-center justify-center rounded-full shadow-[0_0_15px_rgba(121,255,91,0.4)] hover:scale-110 transition-transform"
            href="#"
        >
            <span
                class="material-symbols-outlined"
                style="font-variation-settings: &quot;FILL&quot; 1"
                >chat</span
            >
        </a>
    </body>
</html>
