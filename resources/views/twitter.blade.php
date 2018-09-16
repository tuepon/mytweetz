<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyTweetz</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="navbar-brand">MyTweetz</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <form class="card" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @if(count($errors) > 0)
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            {{$error}}
          </div>
        @endforeach
      @endif

      <div class="form-group" style="margin:10px;">
        <label>Tweet Text</label>
        <input type="text" name="tweet" class="form-control">
      </div>
      <div class="form-group" style="margin:10px;">
        <label>Upload Images</label>
        <input type="file" name="images[]" multiple class="form-control">
      </div>
      <div class="form-group">
        <button class="btn btn-success" name="button">Create Tweet</button>
      </div>
    </form>

    @if(!empty($data))
      @foreach($data as $key => $tweet)
        <div class="card mb-2">
          <div class="card-body">
            <h3>{{$tweet['text']}}
              Fav {{$tweet['favorite_count']}}
              Ret {{$tweet['retweet_count']}}     
            </h3>
            @if(!empty($tweet['extended_entities']['media']))
              @foreach($tweet['extended_entities']['media'] as $i)
                <img src="{{$i['media_url_https']}}" style="width:100px;">
              @endforeach
            @endif
          </div>
        </div>
      @endforeach
   @endif
  </div>
</body>
</html>