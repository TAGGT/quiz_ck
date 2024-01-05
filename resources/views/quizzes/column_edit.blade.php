<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/css/quiz.css')
  <title>Document</title>
</head>
<x-app-layout>
<x-slot name="header">
	Index
</x-slot>

<body>

  <main>
    <div class="m-4">
      <h1 class="underline text-2xl font-bold">問題編集</h1>
    </div>
        
    <form action="/quizzes/{ $quiz->id}/quiz" id="post-quiz-column" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

      <div class="add-quiz">
        <div class="tag border-gray-400 w-2/3 border-solid border-2 rounded p-3 m-2">
          <h2>問題</h2>
          <p>問題文<br>
          <textarea name="post[text]" cols="20" rows="3">{{ $quiz->text }}</textarea></p>
          
          <p>正解<br>
          <textarea name="post[answer]" cols="20" rows="2">{{ $quiz->answer }}</textarea></p>
          
          <p>選択肢1<br>
          <textarea name="post[choice1]" cols="20" rows="2">{{ $quiz->choice1 }}</textarea></p>
          
          <p>選択肢2<br>
          <textarea name="post[choice2]" cols="20" rows="2">{{ $quiz->choice2 }}</textarea></p>
          
          <p>選択肢3<br>
          <textarea name="post[choice3]" cols="20" rows="2">{{ $quiz->choice3 }}</textarea></p>
        </div>
      </div>
      
      <p><input class='decide-button submit m-2' type="submit" value="保存"></p>
    </form>

</main>

</body>
</x-app-layout>

</html>