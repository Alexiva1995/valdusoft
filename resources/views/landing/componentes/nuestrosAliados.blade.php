
@php
    // for ($i=0; $i < 5; $i++) {
    //     $data [] = [
    //         'img' => asset('assets/img/sistema/Grupo-106.png'),
    //         'imgC' => asset('assets/img/sistema/Logo-2.png'),
    //         'title' => 'ValduSoft '.$i,
    //         'meta' => 'Lorem ipsum dolor',
    //         'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi deleniti illum esse sapiente eius odit, distinctio architecto fugiat facere cum tempora odio rerum, aperiam doloremque ullam! Delectus corrupti vel iste?',
    //         'datatap' => 'tab'.$i
    //     ];
    // }
    $count1 = 0;
    $count2 = $count1;
@endphp

<style>
  /*  .relative.slick-slide.slick-current.slick-active{
        width: 219px !important;
    }*/
</style>

<div id="aliados" class="p-start-end">
    <div class="ui container mt-5">
        <h3 class="text-aliados">Aliados</h3>
        <h2><strong>Éstos son nuestros aliados y clientes</strong></h2>
    </div>

    <div class="ui grid tab_aliado">
        <div class="four wide column">
          <div class="ui vertical fluid tabular menu">
              @foreach ($allies as $ally)
              @if(!($ally->projects)->isEmpty())
              @php
                $count1++;
            @endphp
              <a class="item @if($count1 == 1) active @endif" data-tab="{{'tab'.$count1}}">
                    <img class="ui middle aligned mini circular image" src="assets/img/allys-logo/{{$ally->logo}}">
                    <span>
                        <h5 class="">
                            {{$ally->name}}
                            <br>
                            
                        
                            @if($ally->description == null)
                            <small class="">Lorem ipsum dolor sit amet consec</small>
                            @else

                            <small class="">{{Str::limit($ally->description, 31)}}</small>
                            @endif
                        </h5>
                    </span>

                  </a>
              @endif
              @endforeach
          </div>
        </div>
         <div class="twelve wide stretched column">
            @foreach ($allies as $ally)
            @if(!($ally->projects)->isEmpty())
            @php
                $count2++;
            @endphp
            <div class="ui bottom attached tab segment @if($count2 == 1) active @endif" data-tab="{{'tab'.$count2}}">
                <div class="header_tap">
                    <img class="ui middle aligned tiny circular image" src="assets/img/allys-logo/{{$ally->logo}}">
                    <h2 class="ui header text-purple-dark">{{$ally->name}}</h2>
                </div>
                @if($ally->description == null)
                <p>Lorem ipsum dolor sit amet consec</p>
                @else
                <p>{{$ally->description}}</p>
                @endif
                <div class="relative">
                    {{-- boton derecho --}}
                    <button class="btn-carrusel-aliado btn-left">
                        <i class="angle left icon"></i>
                    </button>
                    {{-- carrusel --}}
                    <div class="aliados">
                    @foreach($ally->projects as $project)

                            <div class="relative">
                                <img class="ui image" src="{{asset('assets/img/sistema/Logo-2.png')}}" alt="">
                                <div class="info">
                                    <div>
                                        <h2 class="ui header text-white">{{$project->name}}</h2>
                                    <a href="{{$project->link}}" class="text-white">Visitar</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    <button class="btn-carrusel-aliado btn-right">
                        <i class="angle right icon"></i>
                    </button>
                    {{-- boton izquierdo --}}
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
