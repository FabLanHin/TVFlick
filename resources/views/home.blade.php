@extends('layout.app')

@section('content')
<section class="fondoHome">
<div class="container">
    <div class="row w-100">
        <div class="col-md-12">
            <div class="recomendacionHome">
                <div class="row recomendacionTitle my-4">
                    <h1>Nuestra recomendación de la semana</h1>
                </div>
                <div class="row recomendacionContent">
                    <div class="col-5 imgRecomendacion">
                        <img src="{{ asset('img/ftwd.jpeg') }}" class="img-fluid rounded-3 shadow-lg mb-4" alt="Póster de FTWD " width="700" height="500" loading="lazy">
                    </div>
                    <div class="col-6 txtRecomendacion container-fluid">
                        <div class="row serieTitle">
                            <h2>Fear The Walking Dead</h2>
                        </div>
                        <div class="row descripSerie">
                            <p>Desde 2015 / Drama, Terror, Suspenso</p>
                            <p>Dirigida por Dave Erickson, Robert Kirkman</p>
                            <p>Reparto: Frank Dillane, Alycia Debnam-Carey, Kim Dickens, Cliff Curtis, Colman Domingo.</p>
                            <p>Nacionalidad: EE.UU</p>
                            <p>Relacionada con: The Walking Dead</p>
                            <p>Una familia formada por una consejera de  estudiantes  llamada  Madison  Clark (Kim  Dickens); su novio, Travis Manawa (Cliff Curtis), un  profesor  de  inglés  divorciado;  su  hija Alicia (Alycia Debnam-Carey); y su hijo de 19 años, Nick (Frank Dillane), adicto a la heroína, ante el brote de un  misterioso virus y la aparición de caminantes infectados,  deben buscar  la supervivencia.  Así,  cuando  la  sociedad  empieza  a  desmoronarse,  esta familia deberá adaptarse para sobrevivir o aferrarse a sus más  grandes  defectos  para sobrevivir al inevitable colapso de la civilización.</p>
                        </div>
                        <div class="txtPlatform row">
                            <div class="col-3">
                                <p>Disponible en:</p>
                            </div>
                            <div class="col-2">
                                <img src="{{ asset('img/prime.png') }}" class="img-fluid rounded-3 shadow-lg mb-4" alt="Póster de FTWD " width="300" height="200" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
