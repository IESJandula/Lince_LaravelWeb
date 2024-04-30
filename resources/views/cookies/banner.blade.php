<style>
    #cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(23, 22, 22, 0.9);;
        padding: 10px 20px;
        text-align: center;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    #cookie-banner button {
        /*background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;*/
        cursor: pointer;
    }
</style>
@if (!isset($_COOKIE['cookies_accepted']))
    <div class="text-white" id="cookie-banner">
        Este sitio web utiliza cookies para mejorar la experiencia del usuario. Al continuar navegando por el sitio, usted acepta el uso de cookies de acuerdo con nuestra 
        <a href="{{ url('/politica-de-cookies') }}" class="text-decoration-underline">Política de Cookies</a>.
        <button class="btn btn-primary mr-2" id="accept-cookies-btn">Aceptar</button>
        <button class="btn btn-danger" id="reject-cookies-btn">Rechazar</button>
    </div>
@endif

<script>
    document.getElementById('accept-cookies-btn').addEventListener('click', function() {
        // Setear una cookie para indicar que el usuario aceptó las cookies
        document.cookie = 'cookies_accepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT';

        // Ocultar el banner de cookies
        document.getElementById('cookie-banner').style.display = 'none';
    });
</script>
