<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ __('company.name') }}</title>
</head>
<body style="display:flex; font-family:Arial;">

    <!-- LEFT SIDEBAR -->
    <div style="width:200px; background:#f0f0f0; padding:20px;">
        <h3>Languages</h3>

        <a href="/lang/en">English</a><br>
        <a href="/lang/hi">Hindi</a><br>
        <a href="/lang/es">Spanish</a><br>
    </div>

    <!-- MAIN CONTENT -->
    <div style="flex:1; padding:20px;">

        <!-- NAVBAR -->
        <nav style="display:flex; justify-content:space-between; align-items:center;">
            <h2>{{ __('company.name') }}</h2>

            <div>
                <a href="#about" style="margin-right:15px;">
                    {{ __('company.nav_about') }}
                </a>
                <a href="#contact">
                    {{ __('company.nav_contact') }}
                </a>
            </div>
        </nav>

        <hr>

        <!-- ABOUT -->
        <section id="about">
            <h3>{{ __('company.about_title') }}</h3>
            <p>{{ __('company.about_text') }}</p>
        </section>

        <hr>

        <!-- CONTACT -->
        <section id="contact">
            <h3>{{ __('company.contact_title') }}</h3>
            <p>{{ __('company.contact_text') }}</p>
        </section>

    </div>

</body>
</html>