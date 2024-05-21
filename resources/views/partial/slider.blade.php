<section class="carousel-fixed-height" style="border: 1px solid black;margin: 5px;border-radius:10px;padding:5px;">
    <div id="carousel-fixed-height" class="carousel slide" data-ride="carousel" data-interval="2000">
        <div class="carousel-inner" role="listbox">
        @for ($i = 0; $i < 6; $i++)
                <div class="item @if ($i == 5) active @endif">
                    <div style="background:url('{{ $categories[$i]->image }}') center center; background-size:contain; background-repeat: no-repeat;"
                        class="slider-size">
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
