<div class="rating__modal {{ $ratingFor }}">
    @for ($i = 1; $i <= $rate; $i++)
        <input type="radio" onclick="star({{ $i }},'{{ $ratingFor }}')"
            id="{{ $ratingFor }}radio{{ $i }}" name="rate" value="{{ $i }}">
        <label for="{{ $ratingFor }}radio{{ $i }}">
            <span class="material-icons">star</span>
        </label>
    @endfor
    @for ($i = $rate + 1; $i < 6; $i++)
        <input type="radio" onclick="star({{ $i }},'{{ $ratingFor }}')"
            id="{{ $ratingFor }}radio{{ $i }}" name="rate" value="{{ $i }}">
        <label for="{{ $ratingFor }}radio{{ $i }}">
            <span class="material-icons">star_border</span>
        </label>
    @endfor
</div>
