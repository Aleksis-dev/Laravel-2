<x-app-layout>
    <h1>All posts</h1>
    <a href="{{ route('posts.create') }}">Create post</a>
    <ul>
        @foreach($posts as $post)
            <li>
                <h2>Title: {{ $post->title }}</h2>
                <p>Content: {{ $post->content }}</p>
                <div>
                    <a href="{{ route('post.show', $post) }}">Show</a>
                    <a href="{{ route('post.edit', $post) }}">Edit</a>
                    <form action="{{ route('post.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        
                        <button>Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-app-layout>
