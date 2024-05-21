<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-12">
                    <div class="post-comments">
                        @if (Session::has('userId'))
                            <form action="/comment" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="comment">Your Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                                </div>
                                <input type="submit" id="commentSubmit" name="submitType" class="btn btn-default"
                                    value="Send">
                            </form>
                        @endif
                        @if ($userComment != null)
                            <div class="row" style="margin: 1em 0 0 0;">
                                <div class="media">
                                    <div class="media-heading">
                                        <span style="font-size: 20px;font-weight: bold;max-width: 60vw;">You</span>
                                        {{ $userComment->updated_at }}
                                        <div class="panel-collapse collapse in" id="collapseOne">
                                            <div class="media-left" style="width: 17vw;"></div>
                                            <div class=""
                                                style=" width: 100%;background: rgba(128, 128, 128,0.2);border-radius:10px;padding:10px;">
                                                <div class="content" style="word-wrap: break-word;">
                                                    {{ $userComment->comment }}
                                                </div>
                                                <br>
                                                <p><a onclick="commentUpdate()"
                                                        style="color: blue;cursor: pointer;">Edit</a> |
                                                    <a href="/comment/remove/{{ $product->id }}"
                                                        style="color: blue;">Delete</a>
                                                </p>
                                                <script>
                                                    function commentUpdate() {
                                                        var comment = '{{ $userComment->comment }}';
                                                        document.querySelector('#comment').value = comment;
                                                        document.querySelector('#commentSubmit').value = "Update";
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach ($product->comment as $comment)
                            @if (!($comment->user->id == Session::get('userId')))
                                <div class="row" style="margin: 1em 0 0 0;">

                                    <div class="media">
                                        <!-- first comment -->

                                        <div class="media-heading">
                                            <span
                                                style="font-size: 20px;font-weight: bold;max-width:  60vw;">{{ $comment->user->name }}</span>
                                            {{ $comment->updated_at }}
                                        </div>

                                        <div class="panel-collapse collapse in" id="collapseOne">
                                            <div class="media-left" style="width: 17vw;"></div>
                                            <div class="media-body"
                                                style="display: flex;  
                                            flex-wrap: wrap;background: rgba(128, 128, 128,0.2);border-radius:10px;padding:10px;width: 50vw;">
                                                {{ $comment->comment }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
