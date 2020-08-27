@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
                <div>
                        {{ $favorite->user->name }}
                    </div>
                    <div>
                        <!-- $favoriteにお気に入りしたMicropostのレコードが入ってる -->
                        <!-- 本文のデータにアクセスしたかったら、$favorite->contentと記述する -->
                        {{-- お気に入り一覧 --}}
                        <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                    </div>
                    <div>
                       {{-- お気に入り削除ボタン --}}
                       {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Unfavorite', ['class' => 'btn btn-danger btn-sm']) !!}
                       {!! Form::close() !!}
                </div>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $favorites->links() }}
@endif