<style>
    /*CARRUSEL, ALTURA*/
    .carousel{
        height: 500px;
    }
    /*SLIDER 1 Y 2//////////////////////////////////////////////*/
    .slider1, .slider2{
        position: relative;
        width: 100%;
        height: 800px; 
    }

    .imagen-centrada{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
    }



    /*SLIDER 3////////////////////////////////////////////////*/
    .slider3 {
        position: relative;
        background-image: url('{{ asset('assets/img/sobre_nosotros.jpg') }}');
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100%;
    }

    .slider3::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Color semi-transparente negro */
    }

    .slider3 .container {
        position: relative;
        /* Asegura que el contenido se posicione correctamente */
        /* Asegura que el contenido esté por encima de la superposición */
    }

    .slider3 h2{
        z-index: 9999;
        color: white;
    }
</style>
<div id="carouselExampleSlidesOnly" class="carousel slide tamanioCarrusel" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <!--FOTO 1 EQUIPO NUEVO-->
        <div class="carousel-item active slider1">
            @foreach ($medios as $medio)
                @if ($ultimoEquipo->id_imagen == $medio->id)
                    <img src="{{ asset('assets/uploads/' . $medio->nombre) }}" class="imagen-centrada"
                        alt="{{ $medio->nombre }}">
                @endif
            @endforeach
        </div>
        <!--FOTO 2 ULTIMO VEHÍCULO-->
        <div class="carousel-item slider2">
            @foreach ($medios as $medio)
                @if ($ultimoVehiculo->id_imagen == $medio->id)
                    <img src="{{ asset('assets/uploads/' . $medio->nombre) }}" class="imagen-centrada"
                        alt="{{ $medio->nombre }}">
                @endif
            @endforeach
        </div>
        <!--FOTO 3 PATROCINADORES-->
        <div class="carousel-item slider3">
            <!--<img src="{{ asset('assets/img/equipo_2022.jpg') }}" class="d-block w-100" alt="Image 3">-->
            <div class="row justify-content-center  mt-5">
                <!-- Alineación horizontal al centro -->
                <h2 class="text-center">Patrocinadores</h2>
                @foreach ($patrocinadores as $patrocinador)
                    <div class="col-md-2 col-4">
                        <div class="card h-100"> <!-- Establecer altura máxima para las tarjetas -->
                            @foreach ($medios as $medio)
                                @if ($patrocinador->id_imagen == $medio->id)
                                    <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                        class="card-img-top card-img-bottom img-fluid" alt="{{ $medio->nombre }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
