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
      <h1 class="underline text-2xl font-bold">問題投稿</h1>
    </div>
    
    <!-- ブログの投稿用フォーム -->
    <!-- actionの値の見直し可能性あり -->
    <form action="/edit" id="post-photo" method="post" enctype="multipart/form-data">
      @csrf
      
      <div class="tag border-gray-400 w-2/3 border-solid border-2 rounded p-3 m-2">
        <h2>カテゴリー</h2>
        <select name="post[category_id]">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
	      </select>
      
        <p>タイトル<br>
        <input type="text" name="post[description]"></p>

        <p>問題概要<br>
          <textarea name="post[description]" cols="20" rows="2"></textarea></p>
      </div>    
      
      <p><input class='decide-button submit m-2' type="submit" value="保存"></p>
    </form>

</main>

</body>
</x-app-layout>

</html>