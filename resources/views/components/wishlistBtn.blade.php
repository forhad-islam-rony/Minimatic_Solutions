<div>
    <div class="wishlist__icon">
        <span class="wishlist material-icons" id="myInput" onclick="openModel()">
            @if ($inWishlist)
                favorite
            @else
                favorite_border
            @endif
        </span>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="wishlistDate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/wishlist/{{ $product->id }}" method="post" id="wishlistForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Future Purchase Date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Select Future Purchase Date :
                            <input type="date" name="date" min="{{ date('Y-m-d') }}"
                                value="{{ date('Y-m-d') }}" id="date" required />
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Add to Wishlist
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var status = false;

    function openModel() {
        @if (!$inWishlist)
            $("#wishlistDate").modal("show");
        @else
            document.getElementById('wishlistForm').submit();
        @endif
    }
</script>
