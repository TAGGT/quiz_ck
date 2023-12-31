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
      <h1 class="underline text-2xl font-bold">問題投稿</h1>
    </div>
    
    <!-- ブログの投稿用フォーム -->
    <!-- actionの値の見直し可能性あり -->
    <div class="tag border-gray-400 w-2/3 border-solid border-2 rounded p-3 m-2">
    <form action="/quizzes/{{ $quiz_block->id }}" id="post-quiz-block" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
      
        <h2>カテゴリー</h2>
        <select name="post[category_id]">
          @foreach($categories as $category)
            @if($quiz_block->category->id == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
	      </select>
      
        <p>タイトル<br>
        <input type="text" name="post[name]" value="{{ $quiz_block->name }}"></p>

        <p>問題概要<br>
          <textarea name="post[description]" cols="20" rows="2">{{ $quiz_block->description }}</textarea></p>
      
      <p><input class='decide-button submit m-2' type="submit" value="保存"></p>
    </form>
    
    <form action="/quizzes/{{ $quiz_block->id }}" id="delete-quiz" method="post" enctype="multipart/form-data">
      @csrf
      @method('DELETE')
      <input class='decide-button submit m-2' type="submit" value="削除">
    </form>
    </div>
      
    <form action="/quizzes/add" id="post-quiz-column" method="post" enctype="multipart/form-data">
    @csrf
      <input type="hidden" name="post[quiz_block_id]" value="{{ $quiz_block->id }}">

      <div class="add-quiz">
        <div class="tag border-gray-400 w-2/3 border-solid border-2 rounded p-3 m-2">
          <h2>問題</h2>
          <p>問題文<br>
          <textarea name="post[text]" cols="20" rows="3"></textarea></p>
          
          <p>正解<br>
          <textarea name="post[answer]" cols="20" rows="2"></textarea></p>
          
          <p>選択肢1<br>
          <textarea name="post[choice1]" cols="20" rows="2"></textarea></p>
          
          <p>選択肢2<br>
          <textarea name="post[choice2]" cols="20" rows="2"></textarea></p>
          
          <p>選択肢3<br>
          <textarea name="post[choice3]" cols="20" rows="2"></textarea></p>
        </div>
      </div>
      
      <p><input class='decide-button submit m-2' type="submit" value="保存"></p>
    </form>
    
    

    <div class="tag border-gray-400 w-2/3 border-solid border-2 rounded p-3 m-2 ">
      <h2>プレビュー</h2>
      <table>
        <thead>
          <tr>
            <th colspan="2">The table header</th>
          </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
        <tr>
          <td>
            問題文
          </td>
          <td>
            {{ $quiz->text }}
          </td>
        </tr>
        <tr>
          <td>
            正解
          </td>
          <td>
            {{ $quiz->answer }}
          </td>
        </tr>
        <tr>
          <td>
            選択肢1
          </td>
          <td>
            {{ $quiz->choice1 }}
          </td>
        </tr>
        <tr>
          <td>
            選択肢2
          </td>
          <td>
            {{ $quiz->choice2 }}
          </td>
        </tr>
        <tr>
          <td>
            選択肢3
          </td>
          <td>
            {{ $quiz->choice3 }}
          </td>
        </tr>
        <tr>
          <td>
            <a href="/quizzes/{{ $quiz->id }}/quiz">編集</a>
          </td>
          <td>
            <form action="/quizzes/{{ $quiz->id }}/quiz" id="delete-quiz" method="post" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="post[quiz_block_id]" value="{{ $quiz_block->id }}">
              <input class='decide-button submit m-2' type="submit" value="削除">
            </form>
          </td>
        </tr>
                  
        @endforeach
        </tbody>
      </table>
    </div>

</main>

</body>
</x-app-layout>

</html>