<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<x-app-layout>
<x-slot name="header">
	Index
</x-slot>
<body>

  <main>
    <div class="m-4">
      <h1 class="underline text-2xl font-bold">投稿した問題</h1>
    </div>
	<div class='my-photo m-1'>
	@foreach($quiz_blocks as $quiz_block)
    <div style="width:40%; height:30px;border:solid;margin:3px;padding:3px">
      <a href='/quizzes/{{ $quiz_block->id }}/edit'>
        <p>{{ $quiz_block->name }}</p>
      </a>
    </div>
  @endforeach
  
	</div>
	
	<div class='paginate flex justify-center'>
            {{ $quiz_blocks->links() }}
    </div>

  </main>

</body>
</x-app-layout>
</html>